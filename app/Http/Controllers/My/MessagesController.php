<?php namespace App\Http\Controllers\My;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MessagesController extends BaseController {

	public function index()
	{
		$user = \Auth::user()->get();
		$messages = \App\Message::where("to_user_id", "=", $user->id)->leftJoin('users', 'users.id', '=', 'messages.from_user_id')->orderBy('created_at', 'DESC')->orderBy('readed', 'ASC')->get(array('messages.*','users.name'));
		return view('my.messages.index')->with('messages', $messages);
	}
	
	public function outbox()
	{
		$user = \Auth::user()->get();
		$messages = \App\Message::where("from_user_id", "=", $user->id)->leftJoin('users', 'users.id', '=', 'messages.to_user_id')->orderBy('created_at', 'DESC')->orderBy('readed', 'ASC')->get(array('messages.*','users.name'));
		return view('my.messages.outbox')->with('messages', $messages);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		$mobile = $request['mobile'];
		return view('my.messages.create')->with('mobile', $mobile);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$mobile = $request['mobile'];
		$back_url = $request['back_url'];
		$to_user = \App\User::where('mobile', '=', $mobile)->first();
		$from_user = \Auth::user()->get();
		$title = $request['title'];
		$content = $request['content'];
		\App\Message::create(['category' => 0, 'from_user_id' => $from_user->id, 'to_user_id' => $to_user->id, 'title' => $title, 'content' => $content, 'readed' => false]);
		
		$request->session()->flash('success', '发送成功');
		return view('my.messages.create')->with('mobile', $mobile)->with('back_url', $back_url);
	}
	

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = \Auth::user()->get();
		$message = \App\Message::find($id);
		if($message->to_user_id == $user->id)
		{
			$message->readed = true;
			$message->save();
			return view('my.messages.show')->with('message', $message);
		}
		else
		{
			return view('my.messages.outbox_show')->with('message', $message);
		}
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
		$user = \Auth::user()->get();
		\App\Message::where('id', '=', $id)->where('to_user_id', '=', $user->id)->delete();
		return redirect()->back();
	}

}
