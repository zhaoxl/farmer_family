<html>
	<head>
		<title>Laravel</title>
		
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 96px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
			}
		</style>
	</head>
	<body>
		首页
		city_id: {{ $city_id }}
		city_name: {{ $city_name }}
		管理员是否登录：{{Auth::admin()->check()}}
		@if (Auth::user()->guest())
			<li><a href="{{ url('/auth/login') }}">登陆</a></li>
			<li><a href="{{ url('/auth/register') }}">注册</a></li>
		@else
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->get()->name }} <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="{{ url('/auth/logout') }}">退出</a></li>
				</ul>
			</li>
		@endif
	</body>
</html>
