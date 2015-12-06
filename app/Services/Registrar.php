<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;
use Ollieread\Multiauth\Guard;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		Validator::extend('check_code', function($field,$value,$parameters){
			return \App\SendSms::checkSmsCode($value);
		});
		
		return Validator::make($data, [
			'mobile' => 'required|max:11|unique:users',
			'password' => 'required|confirmed|min:6',
			'check_code' => 'required|min:4|check_code',
		],[
			'required' => ':attribute不能为空',
			'unique' => ':attribute已经存在',
			'mobile.unique' => '手机号已经存在',
			'confirmed' => '两次密码输入不一致',
			'check_code' => '验证码错误',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return \App\User::create([
			'mobile' => $data['mobile'],
			'password' => bcrypt($data['password'])
		]);
	}

}
