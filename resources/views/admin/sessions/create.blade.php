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
	<br /><br />
	<div class="container" style="width: 400px;">
		<table class="table table-bordered">
			<tr>
				<td>
					<div class="panel-heading">登陆</div>
				</td>
			</tr>
			<tr>
				<td>
					<form class="form" role="form" method="POST" action="/auth_admin/login">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							@if (count($errors) > 0)
								<div class="alert alert-danger">
									<strong>错误!</strong> 输入信息有误.<br><br>
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
						</div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">E-Mail</label>
							<input type="email" class="form-control" name="email" value="{{ old('email') }}">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">密码</label>
							<input type="password" class="form-control" name="password">
					  </div>
					  <div class="checkbox">
					    <label>
					      <input type="checkbox" name="remember">记住我
					    </label>
					  </div>
					  <button type="submit" class="btn btn-primary">登陆</button>
					</form>
				</td>
			</tr>
		</table>
	</div>
	

	
</body>
</html>
