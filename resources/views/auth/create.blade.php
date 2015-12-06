@extends('base')
@section('content')
	<link href="{{ asset('/css/register_new.css') }}" rel="stylesheet">
	
	<input type="hidden" id="send_sms_second" value="{{$send_sms_second}}">
	
	<form class="form-horizontal" id="register_form" role="form" method="POST" action="{{ url('/auth/register') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form">
			<div class="form_title">
				<p>用户注册</p>
				<span class="login_link">已有账号？<a href="/auth/login">去登陆</a></span>
			</div>
			<div class="form_body">
				<div class="field">
					<label>手　机　号</label>
					<input type="text" id="v_mobile" name="mobile" data-rule-required="true" data-msg-required="请输入手机号" maxlength="11" /><input type="button" class="send_sms_btn" value="发送验证码到手机" />
				</div>
				<div class="field">
					<label>验　证　码</label>
					<input type="text" id="sms_code" name="check_code" data-rule-required="true" data-msg-required="请输入验证码" maxlength="4"/>
				</div>
				<div class="field">
					<label>密　　　码</label>
					<input type="password" id="password" name="password" data-rule-required="true" data-msg-required="请输入密码" maxlength="20" />
				</div>
				<div class="field">
					<label>确&nbsp;认&nbsp;密&nbsp;码</label>
					<input type="password" name="password_confirmation" data-rule-required="true" data-msg-required="请输入确认密码" maxlength="20" data-rule-equalto="#password" data-msg-equalto="两次密码输入不一致" />
				</div>
				<p class="service">
					<label><input type="checkbox" name="allow_service"  data-rule-required="true" /> 我已阅读并同意</label>
					<a href="#">《服务协议》</a>
				</p>
				<div class="btns">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<input type="submit" class="submit_btn" value="确定" />
					<span class="login_link">已有账号？<a href="/auth/login">去登陆</a></span>
				</div>
			</div>
		</div>
	</form>

			
	
	<script type="text/javascript" src="{{ asset('/js/jquery.validate.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('/js/auth.js') }}" ></script>
	<script type="text/javascript">
	$(function(){
		$("#register_form").submit(function(){

		}).validate({
    	debug: false,
			onsubmit: true, 
			success:function(label, element){
				if ($(element).is(":checkbox"))
				{
					$(element).parent().css("color", "black");
				}
			},
			errorPlacement: function(error, element) {
				$("#register_form input.error").each(function() {
					if ($(element).is(":checkbox"))
					{
						$(element).parent().css("color", "red");
					}
					else
					{
						$(element).attr("placeholder", $(error).html());
					}
				});
			}
    });
	});
	</script>		
@endsection