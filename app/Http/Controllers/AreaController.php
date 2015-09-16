<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AreaController extends Controller {

	public function getChangecity()
	{
		return view('area.changecity');
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
