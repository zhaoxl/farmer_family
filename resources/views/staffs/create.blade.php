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
						标题：
					</div>
					<div class="input">
						<input type="text" name="title" class="text address_text" />
					</div>
				</div>
				<div class="row">
					<div class="title">
						期望工作区域：
					</div>
					<div class="input">
						<select name="area_province" id="area_province" class="form-control">
							<option value="">请选择地区</option>
							@foreach ($area_provinces as $province)
								<option value="{{ $province->code }}">{{ $province->name }}</option>
							@endforeach
						</select>
						<select name="area_city" id="area_city" class="form-control"></select>
						<select name="area_street" id="area_street" class="form-control"></select>
					</div>
				</div>
				<div class="row">
					<div class="title">
						详细地址：
					</div>
					<div class="input">
						<input type="text" name="address" class="text address_text" />
					</div>
				</div>
				<div class="row">
					<div class="title">
						期望工作工种：
					</div>
					<div class="input">
						<select name="work_category" id="work_category" class="form-control">
							<option value="">请选择工种</option>
							@foreach ($work_categories as $work_category)
								<option value="{{ $work_category->id }},{{$work_category->industry_name}}">{{ $work_category->industry_name }}</option>
							@endforeach
						</select>
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
