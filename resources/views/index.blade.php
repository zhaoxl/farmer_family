<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>农民之家</title>
	<link href="{{ asset('/css/base.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/index.css') }}" rel="stylesheet">
</head>
<body>
	<script src="/js/jquery.min.js"></script>
	<script src="/js/custom-form-elements.js"></script>
	<script src="/js/index.js"></script>
	<div id="index">
		<div class="header">
			<div class="logo">
				<a href="/">猫眼360</a>
			</div>
			<div class="area_links">
				<span class="color_green">{{ $city_name }}</span> 
				<!-- [
				<a href="/area/changecity" class="color_green">切换城市</a>
				@foreach (\App\AreaCity::hotCities(3, $current_city_code) as $city)
				<a href="/area/set?name={{$city->name}}&code={{$city->code}}">{{$city->name}}</a>
				@endforeach
				] -->
			</div>
			<div class="qq_links">
			</div>
			<div class="login_links">
				@if (Auth::user()->guest())
				@else
					<a href="/my" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->get()->name }} <span class="caret"></span></a>
					[<a href="{{ url('/auth/logout') }}">退出</a>]
				@endif
			</div>
		</div>
		<div class="content">
			<div class="find_box">
				<a href="/auth/present-register" class="reg_button"></a>
			</div>
			<div class="pub_box">
				<a href="/auth/company-register" class="reg_button"></a>
			</div>
			<div class="login_box">
				<form id="login_form" class="form-horizontal" method="POST" action="{{ url('/auth/login') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row">
						<input type="text" class="uname" name="mobile" value="请输入手机号" />
						<label id="mobile-error" class="error" for="mobile">{{$errors->first('mobile')}}</label>
					</div>
					<div class="row">
						<input type="text" class="pwd" name="password" value="请输入密码" />
					</div>
					<input type="submit" class="submit" value="" />
					<div class="links">
				    <label><input type="checkbox" class="styled" name="remember" /><span class="autologin_title">自动登录</span></label>  
						<a href="/auth/forget" class="forget">找回密码</a>
					</div>
				</form>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="base_list">
			<div class="find_list">
				<div class="title">
					<a href="/staffs">搜索更多>></a>
				</div>
				<div class="list">
					<ul>
						@foreach ($staffs as $staff)
							<?php $user = $staff->user?>
							@if(!is_null($user))
							<li>
								<a href="/staffs/{{$staff->id}}" class="{{$staff->flag ? 'hot':''}}">
									<span class="attr">{{$staff->user->name}}</span>
									<span class="attr">{{$staff->user->gender}}</span>
									<span class="attr">{{$staff->user->age()}}岁</span>
									<span class="attr work_category">{{$user->workCategoryNames()}}</span>
									<span class="attr address">{{$staff->user->address}}&nbsp;</span>
									<span class="date">[{{date('Y-m-d', strtotime($staff->created_at))}}]</span>
								</a>
							</li>
							@endif
						@endforeach
					</ul>
				</div>
			</div>
			<div class="pub_list">
				<div class="title">
					<a href="/works">搜索更多>></a>
				</div>
				<div class="list">
					<ul>
						@foreach ($works as $work)
						<?php $user = $work->user?>
						@if(!is_null($user))
							<li>
								<a href="/works/{{$work->id}}" class="{{$work->flag ? 'hot':''}}">
									<span class="attr address2">
									<?php #企业用户?>
									@if($user->category == 1)
									{{$work->companyName()}}
									@else
									<?php #个人用户?>
									{{$work->name}}
									@endif
									</span>
									<span class="attr work_category2">{{$work->work_category_name}}</span>
									<span class="attr address2">{{$work->address}}&nbsp;</span>
								</a>
								<span class="date">[{{date('Y-m-d', strtotime($work->created_at))}}]</span>
							</li>
							@endif
						@endforeach
					</ul>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="footer">
			<div class="desc">
				找活雇人网络服务平台
			</div>
			<div class="context">
				版权所有 {{$settings['site_name']}}&nbsp;&nbsp;&nbsp;&nbsp;地址：{{$settings['address']}}&nbsp;&nbsp;&nbsp;&nbsp;服务热线：{{$settings['telphone']}}&nbsp;&nbsp;&nbsp;&nbsp;邮箱：{{$settings['email']}}
			</div>
		</div>
	</div>
	<script type="text/javascript" src="{{ asset('/js/jquery.validate.min.js') }}" ></script>
	<script>
	  var validate = $("#login_form").validate({
	    //errorClass: "label.error", //默认为错误的样式类为：error   
	    focusInvalid: true, //当为false时，验证无效时，没有焦点响应  
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
					rangelength:[3,10],
					pwd: true
				}
	    },
	    messages:{
	      mobile:{
	      	required:"请输入手机号",
	      	phone:'请输入正确的电话号码'
	      },
			 password:{
			   required: "请输入密码",
				 pwd: "请输入密码"
			 }
	   }
	});    
  jQuery.validator.addMethod("phone", function(value, element) {
    var length = value.length;
    var mobile = /^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/
    return this.optional(element) || (length == 11 && mobile.test(value));
	}, "手机号码格式错误");  
	
  jQuery.validator.addMethod("pwd", function(value, element) {
    var length = value.length;
    return this.optional(element) || (value != "请输入密码");
	}, "请输入密码");  
	
	</script>
</body>
</html>