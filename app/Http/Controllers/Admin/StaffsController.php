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
	public function index()
	{
		$datas = \App\Staff::orderBy('created_at', 'desc')->paginate(11);
		return view('admin.staffs.index')->with('datas', $datas);
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
		$present_users = \App\User::where('category', '!=', 0)->orderBy('created_at', 'desc')->paginate(11);
		
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
		$work_category = isset($request['work_category']) ? $request['work_category'] : '';
		$start_at = $request['start_at'];
		$end_at = $request['end_at'];
		$user_id = $request['user_id'];
				
		if(is_null($area_province) || is_null($area_city) || is_null($area_street))
		{
			$request->session()->flash('error', '请选择期望工作区域');
			return redirect()->back();
		}
		if(empty($address))
		{
			$request->session()->flash('error', '请输入详细地址');
			return redirect()->back();
		}
		if(empty($work_category))
		{
			$request->session()->flash('error', '请选择期望工作工种');
			return redirect()->back();
		}
		$work_category_id = explode(',', $work_category)[0];
		$work_category_name = explode(',', $work_category)[1];
		if(empty($start_at) || empty($end_at))
		{
			$request->session()->flash('error', '请选择可工作时间');
			return redirect()->back();
		}
		$staff = \App\Staff::create(array('user_id' => $user_id, 'work_category_id' => $work_category_id, 'work_category_name' => $work_category_name, 'province' => $area_province, 'city' => $area_city, 'street' => $area_street, 'area_name' => $area_name, 'address' => $address, 'start_at' => $start_at, 'end_at' => $end_at, 'title' => $title));
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
