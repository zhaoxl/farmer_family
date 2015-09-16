<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSuicide extends Model {
	
	protected $fillable = array('user_id', 'reason', 'content');

}
