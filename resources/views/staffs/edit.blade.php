@extends('base')

@section('content')

	<link href="{{ asset('/css/works.css') }}" rel="stylesheet">
	<link href="{{ asset('/js/jquery-ui/jquery-ui.css') }}" rel="stylesheet">
	<script type="text/javascript" src="{{ asset('/js/jquery-ui/jquery-ui.js') }}"></script>
	<div class="body_content">
		<form class="form-horizontal" id="create_form" role="form" method="POST" action="{{ url('/staffs/'.$staff->id) }}">
			<input type="hidden" name="area_name" id="area_name" value="{{$staff->area_name}}" />
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="_method" value="PUT">
			<div class="new_staff">
				<div class="row">
					<div class="title">
						<p class="require">*</p>标题：
					</div>
					<div class="input">
						<input type="text" name="title" class="text address_text" value="{{$staff->title}}" />
					</div>
				</div>
				<div class="row">
					<div class="title">
						<p class="require">*</p>工种：
					</div>
					<div class="input">
						<select name="work_category"class="form-control">
							@foreach ($work_categories as $work_category)
								<option value="{{ $work_category->id }}" {{$staff->work_category_id == $work_category->id ? 'selected' : ''}}>{{$work_category->up_id == 0 ? '' : '--'}}{{ $work_category->name }}</option>
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
								<option value="{{ $province->code }}" {{$staff->province == $province->code ? 'selected' : ''}}>{{ $province->name }}</option>
							@endforeach
						</select>
						<select name="area_city" id="area_city" class="form-control" style="{{isset($area_cities) ? '' : 'display: none'}}">
							@if(isset($area_cities))
								@foreach ($area_cities as $city)
									<option value="{{ $city->code }}" {{$staff->city == $city->code ? 'selected' : ''}}>{{ $city->name }}</option>
								@endforeach
							@endif
						</select>
						<select name="area_street" id="area_street" class="form-control" style="{{isset($area_streets) ? '' : 'display: none'}}">
							@if(isset($area_streets))
								@foreach ($area_streets as $street)
									<option value="{{ $street->code }}" {{$staff->street == $street->code ? 'selected' : ''}}>{{ $street->name }}</option>
								@endforeach
							@endif
						</select>
					</div>
				</div>
				<div class="row">
					<div class="title">
						<p class="require">*</p>详细地址：
					</div>
					<div class="input">
						<input type="text" name="address" class="text address_text" value="{{$staff->address}}" />
					</div>
				</div>
				<div class="row">
					<div class="title">
						联系人：
					</div>
					<div class="input">
						<input type="text" name="contacts" class="text address_text" value="{{$staff->contacts}}" />
					</div>
				</div>
				<div class="row">
					<div class="title">
						联系方式：
					</div>
					<div class="input">
						<input type="text" name="mobile" class="text address_text" value="{{$staff->mobile}}" />
					</div>
				</div>
				<div class="row">
					<div class="title">
						可工作时间：
					</div>
					<div class="input">
						<label>从</label>
						<input type="text" name="start_at" id="start_at" class="text" value="{{$staff->start_at}}" />
						<label>到</label>
						<input type="text" name="end_at" id="end_at" class="text" value="{{$staff->end_at}}" />
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
					<input type="submit" class="next_btn" value="保存修改" />
				</div>
			</div>
		</form>
	</div>
	@if(isset($success))
	<script type="text/javascript">
	alert('信息发布成功！');
	</script>
	@endif

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
