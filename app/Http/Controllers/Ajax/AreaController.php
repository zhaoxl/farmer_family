<?php namespace App\Http\Controllers\Ajax;
use Illuminate\Http\Request;


class AreaController extends \App\Http\Controllers\Controller {
	
	public function getAll_area(){
		
	}
	
	public function getAll_province(){
		$area_provinces = \App\AreaProvince::orderBy('sort', 'asc')->get(array('id','code', 'name'));
		return response()->json($area_provinces);
	}

	public function getCities(Request $request){
		$area_cities = \App\AreaCity::where('provincecode', '=', $request['provincecode'])->orderBy('sort', 'asc')->get(array('id','code', 'name'));
		return response()->json($area_cities);
	}

	public function getStreets(Request $request){
		$area_streets = \App\AreaStreet::where('citycode', '=', $request['citycode'])->orderBy('sort', 'asc')->get(array('id','code', 'name'));
		return response()->json($area_streets);
	}
}
