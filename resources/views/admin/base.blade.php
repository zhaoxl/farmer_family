<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>后台管理</title>

	<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
</head>
<body>
	<script src="/js/bootstrap.js"></script>
	<script src="/js/jquery.min.js"></script>
	<nav role="navigation" class="navbar navbar-inverse">
	  <!-- Brand and toggle get grouped for better mobile display -->
	  <div class="navbar-header">
	    <button data-target="#bs-example-navbar-collapse-9" data-toggle="collapse" class="navbar-toggle" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
	    <a href="#" class="navbar-brand">后台管理</a> </div>
	  <!-- Collect the nav links, forms, and other content for toggling -->
	  <div id="bs-example-navbar-collapse-9" class="collapse navbar-collapse">
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="/admin/operation_logs">操作记录</a></li>
	      <li><a href="/admin/users">注册信息管理</a></li>
	      <li><a href="#">发布信息管理</a></li>
	      <li><a href="#">用户评价管理</a></li>
	      <li><a href="#">后台用户管理</a></li>
	      <li><a href="#">注销用户管理</a></li>
	      <li><a href="#">已注销用户管理</a></li>
	      <li><a href="#">站内信息</a></li>
	      <li><a href="#">系统</a></li>
	    </ul>
	  </div>
	  <!-- /.navbar-collapse -->
	</nav>
	@yield('content')
</body>
</html>