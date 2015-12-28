<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class IndustriesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$datas = \App\Industry::get();
		return view('admin.industries.index')->with('datas', $datas);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data = new \App\Industry();
		$data->sort = \App\Industry::count()+1;
			
		return view('admin.industries.create')->with('data', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$data = new \App\Industry();
		$data->industry_name = $request['industry_name'];
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
		$data = \App\Industry::find($id);
		return view('admin.industries.edit')->with('data', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$data = \App\Industry::find($id);
		$data->industry_name = $request['industry_name'];
		$data->full_name = $request['full_name'];
		$data->sort = intval($request['sort']);
		$data->save();
		
		$request->session()->flash('success', '保存成功');
		return redirect("/admin/industries");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		\App\Industry::destroy($id);
	}
	
}
