<?php namespace App\Http\Controllers\My;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class IndexController extends BaseController {

	public function getIndex()
	{
		$user = \Auth::user()->get();
		return view('my.index')->with('user', $user);
	}
	
	public function getSentStaffs()
	{
		return view('my.send_staffs');
	}
	
	public function getInbox()
	{
		$user = \Auth::user()->get();
		$messages = \App\Message::where("to_user_id", "=", $user->id)->join('users', 'users.id', '=', 'messages.from_user_id')->groupBy('from_user_id')->get(array('messages.*','users.name', \DB::raw('count(messages.from_user_id) as count')));
		return view('my.inbox')->with('messages', $messages);
	}
	
	public function getOutbox()
	{
		$user = \Auth::user()->get();
		$messages = \App\Message::where("from_user_id", "=", $user->id)->join('users', 'users.id', '=', 'messages.to_user_id')->groupBy('to_user_id')->get(array('messages.*','users.name', \DB::raw('count(messages.to_user_id) as count')));
		return view('my.outbox')->with('messages', $messages);
	}
	
	public function getChangePwd()
	{
		return view('my.change_pwd');
	}
	
	public function postChangePwd(Request $request)
	{
		$old_pwd = $request['passward'];
		$new_pwd = $request['new_passward'];
		$cfm_new_pwd = $request['confirm_new_password'];
		$user = \Auth::user()->get();

		if(!\Auth::user()->validate(array(
        'mobile'    => $user->mobile,
        'password'  => $old_pwd)
			)
		)
		{
			return view('my.change_pwd')->with('success', null)->with('error', '修改失败，原密码错误');
		}


		if($new_pwd != $cfm_new_pwd)
		{
			return view('my.change_pwd')->with('success', null)->with('error', '修改失败，两次新密码输入不一致');
		}
		
		$user->password = \Hash::make($cfm_new_pwd);
		$user->save();
		
		return view('my.change_pwd')->with('success', '密码修改成功')->with('error', null);
	}
	
	public function getSuicide()
	{
		return view('my.suicide');
	}
	
	public function postSuicide(Request $request)
	{
		if(!isset($request['content']) || (trim($request['content']) == "") || (trim($request['content']) == "请输入注销账户的原因!")){
			return redirect()->back();
		}
		$reason = isset($request['reason']) ? $request['reason'] : [];
		$reason = join(', ', $reason);
		$content = trim($request['content']);
		$user = \Auth::user()->get();
		$suicide = \App\UserSuicide::create(array('user_id' => $user->id, 'reason' => $reason, 'content' => $content));
		$user->state = 'suicide';
		$user->save();
		\Auth::user()->logout();

		return view('my.suicide')->with('success', true);
	}
}
