<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AreaController extends Controller {

	public function getChangecity()
	{
		$hot_cities = \App\AreaCity::orderBy('hot', 'DESC')->orderBy('sort', 'ASC')->take(5)->get();
		return view('area.changecity')->with('hot_cities', $hot_cities);
	}
	
	public function getSet(Request $request)
	{
		$current_city = $request['name'];
		$current_city_code = $request['code'];
			
		$cookie1 = \Cookie::forever('current_city', $current_city);
		$cookie2 = \Cookie::forever('current_city_code', $current_city_code);
		
		return redirect("/")->withCookie($cookie1)->withCookie($cookie2);
	}

}
