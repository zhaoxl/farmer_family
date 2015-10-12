<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Ollieread\Multiauth\Guard;

class AuthController extends Controller {

	public function getLogin()
	{
		$current_city = \Cookie::get('current_city');
		return view('auth.login')->with('city_name', $current_city);
	}
	
	#登陆
	public function postLogin(Request $request)
	{		
    if(Auth::user()->attempt(array(
        'mobile'    => $request['mobile'],
        'password'  => $request['password'],
				'state'			=> 'normal'
    ), $request['remember'] == 'on')){
			return redirect()->intended('/my');
		}

		return redirect()->back()
					->withInput($request->only('mobile', 'remember'))
					->withErrors([
						'mobile' => '账号或密码错误',
					]);
	}

	#退出
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
		\Session::put('url.intended', '/works');
		return view('auth.present_register')->with('area_provinces', $area_provinces)->with('cap', $cap);
	}
	#企业注册
	public function getCompanyRegister()
	{
		$area_provinces = \App\AreaProvince::orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		$industries = \App\Industry::orderBy('sort', 'asc')->get();
		$cap = \Captcha::src();
		\Session::put('url.intended', '/staffs');
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
	
	#注册
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
		//设置工种
		//TODO
		Auth::user()->login($registrar->create($request->all()));
		//上传图片
		//身份证
		if ($request->hasFile('idcard_file')) {
		    //
		}
		
		//头像
		return redirect()->intended('/my');
	}
	
	public function postUploadImg(Request $request)
	{
		$category = $request['category'];
		$session_id = \Session::getId();
    $destinationPath = 'upload/temp/idcard/';
		$file = \Input::file('image');
		$new_file_name = $session_id.'.'.$file->getClientOriginalExtension();
		
		$file->move($destinationPath, $new_file_name);
		return \Response::json(
	    [
	      'status' => 1,
        'url' => asset($destinationPath.$new_file_name),
	    ]
	  );
	}
	
	#忘记密码
	public function getForget()
	{
		return view('auth.forget');
	}
	
	#服务条款
	public function getServicesAgreement()
	{
		return view('auth.services-agreement');
	}
}
