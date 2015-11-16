<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkEvaluate extends Model {

	protected $fillable = ['work_id', 'user_id', 'content', 'ip', 'star'];

}
