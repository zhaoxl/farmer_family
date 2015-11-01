<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaStreet extends Model {

	protected $fillable = ['code', 'name', 'citycode', 'sort'];
	
	public $timestamps = false;
	

}
