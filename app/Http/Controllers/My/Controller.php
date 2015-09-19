<?php namespace App\Http\Controllers\My\IndexController;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class IndexController extends Controller {

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
