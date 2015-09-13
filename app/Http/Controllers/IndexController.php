<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller {

	public function index()
	{
		$url = 'http://ip.taobao.com/service/getIpInfo.php?ip='.'123.123.123.123';
		$result = file_get_contents($url);
		$city_id = json_decode($result, true)['data']['city_id'];
		$city_name = \App\AreaCity::where('code', '=', $city_id)->first(array('name'))['name'];
		$staffs = \App\Staff::orderBy('created_at', 'desc')->take(5)->get();
		
		return view('index')->with('city_id', $city_id)->with('city_name', $city_name)->with('staffs', $staffs);
	}

}
