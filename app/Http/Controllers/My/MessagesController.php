<?php namespace App\Http\Controllers\My;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MessagesController extends Controller {

	public function index()
	{
		$user = \Auth::user()->get();
		$messages = \App\Message::where("to_user_id", "=", $user->id)->join('users', 'users.id', '=', 'messages.from_user_id')->groupBy('from_user_id')->get(array('messages.*','users.name', \DB::raw('count(messages.from_user_id) as count')));
		return view('my.messages.index')->with('messages', $messages);
	}
	
	public function outbox()
	{
		$user = \Auth::user()->get();
		$messages = \App\Message::where("from_user_id", "=", $user->id)->join('users', 'users.id', '=', 'messages.to_user_id')->groupBy('to_user_id')->get(array('messages.*','users.name', \DB::raw('count(messages.to_user_id) as count')));
		return view('my.messages.outbox')->with('messages', $messages);
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
		$message = \App\Message::find($id);
		return view('my.messages.show')->with('message', $message);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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
