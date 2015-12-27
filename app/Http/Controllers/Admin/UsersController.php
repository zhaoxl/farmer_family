<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UsersController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$datas = \App\User::orderBy('created_at', 'desc');
		if(!is_null($request['mobile'])){
			$datas = $datas->where("mobile", 'LIKE', '%'.$request['mobile'].'%');
		}
		
		
		return view('admin.users.index')->with('datas', $datas->paginate(11));
	}
	
	public function company_users()
	{
		$datas = \App\User::where('category', '=', 1)->leftJoin('companies', 'users.id', '=', 'companies.user_id')->orderBy('created_at', 'desc')->select(\DB::raw('users.*, company_name, tel, industry_name, companies.address'))->paginate(11);
		return view('admin.users.company_users')->with('datas', $datas);
	}
	
	public function hire_users()
	{
		$datas = \App\User::where('category', '=', 2)->orderBy('created_at', 'desc')->paginate(11);
		return view('admin.users.hire_users')->with('datas', $datas);
	}
	
	public function present_users()
	{
		$datas = \App\User::where('category', '=', 0)->orderBy('created_at', 'desc')->paginate(11);
		return view('admin.users.present_users')->with('datas', $datas);
	}
	
	public function suicide_users()
	{
		$datas = \DB::table('users')->where('state', '=', 'suicide')->orderBy('created_at', 'desc')->paginate(11);
		return view('admin.users.suicide_users')->with('datas', $datas);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data = new \App\User;
		$area_provinces = \App\AreaProvince::orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		$work_categories = \App\WorkCategory::orderBy('sort', 'asc')->get();
		
		return view('admin.users.create')->with('data', $data)->with('area_provinces', $area_provinces)->with('work_categories', $work_categories);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		
		#判断手机号是否重复
		if(\App\User::where('mobile', '=', $request['mobile'])->first())
		{
			$request->session()->flash('error', '手机号不可用');
			return redirect()->back();
		}
		
		#判断邮箱是否重复
		if(\App\User::where('email', '=', $request['email'])->first())
		{
			$request->session()->flash('error', '邮箱地址不可用');
			return redirect()->back();
		}
		
		$user = new \App\User;
		$user->category = $request['category'];
		$user->mobile = $request['mobile'];
		$user->password = \Hash::make($request['password']);
		$user->hometown = $request['hometown'];
		$user->province = $request['province'];
		$user->city = $request['city'];
		$user->street = $request['street'];
		$user->area_name = $request['area_name'];
		$user->birthday = (is_null($request['birthday']) ? null : $request['birthday']);
		$user->email = $request['email'];
		$user->name = $request['name'];
		$user->public_mobile = isset($request['public_mobile']);
		$user->public_qq = isset($request['public_qq']);
		$user->public_weixin = isset($request['public_weixin']);
		$user->public_email = isset($request['public_email']);
		$user->qq = $request['qq'];
		$user->weixin = $request['weixin'];
		$user->expect_salary = $request['expect_salary'];
		$user->gender = $request['gender'];
		$user->save();
			
		\App\UserWorkCategory::where('user_id', '=', $user->id)->delete();
		$new_category_ids = $request['work_category_id'];
		foreach($new_category_ids as $id)
		{
			if(!\App\UserWorkCategory::where('user_id', '=', $user->id)->where('work_category_id', '=', $id)->first())
			{
				\App\UserWorkCategory::create(['user_id' => $user->id, 'work_category_id' => $id]);	
			}
		}
		
		$request->session()->flash('success', '保存成功');
		return redirect()->back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = \DB::table('users')->find($id);
		$area_provinces = \App\AreaProvince::orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		$area_cities = null;
		$area_streets = null;
		if(!empty($data->province))
		{
			$area_cities = \App\AreaCity::where('provincecode', '=', $data->province)->orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		}
		if(!empty($data->city))
		{
			$area_streets = \App\AreaStreet::where('citycode', '=', $data->city)->orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		}
		$work_categories = \App\WorkCategory::orderBy('sort', 'asc')->get();

		$user_work_categories = \App\User::find($id)->work_categories()->get();
		
		
		return view('admin.users.edit')->with('data', $data)->with('area_provinces', $area_provinces)->with('area_cities', $area_cities)->with('area_streets', $area_streets)->with('work_categories', $work_categories)->with('user_work_categories', $user_work_categories);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$user = \App\User::find($id);
		
		#判断邮箱是否重复
		if(\App\User::where("id", "!=", $user->id)->where('email', '=', $request['email'])->first())
		{
			$request->session()->flash('error', '邮箱地址不可用');
			return redirect()->back();
		}

		
		$user->hometown = $request['hometown'];
		$user->province = $request['province'];
		$user->city = $request['city'];
		$user->street = $request['street'];
		$user->area_name = $request['area_name'];
		$user->birthday = (is_null($request['birthday']) ? null : $request['birthday']);
		$user->email = $request['email'];
		$user->name = $request['name'];
		$user->public_mobile = isset($request['public_mobile']);
		$user->public_qq = isset($request['public_qq']);
		$user->public_weixin = isset($request['public_weixin']);
		$user->public_email = isset($request['public_email']);
		$user->qq = $request['qq'];
		$user->weixin = $request['weixin'];
		$user->expect_salary = $request['expect_salary'];
		$user->gender = $request['gender'];
		$new_pwd = $request['password'];
		if(!is_null($new_pwd))
		{
			$user->password = \Hash::make($new_pwd);
		}
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
		
		$request->session()->flash('success', '保存成功');
		return redirect()->back();
	}

	public function destroy($id)
	{
		\App\User::destroy($id);
	}
	
	public function suicide($id)
	{
		\App\User::where('id', '=', $id)->update(['state' => 'suicide']);
	}
	
	public function un_suicide($id)
	{
		\DB::table('users')->where('id', '=', $id)->update(['state' => 'normal']);
	}
}
