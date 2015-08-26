@extends('base')

@section('content')
	<link href="{{ asset('/css/index.css') }}" rel="stylesheet">
	<script src="/js/index.js"></script>
		<div id="index">
			<div class="header">
				<div class="logo">
					<a href="/"><img src="/images/logo.jpg"></a>
				</div>
				<div class="area_links">
					<span class="color_green">{{ $city_name }}</span> [ <a href="#" class="color_green">切换城市</a>  <a href="#">廊坊</a> <a href="#">天津</a> <a href="#">保定</a> ]
				</div>
				<div class="qq_links">
					联系QQ：<span class="color_green">458048940</span>
				</div>
				<div class="login_links">
					@if (Auth::user()->guest())
						<a href="{{ url('/auth/login') }}">[登陆]</a>
						<a href="{{ url('/auth/register') }}">[免费注册]</a>
					@else
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->get()->name }} <span class="caret"></span></a>
						[<a href="{{ url('/auth/logout') }}">退出</a>]
					@endif
				</div>
			</div>
			<div class="content">
				<div class="find_box">
					<a href="/auth/present-register/" class="reg_button"></a>
				</div>
				<div class="pub_box">
					<a href="#" class="reg_button"></a>
				</div>
				<div class="login_box">
					<form action="action" method="post">
						<input type="text" class="uname" value="请输入手机号" />
						<input type="text" class="pwd" />
						<input type="submit" value="" class="submit" value="请输入登陆密码" />
					</form>
					<div class="links">
				    <label><input type="checkbox" class="styled" /><span class="autologin_title">自动登录</span></label>
						<a href="#" class="forget">忘记密码</a>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="base_list">
				<div class="find_list">
					<div class="title">
						<a href="#">更多></a>
					</div>
					<div class="list">
						<ul>
							<li><a href="#">工种：服务人员/高薪招聘网店客服</a><span class="date">[2015-08-04]</span></li>
							<li><a href="#">工种：服务人员/大学计算机专业实习生</a><span class="date">[2015-08-04]</span></li>
							<li><a href="#" class="hot">工种：服务人员/运营经理</a><span class="date">[2015-08-04]</span></li>
							<li><a href="#">工种：服务人员/美工</a><span class="date">[2015-08-04]</span></li>
							<li><a href="#">工种：服务人员/高薪聘淘宝网页设计师</a><span class="date">[2015-08-04]</span></li>
						</ul>
					</div>
				</div>
				<div class="pub_list">
					<div class="title">
						<a href="#">更多></a>
					</div>
					<div class="list">
						<ul>
							<li><a href="#">工种：服务人员/高薪招聘网店客服</a><span class="date">[2015-08-04]</span></li>
							<li><a href="#">工种：服务人员/大学计算机专业实习生</a><span class="date">[2015-08-04]</span></li>
							<li><a href="#" class="hot">工种：服务人员/运营经理</a><span class="date">[2015-08-04]</span></li>
							<li><a href="#">工种：服务人员/美工</a><span class="date">[2015-08-04]</span></li>
							<li><a href="#">工种：服务人员/高薪聘淘宝网页设计师</a><span class="date">[2015-08-04]</span></li>
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
@endsection