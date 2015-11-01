<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AreasController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$provinces = \App\AreaCity::join('area_provinces', 'area_provinces.code', '=', 'area_cities.provincecode')->select("area_provinces.name AS province_name", "area_cities.*")->get();
		return view('admin.areas.index')->with('datas', $provinces);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$provinces = \App\AreaProvince::get();
		return view('admin.areas.create')->with('provinces', $provinces);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$data = new \App\AreaCity();
		$data->provincecode = $request['provincecode'];
		$data->name = $request['name'];
		$data->code = $request['code'];
		$data->is_hot = isset($request['is_hot']) ? true : false;
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
		$provinces = \App\AreaProvince::get();
		$data = \App\AreaCity::find($id);
		return view('admin.areas.edit')->with('data', $data)->with('provinces', $provinces);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$data = \App\AreaCity::find($id);
		$data->provincecode = $request['provincecode'];
		$data->name = $request['name'];
		$data->code = $request['code'];
		$data->is_hot = isset($request['is_hot']) ? true : false;
		$data->save();
		
		$request->session()->flash('success', '保存成功');
		return redirect("/admin/areas");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		\App\AreaCity::destroy($id);
	}
	
	public function streets($city_id)
	{
		$city = \App\AreaCity::find($city_id);
		$streets = $city->streets;
		return view('admin.areas.streets')->with('datas', $streets)->with('city', $city);
	}
	
	public function street_edit($city_id, $id)
	{
		$data = \App\AreaStreet::find($id);
		return view('admin.areas.street_edit')->with('data', $data)->with('city_id', $city_id);
	}
	
	public function street_update(Request $request, $id)
	{
		$data = \App\AreaStreet::find($id);
		$data->name = $request['name'];
		$data->save();
		
		$request->session()->flash('success', '保存成功');
		return redirect("/admin/areas/".$request['city_id']."/streets");
	}

	public function street_destroy($id)
	{
		\App\AreaStreet::destroy($id);
	}

}
