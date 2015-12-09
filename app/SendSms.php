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
		$a = strtotime(date("y-m-d H:i:s"));
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
	
	public static function SendCheckCodeSms($session_id, $mobile, $check_code)
	{
		$content = "验证码：".$check_code."【猫眼360】";
		$result = SendSms::SendSms($session_id, $mobile, $content);
		if($result == true)
		{
			SendSms::create(["session_id" => $session_id, 'mobile' => $mobile, "content" => $content]);
		}
		else
		{
			return $result;
		}
	}
	
	public static function SendSms($session_id, $mobile, $check_code)
	{
		if(SendSms::SmsSecond($session_id) > 1)
		{
			return false;
		}
		$params = "";
		$flag = 0; 
		//要post的数据 
		$argv = array( 
			'sn'=>'SDK-BBX-010-23773', ////替换成您自己的序列号
			'pwd'=>strtoupper(md5('SDK-BBX-010-23773'.'Ae8c-cA7')), //此处密码需要加密 加密方式为 md5(sn+password) 32位大写
			'mobile'=> $mobile,//手机号 多个用英文的逗号隔开 post理论没有长度限制.推荐群发一次小于等于10000个手机号
			//'content'=>iconv( "gb2312", "UTF-8//IGNORE" ,'您好测试短信[XXX公司]'),//短信内容
			'content' => $content,
			'ext'=>'',		
			'stime'=>'',//定时时间 格式为2011-6-29 11:09:21
			'msgfmt'=>'',
			'rrid'=>''
		); 
		//构造要post的字符串 
		foreach ($argv as $key=>$value) { 
			if ($flag!=0) {
				$params .= "&";
				$flag = 1; 
		  }
			$params.= $key."="; 
			$params.= urlencode($value);
			$flag = 1; 
		} 
		$length = strlen($params); 
		//创建socket连接 
		$fp = fsockopen("sdk.entinfo.cn",8061,$errno,$errstr,10) or exit($errstr."--->".$errno); 
		//构造post请求的头 
		$header = "POST /webservice.asmx/mdsmssend HTTP/1.1\r\n"; 
		$header .= "Host:sdk.entinfo.cn\r\n"; 
		$header .= "Content-Type: application/x-www-form-urlencoded\r\n"; 
		$header .= "Content-Length: ".$length."\r\n"; 
		$header .= "Connection: Close\r\n\r\n"; 
		//添加post的字符串 
		$header .= $params."\r\n"; 
		//发送post的数据 
		fputs($fp,$header);
		$inheader = 1;
		while (!feof($fp)) { 
			$line = fgets($fp,1024); //去除请求包的头只显示页面的返回数据 
			if ($inheader && ($line == "\n" || $line == "\r\n")) { 
				$inheader = 0; 
			} 
			if ($inheader == 0) { 
				// echo $line; 
			} 
		} 
		//<string xmlns="http://tempuri.org/">-5</string>
		$line=str_replace("<string xmlns=\"http://tempuri.org/\">","",$line);
		$line=str_replace("</string>","",$line);
		$result=explode("-",$line);
		// echo $line."-------------";
		if(count($result)>1)
		{
			return $line;
		}
		
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
