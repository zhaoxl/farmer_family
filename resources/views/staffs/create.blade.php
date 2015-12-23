@extends('base')

@section('content')

	<link href="{{ asset('/css/works.css') }}" rel="stylesheet">
	<link href="{{ asset('/js/jquery-ui/jquery-ui.css') }}" rel="stylesheet">
	<script type="text/javascript" src="{{ asset('/js/jquery-ui/jquery-ui.js') }}"></script>
	<div class="body_content">
		<form class="form-horizontal" id="create_form" role="form" method="POST" action="{{ url('/staffs') }}">
			<input type="hidden" name="area_name" id="area_name" />
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="new_staff">
				<div class="row">
					<div class="title">
						<p class="require">*</p>标题：
					</div>
					<div class="input">
						<input type="text" name="title" class="text address_text" />
					</div>
				</div>
				<div class="row">
					<div class="title">
						<p class="require">*</p>工种：
					</div>
					<div class="input">
						<select name="work_category"class="form-control">
							@foreach ($work_categories as $work_category)
								<option value="{{ $work_category->id }}">{{$work_category->up_id == 0 ? '' : '--'}}{{ $work_category->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="row">
					<div class="title">
						<p class="require">*</p>期望工作区域：
					</div>
					<div class="input">
						<select name="area_province" id="area_province" class="form-control">
							<option value="">请选择地区</option>
							@foreach ($area_provinces as $province)
								<option value="{{ $province->code }}">{{ $province->name }}</option>
							@endforeach
						</select>
						<select name="area_city" id="area_city" class="form-control" style="display: none"></select>
						<select name="area_street" id="area_street" class="form-control" style="display: none"></select>
					</div>
				</div>
				<div class="row">
					<div class="title">
						<p class="require">*</p>详细地址：
					</div>
					<div class="input">
						<input type="text" name="address" class="text address_text" />
						<div id="map_box" style="width: 500px; height: 400px; margin-left: 154px">
							<div id="allmap"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="title">
						联系人：
					</div>
					<div class="input">
						<input type="text" name="contacts" class="text address_text" value="{{$contacts}}" />
					</div>
				</div>
				<div class="row">
					<div class="title">
						联系方式：
					</div>
					<div class="input">
						<input type="text" name="mobile" class="text address_text" value="{{$mobile}}" />
					</div>
				</div>
				<div class="row">
					<div class="title">
						可工作时间：
					</div>
					<div class="input">
						<label>从</label>
						<input type="text" name="start_at" id="start_at" class="text" />
						<label>到</label>
						<input type="text" name="end_at" id="end_at" class="text" />
					</div>
					<div class="notice">
						* 请在日历表上点击选择所有您空闲可以接活的日期，选择完后必须点”保存“才可以保存您的空闲日期记录
					</div>
				</div>
				<div class="next">
			
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<input type="submit" class="next_btn" value="下一步" />
				</div>
			</div>
		</form>
	</div>
	@if(isset($success))
	<script type="text/javascript">
	alert('信息发布成功！');
	</script>
	@endif
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=lXeAbeMF4NG6YczveCyamS6T"></script>
	<style type="text/css" media="screen">
		#allmap{width: 500px;height: 400px;overflow: hidden;margin:0;font-family:"微软雅黑";}
	</style>
	<script type="text/javascript">
		var map = new BMap.Map("allmap");  // 创建Map实例
		$(function(){
			$("[name=address]").click(function(){
				if($("#area_city").val() == "")
				{
					return false;
				}
				$("#map_box").show();
				map.centerAndZoom($("#area_city").find("option:selected").text(), 12);      // 初始化地图,用城市名设置地图中心点
				//单击获取点击的经纬度
				var geoc = new BMap.Geocoder();    

				map.addEventListener("click", function(e){
					var pt = e.point;
					geoc.getLocation(pt, function(rs){
						var addComp = rs.addressComponents;
						$("[name=address]").val(addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber);
						$("#map_box").hide().blur();
					});        
				});
			});
			
		});
	</script>
	
	<script type="text/javascript" src="{{ asset('/js/jquery.validate.min.js') }}" ></script>
	<script>
		var validate = $("#create_form").validate({
	  	debug: false, //调试模式取消submit的默认提交功能   
	    //errorClass: "label.error", //默认为错误的样式类为：error   
	    focusInvalid: false, //当为false时，验证无效时，没有焦点响应  
	    onkeyup: false,
	    submitHandler: function(form){   //表单提交句柄,为一回调函数，带一个参数：form   
	    	form.submit();   //提交表单   
	    },   
			errorPlacement: function(error, element) {
				$("#create_form input.error").each(function() {
					if ($(element).is(":checkbox"))
					{
						$(element).parent().css("color", "red");
					}
					else
					{
						$(element).attr("placeholder", $(error).html());
					}
				});
			},          
      rules:{
				title:{
					required: true
				},
				area_province:{
					area: true
				},
				area_city:{
					area: true
				},
				area_street:{
					area: true
				} ,
				address:{
					required: true
				}
      },
      messages:{
	      title:{
	      	required: "请输入标题"
	      },
				address:{
					required: "请输入详细地址"
				}
     	}
  	});    
    jQuery.validator.addMethod("area", function(value, element) {
    	if(value == "") return false;
			return true;
		}, "请选择地区");  
	
	
	</script>
	
	<script type="text/javascript">
	$(function(){
		//get cities
		$("#area_province").change(function(){
			if($(this).val() == "")
			{
				$("#area_city").val("").hide();
				$("#area_street").val("").hide();
				return false;
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
					$("#area_street").html('').hide();
				}
			});
		});
	
		//get streets
		$("#area_city").change(function(){
			if($(this).val() == "")
			{
				$("#area_street").val("").hide();
				return false;
			} 
			
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
		
		//date
    $( "#start_at" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#end_at" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#end_at" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#start_at" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
	});
	</script>
@endsection
