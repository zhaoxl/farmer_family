@extends('base')
@section('content')
	<link href="{{ asset('/css/register.css') }}" rel="stylesheet">
	
	<ul class="page_tabs">
		<li><a href="/auth/present-register" >个人找活</a></li>
		<li class="space"></li>
		<li><a href="#" class="current">企业招工</a></li>
		<li class="space"></li>
		<li><a href="/auth/hire-register">个人招工</a></li>
		<div class="clearfix"></div>
	</ul>
	<form class="form-horizontal" id="register_form" role="form" method="POST" action="{{ url('/auth/register') }}">
		<input type="hidden" name="category" value="0" />
		<input type="hidden" name="area_name" id="area_name" />
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form">
		<div class="field">
			<div class="title">
				<span><p class="require">*</p>姓名：</span>
			</div>
			<div class="input">
				<input type="text" name="name" value="{{ old('name') }}" id="v_name" />
			</div>
			<div class="valid_notice {{count($errors) > 0 && $errors->default->has('name') ? 'wrong' : ''}}"></div>
		</div>
		<div class="clearfix"></div>
		<div class="field">
			<div class="title">
				<span><p class="require">*</p>联系方式：</span>
			</div>
			<div class="input">
				<input type="text" name="mobile" id='v_mobile' value="{{ old('mobile') }}" />
			</div>
			<div class="send_sms">
				<input type="button" class="send_sms_btn" value="发送验证码到手机" />
			</div>
			<div class="valid_notice">
				
			</div>
			<div class="desc">
				*手机号作为您的登录账号
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="field second_field" style="display: none">
			<div class="title">
				<span><p class="require">*</p>验证码：</span>
			</div>
			<div class="input">
				<input type="text" />
			</div>
			<div class="valid_notice">
				
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="field second_field small_field">
			<div class="title">
				<span>QQ号：</span>
			</div>
			<div class="input">
				<input type="text" name="qq" value="{{ old('qq') }}" />
			</div>
		</div>
		<div class="field weixin_field small_field compact_transverse_field">
			<div class="title">
				<span>微信号：</span>
			</div>
			<div class="input">
				<input type="text" name="weixin" value="{{ old('weixin') }}" />
			</div>
		</div>
		<div class="field company_tel_field small_field compact_transverse_field">
			<div class="title">
				<span>公司电话：</span>
			</div>
			<div class="input">
				<input type="text" name="weixin" value="{{ old('weixin') }}" />
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="field second_field">
			<div class="title">
				<span><p class="require">*</p>邮箱：</span>
			</div>
			<div class="input">
				<input type="text" name="email" value="{{ old('email') }}" />
			</div>
			<div class="valid_notice">
				
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="field">
			<div class="title">
				<span><p class="require">*</p>公开联系方式：</span>
			</div>
			<div class="input tb_input">
				<label><input type="checkbox" class="ck" name="public_mobile" />手机</label>
				<label><input type="checkbox" class="ck" name="public_qq" />QQ号</label>
				<label><input type="checkbox" class="ck" name="public_weixin" />微信</label>
				<label><input type="checkbox" class="ck" name="public_email" />邮箱</label>
			</div>
			<div class="valid_notice">
				
			</div>
			<div class="desc">
				*您选中的联系方式可以在网站上被其他用户看到，不选则其他用户不会看到
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="field">
			<div class="title">
				<span><p class="require">*</p>所在区域：</span>
			</div>
			<div class="input tb_input">
				<select name="area_province" id="area_province" class="form-control">
					<option value="">请选择地区</option>
				@foreach ($area_provinces as $province)
					<option value="{{ $province->code }}">{{ $province->name }}</option>
				@endforeach
				</select>
				<select name="area_city" id="area_city" class="form-control"></select>
				<select name="area_street" id="area_street" class="form-control"></select>
			</div>
			<div class="valid_notice">
				
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="field">
			<div class="title">
				<span><p class="require">*</p>企业名称：</span>
			</div>
			<div class="input">
				<input type="text" name="company_name" value="{{ old('company_name') }}" />
			</div>
			<div class="valid_notice">
				
			</div>
			<div class="desc">
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="field">
			<div class="title">
				<span><p class="require">*</p>公司地址：</span>
			</div>
			<div class="input">
				<input type="text" name="address" value="{{ old('address') }}" />
			</div>
			<div class="valid_notice">
				
			</div>
			<div class="desc">
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="field">
			<div class="title">
				<span>营业执照：</span>
			</div>
			<div class="input">
				<input type="text" />
			</div>
			<input type="button" value="添加" class="btn" />
			<input type="button" value="上传" class="btn" />
			<div class="valid_notice">
				
			</div>
			<div class="desc">
				*照片文件不大于500K
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="field">
			<div class="title">
				<span><p class="require">*</p>所属行业：</span>
			</div>
			<div class="input tb_input">
				<select name="area_province" id="area_province" class="form-control">
					<option value="">请选择地区</option>
				@foreach ($industries as $industry)
					<option value="{{ $industry->industry_name }}">{{ $industry->industry_name }}</option>
				@endforeach
				</select>
			</div>
			<div class="valid_notice">
				
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="field">
			<div class="title">
				<span>企业照片：</span>
			</div>
			<div class="input">
				<input type="text" />
			</div>
			<input type="button" value="添加" class="btn" />
			<input type="button" value="上传" class="btn" />
			<div class="valid_notice">
				
			</div>
			<div class="desc">
				*照片文件不大于500K
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="field">
			<div class="title">
				<span><p class="require">*</p>设置登陆密码：</span>
			</div>
			<div class="input">
				<input type="password" name="password" />
			</div>
			<div class="valid_notice">
				
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="field">
			<div class="title">
				<span><p class="require">*</p>重复登录密码：</span>
			</div>
			<div class="input">
				<input type="password" name="password_confirmation" />
			</div>
			<div class="valid_notice">
				
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="field cap">
			<div class="title">
				<span><p class="require">*</p>验证码：</span>
			</div>
			<div class="input">
				<input type="text" name="captcha" value="" />
			</div>
			<img id="cap_img" src="{{$cap}}" class="img" />
			<div class="valid_notice">
				
			</div>
			<a id="refresh_cap" href="javascript:void(0)" class="refresh_cap">看不清 换一张</a>
		</div>
		<div class="clearfix"></div>
		<div class="service_agree">
			<label><input type="checkbox" />我已阅读并同意</label><a href="#">《农民之家服务协议》</a>
		</div>
		<!--<div class="post_result">
			
			@if (count($errors) > 0)
			-------------------------------------------------
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
		</div>-->
		<div class="submit">
			<input type="submit" value="下一步" id="submitBtn" />
		</div>
	</div>
	</form>
	
	<script type="text/javascript" src="{{ asset('/js/jquery.validate.min.js') }}" ></script>
	<script>
		  var validate = $("#register_form").validate({
	                debug: true, //调试模式取消submit的默认提交功能   
	                //errorClass: "label.error", //默认为错误的样式类为：error   
	                focusInvalid: false, //当为false时，验证无效时，没有焦点响应  
	                onkeyup: false,   
	                submitHandler: function(form){   //表单提交句柄,为一回调函数，带一个参数：form   
	                    alert("提交表单");   
	                    form.submit();   //提交表单   
	                },   
                
	                rules:{
	                    name:{
	                        required:true
	                    },
	                    mobile:{
	                    	    required:true,
	                    	    phone:true
	                    }
	//                  ,
	//                  email:{
	//                      required:true,
	//                      email:true
	//                  },
	//                  password:{
	//                      required:true,
	//                      rangelength:[3,10]
	//                  },
	//                  confirm_password:{
	//                      equalTo:"#password"
	//                  }                    
	                },
	                messages:{
	                    name:{
	                        required:"必填"
	                    },
	                    mobile:{
	                    	   required:"必填",
	                    	   phone:'请输入正确的电话号码'
	                    }
                                     
	                }
                          
	            });    
	    jQuery.validator.addMethod("phone", function(value, element) {
	    var length = value.length;
	    var mobile =  /^(((13[0-9]{1})|(15[0-9]{1}))+\d{8})$/
	    return this.optional(element) || (length == 11 && mobile.test(value));
	}, "手机号码格式错误");  
	
	
	</script>
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
					$("#area_street").html('');
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
					$("#area_street").html(options);
				}
			});
			$("#area_street").change(function(){
				var province = $("#area_province").find("option:selected").text();
				var city = $("#area_city").find("option:selected").text();
				var street = $("#area_street").find("option:selected").text();
				$("#area_name").val(province+'-'+city+'-'+street);
			});
		});
	
	
		//refresh captcha
		$("#refresh_cap").click(function(){
			$("#cap_img").attr("src", $("#cap_img").attr("src")+"?");
		});
	});
	</script>
@endsection