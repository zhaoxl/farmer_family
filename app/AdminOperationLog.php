<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminOperationLog extends Model {
	
	public function admin()
	{
		return $this->belongsTo('App\Admin');
    }

}
