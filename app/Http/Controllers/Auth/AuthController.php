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
	
	#登录
	public function postLogin(Request $request)
	{		
    if(Auth::user()->attempt(array(
        'mobile'    => $request['mobile'],
        'password'  => $request['password']
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
		$work_categories = \App\WorkCategory::orderBy('sort', 'asc')->get();
		$cap = \Captcha::src();
		\Session::put('url.intended', '/works');
		return view('auth.present_register')->with('area_provinces', $area_provinces)->with('cap', $cap)->with('work_categories', $work_categories);
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
	#个人雇人注册
	public function getHireRegister()
	{
		$area_provinces = \App\AreaProvince::orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		$industries = \App\Industry::orderBy('sort', 'asc')->get();
		$cap = \Captcha::src();
		return view('auth.hire_register')->with('area_provinces', $area_provinces)->with('cap', $cap)->with('industries', $industries);
	}
	
	public function getCreate()
	{
		$send_sms_second = \App\SendSms::SmsSecond(\Session::getId());
		return view('auth.create')->with('send_sms_second', $send_sms_second);
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
		
		Auth::user()->login($registrar->create($request->all()));

		$user_id = \Auth::user()->id();
		
		//返回来自页
		return redirect()->intended('/my');
	}
	
	public function postUploadImg(Request $request)
	{
		#http://kissygalleryteam.github.io/uploader/doc/guide/index.html
		#http://laravel.com/api/5.0/Illuminate/Filesystem/Filesystem.html
		
		$accept_array = array('idcard', 'photo', 'diploma', 'license', 'company_photo');
		$category = $request['category'];
		if(in_array($category, $accept_array))
		{
		  $file = \Input::file('image');
		  $input = array('image' => $file);
		  $rules = array(
		  	'image' => 'image'
		  );
		  $validator = \Validator::make($input, $rules);
		  if ( $validator->fails() ) {
		  	return \Response::json([
			  	'status' => 0,
			  	'message' => $validator->getMessageBag()->toArray()
			  ]);
			}

		  $destinationPath = 'upload/temp/'.$category;
			#删除以前上传文件
			\File::delete(public_path().'/'.$destinationPath.'/'.\Session::getId().'.png');
			\File::delete(public_path().'/'.$destinationPath.'/'.\Session::getId().'.jpg');
			\File::delete(public_path().'/'.$destinationPath.'/'.\Session::getId().'.gif');
		  $filename = \Session::getId().'.'.$file->getClientOriginalExtension();
			$file->move($destinationPath, $filename);
			return \Response::json(
				[
					'status' => 1,
				 	'url' => asset($destinationPath.'/'.$filename),
					'path' => $destinationPath.'/'.$filename
				]
			);
		}
		else
		{
	  	return \Response::json([
		  	'status' => 0,
		  	'message' => '图片类型错误！'
		  ]);
		}
		return \Response::json([
	  	'status' => 0,
	  	'message' => '未知错误！'
	  ]);
	}
	
	#忘记密码
	public function getForget()
	{
		return view('auth.forget');
	}
	
	#忘记密码
	public function postForget()
	{
		return view('auth.forget');
	}
	
	#服务条款
	public function getServicesAgreement()
	{
		return view('auth.services-agreement');
	}
	
	public function postSendSms(Request $request)
	{
		$mobile = $request['mobile'];
		
		$arr=array();
		while(count($arr)<4)
		{
		  $arr[]=rand(1,10);
		  $arr=array_unique($arr);
		}
		$check_code = implode("", $arr);
		$content = "验证码：".$check_code."【猫眼360】";
		$result = \App\SendSms::SendSms(\Session::getId(), $mobile, $content);
		if($result == true)
		{
			return "success";
		}
		else
		{
			return $result;
		}
		
		
	}
}
