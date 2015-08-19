<?php namespace App\Http\Controllers\AdminProcess;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminMessageController extends Controller {
	
	
	public function create(Request $request)
	{
		return view('administrator.message.create');
	}

}
