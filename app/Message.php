<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

	public function to_user(){
		return $this->belongsTo('\App\User');
	}

	public function from_user(){
		return $this->belongsTo('\App\User');
	}
	
	public function getCategoryNameAttribute(){
		return $this->getAttribute('category') == 1 ? '站内消息' : '系统消息';
	}

	public function getFromUserNameAttribute(){
		return $this->from_user->name;
	}

	public function getToUserNameAttribute(){
		return $this->to_user->name;
	}
	
	public function getIsReadAttribute(){
		return $this->getAttribute('readed') ? '<span style="color: green">已读</span>' : '<span style="color: red">未读</span>';
	}
	
	public function category123(){
		return array('站内消息' => 1, '系统消息' => 2);
	}
}
