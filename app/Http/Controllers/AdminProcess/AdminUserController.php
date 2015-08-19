<?php namespace App\Http\Controllers\AdminProcess;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Ollieread\Multiauth\Guard;

class AdminUserController extends Controller {
	
	
	public function postChange_pwd(Request $request)
	{
		if(Auth::admin()->guest()){
			return redirect('/auth_admin/logout');
		}
		if(!isset($request['new_pwd']) || empty($request['new_pwd_cfm'])){
			return redirect()->back()->withErrors(['pwd' => '新密码不能为空！']);
		}
		if($request['new_pwd'] != $request['new_pwd_cfm']){
			return redirect()->back()->withErrors(['pwd' => '两次密码输入不一致！']);
		}
		$admin = Auth::admin()->get();
		if(!Auth::admin()->validate(array(
			'email'     => $admin->email,
			'password'  => $request['old_pwd'])))
		{
			return redirect()->back()->withErrors(['pwd' => '原始密码错误！']);
		}
		$admin->password = \Hash::make($request['new_pwd']);
		$admin->save();
		return redirect()->back()->with('success', '修改成功！');
	}

}
