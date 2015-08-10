<?php namespace App\Services;


class IpAddress{

	public function get_city_id($ip){
		$url = 'http://ip.taobao.com/service/getIpInfo.php?ip='.$ip;
		$html = file_get_contents($url);
		echo $html;
	}
}
