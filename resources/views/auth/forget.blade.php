@extends('base')
@section('title')
忘记密码
@endsection
  
@section('content')
	<link href="{{ asset('/css/forget.css') }}" rel="stylesheet">
	<form id="forget_form" action="{{ url('/auth/forget') }}" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form">
			<div class="row">
				<div class="title">
					已注册手机号：
				</div>
				<div class="field mobile">
					<input type="text" name="mobile" class="" />
				</div>
				<div class="send_sms">
					<input type="button" class="send_sms_btn" value="发送验证码到手机" />
				</div>
			</div>
			<div class="row">
				<div class="title">
					验证码：
				</div>
				<div class="field">
					<input type="text" name="captcha" />
				</div>
			</div>
			<div class="row">
				<div class="title">
					设置新密码：
				</div>
				<div class="field">
					<input type="password" name="password" id="password" />
				</div>
			</div>
			<div class="row">
				<div class="title">
					确认新密码：
				</div>
				<div class="field">
					<input type="password" name="password_confirmation" />
				</div>
			</div>
		</div>
		<div class="submit">
			<input type="submit" value="下一步" />
		</div>
	</form>
	
	<script type="text/javascript" src="{{ asset('/js/jquery.validate.min.js') }}" ></script>
	<script>
		  var validate = $("#forget_form").validate({
	                debug: true, //调试模式取消submit的默认提交功能   
	                //errorClass: "label.error", //默认为错误的样式类为：error   
	                focusInvalid: false, //当为false时，验证无效时，没有焦点响应  
	                onkeyup: false,   
	                submitHandler: function(form){   //表单提交句柄,为一回调函数，带一个参数：form   
	                	form.submit();   //提交表单   
	                },   
	                rules:{
										mobile:{
										  required:true,
										  phone:true
										},
										password:{
											required:true,
											rangelength:[3,10]
										},
										password_confirmation:{
											equalTo:"#password"
										},
										captcha:{
											required: true
										}
	                },
	                messages:{
							      mobile:{
							      	required:"必填项",
							      	phone:'请输入正确的电话号码'
							      },
									 password:{
									   required: "必填项"
									 },
									 password_confirmation:{
									   equalTo: "两次密码输入不一致"
									 },
									 captcha:{
									   required: "必填项"
									 }
	               }
	            });    
	    jQuery.validator.addMethod("phone", function(value, element) {
	    var length = value.length;
	    var mobile = /^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/
	    return this.optional(element) || (length == 11 && mobile.test(value));
	}, "手机号码格式错误");  
	</script>
@endsection
