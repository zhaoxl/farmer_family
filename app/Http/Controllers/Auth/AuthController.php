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
        'mobile'     => $request['mobile'],
        'password'  => $request['password'],
    ), $request['remember'] == 'on')){
			return redirect()->intended('/my');
		}

		return redirect()->back()
					->withInput($request->only('mobile', 'remember'))
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
		$cap = \Captcha::src();
		return view('auth.present_register')->with('area_provinces', $area_provinces)->with('cap', $cap);
	}
	#企业注册
	public function getCompanyRegister()
	{
		$area_provinces = \App\AreaProvince::orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		$industries = \App\Industry::orderBy('sort', 'asc')->get();
		$cap = \Captcha::src();
		return view('auth.company_register')->with('area_provinces', $area_provinces)->with('cap', $cap)->with('industries', $industries);
	}
	#个人招工注册
	public function getHireRegister()
	{
		$area_provinces = \App\AreaProvince::orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		$industries = \App\Industry::orderBy('sort', 'asc')->get();
		$cap = \Captcha::src();
		return view('auth.hire_register')->with('area_provinces', $area_provinces)->with('cap', $cap)->with('industries', $industries);
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
	
	#忘记密码
	public function getForget()
	{
		return view('auth.forget');
	}
}
