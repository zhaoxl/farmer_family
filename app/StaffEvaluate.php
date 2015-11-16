<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffEvaluate extends Model {

	protected $fillable = ['staff_id', 'user_id', 'content', 'ip', 'star'];

}
