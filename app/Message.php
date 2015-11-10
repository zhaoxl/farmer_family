<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {
	
	protected $fillable = ['category', 'from_user_id', 'to_user_id', 'title', 'content', 'readed'];
	
	public function to_user(){
		return $this->belongsTo('\App\User');
	}

	public function from_user(){
		return $this->belongsTo('\App\User');
	}
	
	public function getCategoryNameAttribute(){
		return $this->getAttribute('category') == 0 ? '站内消息' : '系统消息';
	}

	public function getFromUserNameAttribute(){
		try
		{
			if($this->category == 0)
				return $this->from_user ? $this->from_user->name : '用户不存在';
			else
				return '系统管理员';
		}
		catch(ErrorException $e){return '用户不存在';}
	}

	public function getToUserNameAttribute(){
		try
		{
			if($this->category == 0)
				return $this->to_user ? $this->to_user->name : '用户不存在';
			else
				return '系统管理员';
		}
		catch(ErrorException $e){return '用户不存在';}
	}
	
	public function getIsReadAttribute(){
		return $this->getAttribute('readed') ? '<span style="color: green">已读</span>' : '<span style="color: red">未读</span>';
	}
	
	public function getFromUserMobile()
	{
		return $this->to_user ? $this->to_user->mobile : '';
	}
	
}
