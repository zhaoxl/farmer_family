@extends('base')
@section('content')
	<link href="{{ asset('/css/register.css') }}" rel="stylesheet">
	
	<ul class="page_tabs">
		<li><a href="#" class="current">个人找活</a></li>
		<li class="space"></li>
		<li><a href="/auth/company-register">企业雇人</a></li>
		<li class="space"></li>
		<li><a href="/auth/hire-register">个人雇人</a></li>
		<div class="clearfix"></div>
	</ul>
	<form class="form-horizontal" id="register_form" role="form" method="POST" action="{{ url('/auth/register') }}">
		<input type="hidden" name="category" value="0" />
		<input type="hidden" name="area_name" id="area_name" />
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="idcard_image" id="idcard_image" />
		<input type="hidden" name="photo_image" id="photo_image" />
		<input type="hidden" name="diploma_image" id="diploma_image" />
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
			</div><!--
			<div class="send_sms">
				<input type="button" class="send_sms_btn" value="发送验证码到手机" />
			</div>
				-->
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
		<div class="field second_field">
			<div class="title">
				<span>QQ号：</span>
			</div>
			<div class="input">
				<input type="text" name="qq" value="{{ old('qq') }}" />
			</div>
		</div>
		<div class="field transverse_field weixin_field">
			<div class="title">
				<span>微信号：</span>
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
				<span><p class="require">*</p>生日：</span>
			</div>
			<div class="input">
				<input type="text" name="birthday" value="{{ old('birthday') }}" />
			</div>
			<div class="valid_notice">
				
			</div>
			<div class="desc">
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="field">
			<div class="title">
				<span><p class="require">*</p>性别：</span>
			</div>
			<div class="input radios">
				<label><input type="radio" name="gender" value="male" checked>&nbsp;&nbsp;男</label>
				<label><input type="radio" name="gender" value="female">&nbsp;&nbsp;女</label>
			</div>
			<div class="valid_notice">
				
			</div>
			<div class="desc">
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="field">
			<div class="title">
				<span><p class="require">*</p>籍贯：</span>
			</div>
			<div class="input">
				<input type="text" name="hometown" value="{{ old('hometown') }}" />
			</div>
			<div class="valid_notice">
				
			</div>
			<div class="desc">
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="field">
			<div class="title">
				<span><p class="require">*</p>所属工种：</span>
			</div>
			<div class="input work_category">
		     <div class="work_category_box">
			     <select class="form-control" name="work_category_id[]" >
			    	 <option value="">请选工种</option>'
						 @foreach ($work_categories as $work_category)
						 	 <option value="{{ $work_category->id }}">{{ $work_category->name }}</option>
						 @endforeach
					</select>
		     </div>
				<a href="javascript:void(0)" class="add_job_btn" id="add_job_btn">
					添加
				</a>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="field">
			<div class="title">
				<span><p class="require">*</p>身份证：</span>
			</div>
			<div class="input">
				<input type="text" name="idcard" value="{{ old('idcard') }}" />
			</div>
			<div class="valid_notice">
				
			</div>
			<div class="desc">
				*填写身份信息后您在网站上会显示为已认证用户，将提升您的信誉度
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="field">
			<div class="title">
				<span>身份证照片：</span>
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
				<span>个人照片：</span>
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
				<span>学历证书：</span>
			</div>
			<input type="file" class="g-u" id="J_UploaderBtn3" value="添加" name="image" >
			<ul id="J_UploaderQueue3"></ul>
			<div class="valid_notice">
				
			</div>
			<div class="desc">
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="field">
			<div class="title">
				<span>期望收入：</span>
			</div>
			<div class="input">
				<input type="text" name="expect_salary" />
			</div>
			<div class="valid_notice">
				
			</div>
			<div class="desc">
				*可以是具体数字，例如200元一天，或50-100元一小时
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="field">
			<div class="title">
				<span><p class="require">*</p>设置登录密码：</span>
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
			<label><input type="checkbox" />我已阅读并同意</label><a href="/auth/services-agreement" target="_blank">《农民之家服务协议》</a>
		</div>
		<div class="post_result">
			
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
		</div>
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
										},
										email:{
											required:true,
											email:true
										},
										birthday:{
											required:true,
										},
										hometown:{
											required:true,
										},
										idcard:{
											required:true,
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
										birthday:{
											required:"必填项",
										},
										hometown:{
											required:"必填项",
										},
										idcard:{
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
	
  <script src="//g.alicdn.com/kissy/k/1.4.8/seed-min.js" charset="utf-8"></script>
	<script>
		var S = KISSY;
		S.use('kg/uploader/3.0.3/index,kg/uploader/3.0.3/themes/default/index,kg/uploader/3.0.3/themes/default/style.css', function (S, Uploader,DefaultTheme) {
		  //上传组件插件
		  var plugins = 'kg/uploader/3.0.3/plugins/auth/auth,' +
		          'kg/uploader/3.0.3/plugins/urlsInput/urlsInput,' +
		          'kg/uploader/3.0.3/plugins/proBars/proBars';

	    S.use(plugins,function(S,Auth,UrlsInput,ProBars){
	    	//身份证
	    	var uploader = new Uploader('#J_UploaderBtn1',{
	      	//处理上传的服务器端脚本路径
	        action: "/auth/upload-img?category=idcard",
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
					$("#idcard_image").val(url);
        });
				uploader.on('remove',function(ev){
					$("#idcard_image").val('');
        });
				//照片
	    	var uploader2 = new Uploader('#J_UploaderBtn2',{
	      	//处理上传的服务器端脚本路径
	        action: "/auth/upload-img?category=photo",
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
					$("#photo_image").val(url);
        });
				uploader2.on('remove',function(ev){
					$("#photo_image").val('');
        });
				//学历证书
	    	var uploader3 = new Uploader('#J_UploaderBtn3',{
	      	//处理上传的服务器端脚本路径
	        action: "/auth/upload-img?category=diploma",
          //禁用多选
          multiple : false
	      });
	      //使用主题
	      uploader3.theme(new DefaultTheme({
	        queueTarget:'#J_UploaderQueue3'
	      }));
	      //验证插件
	      uploader3.plug(new Auth({
	      	//最多上传个数
	        max:1
	      }))
	      //url保存插件
	      .plug(new UrlsInput({target:'#J_Urls3'}))
	      //进度条集合
	      .plug(new ProBars());
				uploader3.on('add', function (ev) {
					$("#J_UploaderBtn3").parent().parent().hide();
        });
				uploader3.on('remove',function(ev){
					$("#J_UploaderBtn3").parent().parent().show();
        });
				uploader3.on('success',function(ev){
					var url = ev['result']['path'];
					$("#diploma_image").val(url);
        });
				uploader3.on('remove',function(ev){
					$("#diploma_image").val('');
        });
	    });
	  });
	</script>
		
	<script>
	
		$(function(){
			//添加工种
			function  addnewGz(_this){
				if($("[name='work_category_id[]']").length>4)
					return false;
				var _html='';
				_html+= '<div class="work_category_box">';
				_html+= $(".work_category_box:first").html();
				_html+='<a href="javascript:void(0)" class="delete_work_cateogry">X</a>';
				_html+= '</div>';
				$(_this).before(_html);
				$('.delete_work_cateogry').bind('click',function(){
					delGz(this);
				})
			}
			//删除工种
			function delGz(a){
				$(a).parent().remove();
			}
			$('#add_job_btn').bind('click',function(){
				addnewGz(this);
			});
		});
	</script>
@endsection