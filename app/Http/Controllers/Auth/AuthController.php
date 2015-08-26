<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Ollieread\Multiauth\Guard;

class AuthController extends Controller {

	public function getLogin()
	{
		return view('auth.login');
	}
	
	public function postLogin(Request $request)
	{
	    if(Auth::user()->attempt(array(
	        'email'     => $request['email'],
	        'password'  => $request['password'],
	    )))
		{
			return redirect()->intended('/');
		}

		return redirect('auth/login')
					->withInput($request->only('email', 'remember'))
					->withErrors([
						'email' => '账号或密码错误',
					]);
	}

	public function getLogout()
	{
		Auth::user()->logout();
		return redirect('/');
	}
	
	#个人找活注册
	public function getPresentRegister()
	{
		$area_provinces = \App\AreaProvince::orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		return view('auth.present_register')->with('area_provinces', $area_provinces);
	}
	#个人招工注册
	public function getHireRegister()
	{
		$area_provinces = \App\AreaProvince::orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		return view('auth.register')->with('area_provinces', $area_provinces);
	}
	#企业注册
	public function getCompanyRegister()
	{
		$area_provinces = \App\AreaProvince::orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		return view('auth.register')->with('area_provinces', $area_provinces);
	}
	
	public function postRegister(Request $request)
	{
		$registrar = new \App\Services\Registrar;
		$validator = $registrar->validator($request->all());
		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}

		Auth::user()->login($registrar->create($request->all()));

		return redirect('/');
	}
}
