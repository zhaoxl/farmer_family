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
	public function index()
	{
		$datas = \App\Work::orderBy(\DB::raw('updated_at, is_top'), 'desc')->paginate(11);
		return view('admin.works.index')->with('datas', $datas);
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
		$present_users = \App\User::where('category', '=', 0)->orderBy('created_at', 'desc')->paginate(11);
		
		$data = new \App\Staff;
		$industries = \App\Industry::orderBy("sort")->get();
		$work_categories = \App\WorkCategory::orderBy('sort', 'asc')->get();
		$area_provinces = \App\AreaProvince::orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		$area_cities = null;
		$area_streets = null;
			
		return view('admin.staffs.create')->with('data', $data)->with('present_users', $present_users)->with('area_provinces', $area_provinces)->with('area_cities', $area_cities)->with('area_streets', $area_streets)->with('work_categories', $work_categories)->with('industries', $industries);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
