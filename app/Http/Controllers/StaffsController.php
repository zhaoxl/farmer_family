<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class StaffsController extends Controller {

	public function index()
	{
		$staffs = \App\Staff::select('users.*', 'staff.*')->join('users', 'users.id', '=', 'staff.user_id')->paginate(4);
		return view('staffs.index')->with('staffs', $staffs);
	}
	
	public function show($id)
	{
		$staff = \App\Staff::find($id);
		return view('staffs.show')->with('staff', $staff);
	}
	
	public function create()
	{
		$area_provinces = \App\AreaProvince::orderBy('sort', 'asc')->get(array('id','code', 'name', 'id'));
		$work_categories = \App\Industry::orderBy("sort")->get();
		return view('staffs.create')->with('area_provinces', $area_provinces)->with('work_categories', $work_categories);
	}
}
