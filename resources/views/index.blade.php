<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>
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
				<a href="/"><img src="/images/logo.jpg"></a>
			</div>
			<div class="area_links">
				<span class="color_green">{{ $city_name }}</span> [ <a href="/area/changecity" class="color_green">切换城市</a>  <a href="#">廊坊</a> <a href="#">天津</a> <a href="#">保定</a> ]
			</div>
			<div class="qq_links">
				联系QQ：<span class="color_green">458048940</span>
			</div>
			<div class="login_links">
				@if (Auth::user()->guest())
					<a href="{{ url('/auth/login') }}">[登陆]</a>
					<a href="{{ url('/auth/present-register') }}">[免费注册]</a>
				@else
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->get()->name }} <span class="caret"></span></a>
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
				<form class="form-horizontal" method="POST" action="{{ url('/auth/login') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="text" class="uname" name="mobile" value="请输入手机号" />
					<input type="password" class="pwd" name="password" />
					<input type="submit" class="submit" value="" />
					<div class="links">
				    <label><input type="checkbox" class="styled" name="remember" /><span class="autologin_title">自动登录</span></label>
						<a href="/auth/forget" class="forget">忘记密码</a>
					</div>
				</form>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="base_list">
			<div class="find_list">
				<div class="title">
					<a href="/staffs">更多></a>
				</div>
				<div class="list">
					<ul>
						@foreach ($staffs as $staff)
						<li><a href="/staffs/{{$staff->id}}" class="{{$staff->flag ? 'hot':''}}">服务类型：{{$staff->work_category_name}}</a><span class="date">[{{date('Y-m-d', strtotime($staff->created_at))}}]</span></li>
						@endforeach
					</ul>
				</div>
			</div>
			<div class="pub_list">
				<div class="title">
					<a href="/works">更多></a>
				</div>
				<div class="list">
					<ul>
						@foreach ($works as $work)
						<li><a href="/works/{{$work->id}}" class="{{$work->flag ? 'hot':''}}">服务类型：{{$work->work_category_name}}</a><span class="date">[{{date('Y-m-d', strtotime($work->created_at))}}]</span></li>
						@endforeach
					</ul>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="footer">
			<div class="context">
				版权所有 农民之家&nbsp;&nbsp;&nbsp;&nbsp;邮箱：99866770@qq.com&nbsp;&nbsp;&nbsp;&nbsp;地址：北京市海淀区知春路9999号
			</div>
		</div>
	</div>
</body>
</html>