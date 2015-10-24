<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProfileController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$admin = \Auth::admin()->get();
		return view('admin.profile.index')->with('admin', $admin);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$admin = \Auth::admin()->get();
		$admin->mobile = $request['admin']['mobile'];
		$admin->name = $request['admin']['name'];
		$admin->qq = $request['admin']['qq'];
		$admin->weixin = $request['admin']['weixin'];
		$admin->save();
		$request->session()->flash('success', '保存成功');
		return redirect("/admin/profile");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function change_pwd()
	{
		$admin = \Auth::admin()->get();
		return view('admin.profile.change_pwd')->with('admin', $admin);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function change_pwd_save(Request $request)
	{
		if($request['new_pwd'] == $request['re_new_pwd'])
		{
			$admin = \Auth::admin()->get();
			if(\Auth::admin()->validate(array(
				'email'     => $admin->email,
				'password'  => $request['old_pwd'])))
			{
				$admin->password = \Hash::make($request['new_pwd']);
				$admin->save();
				$request->session()->flash('success', '保存成功');
			}
			else
			{
				$request->session()->flash('error', '原始密码错误');
			}
		}
		else
		{
				$request->session()->flash('error', '两次密码输入不一致');
		}
		return redirect("/admin/profile/change_pwd");
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
