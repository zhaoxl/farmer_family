<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Ollieread\Multiauth\Guard;

class AuthAdminController extends Controller {
	
	
	public function getLogin()
	{
		return view('auth.admin_login');
	}

	public function postLogin(Request $request)
	{
	    if(Auth::admin()->attempt(array(
	        'email'     => $request['email'],
	        'password'  => $request['password'],
	    )))
		{
			return redirect()->intended('/admin');
		}

		return redirect('auth_admin/login')
					->withInput($request->only('email', 'remember'))
					->withErrors([
						'email' => '账号或密码错误',
					]);
	}
	
	public function getLogout()
	{
		Auth::admin()->logout();
		return redirect('/admin');
	}

}
