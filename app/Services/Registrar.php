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
			'idcard' => 'min:18|max:18',
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
			'hometown' => isset($data['hometown']) ? $data['hometown'] : null,
			'expect_salary' => isset($data['expect_salary']) ? $data['expect_salary'] : null,
			'gender' => isset($data['gender']) ? $data['gender'] : null,
			'province' => $data['area_province'],
			'city' => isset($data['area_city']) ? $data['area_city'] : null,
			'street' => isset($data['area_street']) ? $data['area_street'] : null,
			'area_name' => isset($data['area_name']) ? $data['area_name'] : null,
			'idcard' => isset($data['idcard']) ? $data['idcard'] : null,
			'qq' => $data['qq'],
			'weixin' => $data['weixin'],
			'public_mobile' => isset($data['public_mobile']),
			'public_qq' => isset($data['public_qq']),
			'public_weixin' => isset($data['public_weixin']),
			'public_email' => isset($data['public_email']),
			'birthday' => isset($data['birthday']) ? $data['birthday'] : null,
		]);
	}

}
