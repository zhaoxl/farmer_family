<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WorksController extends Controller {

	public function getFindList()
	{
		return view('works.find_list');
	}

}
