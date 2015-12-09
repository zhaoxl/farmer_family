@extends('base')
@section('title')
忘记密码
@endsection
  
@section('content')
	<link href="{{ asset('/css/forget.css') }}" rel="stylesheet">
	<input type="hidden" id="send_sms_second" value="{{$send_sms_second}}">
	<form id="forget_form" action="{{ url('/auth/forget') }}" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form">
			<div class="row">
				<div class="title">
					注册手机号：
				</div>
				<div class="field mobile">
					<input type="text" id="v_mobile" name="mobile" class="" data-rule-required="true" data-msg-required="请输入手机号" maxlength="11" />
				</div>
				<div class="send_sms">
					<input type="button" class="send_sms_btn" value="发送验证码到手机" /><label id="send_sms_result_label" style="color: red"></label>
				</div>
			</div>
			<div class="row">
				<div class="title">
					验证码：
				</div>
				<div class="field">
					<input type="text" id="sms_code" name="check_code" data-rule-required="true" data-msg-required="请输入验证码" maxlength="5"/>
				</div>
			</div>
			<div class="row">
				<div class="title">
					设置新密码：
				</div>
				<div class="field">
					<input type="password" id="password" name="password" data-rule-required="true" data-msg-required="请输入密码" maxlength="20" />
				</div>
			</div>
			<div class="row">
				<div class="title">
					确认新密码：
				</div>
				<div class="field">
					<input type="password" name="password_confirmation" data-rule-required="true" data-msg-required="请输入确认密码" maxlength="20" data-rule-equalto="#password" data-msg-equalto="两次密码输入不一致" />
				</div>
			</div>
		</div>
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<div class="submit">
			<input type="submit" value="下一步" />
		</div>
	</form>
	
	<script type="text/javascript" src="{{ asset('/js/jquery.validate.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('/js/auth.js') }}" ></script>
	<script type="text/javascript">
	$(function(){
		$("#forget_form").submit(function(){

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
				$("#forget_form input.error").each(function() {
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
