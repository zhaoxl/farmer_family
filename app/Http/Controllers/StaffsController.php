<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class StaffsController extends Controller {

	public function getIndex()
	{
		$staffs = \App\Staff::select('users.*', 'staff.*')->join('users', 'users.id', '=', 'staff.user_id')->paginate(4);
		return view('staffs.index')->with('staffs', $staffs);
	}
}
