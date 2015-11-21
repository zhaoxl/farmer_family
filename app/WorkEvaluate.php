<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkEvaluate extends Model {

	protected $fillable = ['work_id', 'user_id', 'content', 'ip', 'star'];
	
	public function work()
	{
		return $this->belongsTo('\App\Work');
	}
	
	public function user()
	{
		return $this->belongsTo('\App\User');
	}
	
	public function workTitle()
	{
		$work = $this->work;
		return is_null($work) ? '' : $work->title;
	}
	
	public function userName()
	{
		$user = $this->user;
		return is_null($user) ? '' : $user->name;
	}

}
