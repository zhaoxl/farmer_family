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
		
		//上传图片
		//身份证
		if (isset($request['idcard_image']) && !empty($request['idcard_image'])) {
			$idcard_image = $request['idcard_image'];
			$extension_name = \File::extension($idcard_image);
			$file_type = \File::mimeType($idcard_image);
			$file_size = \File::size($idcard_image);	
				
			\App\UserUpload::create(array('category' => 'idcard', 'user_id' => $user_id, 'item_type' => 'User', 'item_id' => $user_id, 'url' => asset('upload/idcard/'.$user_id.'.'.$extension_name), 'path' => 'upload/idcard/'.$user_id.'.'.$extension_name, 'file_type' => $file_type, 'file_size' => $file_size));
			\File::move(public_path().'/'.$idcard_image, public_path().'/'.'upload/idcard/'.$user_id.'.'.$extension_name);
		}
		
		//头像
		if (isset($request['photo_image']) && !empty($request['photo_image'])) {
			$photo_image = $request['photo_image'];
			$extension_name = \File::extension($photo_image);
			$user_id = \Auth::user()->id();
			$file_type = \File::mimeType($photo_image);
			$file_size = \File::size($photo_image);	
				
			\App\UserUpload::create(array('category' => 'photo', 'user_id' => $user_id, 'item_type' => 'User', 'item_id' => $user_id, 'url' => asset('upload/photo/'.$user_id.'.'.$extension_name), 'path' => 'upload/photo/'.$user_id.'.'.$extension_name, 'file_type' => $file_type, 'file_size' => $file_size));
			\File::move(public_path().'/'.$photo_image, public_path().'/'.'upload/photo/'.$user_id.'.'.$extension_name);
		}
		
		//学历证书
		if (isset($request['diploma_image']) && !empty($request['diploma_image'])) {
			$diploma_image = $request['diploma_image'];
			$extension_name = \File::extension($diploma_image);
			$user_id = \Auth::user()->id();
			$file_type = \File::mimeType($diploma_image);
			$file_size = \File::size($diploma_image);	
				
			\App\UserUpload::create(array('category' => 'diploma', 'user_id' => $user_id, 'item_type' => 'User', 'item_id' => $user_id, 'url' => asset('upload/diploma/'.$user_id.'.'.$extension_name), 'path' => 'upload/diploma/'.$user_id.'.'.$extension_name, 'file_type' => $file_type, 'file_size' => $file_size));
			\File::move(public_path().'/'.$diploma_image, public_path().'/'.'upload/diploma/'.$user_id.'.'.$extension_name);
		}
		
		//营业执照
		if (isset($request['license_image']) && !empty($request['license_image'])) {
			$license_image = $request['license_image'];
			$extension_name = \File::extension($license_image);
			$user_id = \Auth::user()->id();
			$file_type = \File::mimeType($license_image);
			$file_size = \File::size($license_image);	
				
			\App\UserUpload::create(array('category' => 'license', 'user_id' => $user_id, 'item_type' => 'User', 'item_id' => $user_id, 'url' => asset('upload/license/'.$user_id.'.'.$extension_name), 'path' => 'upload/license/'.$user_id.'.'.$extension_name, 'file_type' => $file_type, 'file_size' => $file_size));
			\File::move(public_path().'/'.$license_image, public_path().'/'.'upload/license/'.$user_id.'.'.$extension_name);
		}
		
		//公司照片
		if (isset($request['company_photo_image']) && !empty($request['company_photo_image'])) {
			$company_photo_image = $request['company_photo_image'];
			$extension_name = \File::extension($company_photo_image);
			$user_id = \Auth::user()->id();
			$file_type = \File::mimeType($company_photo_image);
			$file_size = \File::size($company_photo_image);	
				
			\App\UserUpload::create(array('category' => 'company_photo', 'user_id' => $user_id, 'item_type' => 'User', 'item_id' => $user_id, 'url' => asset('upload/company_photo/'.$user_id.'.'.$extension_name), 'path' => 'upload/company_photo/'.$user_id.'.'.$extension_name, 'file_type' => $file_type, 'file_size' => $file_size));
			\File::move(public_path().'/'.$company_photo_image, public_path().'/'.'upload/company_photo/'.$user_id.'.'.$extension_name);
		}
		
		//保存工种
		$new_category_ids = $request['work_category_id'];
		if(isset($request['work_category_id']))
		{
			foreach($new_category_ids as $id)
			{
				\App\UserWorkCategory::create(['user_id' => $user_id, 'work_category_id' => $id]);	
			}
		}
		
		//保存公司信息
		if($request['category'] == '1')
		{
			$industry_id = explode('|', $request['industry_id'])[0];
			$industry_name = explode('|', $request['industry_id'])[1];
			\App\Company::create(array('user_id' => $user_id, 'industry_id' => $industry_id, 'industry_name' => $industry_name, 'company_name' => $request['company_name'], 'address' => $request['address']));
		}
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
		mobile = $request['mobile'];
		
		$arr=array();
		while(count($arr)<4)
		{
		  $arr[]=rand(1,10);
		  $arr=array_unique($arr);
		}
		return implode("",$arr);
	}
}
