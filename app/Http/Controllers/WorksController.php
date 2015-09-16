<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WorksController extends Controller {

	public function index()
	{
		$works = \App\Work::select('users.*', 'works.*')->join('users', 'users.id', '=', 'works.user_id')->paginate(4);
		return view('works.index')->with('works', $works);
	}
	
	public function show($id)
	{
		$work = \App\Work::find($id);
		return view('works.show')->with('work', $work);
	}

}
