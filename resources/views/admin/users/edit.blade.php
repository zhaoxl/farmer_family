@extends('admin.base')

@section('content')
  <div class="pageheader">
    <h2><i class="fa fa-envelope"></i> 用户 <span>所有用户</span></h2>
  </div>
  
  <div class="contentpanel">
		<div class="row">
			<div class="col-md-13">
				<div class="panel panel-primary">
					<div class="panel-body panel-body-nopadding">
						
						<form class="form-horizontal" id="register_form" role="form" method="POST" action="/admin/users/{{$data->id}}">
							<input type="hidden" name="_method" value="PUT" />
							<input type="hidden" name="_token" value="{{ csrf_token() }}" />
							<input type="hidden" id="area_name" name="area_name" value="{{$data->area_name}}"/>
					            <div class="form-group">
					              <label class="col-sm-3 control-label">ID</label>
					              <div class="col-sm-6">
					              <label class="control-label">{{$data->id}}</label>
					              </div>
					            </div>
            
					            <div class="form-group">
											  <label for="disabledinput" class="col-sm-3 control-label">手机号</label>
											  <div class="col-sm-6">
					              	<label class="control-label">{{$data->mobile}}</label>
											  </div>
											</div>
            
					            <div class="form-group">
											  <label for="disabledinput" class="col-sm-3 control-label">姓名</label>
											  <div class="col-sm-6">
												 <input type="text" class="form-control" placeholder="姓名" name="name" value="{{$data->name}}">
											  </div>
											</div>
            
					            <div class="form-group">
											  <label for="disabledinput" class="col-sm-3 control-label">Email</label>
											  <div class="col-sm-6">
												 <input type="text" class="form-control" placeholder="Email" name="email" value="{{$data->email}}">
											  </div>
											</div>
            
					            <div class="form-group">
											  <label for="disabledinput" class="col-sm-3 control-label">QQ</label>
											  <div class="col-sm-6">
												 <input type="text" class="form-control" placeholder="QQ" name="qq" value="{{$data->qq}}">
											  </div>
											</div>
            
					            <div class="form-group">
											  <label for="disabledinput" class="col-sm-3 control-label">微信</label>
											  <div class="col-sm-6">
												 <input type="text" class="form-control" placeholder="微信" name="weixin" value="{{$data->weixin}}">
											  </div>
											</div>
            
					            <div class="form-group">
											  <label for="disabledinput" class="col-sm-3 control-label">公开联系方式</label>
											  <div class="col-sm-6">
													<div class="checkbox block" style="width: 100px; float: left"><label><input type="checkbox" name="public_mobile" class="ck" {{$data->public_mobile ? 'checked' : ''}}>手机</label></div>
													<div class="checkbox block" style="width: 100px; float: left"><label><input type="checkbox" name="public_qq" class="ck" {{$data->public_qq ? 'checked' : ''}}>QQ号</label></div>
													<div class="checkbox block" style="width: 100px; float: left"><label><input type="checkbox" name="public_weixin" class="ck" {{$data->public_weixin ? 'checked' : ''}}>微信</label></div>
													<div class="checkbox block" style="width: 100px; float: left"><label><input type="checkbox" name="public_email" class="ck" {{$data->public_email ? 'checked' : ''}}>邮箱</label></div>
											  </div>
											</div>
            
					            <div class="form-group">
											  <label for="disabledinput" class="col-sm-3 control-label">所在区域</label>
											  <div class="col-sm-6">
							 						<select name="province" id="area_province" class="form-control">
							 							<option value="">请选择地区</option>
							 							@foreach ($area_provinces as $province)
							 							<option value="{{ $province->code }}" {{$data->province == $province->code ? 'selected' : ''}}>{{ $province->name }}</option>
							 							@endforeach
							 						</select>
													<select name="city" id="area_city" class="form-control" style="{{isset($area_cities) ? '' : 'display: none'}}">
														@if(isset($area_cities))
															@foreach ($area_cities as $city)
																<option value="{{ $city->code }}" {{$data->city == $city->code ? 'selected' : ''}}>{{ $city->name }}</option>
															@endforeach
														@endif
													</select>
													<select name="street" id="area_street" class="form-control" style="{{isset($area_streets) ? '' : 'display: none'}}">
														@if(isset($area_streets))
															@foreach ($area_streets as $street)
																<option value="{{ $street->code }}" {{$data->street == $street->code ? 'selected' : ''}}>{{ $street->name }}</option>
															@endforeach
														@endif
													</select>
											  </div>
											</div>
            
					            <div class="form-group">
											  <label for="disabledinput" class="col-sm-3 control-label">生日</label>
											  <div class="col-sm-6">
												 <div class="input-group">
					                 <input type="text" id="datepicker" placeholder="yyyy-mm-dd" class="form-control hasDatepicker" name="birthday" value="{{$data->birthday}}">
					                 <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
					               </div>
											  </div>
											</div>
            
					            <div class="form-group">
											  <label for="disabledinput" class="col-sm-3 control-label">性别</label>
											  <div class="col-sm-6">
												 <input type="text" class="form-control" placeholder="性别" name="gender" value="{{$data->gender}}">
											  </div>
											</div>
            
					            <div class="form-group">
											  <label for="disabledinput" class="col-sm-3 control-label">籍贯</label>
											  <div class="col-sm-6">
												 <input type="text" class="form-control" placeholder="籍贯" name="hometown" value="{{$data->hometown}}">
											  </div>
											</div>
            
					            <div class="form-group">
											  <label for="disabledinput" class="col-sm-3 control-label">期望收入</label>
											  <div class="col-sm-6">
												 <input type="text" class="form-control" placeholder="期望收入" name="expect_salary" value="{{$data->expect_salary}}">
											  </div>
											</div>
            
					            <div class="form-group">
											  <label for="disabledinput" class="col-sm-3 control-label">工种</label>
											  <div class="col-sm-6" id="select_job_td">
													<div class="form_select_box">
													</div>
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
													<a href="javascript:void(0)" class="btn btn-default" id="add_job_btn">
														添加
													</a>
											  </div>
											</div>
					            <div class="form-group">
											  <label for="disabledinput" class="col-sm-3 control-label"></label>
											  <div class="col-sm-6">
													<input type="submit" class="btn btn-primary" value="保存" />
											  </div>
											</div>
					          </form>
          
					        </div>
		    </div>
			</div>
		</row>
  </div>
	<style type="text/css" media="screen">
		.form_select_box{width: 117px; float: left;}
		.form_select_box .form-control{width: 80%; float: left; }
		.form_select_box .delete_work_cateogry{float: left; margin: 10px auto auto 5px;}
		.photo{max-width: 400px; max-height: 400px;}
	</style>
@endsection


@section('js')
<script type="text/javascript">
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

		//生日
		jQuery('#datepicker').datepicker();
		
	});
	
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
</script>
@endsection