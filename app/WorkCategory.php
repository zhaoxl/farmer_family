<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkCategory extends Model {

	protected $fillable = ['up_id', 'name', 'full_name', 'sort'];
	public $timestamps = false;

}
