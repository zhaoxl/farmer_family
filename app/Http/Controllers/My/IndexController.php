<?php namespace App\Http\Controllers\My;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class IndexController extends Controller {

	public function __construct()
  {
		$this->beforeFilter(function()
    {
			if(\Auth::user()->guest()){
				return redirect("/");
			}
    });
  }

	public function getIndex()
	{
		$user = \Auth::user()->get();
		return view('my.index')->with('user', $user);
	}
	
	public function getAlreadySends()
	{
		return view('my.already_sends');
	}
	
	public function getMessages()
	{
		return view('my.messages');
	}
	
	public function getChangePwd()
	{
		return view('my.change_pwd');
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
