@extends('base')
@section('title')
登陆
@endsection

@section('content')
	<link href="{{ asset('/css/login.css') }}" rel="stylesheet">
	<div class="content_body">
		<div class="form">
			<div class="form_body">
				<form id="login_form" action="{{ url('/auth/login') }}" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<p class="title">用户登录</p>
					<div class="notices">
						@if(count($errors) > 0 && $errors->default->has('mobile'))
						用户名或密码错误。
						@endif
					</div>
					<div class="inputs">
						<div class="field">
							<label>手机号</label>
							<input type="text" name="mobile" />
						</div>
					</div>
					<div class="inputs">
						<div class="field">
							<label>密　码</label>
							<input type="password" name="password" />
						</div>
					</div>
					<div class="remember">
						<div class="field">
							<label><input type="checkbox" name="remember" />下次自动登录</label>
						</div>
					</div>
					<a class="forget" href="/auth/forget">忘记密码</a>
					<div class="btns">
						<input type="submit" value="" />
					</div>
					<a href="/auth/create" class="reg_link">免费注册</a>
				</form>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	
@endsection
