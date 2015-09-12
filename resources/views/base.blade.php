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
	<div class="header">
		<div class="context">
			<div class="logo">
				<a href="/"><img src="/images/logo.jpg"></a>
			</div>
			<div class="space"></div>
			<div class="page_title">
				注册
			</div>
			<div class="qq_links">
				联系QQ：<span class="color_green">458048940</span>
			</div>
		</div>
	</div>
	<div class="body_context">
		@yield('content')
	</div>
	<div class="footer">
		版权所有 农民之家 邮箱：12345@163.com  ICP备 938398501-4
	</div>
</body>
</html>
