@extends('base')
@section('content')
	<link href="{{ asset('/css/register.css') }}" rel="stylesheet">
	
	<ul class="page_tabs">
		<li><a href="/auth/present-register" >个人找活</a></li>
		<li class="space"></li>
		<li><a href="#" class="current">企业雇人</a></li>
		<li class="space"></li>
		<li><a href="/auth/hire-register">个人雇人</a></li>
		<div class="clearfix"></div>
	</ul>
	<form class="form-horizontal" id="register_form" role="form" method="POST" action="{{ url('/auth/register') }}">
		<input type="hidden" name="category" value="1" />
		<input type="hidden" name="area_name" id="area_name" />
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="license_image" id="license_image" />
		<input type="hidden" name="company_photo_image" id="company_photo_image" />
		<div class="form">
		<div class="field">
			<div class="title">
				<span><p class="require">*</p>联系人：</span>
			</div>
			<div class="input">
				<input type="text" name="name" value="{{ old('name') }}" id="v_name" />
				@if(count($errors) > 0 && $errors->default->has('name'))
				<label id="v_name-error" class="error" for="v_name">必填项</label>
				@endif
			</div>
			<div class="valid_notice"></div>
		</div>
		<div class="clearfix"></div>
		<div class="field">
			<div class="title">
				<span><p class="require">*</p>联系方式：</span>
			</div>
			<div class="input">
				<input type="text" name="mobile" id='v_mobile' value="{{ old('mobile') }}" />
				@if(count($errors) > 0 && $errors->default->has('mobile'))
				<label id="v_mobile-error" class="error" for="v_mobile">手机号已经被注册</label>
				@endif
			</div>
<!--			<div class="send_sms">
				<input type="button" class="send_sms_btn" value="发送验证码到手机" />
			</div> -->
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
				@if(count($errors) > 0 && $errors->default->has('email'))
				<label id="v_email-error" class="error" for="v_name">您注册的邮箱已经存在</label>
				@endif
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
			<div class="input tb_input area">
				<select name="area_province" id="area_province" class="form-control">
					<option value="">请选择地区</option>
				@foreach ($area_provinces as $province)
					<option value="{{ $province->code }}" {{old('area_province') == $province->code ? 'selected="selected"' : ''}}>{{$province->name}}</option>
				@endforeach
				</select>
				<select name="area_city" id="area_city" class="form-control" style="display: none">
					@if(isset($area_cities))
					@foreach ($area_cities as $city)
					<option value="{{ $city->code }}" {{old('area_city') == $city->code ? 'selected="selected"' : ''}}>{{$city->name}}</option>
					@endforeach
					@endif
				</select>
				<select name="area_street" id="area_street" class="form-control" style="display: none"></select>
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
			<input type="file" class="g-u" id="J_UploaderBtn1" value="添加" name="image" >
			<ul id="J_UploaderQueue1"></ul>
			<div class="valid_notice">
				
			</div>
			<div class="desc">
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="field">
			<div class="title">
				<span><p class="require">*</p>所属行业：</span>
			</div>
			<div class="input tb_input">
				<select name="industry_id" id="industry_id" class="form-control">
					<option value="">请选择行业</option>
				@foreach ($industries as $industry)
					<option value="{{$industry->id}}|{{ $industry->industry_name }}">{{ $industry->industry_name }}</option>
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
			<input type="file" class="g-u" id="J_UploaderBtn2" value="添加" name="image" >
			<ul id="J_UploaderQueue2"></ul>
			<div class="valid_notice">
				
			</div>
			<div class="desc">
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="field">
			<div class="title">
				<span><p class="require">*</p>设置登录密码：</span>
			</div>
			<div class="input">
				<input type="password" name="password" id="password" />
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
				@if(count($errors) > 0 && $errors->default->has('captcha'))
				<label id="v_captcha-error" class="error" for="v_captcha">验证码不正确</label>
				@endif
			</div>
			<img id="cap_img" src="{{$cap}}" class="img" />
			<div class="valid_notice">
				
			</div>
			<a id="refresh_cap" href="javascript:void(0)" class="refresh_cap">看不清 换一张</a>
		</div>
		<div class="clearfix"></div>
		<div class="service_agree">
			<label><input type="checkbox" />我已阅读并同意</label><a href="/auth/services-agreement" target="_blank">《猫眼360服务协议》</a>
		</div>
		<div class="post_result">
			
			<!-- @if (count($errors) > 0)
			-------------------------------------------------
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif -->
		</div>
		<div class="submit">
			<input type="submit" value="下一步" id="submitBtn" />
		</div>
	</div>
	</form>
	
	<script type="text/javascript" src="{{ asset('/js/jquery.validate.min.js') }}" ></script>
	<script>
	  var validate = $("#register_form").validate({
    //debug: true, //调试模式取消submit的默认提交功能   
    //errorClass: "label.error", //默认为错误的样式类为：error   
    focusInvalid: false, //当为false时，验证无效时，没有焦点响应  
    onkeyup: false,   
    submitHandler: function(form){   //表单提交句柄,为一回调函数，带一个参数：form   
        form.submit();   //提交表单   
    },   
  
    rules:{
	    name:{
	    	required:true
	    },
	    mobile:{
	    	required:true,
	    	phone:true
	    },
     email:{
     	required:true,
     	email:true
     },
		 company_name:{
		   required: true
		 },
		 address:{
		   required: true
		 },
     password:{
			 required:true,
     	 rangelength:[3,10]
     },
     password_confirmation:{
			 equalTo:"#password"
     },
		 captcha:{
		   required: true
		 }
    },
    messages:{
      name:{
          required:"必填项"
      },
      mobile:{
      	   required:"必填项",
      	   phone:'请输入正确的电话号码'
      },
      email:{
      	   required:"必填项",
      },
		 company_name:{
		   required: "必填项"
		 },
		 address:{
		   required: "必填项"
		 },
		 password:{
		   required: "必填项"
		 },
		 password_confirmation:{
		   equalTo: "两次密码输入不一致"
		 },
		 captcha:{
		   required: "必填项"
		 }
   }
  });    
  jQuery.validator.addMethod("phone", function(value, element) {
    var length = value.length;
    var mobile = /^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/
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
					if(response.length == 0)
					{
						$("#area_city").hide();
						$("#area_street").hide();
						return true;
					}
					var options = '<option value="">请选择市</option>';
					$.each(response, function(index, city){
						options += '<option value="'+ city['code'] +'">'+ city['name'] +'</option>';
					});
					$("#area_city").html(options).show();
					$("#area_street").html('').hide();
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
					if(response.length == 0)
					{
						$("#area_street").hide();
						return true;
					}
					var options = '<option value="">请选择区县</option>';
					$.each(response, function(index, city){
						options += '<option value="'+ city['code'] +'">'+ city['name'] +'</option>';
					});
					$("#area_street").html(options).show();
				}
			});
		});
		$("#area_street").change(function(){
			var province = $("#area_province").find("option:selected").text();
			var city = $("#area_city").find("option:selected").text();
			var street = $("#area_street").find("option:selected").text();
			$("#area_name").val(province+'-'+city+'-'+street);
		});
	
	
		//refresh captcha
		$("#refresh_cap").click(function(){
			$("#cap_img").attr("src", $("#cap_img").attr("src")+"?");
		});
	});
	</script>
	
  <script src="//g.alicdn.com/kissy/k/1.4.8/seed-min.js" charset="utf-8"></script>
	<script>
		var S = KISSY;
		S.use('kg/uploader/3.0.3/index,kg/uploader/3.0.3/themes/default/index,kg/uploader/3.0.3/themes/default/style.css', function (S, Uploader,DefaultTheme) {
		  //上传组件插件
		  var plugins = 'kg/uploader/3.0.3/plugins/auth/auth,' +
		          'kg/uploader/3.0.3/plugins/urlsInput/urlsInput,' +
		          'kg/uploader/3.0.3/plugins/proBars/proBars';

	    S.use(plugins,function(S,Auth,UrlsInput,ProBars){
	    	//营业执照
	    	var uploader = new Uploader('#J_UploaderBtn1',{
	      	//处理上传的服务器端脚本路径
	        action: "/auth/upload-img?category=license",
          //禁用多选
          multiple : false
	      });
	      //使用主题
	      uploader.theme(new DefaultTheme({
	        queueTarget:'#J_UploaderQueue1'
	      }));
	      //验证插件
	      uploader.plug(new Auth({
	      	//最多上传个数
	        max:1
	      }))
	      //url保存插件
	      .plug(new UrlsInput({target:'#J_Urls'}))
	      //进度条集合
	      .plug(new ProBars());
				uploader.on('add', function (ev) {
					$("#J_UploaderBtn1").parent().parent().hide();
        });
				uploader.on('remove',function(ev){
					$("#J_UploaderBtn1").parent().parent().show();
        });
				uploader.on('success',function(ev){
					var url = ev['result']['path'];
					$("#license_image").val(url);
        });
				uploader.on('remove',function(ev){
					$("#license_image").val('');
        });
				//照片
	    	var uploader2 = new Uploader('#J_UploaderBtn2',{
	      	//处理上传的服务器端脚本路径
	        action: "/auth/upload-img?category=company_photo",
          //禁用多选
          multiple : false
	      });
	      //使用主题
	      uploader2.theme(new DefaultTheme({
	        queueTarget:'#J_UploaderQueue2'
	      }));
	      //验证插件
	      uploader2.plug(new Auth({
	      	//最多上传个数
	        max:1
	      }))
	      //url保存插件
	      .plug(new UrlsInput({target:'#J_Urls2'}))
	      //进度条集合
	      .plug(new ProBars());
				uploader2.on('add', function (ev) {
					$("#J_UploaderBtn2").parent().parent().hide();
        });
				uploader2.on('remove',function(ev){
					$("#J_UploaderBtn2").parent().parent().show();
        });
				uploader2.on('success',function(ev){
					var url = ev['result']['path'];
					$("#company_photo_image").val(url);
        });
				uploader2.on('remove',function(ev){
					$("#company_photo_image").val('');
        });
				
	    });
	  });
	</script>
@endsection