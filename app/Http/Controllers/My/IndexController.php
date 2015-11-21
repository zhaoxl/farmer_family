<?php namespace App\Http\Controllers\My;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class IndexController extends BaseController {

	public function getIndex()
	{
		$user = \Auth::user()->get();
		$user_work_categories = $user->work_categories()->get();
		$area_provinces = \App\AreaProvince::orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		$area_cities = null;
		$area_streets = null;
		if(!empty($user->province))
		{
			$area_cities = \App\AreaCity::where('provincecode', '=', $user->province)->orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		}
		if(!empty($user->city))
		{
			$area_streets = \App\AreaStreet::where('citycode', '=', $user->city)->orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		}
		$work_categories = \App\WorkCategory::orderBy('sort', 'asc')->get();
		return view('my.index')->with('user', $user)->with('area_provinces', $area_provinces)->with('area_cities', $area_cities)->with('area_streets', $area_streets)->with('work_categories', $work_categories)->with('user_work_categories', $user_work_categories);
	}
	
	public function getSentStaffs()
	{
		$user = \Auth::user()->get();
		$staffs = \App\Staff::where('user_id', '=', $user->id)->paginate(20);
		return view('my.sent_staffs')->with('staffs', $staffs);
	}
	
	public function getSentWorks()
	{
		$user = \Auth::user()->get();
		$staffs = \App\Work::where('user_id', '=', $user->id)->paginate(20);
		return view('my.sent_works')->with('works', $staffs);
	}
	
	public function postDeleteStaff(Request $request)
	{
		$id = $request['delete_staff_id'];
		\App\Staff::destroy($id);
		return redirect()->back();
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

		return redirect('/');
	}
	
	public function postSaveProfile(Request $request)
	{
		$user = \Auth::user()->get();
		//上传照片
		//头像
		if (isset($request['photo_image']) && !empty($request['photo_image'])) {
			$photo_image = $request['photo_image'];
			$extension_name = \File::extension($photo_image);
			$user_id = $user->id;
			$file_type = \File::mimeType($photo_image);
			$file_size = \File::size($photo_image);
			$user_upload = \App\UserUpload::firstOrNew(['category' => 'photo', 'user_id' => $user_id]);
			$user_id->item_type = 'User';
			$user_id->item_id = $user_id;
			$user_id->url = asset('upload/photo/'.$user_id.'.'.$extension_name);
			$user_id->file_type = $file_type;
			$user_id->path = 'upload/photo/'.$user_id.'.'.$extension_name;
			$user_id->file_size = $file_size;
			$user_upload->save();
			\File::move(public_path().'/'.$photo_image, public_path().'/'.'upload/photo/'.$user_id.'.'.$extension_name);
		}

		//学历证书
		if (isset($request['diploma_image']) && !empty($request['diploma_image'])) {
			$photo_image = $request['diploma_image'];
			$extension_name = \File::extension($photo_image);
			$user_id = $user->id();
			$file_type = \File::mimeType($photo_image);
			$file_size = \File::size($photo_image);
			$user_upload = \App\UserUpload::firstOrNew(['category' => 'diploma', 'user_id' => $user_id]);
			$user_id->item_type = 'User';
			$user_id->item_id = $user_id;
			$user_id->url = asset('upload/diploma/'.$user_id.'.'.$extension_name);
			$user_id->file_type = $file_type;
			$user_id->path = 'upload/diploma/'.$user_id.'.'.$extension_name;
			$user_id->file_size = $file_size;
			$user_upload->save();
			\File::move(public_path().'/'.$photo_image, public_path().'/'.'upload/diploma/'.$user_id.'.'.$extension_name);
		}

		$user->hometown = $request['hometown'];
		$user->province = $request['province'];
		$user->city = $request['city'];
		$user->street = $request['street'];
		$user->area_name = $request['area_name'];
		$user->birthday = $request['birthday'];
		$user->email = $request['email'];
		$user->mobile = $request['mobile'];
		$user->name = $request['name'];
		$user->public_mobile = isset($request['public_mobile']);
		$user->public_qq = isset($request['public_qq']);
		$user->public_weixin = isset($request['public_weixin']);
		$user->public_email = isset($request['public_email']);
		$user->qq = $request['qq'];
		$user->weixin = $request['weixin'];
		$user->expect_salary = $request['expect_salary'];
		$user->gender = $request['gender'];
		$user->address = $request['address'];
		$user->save();
			
		#$user->work_categories->delete();
		\App\UserWorkCategory::where('user_id', '=', $user->id)->delete();
		$new_category_ids = $request['work_category_id'];
		foreach($new_category_ids as $id)
		{
			if(!\App\UserWorkCategory::where('user_id', '=', $user->id)->where('work_category_id', '=', $id)->first())
			{
				\App\UserWorkCategory::create(['user_id' => $user->id, 'work_category_id' => $id]);	
			}
		}

		return redirect()->back();
	}
	
	public function postUploadImg(Request $request)
	{
		$accept_array = array('photo', 'diploma');
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
}
