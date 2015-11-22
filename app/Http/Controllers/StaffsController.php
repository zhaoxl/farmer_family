<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class StaffsController extends Controller {
	
	public function index(Request $request)
	{
		$day = $request['day'];
		$area_province = $request['area_province'];
		$area_city = $request['area_city'];
		$area_cities = null;
		$category_id = $request['category_id'];
		$gender = $request['gender'];
		$age_start = $request['age_start'];
		$age_end = $request['age_end'];

		$staffs = \App\Staff::select('users.*', 'staffs.*')->join('users', 'users.id', '=', 'staffs.user_id');
		
		if(!empty($day))
		{
			$date = date('Y-m-d');
			$date = date('Y-m-d',(strtotime ( '-'.$day.' day' , strtotime ( $date) ) ));
			$staffs = $staffs->where(\DB::raw('TO_DAYS(staffs.created_at)'), '>=', \DB::raw("TO_DAYS('".$date."')"));
		}
		if(!empty($area_city))
		{
			$staffs = $staffs->where('staffs.city', $area_city);
		}
		elseif(!empty($area_province))
		{
			$staffs = $staffs->where('staffs.province', $area_province);
		}
		if(!empty($area_province))
		{
			$area_cities = \App\AreaCity::where('provincecode', '=', $area_province)->orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		}
		if(!empty($category_id))
		{
			$staffs = $staffs->where('staffs.sub_work_category_id', '=', $category_id);
		}
		if(!empty($gender))
		{
			$staffs = $staffs->where('users.gender', '=', $gender);
		}
		if(!empty($age_start))
		{
			$date = date('Y');
			$date = date('Y',(strtotime ( '-'.$age_start.' year' , strtotime ( $date) ) ));
			$staffs = $staffs->where(\DB::raw('YEAR(users.birthday)'), '<=', $date);
		}
		if(!empty($age_end))
		{
			$date = date('Y');
			$date = date('Y',(strtotime ( '-'.$age_end.' year' , strtotime ( $date) ) ));
			$staffs = $staffs->where(\DB::raw('YEAR(users.birthday)'), '>=', $date);
		}
		
		$staffs = $staffs->paginate(4);
		$work_categories = \App\WorkCategory::orderBy('sort', 'asc')->get();
		$area_provinces = \App\AreaProvince::orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		
		return view('staffs.index')->with('staffs', $staffs)->with('work_categories', $work_categories)->with('area_provinces', $area_provinces)->with('area_cities', $area_cities);
	}
	
	public function show($id)
	{
		$staff = \App\Staff::find($id);
		return view('staffs.show')->with('staff', $staff);
	}
	
	public function create()
	{
		if(\Auth::user()->guest()){
			return redirect("/");
		}
		$area_provinces = \App\AreaProvince::orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		$work_categories = \App\WorkCategory::orderBy('sort', 'asc')->get();
		return view('staffs.create')->with('area_provinces', $area_provinces)->with('work_categories', $work_categories);
	}

	
	public function store(Request $request)
	{
		if(\Auth::user()->guest()){
			return redirect("/");
		}
		$title = $request['title'];
		$area_province = $request['area_province'];
		$area_city = $request['area_city'];
		$area_street = $request['area_street'];
		$area_name = $request['area_name'];
		$address = $request['address'];
		$work_category = isset($request['work_category']) ? $request['work_category'] : '';
		$start_at = $request['start_at'];
		$end_at = $request['end_at'];
		$user = \Auth::user()->get();
				
		if(is_null($area_province) || is_null($area_city) || is_null($area_street))
		{
			return redirect()->back()->withErrors(['area' => '请选择期望工作区域']);
		}
		if(empty($address))
		{
			return redirect()->back()->withErrors(['address' => '请输入详细地址']);
		}
		if(empty($work_category))
		{
			return redirect()->back()->withErrors(['work_category' => '请选择期望工作工种']);
		}
		$work_category_id = explode(',', $work_category)[0];
		$work_category_name = explode(',', $work_category)[1];
		if(empty($start_at) || empty($end_at))
		{
			return redirect()->back()->withErrors(['start_at' => '请选择可工作时间']);
		}
		$staff = \App\Staff::create(array('user_id' => $user->id, 'work_category_id' => $work_category_id, 'work_category_name' => $work_category_name, 'province' => $area_province, 'city' => $area_city, 'street' => $area_street, 'area_name' => $area_name, 'address' => $address, 'start_at' => $start_at, 'end_at' => $end_at, 'title' => $title));
		
		$area_provinces = \App\AreaProvince::orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		$work_categories = \App\Industry::orderBy("sort")->get();
		return view('staffs.create')->with('area_provinces', $area_provinces)->with('work_categories', $work_categories)->with('success', 'true');
	}
	
	public function evaluate(Request $request)
	{
		$user = \Auth::user()->get();
		$ip = $request->ip();
		$user_id = is_null($user) ? null : $user->id;
		$star = intval($request['star']);
			
		\App\StaffEvaluate::create(['user_id' => $user_id, 'staff_id' => $request['id'], 'star' => $star, 'content' => $request['content'], 'ip' => $ip]);
		return "1";
	}
}
