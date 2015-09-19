<?php namespace App\Http\Controllers\My;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class BaseController extends Controller {

	public function __construct()
  {
		$this->beforeFilter(function()
    {
			if(\Auth::user()->guest()){
				return redirect("/");
			}
    });
  }
	
}
