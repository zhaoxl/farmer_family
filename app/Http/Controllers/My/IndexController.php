<?php namespace App\Http\Controllers\My;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class IndexController extends Controller {

	public function getIndex()
	{
		return view('my.index');
	}
	
	public function getAlreadySends()
	{
		return view('my.already_sends');
	}
	
	public function getMessages()
	{
		return view('my.messages');
	}
	
	public function getChangePwd()
	{
		return view('my.change_pwd');
	}
	
	public function getSuicide()
	{
		return view('my.suicide');
	}
}
