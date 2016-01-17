<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class StaffsController extends Controller {
	
	public function index(Request $request)
	{
		$title = $request['title'];
		$day = $request['day'];
		$area_province = $request['area_province'];
		$area_city = $request['area_city'];
		$area_cities = null;
		$address = $request['address'];
		$category_id = $request['category_id'];
		$gender_m = $request['gender_m'];
		$gender_f = $request['gender_f'];
		$age_start = $request['age_start'];
		$age_end = $request['age_end'];
		$work_category = $request['work_category'];

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
		if(empty($gender_m) || empty($gender_f))
		{
			if(!empty($gender_m))
			{
				$staffs = $staffs->where('users.gender', '=', '男');
			}
			if(!empty($gender_f))
			{
				$staffs = $staffs->where('users.gender', '=', '女');
			}
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
		if(!empty($address))
		{
			$staffs = $staffs->where("staffs.address", 'LIKE', '%'.$address.'%');
		}
		if(!empty($title))
		{
			$staffs = $staffs->where("staffs.title", 'LIKE', '%'.$title.'%');
		}
		if(!empty($work_category))
		{
			$staffs = $staffs->join('work_categories', 'work_categories.id', '=', 'staffs.work_category_id')->where("work_categories.full_name", 'LIKE', '%'.$work_category.'%');
		}
		
		$staffs = $staffs->paginate(4);
		$work_categories = \App\WorkCategory::orderBy('sort', 'asc')->get();
		$area_provinces = \App\AreaProvince::orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		
		return view('staffs.index')->with('staffs', $staffs)->with('work_categories', $work_categories)->with('area_provinces', $area_provinces)->with('area_cities', $area_cities);
	}
	
	public function show($id)
	{
		$staff = \App\Staff::find($id);
		$user = $staff->user;
		
		return view('staffs.show')->with('staff', $staff)->with('user', $user);
	}
	
	public function create()
	{
		$user = \Auth::user();
		if($user->guest()){
			return redirect("/");
		}
		$user = $user->get();
		$mobile = $user->mobile;
		$contacts = $user->name;
		
		$area_provinces = \App\AreaProvince::orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		$work_categories = \App\WorkCategory::orderBy('sort', 'asc')->get();
		return view('staffs.create')->with('area_provinces', $area_provinces)->with('work_categories', $work_categories)->with('mobile', $mobile)->with('contacts', $contacts);
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
		$contacts = $request['contacts'];
		$mobile = $request['mobile'];
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
		if(empty($start_at) || empty($end_at))
		{
			return redirect()->back()->withErrors(['start_at' => '请选择可工作时间']);
		}
		$staff = \App\Staff::create(array('user_id' => $user->id, 'work_category_id' => $work_category, 'province' => $area_province, 'city' => $area_city, 'street' => $area_street, 'area_name' => $area_name, 'address' => $address, 'start_at' => $start_at, 'end_at' => $end_at, 'title' => $title, 'contacts' => $contacts, 'mobile' => $mobile));
		
		$area_provinces = \App\AreaProvince::orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		$work_categories = \App\WorkCategory::orderBy("sort")->get();
		return view('staffs.create')->with('area_provinces', $area_provinces)->with('work_categories', $work_categories)->with('success', 'true')->with('work_categories', $work_categories)->with('mobile', $mobile)->with('contacts', $contacts);
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
	
	public function edit($id)
	{
		$user = \Auth::user()->get();
		$staff = \App\Staff::where('user_id', '=', $user->id)->where('id', '=', $id)->first();
		$area_provinces = \App\AreaProvince::orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		$work_categories = \App\WorkCategory::orderBy("sort")->get();
		$area_cities = null;
		$area_streets = null;
		if(!empty($staff->province))
		{
			$area_cities = \App\AreaCity::where('provincecode', '=', $staff->province)->orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		}
		if(!empty($staff->city))
		{
			$area_streets = \App\AreaStreet::where('citycode', '=', $staff->city)->orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		}
		
		return view('staffs.edit')->with('staff', $staff)->with('area_provinces', $area_provinces)->with('work_categories', $work_categories)->with('area_cities', $area_cities)->with('area_streets', $area_streets);
	}
	
	public function update(Request $request, $id)
	{
		if(\Auth::user()->guest()){
			return redirect("/");
		}
		$user = \Auth::user()->get();
		$staff = \App\Staff::where('user_id', '=', $user->id)->where('id', '=', $id)->first();
		
		$title = $request['title'];
		$area_province = $request['area_province'];
		$area_city = $request['area_city'];
		$area_street = $request['area_street'];
		$area_name = $request['area_name'];
		$address = $request['address'];
		$work_category = isset($request['work_category']) ? $request['work_category'] : '';
		$start_at = $request['start_at'];
		$end_at = $request['end_at'];
		$contacts = $request['contacts'];
		$mobile = $request['mobile'];
				
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
		if(empty($start_at) || empty($end_at))
		{
			return redirect()->back()->withErrors(['start_at' => '请选择可工作时间']);
		}
		$staff->title = $title;
		$staff->province = $area_province;
		$staff->city = $area_city;
		$staff->street = $area_street;
		$staff->area_name = $area_name;
		$staff->address = $address;
		$staff->work_category_id = $work_category;
		$staff->start_at = $start_at;
		$staff->end_at = $end_at;
		$staff->contacts = $contacts;
		$staff->mobile = $mobile;
		$staff->save();

		return redirect('/staffs/'.$staff->id);
	}
}
