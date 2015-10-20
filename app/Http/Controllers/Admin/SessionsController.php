<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SessionsController extends Controller {
	
	public function getCreate()
	{
		return '123';
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function getStore()
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDestroy($id)
	{
		//
	}

}
