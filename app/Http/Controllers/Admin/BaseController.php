<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class BaseController extends Controller {

	public function __construct()
	  {
		$this->beforeFilter(function()
	    {
			if(\Auth::admin()->guest()){
				return redirect("/admin/sessions/create");
			}
	    });
	  }
}
