<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserUpload extends Model {

	protected $fillable = ['category', 'user_id', 'item_type', 'item_id', 'url', 'path', 'file_type', 'file_size'];

}