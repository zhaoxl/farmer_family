<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Laravel</title>

		<link href="{{ asset('/css/base.css') }}" rel="stylesheet">
	</head>
	<body>
		<script src="/js/jquery.min.js"></script>
		<script src="/js/custom-form-elements.js"></script>
		<script src="/js/jquery.validate.min.js"></script>
		<?php echo View::make('partials.header') ?>
		<div class="body_context">
		<link href="{{ asset('/css/personcenter.css') }}" rel="stylesheet">
		<div class="container-fluid">
			<div class="row person_center_wrap">
				<div class="person_nav_left">
					<ul>
						<li class="{{preg_match('/my/', Request::path()) ? 'current' : ''}}" style="border-top: none;">
							<a href="/my">
								注册信息管理
							</a>
						</li>
						@if(Auth::user()->get()->category == 0)
						<li class="{{Request::path() == '/staffs/create' ? 'current' : ''}}">
							<a href="/staffs/create">
								发布找活信息
							</a>
						</li>
						<li class="{{Request::path() == 'my/sent-staffs' ? 'current' : ''}}">
							<a href="/my/sent-staffs">
								已发布找活信息
							</a>
						</li>
						@elseif(Auth::user()->get()->category == 1)
						<li class="{{Request::path() == 'my/staffs/new' ? 'current' : ''}}">
							<a href="/my/already-sends">
								发布招工信息
							</a>
						</li>
						<li class="{{Request::path() == 'my/sent-works' ? 'current' : ''}}">
							<a href="/my/sent-works">
								已发布招工信息
							</a>
						</li>
						@elseif(Auth::user()->get()->category == 2)
						<li class="{{Request::path() == 'my/staffs/new' ? 'current' : ''}}">
							<a href="/my/already-sends">
								发布招工信息
							</a>
						</li>
						<li class="{{Request::path() == 'my/sent-works' ? 'current' : ''}}">
							<a href="/my/sent-works">
								已发布招工信息
							</a>
						</li>
						@endif
						<li class="{{(Request::path() == 'my/inbox' || Request::path() == 'my/outbox') ? 'current' : ''}}">
							<a href="/my/inbox">
								站内信
							</a>
						</li>
						<li class="{{Request::path() == 'my/change-pwd' ? 'current' : ''}}">
							<a href="/my/change-pwd">
								修改密码
							</a>
						</li>
						<li class="{{Request::path() == 'my/suicide' ? 'current' : ''}}">
							<a href="/my/suicide">
								注销用户
							</a>
						</li>
					</ul>
					<div class="person_nav_left_bc"></div>
				</div>
				<div class="person_center_right">
					@yield('content')
				</div>
			</div>
		</div>

		</div>
		<div class="footer">
			版权所有 农民之家 邮箱：12345@163.com  ICP备 938398501-4
		</div>
	</body>
</html>