<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model {

	protected $fillable = ['name', 'key', 'val', 'type'];


	public $timestamps = false;

}
