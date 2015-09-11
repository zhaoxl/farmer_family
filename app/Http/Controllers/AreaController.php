<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AreaController extends Controller {

	public function getChangecity()
	{
		return view('area.changecity');
	}

}
