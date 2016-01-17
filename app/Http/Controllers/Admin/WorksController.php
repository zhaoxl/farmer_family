<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class WorksController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$datas = \App\Work::orderBy(\DB::raw('updated_at, is_top'), 'desc');
		if(!is_null($request['title'])){
			$datas = $datas->where("title", 'LIKE', '%'.$request['title'].'%');
		}
		if(!is_null($request['user_id'])){
			$datas = $datas->where("user_id", '=', $request['user_id']);
		}
		if(!is_null($request['mobile'])){
			$datas = $datas->where("mobile", 'LIKE', '%'.$request['mobile'].'%');
		}
		
		if(!is_null($request['excel']))
		{			
			$index = 0;
			\Excel::create('Excel', function($excel) use($datas, $index){
		    $excel->sheet('sheet', function($sheet) use($datas, $index) {
					$index += 1;
					$sheet->row($index, array('发布人','标题','行业','工种','区域','报酬','服务时间','所需人数','发布时间','置顶'));
					foreach($datas->get() as $data){
						$index += 1;
						$user_name = is_null($data->user) ? '' : $data->user->name;
						$title = $data->title;
						$industry_name = $data->industry_name;
						$category_name = $data->work_category_name;
						$area_name = $data->area_name;
						$price = $data->price;
						$date = null;
						if(isset($data->start_at) || isset($data->end_at))
						{
							$date = date('Y-m-d', strtotime($data->start_at));
							$date .= " - ";
							$date .= date('Y-m-d', strtotime($data->end_at));
						}
						else
						{
							$date = "长期";
						}
						$people_number = $data->people_number;
						$created_at = $data->created_at;
						$is_top = $data->is_top == true ? '是' : '否';
						
          	$sheet->row($index, array($user_name, $title, $industry_name, $category_name, $area_name, $price, $date, $people_number, $created_at, $is_top));
          }
		    });
			})->export('xls');
		}
		else
		{
			$datas = $datas->paginate(11);
			return view('admin.works.index')->with('datas', $datas);	
		}
	}
	
	public function refresh(Request $request)
	{
		$id = $request['id'];
		$work = \App\Work::find($id);
		$work->touch();
		return redirect()->back();
	}
	
	public function top(Request $request)
	{
		$id = $request['id'];
		$work = \App\Work::find($id);
		$work->is_top =! $work->is_top;
		$work->save();
		return redirect()->back();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$present_users = \App\User::where('category', '!=', 0)->orderBy('created_at', 'desc')->get();
		
		$data = new \App\Work;
		$industries = \App\Industry::orderBy("sort", 'asc')->get();
		$work_categories = \App\WorkCategory::orderBy('sort', 'asc')->get();
		$area_provinces = \App\AreaProvince::orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		$area_cities = null;
		$area_streets = null;
			
		return view('admin.works.create')->with('data', $data)->with('present_users', $present_users)->with('area_provinces', $area_provinces)->with('area_cities', $area_cities)->with('area_streets', $area_streets)->with('work_categories', $work_categories)->with('industries', $industries);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$title = $request['title'];
		$area_province = $request['area_province'];
		$area_city = $request['area_city'];
		$area_street = $request['area_street'];
		$area_name = $request['area_name'];
		$address = $request['address'];
		$price = $request['price'];
		$content = $request['content'];
		$people_number = isset($request['people_number']) ? $request['people_number'] : '';
		$industry = isset($request['industry']) ? $request['industry'] : '';
		$work_category = isset($request['work_category']) ? $request['work_category'] : '';
		$start_at = isset($request['start_at']) ? $request['start_at'] : '';
		$end_at = isset($request['end_at']) ? $request['end_at'] : '';
		$gender = $request['gender'];
		$age_start = $request['age_start'];
		$age_end = $request['age_end'];
		$work_experience = $request['work_experience'];
		$user_id = $request['user_id'];
				
		// if(empty($title))
	// 	{
	// 		$request->session()->flash('error', '请输入标题');
	// 		return redirect()->back();
	// 	}
	// 	if(is_null($area_province) || is_null($area_city) || is_null($area_street))
	// 	{
	// 		$request->session()->flash('error', '请选择工作区域');
	// 		return redirect()->back();
	// 	}
	// 	if(empty($address))
	// 	{
	// 		$request->session()->flash('error', '请输入详细地址');
	// 		return redirect()->back();
	// 	}
	// 	if(empty($industry))
	// 	{
	// 		$request->session()->flash('error', '请选择行业');
	// 		return redirect()->back();
	// 	}
	// 	if(empty($work_category))
	// 	{
	// 		$request->session()->flash('error', '请选择工作工种');
	// 		return redirect()->back();
	// 	}
	// 	if(empty($start_at) || empty($end_at))
	// 	{
	// 		if(empty($request['date_long']))
	// 		{
	// 			$request->session()->flash('error', '请选择服务时间');
	// 			return redirect()->back();
	// 		}
	// 	}
	// 	if(empty($price))
	// 	{
	// 		if(empty($request['price_negotiable']))
	// 		{
	// 			$request->session()->flash('error', '请输入服务报酬');
	// 			return redirect()->back();
	// 		}
	// 	}
	// 	if(empty($people_number))
	// 	{
	// 		$request->session()->flash('error', '请输入服务人数');
	// 		return redirect()->back();
	// 	}
		
		$work = new \App\Work(array('user_id' => $user_id, 'work_category_id' => $work_category, 'industry_id' => $industry, 'province' => $area_province, 'city' => $area_city, 'street' => $area_street, 'area_name' => $area_name, 'address' => $address, 'title' => $title, 'price' => $price, 'content' => $content, 'gender' => $gender, 'age_start' => $age_start, 'age_end' => $age_end, 'work_experience' => $work_experience));
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
		
		$request->session()->flash('success', '添加成功');
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
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$present_users = \App\User::where('category', '!=', 0)->orderBy('created_at', 'desc')->get();
		
		$data = \App\Work::find($id);
		$industries = \App\Industry::orderBy("sort", 'asc')->get();
		$work_categories = \App\WorkCategory::orderBy('sort', 'asc')->get();
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
			
		return view('admin.works.edit')->with('data', $data)->with('present_users', $present_users)->with('area_provinces', $area_provinces)->with('area_cities', $area_cities)->with('area_streets', $area_streets)->with('work_categories', $work_categories)->with('industries', $industries);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$title = $request['title'];
		$area_province = $request['area_province'];
		$area_city = $request['area_city'];
		$area_street = $request['area_street'];
		$area_name = $request['area_name'];
		$address = $request['address'];
		$price = $request['price'];
		$content = $request['content'];
		$people_number = isset($request['people_number']) ? $request['people_number'] : '';
		$industry = isset($request['industry']) ? $request['industry'] : '';
		$work_category = isset($request['work_category']) ? $request['work_category'] : '';
		$start_at = isset($request['start_at']) ? $request['start_at'] : '';
		$end_at = isset($request['end_at']) ? $request['end_at'] : '';
		$gender = $request['gender'];
		$age_start = $request['age_start'];
		$age_end = $request['age_end'];
		$work_experience = $request['work_experience'];
		$user_id = $request['user_id'];
				
		// if(empty($title))
// 		{
// 			$request->session()->flash('error', '请输入标题');
// 			return redirect()->back();
// 		}
// 		if(is_null($area_province) || is_null($area_city) || is_null($area_street))
// 		{
// 			$request->session()->flash('error', '请选择工作区域');
// 			return redirect()->back();
// 		}
// 		if(empty($address))
// 		{
// 			$request->session()->flash('error', '请输入详细地址');
// 			return redirect()->back();
// 		}
// 		if(empty($industry))
// 		{
// 			$request->session()->flash('error', '请选择行业');
// 			return redirect()->back();
// 		}
// 		if(empty($work_category))
// 		{
// 			$request->session()->flash('error', '请选择工作工种');
// 			return redirect()->back();
// 		}
// 		if(empty($start_at) || empty($end_at))
// 		{
// 			if(empty($request['date_long']))
// 			{
// 				$request->session()->flash('error', '请选择服务时间');
// 				return redirect()->back();
// 			}
// 		}
// 		if(empty($price))
// 		{
// 			if(empty($request['price_negotiable']))
// 			{
// 				$request->session()->flash('error', '请输入服务报酬');
// 				return redirect()->back();
// 			}
// 		}
// 		if(empty($people_number))
// 		{
// 			$request->session()->flash('error', '请输入服务人数');
// 			return redirect()->back();
// 		}

		$work = \App\Work::find($id);
		$work->user_id = $user_id;
		$work->work_category_id = $work_category;
		$work->industry_id = $industry;
		$work->province = $area_province;
		$work->city = $area_city;
		$work->street = $area_street;
		$work->area_name = $area_name;
		$work->address = $address;
		$work->title = $title;
		$work->price = $price;
		$work->content = $content;
				
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
		
		$work->gender = $gender;
		$work->age_start = $age_start;
		$work->age_end = $age_end;
		$work->work_experience = $work_experience;
		
		$work->save();
		
		$request->session()->flash('success', '保存成功');
		return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		\App\Work::destroy($id);
	}

}
