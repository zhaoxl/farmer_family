<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffEvaluate extends Model {

	protected $fillable = ['staff_id', 'user_id', 'content', 'ip', 'star'];
	
	public function staff()
	{
		return $this->belongsTo('\App\Staff');
	}
	
	public function user()
	{
		return $this->belongsTo('\App\User');
	}
	
	public function staffTitle()
	{
		$staff = $this->staff;
		return is_null($staff) ? '' : $staff->title;
	}
	
	public function userName()
	{
		$user = $this->user;
		return is_null($user) ? '' : $user->name;
	}
}
