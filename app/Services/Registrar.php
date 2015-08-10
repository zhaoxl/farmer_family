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
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
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
			'category' => $data['category'],
			'name' => $data['name'],
			'mobile' => $data['mobile'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'age' => $data['age'],
			'gender' => $data['gender'],
			'area_code' => $data['area_code'],
			'area_name' => $data['area_name'],
			'hometown' => $data['hometown'],
			'idcard' => $data['idcard'],
			'expect_salary' => $data['expect_salary'],
			'qq' => $data['qq'],
			'weixin' => $data['weixin'],
		]);
	}

}
