@extends('base')

@section('content')

	<link href="{{ asset('/css/works.css') }}" rel="stylesheet">
	<link href="{{ asset('/js/jquery-ui/jquery-ui.css') }}" rel="stylesheet">
	<script type="text/javascript" src="{{ asset('/js/jquery-ui/jquery-ui.js') }}"></script>
	<div class="body_content">
		<form class="form-horizontal" id="create_form" role="form" method="POST" action="{{ url('/works/'.$work->id) }}">
			<input type="hidden" name="area_name" id="area_name" value="{{$work->area_name}}" />
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="_method" value="PUT">
			<div class="new_work">
				<div class="row">
					<div class="title">
						<p class="require">*</p>标题：
					</div>
					<div class="input">
						<input type="text" name="title" class="text address_text" value="{{$work->title}}" />
						<span class="error">
							{{(count($errors) > 0 && $errors->default->has('title')) ? $errors->default->get('title')[0] : ''}}
						</span>
					</div>
				</div>
				<div class="row">
					<div class="title">
						<p class="require">*</p>行业：
					</div>
					<div class="input">
						<select name="industry" id="industry" class="form-control">
							<option value="">请选择行业</option>
							@foreach ($industries as $industry)
								<option value="{{$industry->id}}" {{$work->industry_id == $industry->id ? 'selected' : ''}}>{{ $industry->full_name }}</option>
							@endforeach
						</select>
						<span class="error">
							{{(count($errors) > 0 && $errors->default->has('industry')) ? $errors->default->get('industry')[0] : ''}}
						</span>
					</div>
				</div>
				<div class="row">
					<div class="title">
						<p class="require">*</p>工作工种：
					</div>
					<div class="input">
						<select name="work_category" id="work_category" class="form-control">
							<option value="">请选择工种</option>
							@foreach ($work_categories as $work_category)
								<option value="{{ $work_category->id }}" {{$work->work_category_id == $work_category->id ? 'selected' : ''}}>{{ $work_category->full_name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="row">
					<div class="title">
						<p class="require">*</p>工作区域：
					</div>
					<div class="input">
						<select name="area_province" id="area_province" class="form-control">
							<option value="">请选择地区</option>
							@foreach ($area_provinces as $province)
								<option value="{{ $province->code }}" {{$work->province == $province->code ? 'selected' : ''}}>{{ $province->name }}</option>
							@endforeach
						</select>
						<select name="area_city" id="area_city" class="form-control" style="{{isset($area_cities) ? '' : 'display: none'}}">
							@if(isset($area_cities))
								@foreach ($area_cities as $city)
									<option value="{{ $city->code }}" {{$work->city == $city->code ? 'selected' : ''}}>{{ $city->name }}</option>
								@endforeach
							@endif
						</select>
						<select name="area_street" id="area_street" class="form-control" style="{{isset($area_streets) ? '' : 'display: none'}}">
							@if(isset($area_streets))
								@foreach ($area_streets as $street)
									<option value="{{ $street->code }}" {{$work->street == $street->code ? 'selected' : ''}}>{{ $street->name }}</option>
								@endforeach
							@endif
						</select>
						<span class="error">
							{{(count($errors) > 0 && $errors->default->has('area')) ? $errors->default->get('area')[0] : ''}}
						</span>
					</div>
				</div>
				<div class="row">
					<div class="title">
						详细地址：
					</div>
					<div class="input">
						<input type="text" name="address" class="text address_text" value="{{$work->address}}" />
						<span class="error">
							{{(count($errors) > 0 && $errors->default->has('address')) ? $errors->default->get('address')[0] : ''}}
						</span>
					</div>
				</div>
				<div class="row">
					<div class="title">
						联系人：
					</div>
					<div class="input">
						<input type="text" name="contacts" class="text address_text" value="{{$work->contacts}}" />
					</div>
				</div>
				<div class="row">
					<div class="title">
						联系方式：
					</div>
					<div class="input">
						<input type="text" name="mobile" class="text address_text" value="{{$work->mobile}}" />
					</div>
				</div>
				<div class="row">
					<div class="title">
						服务报酬：
					</div>
					<div class="input">
						<input type="text" name="price" class="text" id="price_txt" value="{{$work->price}}" />/天
						<label><input type="checkbox" name="price_negotiable" value="{{$work->price_negotiable}}" id="price_negotiable"/>面议</label>
					</div>
				</div>
				
				<div class="row">
					<div class="title">
						服务时间：
					</div>
					<div class="input">
						<label>从</label>
						<input type="text" name="start_at" class="text date" id="start_at" value="{{$work->start_at}}" />
						<label>到</label>
						<input type="text" name="end_at" class="text date" id="end_at" value="{{$work->end_at}}" />
						<label><input type="checkbox" name="date_long" value="1" id="date_long" {{is_null($work->start_at) && is_null($work->end_at) ? 'checked' : ''}}/>长期</label>
					</div>
					<div class="notice">
					</div>
				</div>
				<div class="row">
					<div class="title">
						服务人数：
					</div>
					<div class="input">
						<input type="text" name="people_number" class="text" id="people_number" value="{{$work->people_number}}" />人
						<span class="error">
							{{(count($errors) > 0 && $errors->default->has('people_number')) ? $errors->default->get('people_number')[0] : ''}}
						</span>
					</div>
				</div>
				<div class="row content_row">
					<div class="title">
						服务内容：
					</div>
					<div class="input">
						<textarea name="content" class="content">{{$work->content}}</textarea>
					</div>
					<div class="clearfix">
						
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
	alert('保存成功！');
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
				if(element.is("select"))
				{
					element.parent().after(error);
				}
				else
					element.after(error);
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
	      	required: "必填项"
	      },
				address:{
					required: "必填项"
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
		
		//price
		$("#price_negotiable").change(function(){
			if($(this).prop("checked"))
			{
				$("#price_txt").attr("readonly", true).css("color", "#EEEEEE");
			}
			else
			{
				$("#price_txt").attr("readonly", false).css("color", "inherit");
			}
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
		
		$("#date_long").change(function(){
			if($(this).prop("checked"))
			{
				$("#start_at").attr("readonly", true).css("color", "#EEEEEE");
				$("#end_at").attr("readonly", true).css("color", "#EEEEEE");
			}
			else
			{
				$("#start_at").attr("readonly", false).css("color", "inherit");
				$("#end_at").attr("readonly", false).css("color", "inherit");
			}
		});
	});
	</script>
@endsection
