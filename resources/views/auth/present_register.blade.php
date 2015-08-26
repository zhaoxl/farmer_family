@extends('base')

@section('content')
	<link href="{{ asset('/css/register.css') }}" rel="stylesheet">
	<div id="register">
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
		<div class="reg_context">
			<ul class="page_tabs">
				<li><a href="#" class="current">个人找活</a></li>
				<li class="space"></li>
				<li><a href="#">企业招工</a></li>
				<li class="space"></li>
				<li><a href="#">个人招工</a></li>
				<div class="clearfix"></div>
			</ul>
			<div class="form">
				<div class="field">
					<div class="title">
						<span><p class="require">*</p>姓名：</span>
					</div>
					<div class="input">
						<input type="text" />
					</div>
					<div class="notice">
						
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="field">
					<div class="title">
						<span><p class="require">*</p>联系方式：</span>
					</div>
					<div class="input">
						<input type="text" />
					</div>
					<div class="send_sms">
						<input type="button" class="send_sms_btn" value="发送验证码到手机" />
					</div>
					<div class="notice">
						
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="field second_field">
					<div class="title">
						<span><p class="require">*</p>验证码：</span>
					</div>
					<div class="input">
						<input type="text" />
					</div>
					<div class="notice">
						
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="field second_field">
					<div class="title">
						<span><p class="require">*</p>QQ号：</span>
					</div>
					<div class="input">
						<input type="text" />
					</div>
					<div class="notice">
						
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="field second_field">
					<div class="title">
						<span><p class="require">*</p>邮箱：</span>
					</div>
					<div class="input">
						<input type="text" />
					</div>
					<div class="notice">
						
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="field">
					<div class="title">
						<span><p class="require">*</p>公开联系方式：</span>
					</div>
					<div class="input">
						<input type="text" />
					</div>
					<div class="notice">
						
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="field">
					<div class="title">
						<span><p class="require">*</p>所在区域：</span>
					</div>
					<div class="input">
						<input type="text" />
					</div>
					<div class="notice">
						
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="field">
					<div class="title">
						<span><p class="require">*</p>身份证：</span>
					</div>
					<div class="input">
						<input type="text" />
					</div>
					<div class="notice">
						
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="area_name" id="area_name" />
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						
						<div class="form-group">
							<label class="col-md-4 control-label">用户类型</label>
							<div class="col-md-6">
								<select name="category" class="form-control">
									<option value="0">发活方</option>
									<option value="1">找活方</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">姓名</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">手机号</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="mobile" value="{{ old('mobile') }}">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">邮箱</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">密码</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">确认密码</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">年龄</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="age" value="{{ old('age') }}">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">QQ</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="qq" value="{{ old('qq') }}">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">微信</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="weixin" value="{{ old('weixin') }}">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">性别</label>
							<div class="col-md-6">
								<label>男<input type="radio" name="gender" value="m" /></label>
								<label>女<input type="radio" name="gender" value="f" /></label>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">籍贯</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="hometown" value="{{ old('hometown') }}">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">身份证号</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="idcard" value="{{ old('idcard') }}">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">期望薪资</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="expect_salary" value="{{ old('expect_salary') }}">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">所在地区</label>
							<div class="col-md-6">
								<select name="area_province" id="area_province" class="form-control">
									<option value="">请选择地区</option>
								@foreach ($area_provinces as $province)
									<option value="{{ $province->code }}">{{ $province->name }}</option>
								@endforeach
								</select>
								<select name="area_city" id="area_city" class="form-control"></select>
								<select name="area_code" id="area_code" class="form-control"></select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									注册
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(function(){
	//get cities
	$("#area_province").change(function(){
		$.ajax({
			url: '/ajax/area/cities',
			type: 'GET',
			dataType: 'json',
			data: {provincecode: $(this).val()},
			success: function(response)
			{
				var options = '<option value="">请选择市</option>';
				$.each(response, function(index, city){
					options += '<option value="'+ city['code'] +'">'+ city['name'] +'</option>';
				});
				$("#area_city").html(options);
				$("#area_code").html('');
			}
		});
	});
	
	//get streets
	$("#area_city").change(function(){
		$.ajax({
			url: '/ajax/area/streets',
			type: 'GET',
			dataType: 'json',
			data: {citycode: $(this).val()},
			success: function(response)
			{
				var options = '<option value="">请选择区县</option>';
				$.each(response, function(index, city){
					options += '<option value="'+ city['code'] +'">'+ city['name'] +'</option>';
				});
				$("#area_code").html(options);
			}
		});
		$("#area_code").change(function(){
			var province = $("#area_province").find("option:selected").text();
			var city = $("#area_city").find("option:selected").text();
			var street = $("#area_code").find("option:selected").text();
			$("#area_name").val(province+'-'+city+'-'+street);
		});
		//set area_name
		
		
	});
});
</script>
@endsection