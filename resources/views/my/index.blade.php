@extends('my.layout')
@section('content')
<div class="register_mes_Modify">
	<form id="register_mes_Modify" action="/my/save-profile" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="photo_image" id="photo_image" />
		<input type="hidden" name="diploma_image" id="diploma_image" />
		<input type="hidden" name="area_name" id="area_name" />
		<table width="100%" class="register_mes_table"  >
			<tr>
				<td width="20%" align="right">
					姓名:
				</td>
				<td width="40%">
					<div class="form-group">
						<input type="text" class="form-control" name="name" id="" placeholder="请输入您的姓名" value="{{$user->name}}" />
					</div>
				</td>
				<td width="45%">
				</td>
			</tr>
			<tr>
				<td width="20%" align="right">
					联系方式:
				</td>
				<td width="40%">
					<div class="form-group">
						<input type="text" class="form-control" name="mobile" id="" placeholder="请输入您的手机号" value="{{$user->mobile}}" />
					</div>
				</td>
				<td width="45%">
					<!-- <a href="javascript" id='send_mes'  class="send_mes" >
						发送验证码到手机
					</a> -->
				</td>
			</tr>
			<!-- <tr>
				<td width="20%" align="right">
				</td>
				<td width="40%">
					<div class="form-group text_input_box">
						<label for="mboile_verification">验证码:</label>
						<input type="text" class="form-control mboile_verification" id="mboile_verification"  placeholder="验证码">
					</div>
				</td>
				<td width="45%">
				</td>
			</tr> -->
			<tr>
				<td width="20%" align="right">
				</td>
				<td  colspan="2"  class="qq_wx_email">
					<div class="form-group text_input_box">
						<label for="mboile_verification">QQ:</label>
						<input type="text" class="form-control" name="qq" id=""  placeholder="QQ" value="{{$user->qq}}" />
					</div>
					<div class="form-group text_input_box">
						<label for="mboile_verification">微信:</label>
						<input type="text" class="form-control " name="weixin" id=""  placeholder="微信" value="{{$user->weixin}}" />
					</div>
					<div class="form-group text_input_box">
						<label for="mboile_verification">emial:</label>
						<input type="text" class="form-control "  name="email" id=""  placeholder="emial" value="{{$user->email}}" />
					</div>
				</td>
			</tr>
			<tr>
				<td width="20%" align="right">
					公开联系方式:
				</td>
				<td colspan="2"  class="gklxfs" id="check_public">
					<div class="checkbox">
						<label>
							<input type="checkbox" name="public_mobile" {{$user->public_mobile ? 'checked' : ''}} />
							手机
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="public_qq" {{$user->public_qq ? 'checked' : ''}} />
							QQ号
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="public_weixin" {{$user->public_weixin ? 'checked' : ''}} />
							微信
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="public_email" {{$user->public_email ? 'checked' : ''}} />
							邮箱
						</label>
					</div>
				</td>
			</tr>
			<tr>
				<td width="20%" align="right">
					所在区域:
				</td>
				<td colspan="2" class="select_area">
					<div class="form_select_box">
						<select name="province" id="area_province" class="form-control">
							<option value="">请选择地区</option>
						@foreach ($area_provinces as $province)
							<option value="{{ $province->code }}" {{$user->province == $province->code ? 'selected' : ''}}>{{ $province->name }}</option>
						@endforeach
						</select>
					</div>
					<div class="form_select_box">
						<select name="city" id="area_city" class="form-control" style="{{isset($area_cities) ? '' : 'display: none'}}">
							@if(isset($area_cities))
								@foreach ($area_cities as $city)
									<option value="{{ $city->code }}" {{$user->city == $city->code ? 'selected' : ''}}>{{ $city->name }}</option>
								@endforeach
							@endif
						</select>
					</div>
					<div class="form_select_box">
						<select name="street" id="area_street" class="form-control" style="{{isset($area_streets) ? '' : 'display: none'}}">
							@if(isset($area_streets))
								@foreach ($area_streets as $street)
									<option value="{{ $street->code }}" {{$user->street == $street->code ? 'selected' : ''}}>{{ $street->name }}</option>
								@endforeach
							@endif
						</select>
					</div>
				</td>
			</tr>
			<tr>
				<td width="20%" align="right">
					生日:
				</td>
				<td width="40%">
					<div class="form-group">
						<input type="text" class="form-control" name="birthday" id="" placeholder="请输入您的生日例“1990-10-01”" value="{{$user->birthday}}">
					</div>
				</td>
				<td width="45%">
				</td>
			</tr>
			<tr>
				<td width="20%" align="right">
					性别:
				</td>
				<td width="40%" class="select_sex">
					<div class="radio">
						<label>
							<input type="radio" name="gender" id="blankRadio1"  checked="checked" value="男" aria-label="男" {{$user->gender == 'male' ? 'checked' : ''}} />
							男
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="gender" id="blankRadio1" value="女" aria-label="女" {{$user->gender == 'female' ? 'checked' : ''}} />
							女
						</label>
					</div>
				</td>
				<td width="45%">
				</td>
			</tr>
			<tr>
				<td width="20%" align="right">
					籍贯:
				</td>
				<td width="40%">
					<div class="form-group">
						<input type="text" class="form-control" name="hometown" id="" placeholder="请输入您的籍贯省市" value="{{$user->hometown}}" />
					</div>
				</td>
				<td width="45%">
				</td>
			</tr>
			<tr>
				<td width="20%" align="right">
					工种:
				</td>
				<td width="100%" colspan="2" class="select_job" id="select_job_td">
					<div class="form_select_box"></div>
						@foreach ($user_work_categories as $user_work_category)
						<div class="form_select_box">
							<select class="form-control" name="work_category_id[]">
								<option value="">请选工种</option>
								@foreach ($work_categories as $work_category)
									<option value="{{ $work_category->id }}" {{$user_work_category->id == $work_category->id ? 'selected' : ''}}>
										{{ $work_category->name }}
									</option>
								@endforeach
							</select>
							<a href="javascript:void(0)" class="delete_work_cateogry">X</a>
						</div>
						@endforeach
					
					<a href="javascript:void(0)" class="add_job_btn btnstyle_1" id="add_job_btn">
						添加
					</a>
					<div class="red_tx">
						*您能够干哪些类型的活，例如：厨师，耕种，有几种填几种
					</div>
				</td>
			</tr>
			<tr>
				<td width="20%" align="right">
					个人照片:
				</td>
				<td width="40%">
					<div class="form-group">
						<input type="file" class="g-u" id="J_UploaderBtn1" value="添加" name="image" >
						<ul id="J_UploaderQueue1"></ul>
					</div>
				</td>
				<td width="45%">
				</td>
			</tr>
			<tr>
				<td width="20%" align="right">
					学历证书:
				</td>
				<td width="40%">
					<div class="form-group">
						<input type="file" class="g-u" id="J_UploaderBtn2" value="添加" name="image" >
						<ul id="J_UploaderQueue2"></ul>
					</div>
				</td>
				<td width="45%">
				</td>
			</tr>
			<tr>
				<td width="20%" align="right">
					期望收入:
				</td>
				<td width="40%">
					<div class="form-group">
						<input type="text" class="form-control" name="expect_salary" value="{{$user->expect_salary}}" />
					</div>
				</td>
				<td width="45%">
					<p class="red_tx red_tx_text_more">
						*可以是数字,也可以是一个收入范围,例如200元一天，或50-100元一小时
					</p>
				</td>
			</tr>
			<tr>
				<td width="20%" align="right">
				</td>
				<td width="40%" colspan="2">
					<input type="submit" class="inputsub" value="保存修改" />
			</tr>
		</table>
		</from>
		<script type="text/javascript">
var validate = $("#register_mes_Modify").validate({
	debug: false, //调试模式取消submit的默认提交功能
	//errorClass: "label.error", //默认为错误的样式类为：error
	focusInvalid: false, //当为false时，验证无效时，没有焦点响应
	onkeyup: false,
	submitHandler: function(form) { //表单提交句柄,为一回调函数，带一个参数：form
		form.submit(); //提交表单
	},
	rules: {
		name: {
			required: true
		},
		mobile: {
			required: true,
			phone: true
		},
		qq: {
			number: true,
			minlength: 5
		},
		email: {
			email: true
		},
		qwsr:{
			required: true
		},
		address:{
			required:true
		},
		birthday:{
			required:true
		}
	},
	messages: {
		name: {
			required: "必填"
		},
		mobile: {
			required: "必填",
			phone: '请输入正确的电话号码'
		},
		qq: {
			number: 'QQ号不正确',
			minlength: 'QQ号不正确'
		},
		email: {
			email: '邮箱格式不正确'
		},
		qwsr:{
			required:'请填写你期望收入'
		},
		address:{
			required:'请输入您的籍贯地址'
		},
		birthday:{
			required:'请填写您的生日'
		}
		
	},
	errorPlacement: function(error, element) {                             //错误信息位置设置方法  
      error.appendTo( element.parent());                            //这里的element是录入数据的对象  
     }, 
});
jQuery.validator.addMethod("phone", function(value, element) {
	var length = value.length;
	var mobile = /^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/
	return this.optional(element) || (length == 11 && mobile.test(value));
}, "手机号码格式错误");
jQuery.validator.addMethod('selectNone',  
            function (element){
            	 alert("s")
            
}, "请选择至少一项！"); 

//添加工种
function  addnewGz(i){
	if($("[name='work_category_id[]']").length>4)
		return false;
	var _html='';
   _html+='<div class="form_select_box">';
   _html+='<select class="form-control" name="work_category_id[]" >';
   //循环此部分添加数据
  _html+='<option value="">';
  _html+='请选工种';
  _html+='</option>';
	@foreach ($work_categories as $work_category)
		_html+='<option value="{{ $work_category->id }}">';
		_html+='{{ $work_category->name }}';
		_html+='</option>';
	@endforeach
  //循环此部分添加数据  --end
	_html+='</select>';
	_html+='<a href="javascript:void(0)" class="delete_work_cateogry">X</a>';
	_html+='</div>';
  $('#select_job_td').find('.form_select_box').last().after(_html);
	$('.delete_work_cateogry').bind('click',function(){
		delGz(this);
	});
}
var job_i = 1;
$('#add_job_btn').bind('click',function(){
	addnewGz(job_i);
	job_i++;
});

//删除工种
function delGz(a){
	$(a).parent().remove();
}
$('.delete_work_cateogry').bind('click',function(){
	delGz(this);
});

//添加证书
$('#personphoto').bind('click',function(){
	  $("#personphoto_hide")[0].click()
	  $("#personphoto_hide").bind('change',function(){
	  	      var filepath = $(this).val();
                var extStart = filepath.lastIndexOf(".");
                var ext = filepath.substring(extStart, filepath.length).toUpperCase();
                if (ext != ".BMP" && ext != ".PNG" && ext != ".GIF" && ext != ".JPG" && ext != ".JPEG") {
                	alert("请上传图片格式")
                }else{
                	$("#personphoto_text").val(filepath)
                }
	  })
})
//添加学历
$('#qualifications_btn').bind('click',function(){
	$("#qualifications_hide")[0].click()
	  $("#qualifications_hide").bind('change',function(){
	  	      var filepath = $(this).val();
                var extStart = filepath.lastIndexOf(".");
                var ext = filepath.substring(extStart, filepath.length).toUpperCase();
                if (ext != ".BMP" && ext != ".PNG" && ext != ".GIF" && ext != ".JPG" && ext != ".JPEG") {
                	alert("请上传图片格式")
                }else{
                	$("#qualifications_text").val(filepath)
                }
	  })
})


$(function(){
	//get cities
	$("#area_province").change(function(){
		if($(this).val() == "")
		{
			$("#area_city").hide();
			return true;
		}
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
				$("#area_city").html(options).show();
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
});

</script>
<script src="//g.alicdn.com/kissy/k/1.4.8/seed-min.js" charset="utf-8"></script>
<script>
	var S = KISSY;
	S.use('kg/uploader/3.0.3/index,kg/uploader/3.0.3/themes/default/index,kg/uploader/3.0.3/themes/default/style.css', function (S, Uploader,DefaultTheme) {
	  //照片
	  var plugins = 'kg/uploader/3.0.3/plugins/auth/auth,' +
	          'kg/uploader/3.0.3/plugins/urlsInput/urlsInput,' +
	          'kg/uploader/3.0.3/plugins/proBars/proBars';

    S.use(plugins,function(S,Auth,UrlsInput,ProBars){
    	//身份证
    	var uploader = new Uploader('#J_UploaderBtn1',{
      	//处理上传的服务器端脚本路径
        action: "/my/upload-img?category=photo",
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
				$("#photo_image").val(url);
      });
			uploader.on('remove',function(ev){
				$("#photo_image").val('');
      });
			//学历证书
    	var uploader2 = new Uploader('#J_UploaderBtn2',{
      	//处理上传的服务器端脚本路径
        action: "/my/upload-img?category=diploma",
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
				$("#diploma_image").val(url);
      });
			uploader2.on('remove',function(ev){
				$("#diploma_image").val('');
      });
    });
  });
</script>
</div>
@endsection
