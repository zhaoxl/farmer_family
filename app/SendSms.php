<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SendSms extends Model {

	protected $fillable = ['user_id', 'session_id', 'content'];
	
	public static function SmsSecond($session_id)
	{
		$sms = SendSms::where('session_id', '=', $session_id)->orderBy("created_at", "DESC")->first();
		if(is_null($sms))
		{
			return 0;
		}
		$a = strtotime(date("y-m-d h:i:s"));
		$b = strtotime(date($sms->created_at));
		$diff = $a-$b;
		if($diff >= 60)
		{
			return 0;
		}
		else
		{
			return 60-$diff;
		}
	}
	
	public static function SendSms($session_id, $mobile, $content)
	{
		if(SendSms::SmsSecond($session_id) > 1)
		{
			return false;
		}
		SendSms::create(["session_id" => $session_id, 'mobile' => $mobile, "content" => $content]);
		
		return true;
	}
	
	public static function checkSmsCode($check_code)
	{
		if(!is_null(SendSms::where('content', '=', $check_code)->where(\DB::raw("TIMESTAMPDIFF(SECOND, created_at, '".date("y-m-d h:i:s")."')"), '<', '60')->first()))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
