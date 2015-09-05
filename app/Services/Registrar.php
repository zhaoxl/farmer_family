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
			'mobile' => 'required|max:11',
			'email' => 'required|email|max:255|unique:users',
			'idcard' => 'required|min:18|max:18',
			'password' => 'required|confirmed|min:6',
			'captcha' => 'required|captcha',
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
			/*'age' => $data['age'],
			'hometown' => $data['hometown'],
			'expect_salary' => $data['expect_salary'],
			'gender' => $data['gender'],*/
			'province' => $data['area_province'],
			'city' => $data['area_city'],
			'street' => $data['area_street'],
			'area_name' => $data['area_name'],
			'idcard' => $data['idcard'],
			'qq' => $data['qq'],
			'weixin' => $data['weixin'],
			'public_mobile' => isset($data['public_mobile']),
			'public_qq' => isset($data['public_qq']),
			'public_weixin' => isset($data['public_weixin']),
			'public_email' => isset($data['public_email']),
		]);
	}

}
