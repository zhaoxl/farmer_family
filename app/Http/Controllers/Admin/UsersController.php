<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UsersController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$datas = \App\User::orderBy('created_at', 'desc')->paginate(11);
		return view('admin.users.index')->with('datas', $datas);
	}
	
	public function company_users()
	{
		$datas = \App\User::where('category', '=', 1)->leftJoin('companies', 'users.id', '=', 'companies.user_id')->orderBy('created_at', 'desc')->select(\DB::raw('users.*, company_name, tel, industry_name, address'))->paginate(11);
		return view('admin.users.company_users')->with('datas', $datas);
	}
	
	public function hire_users()
	{
		$datas = \App\User::where('category', '=', 2)->orderBy('created_at', 'desc')->paginate(11);
		return view('admin.users.hire_users')->with('datas', $datas);
	}
	
	public function present_users()
	{
		$datas = \App\User::where('category', '=', 0)->orderBy('created_at', 'desc')->paginate(11);
		return view('admin.users.present_users')->with('datas', $datas);
	}
	
	public function suicide_users()
	{
		$datas = \DB::table('users')->where('state', '=', 'suicide')->orderBy('created_at', 'desc')->paginate(11);
		return view('admin.users.suicide_users')->with('datas', $datas);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = \DB::table('users')->find($id);
		return view('admin.users.edit')->with('data', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
