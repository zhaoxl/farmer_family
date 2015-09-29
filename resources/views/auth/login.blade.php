<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>
	<link href="{{ asset('/css/base.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/index.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/login.css') }}" rel="stylesheet">
</head>
<body>
	<script src="/js/jquery.min.js"></script>
	<script src="/js/custom-form-elements.js"></script>
	<div id="index">
		<div class="header">
			<div class="logo">
				<a href="/"><img src="/images/logo.jpg"></a>
			</div>
			<div class="area_links">
				<span class="color_green">{{ $city_name }}</span> [ 
					<a href="/area/changecity" class="color_green">切换城市</a>  
					<a href="/area/set?name=上海&code=310000">上海</a>
					<a href='/area/set?name=广州&code=440100'>广州</a>
					<a href='/area/set?name=深圳&code=440300'>深圳</a> ]
			</div>
			<div class="qq_links">
				联系QQ：<span class="color_green">458048940</span>
			</div>
			<div class="login_links">
				@if (Auth::user()->guest())
					<a href="{{ url('/auth/login') }}">[登陆]</a>
					<a href="{{ url('/auth/present-register') }}">[免费注册]</a>
				@else
					<a href="/my" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->get()->name }} <span class="caret"></span></a>
					[<a href="{{ url('/auth/logout') }}">退出</a>]
				@endif
			</div>
		</div>
		<div class="content">
<div class="login_box">
				<form action="http://farmer_family/auth/login" method="POST" class="form-horizontal">
					<input type="hidden" value="RRytaPZGU8TxrR2qka931rTI8SvBCotRVyYeK7qT" name="_token">
					<div class="error">
						@if(count($errors) > 0 && $errors->default->has('mobile'))
						用户名或密码错误。
						@endif
						&nbsp;
					</div>
					<input type="text" value="请输入手机号" name="mobile" class="uname">
					<input type="password" name="password" class="pwd">
					<input type="submit" value="" class="submit">
					<div class="links">
				    <label>
							<input type="checkbox" name="remember" class="styled" /><span class="autologin_title">自动登录</span>
						</label>
						<a class="forget" href="/auth/forget">忘记密码</a>
					</div>
				</form>
			</div>
		</div>
		<div class="footer">
			<div class="context">
				版权所有 农民之家&nbsp;&nbsp;&nbsp;&nbsp;邮箱：99866770@qq.com&nbsp;&nbsp;&nbsp;&nbsp;地址：北京市海淀区知春路9999号
			</div>
		</div>
	</div>
</body>
</html>