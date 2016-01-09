<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class WorksController extends Controller {

	public function index(Request $request)
	{
		$title = $request['title'];
		$day = $request['day'];
		$category_id = $request['category_id'];
		$area_province = $request['area_province'];
		$area_city = $request['area_city'];
		$area_cities = null;
		$age_start = $request['age_start'];
		$age_end = $request['age_end'];
		$address = $request['address'];
		$gender_m = $request['gender_m'];
		$gender_f = $request['gender_f'];
		
		$works = \App\Work::select('users.*', 'works.*')->join('users', 'users.id', '=', 'works.user_id');
		if(!empty($day))
		{
			$date = date('Y-m-d');
			$date = date('Y-m-d',(strtotime ( '-'.$day.' day' , strtotime ( $date) ) ));
			$works = $works->where(\DB::raw('TO_DAYS(works.created_at)'), '>=', \DB::raw("TO_DAYS('".$date."')"));
		}
		if(!empty($category_id))
		{
			$works = $works->where('works.sub_work_category_id', '=', $category_id);
		}
		if(!empty($area_city))
		{
			$works = $works->where('works.city', $area_city);
		}
		elseif(!empty($area_province))
		{
			$works = $works->where('works.province', $area_province);
		}
		if(!empty($title))
		{
			$works = $works->where("works.title", 'LIKE', '%'.$title.'%');
		}
		if(!empty($age_start))
		{
			$date = date('Y');
			$date = date('Y',(strtotime ( '-'.$age_start.' year' , strtotime ( $date) ) ));
			$works = $works->where(\DB::raw('YEAR(users.birthday)'), '<=', $date);
		}
		if(!empty($age_end))
		{
			$date = date('Y');
			$date = date('Y',(strtotime ( '-'.$age_end.' year' , strtotime ( $date) ) ));
			$works = $works->where(\DB::raw('YEAR(users.birthday)'), '>=', $date);
		}
		if(!empty($address))
		{
			$works = $works->where("works.address", 'LIKE', '%'.$address.'%');
		}
		if(empty($gender_m) || empty($gender_f))
		{
			if(!empty($gender_m))
			{
				$works = $works->where('users.gender', '=', 'male');
			}
			if(!empty($gender_f))
			{
				$works = $works->where('users.gender', '=', 'fmale');
			}
		}
		
		if(!empty($area_province))
		{
			$area_cities = \App\AreaCity::where('provincecode', '=', $area_province)->orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		}

		$works = $works->paginate(4);
		$work_categories = \App\WorkCategory::orderBy('sort', 'asc')->get();
		$area_provinces = \App\AreaProvince::orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		
		return view('works.index')->with('works', $works)->with('work_categories', $work_categories)->with('area_provinces', $area_provinces)->with('area_cities', $area_cities);
	}
	
	public function show($id)
	{
		$work = \App\Work::find($id);
		$user = $work->user;
		
		return view('works.show')->with('work', $work)->with('user', $user);
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
		$industries = \App\Industry::orderBy("sort")->get();
		$work_categories = \App\WorkCategory::orderBy("sort")->get();
		return view('works.create')->with('area_provinces', $area_provinces)->with('industries', $industries)->with('work_categories', $work_categories)->with('mobile', $mobile)->with('contacts', $contacts);
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
		$price = $request['price'];
		$content = $request['content'];
		$people_number = isset($request['people_number']) ? $request['people_number'] : '';
		$industry_id = isset($request['industry']) ? $request['industry'] : '';
		$work_category_id = isset($request['work_category']) ? $request['work_category'] : '';
		$start_at = isset($request['start_at']) ? $request['start_at'] : '';
		$end_at = isset($request['end_at']) ? $request['end_at'] : '';
		$contacts = $request['contacts'];
		$mobile = $request['mobile'];
		$user = \Auth::user()->get();
				
		if(empty($title))
		{
			return redirect()->back()->withErrors(['title' => '请输入标题']);
		}
		if(is_null($area_province) || is_null($area_city) || is_null($area_street))
		{
			return redirect()->back()->withErrors(['area' => '请选择工作区域']);
		}
		if(empty($address))
		{
			return redirect()->back()->withErrors(['address' => '请输入详细地址']);
		}
		if(empty($industry_id))
		{
			return redirect()->back()->withErrors(['industry' => '请选择行业']);
		}
		if(empty($work_category_id))
		{
			return redirect()->back()->withErrors(['work_category' => '请选择工作工种']);
		}
		if(empty($start_at) || empty($end_at))
		{
			if(empty($request['date_long']))
			{
				return redirect()->back()->withErrors(['start_at' => '请选择服务时间']);
			}
		}
		if(empty($price))
		{
			if(empty($request['price_negotiable']))
			{
				return redirect()->back()->withErrors(['start_at' => '请输入服务报酬']);
			}
		}
		if(empty($people_number))
		{
			return redirect()->back()->withErrors(['people_number' => '请输入服务人数']);
		}
		$work = new \App\Work(array('user_id' => $user->id, 'work_category_id' => $work_category_id, 'industry_id' => $industry_id, 'province' => $area_province, 'city' => $area_city, 'street' => $area_street, 'area_name' => $area_name, 'address' => $address, 'title' => $title, 'price' => $price, 'content' => $content, 'contacts' => $contacts, 'mobile' => $mobile));
		if(!empty($start_at))
		{
			$work->start_at = $start_at;
		}
		if(!empty($end_at))
		{
			$work->end_at = $end_at;
		}
		if(!empty($people_number))
		{
			$work->people_number = $people_number;
		}
		$work->save();
		
		$industries = \App\Industry::orderBy("sort")->get();
		$area_provinces = \App\AreaProvince::orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		$work_categories = \App\Industry::orderBy("sort")->get();
		return view('works.create')->with('area_provinces', $area_provinces)->with('industries', $industries)->with('work_categories', $work_categories)->with('success', 'true')->with('mobile', $mobile)->with('contacts', $contacts);
	}
	
	public function evaluate(Request $request)
	{
		$user = \Auth::user()->get();
		$ip = $request->ip();
		$user_id = is_null($user) ? null : $user->id;
		$star = intval($request['star']);
			
		\App\WorkEvaluate::create(['user_id' => $user_id, 'work_id' => $request['id'], 'star' => $star, 'content' => $request['content'], 'ip' => $ip]);
		return "1";
	}
	
	public function edit($id)
	{
		$user = \Auth::user()->get();
		$work = \App\Work::where('user_id', '=', $user->id)->where('id', '=', $id)->first();
		$area_provinces = \App\AreaProvince::orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		$work_categories = \App\WorkCategory::orderBy("sort")->get();
		$industries = \App\Industry::orderBy("sort")->get();
		$area_cities = null;
		$area_streets = null;
		if(!empty($work->province))
		{
			$area_cities = \App\AreaCity::where('provincecode', '=', $work->province)->orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		}
		if(!empty($work->city))
		{
			$area_streets = \App\AreaStreet::where('citycode', '=', $work->city)->orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		}
		
		return view('works.edit')->with('work', $work)->with('area_provinces', $area_provinces)->with('work_categories', $work_categories)->with('area_cities', $area_cities)->with('area_streets', $area_streets)->with('industries', $industries);
	}
	
	public function update(Request $request, $id)
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
		$price = $request['price'];
		$content = $request['content'];
		$people_number = isset($request['people_number']) ? $request['people_number'] : '';
		$industry_id = isset($request['industry']) ? $request['industry'] : '';
		$work_category_id = isset($request['work_category']) ? $request['work_category'] : '';
		$start_at = isset($request['start_at']) ? $request['start_at'] : '';
		$end_at = isset($request['end_at']) ? $request['end_at'] : '';
		$contacts = $request['contacts'];
		$mobile = $request['mobile'];
		$user = \Auth::user()->get();
				
		if(empty($title))
		{
			return redirect()->back()->withErrors(['title' => '请输入标题']);
		}
		if(is_null($area_province) || is_null($area_city) || is_null($area_street))
		{
			return redirect()->back()->withErrors(['area' => '请选择工作区域']);
		}
		if(empty($address))
		{
			return redirect()->back()->withErrors(['address' => '请输入详细地址']);
		}
		if(empty($industry_id))
		{
			return redirect()->back()->withErrors(['industry' => '请选择行业']);
		}
		if(empty($work_category_id))
		{
			return redirect()->back()->withErrors(['work_category' => '请选择工作工种']);
		}
		if(empty($start_at) || empty($end_at))
		{
			if(empty($request['date_long']))
			{
				return redirect()->back()->withErrors(['start_at' => '请选择服务时间']);
			}
		}
		if(empty($price))
		{
			if(empty($request['price_negotiable']))
			{
				return redirect()->back()->withErrors(['start_at' => '请输入服务报酬']);
			}
		}
		if(empty($people_number))
		{
			return redirect()->back()->withErrors(['people_number' => '请输入服务人数']);
		}

		$work = \App\Work::where('user_id', '=', $user->id)->where('id', '=', $id)->first();
		$work->work_category_id = $work_category_id;
		$work->industry_id = $industry_id;
		$work->province = $area_province;
		$work->city = $area_city;
		$work->street = $area_street;
		$work->area_name = $area_name;
		$work->address = $address;
		$work->title = $title;
		$work->price = $price;
		$work->content = $content;
		$work->contacts = $contacts;
		$work->mobile = $mobile;
		if(!empty($start_at))
		{
			$work->start_at = $start_at;
		}
		if(!empty($end_at))
		{
			$work->end_at = $end_at;
		}
		if(!empty($people_number))
		{
			$work->people_number = $people_number;
		}
		$work->save();
		
		return redirect('/my/sent-works');
	}
}
