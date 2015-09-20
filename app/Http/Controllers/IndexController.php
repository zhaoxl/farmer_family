<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller {

	public function index()
	{
		$staffs = \App\Staff::orderBy('created_at', 'desc')->take(5)->get();
		$works = \App\Work::orderBy('created_at', 'desc')->take(5)->get();
		
		$current_city = \Cookie::get('current_city');
		$current_city_code = \Cookie::get('current_city_code');

		if(is_null($current_city))
		{
			try{
				$get_current_url = 'http://ip.taobao.com/service/getIpInfo.php?ip='.$_SERVER['REMOTE_ADDR'];;
				$result = file_get_contents($get_current_url);
				$country = json_decode($result, true)['data']['country'];
				$current_city = json_decode($result, true)['data']['city'];
				$current_city_code = json_decode($result, true)['data']['city_code'];
				if($country == '未分配或者内网IP')
				{
					$current_city = "北京市";
					$current_city_code = "110000";
				}
			}
			catch(\Exception $ex){
				$current_city = "北京市";
				$current_city_code = "110000";
			}
		}
		$cookie1 = \Cookie::forever('current_city', $current_city);
		$cookie2 = \Cookie::forever('current_city_code', $current_city_code);
		$view = view('index')->with('staffs', $staffs)->with('works', $works)->with('city_name', $current_city);
		
		$response = new \Illuminate\Http\Response($view);
		$response->withCookie($cookie1)->withCookie($cookie2);
		
		return $response;
	}

}
