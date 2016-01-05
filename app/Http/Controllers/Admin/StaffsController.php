<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class StaffsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$datas = \App\Staff::orderBy('created_at', 'desc');
		if(!is_null($request['title'])){
			$datas = $datas->where("title", 'LIKE', '%'.$request['title'].'%');
		}
		if(!is_null($request['excel']))
		{			
			$index = 0;
			\Excel::create('Excel', function($excel) use($datas, $index){
		    $excel->sheet('sheet', function($sheet) use($datas, $index) {
					$index += 1;
					$sheet->row($index, array('发布人', '标题', '期望工作区域', '工种', '可工作时间', '发布时间', '置顶'));
					foreach($datas->get() as $data){
						$index += 1;
						$user_name = is_null($data->user) ? '' : $data->user->name;
						$title = $data->title;
						$area_name = $data->area_name;
						$category_name = is_null($data->user) ? '' : $data->user->workCategoryNames();
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
						$created_at = $data->created_at;
						$is_top = $data->is_top == true ? '是' : '否';
						
          	$sheet->row($index, array($user_name, $title, $area_name, $category_name, $date, $created_at, $is_top));
          }
		    });
			})->export('xls');
		}
		else
		{
			return view('admin.staffs.index')->with('datas', $datas->paginate(11));
		}
	}
	
	public function refresh(Request $request)
	{
		$id = $request['id'];
		$staff = \App\Staff::find($id);
		$staff->touch();
		return redirect()->back();
	}
	
	public function top(Request $request)
	{
		$id = $request['id'];
		$staff = \App\Staff::find($id);
		$staff->is_top =! $staff->is_top;
		$staff->save();
		return redirect()->back();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$present_users = \App\User::where('category', '=', 0)->orderBy('created_at', 'desc')->get();
		
		$data = new \App\Staff;
		$work_categories = \App\WorkCategory::orderBy('sort', 'asc')->get();
		$area_provinces = \App\AreaProvince::orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		$area_cities = null;
		$area_streets = null;
			
		return view('admin.staffs.create')->with('data', $data)->with('present_users', $present_users)->with('area_provinces', $area_provinces)->with('area_cities', $area_cities)->with('area_streets', $area_streets)->with('work_categories', $work_categories);
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
		$work_category = isset($request['work_category']) ? $request['work_category'] : null;
		$start_at = $request['start_at'];
		$end_at = $request['end_at'];
		$user_id = $request['user_id'];
		$contacts = $request['contacts'];
		$mobile = $request['mobile'];
		$content = $request['content'];
				
		// if(is_null($area_province) || is_null($area_city) || is_null($area_street))
// 		{
// 			$request->session()->flash('error', '请选择期望工作区域');
// 			return redirect()->back();
// 		}
// 		if(empty($address))
// 		{
// 			$request->session()->flash('error', '请输入详细地址');
// 			return redirect()->back();
// 		}
		if(empty($work_category))
		{
			$request->session()->flash('error', '请选择工种');
			return redirect()->back();
		}
// 		if(empty($start_at) || empty($end_at))
// 		{
// 			$request->session()->flash('error', '请选择可工作时间');
// 			return redirect()->back();
// 		}
	if(empty($start_at))
	{
		$start_at = null;	
	}
	if(empty($end_at))
	{
		$end_at = null;	
	}
		
		$staff = \App\Staff::create(array('user_id' => $user_id, 'work_category_id' => $work_category, 'province' => $area_province, 'city' => $area_city, 'street' => $area_street, 'area_name' => $area_name, 'address' => $address, 'start_at' => $start_at, 'end_at' => $end_at, 'title' => $title, 'contacts' => $contacts, 'mobile' => $mobile, 'content' => $content));
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
		$present_users = \App\User::where('category', '=', 0)->orderBy('created_at', 'desc')->get();
		
		$data = \App\Staff::find($id);
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
			
		return view('admin.staffs.edit')->with('data', $data)->with('present_users', $present_users)->with('area_provinces', $area_provinces)->with('area_cities', $area_cities)->with('area_streets', $area_streets)->with('work_categories', $work_categories);
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
		$work_category = isset($request['work_category']) ? $request['work_category'] : '';
		$start_at = $request['start_at'];
		$end_at = $request['end_at'];
		$user_id = $request['user_id'];
		$contacts = $request['contacts'];
		$mobile = $request['mobile'];
		$content = $request['content'];
				
		// if(is_null($area_province) || is_null($area_city) || is_null($area_street))
// 		{
// 			$request->session()->flash('error', '请选择期望工作区域');
// 			return redirect()->back();
// 		}
// 		if(empty($address))
// 		{
// 			$request->session()->flash('error', '请输入详细地址');
// 			return redirect()->back();
// 		}
		if(empty($work_category))
		{
			$request->session()->flash('error', '请选择工种');
			return redirect()->back();
		}
// 		if(empty($start_at) || empty($end_at))
// 		{
// 			$request->session()->flash('error', '请选择可工作时间');
// 			return redirect()->back();
// 		}
		if(empty($start_at))
		{
			$start_at = null;	
		}
		if(empty($end_at))
		{
			$end_at = null;	
		}
		
		$staff = \App\Staff::find($id);
		$staff->user_id = $user_id;
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
		$staff->content = $content;
		$staff->save();
		
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
		\App\Staff::destroy($id);
	}

}
