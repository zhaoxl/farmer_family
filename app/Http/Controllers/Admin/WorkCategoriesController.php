<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class WorkCategoriesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$datas = \App\WorkCategory::get();
		return view('admin.work_categories.index')->with('datas', $datas);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data = new \App\WorkCategory();
		$data->sort = \App\WorkCategory::count()+1;
			
		return view('admin.work_categories.create')->with('data', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$data = new \App\WorkCategory();
		$data->name = $request['name'];
		$data->full_name = $request['full_name'];
		$data->sort = intval($request['sort']);
		$data->save();
		
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
		$data = \App\WorkCategory::find($id);
		return view('admin.work_categories.edit')->with('data', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$data = \App\WorkCategory::find($id);
		$data->name = $request['name'];
		$data->full_name = $request['full_name'];
		$data->sort = intval($request['sort']);
		$data->save();
		
		$request->session()->flash('success', '保存成功');
		return redirect("/admin/work_categories");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		\App\WorkCategory::destroy($id);
	}
	
}
