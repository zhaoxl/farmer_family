@extends('base')

@section('content')

	<link href="{{ asset('/css/works.css') }}" rel="stylesheet">
	<div class="body_content">
		<form class="form-horizontal" id="register_form" role="form" method="POST" action="{{ url('/auth/register') }}">
			<input type="hidden" name="area_name" id="area_name" />
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="new_staff">
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
						期望工作工种：
					</div>
					<div class="input">
						<select name="work_category" id="work_category" class="form-control">
							<option value="">请选择工种</option>
							@foreach ($work_categories as $work_category)
								<option value="{{ $province->code }}">{{ $province->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
		</form>
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
	});
	</script>
@endsection
