@extends('admin.base')

@section('content')
  <div class="pageheader">
    <h2><i class="fa fa-envelope"></i> 发布信息管理 <span>编辑找活信息</span></h2>
  </div>
  
  <div class="contentpanel">
		<div class="row">
			<div class="col-md-13">
				<div class="panel panel-primary">
					<div class="panel-body panel-body-nopadding">
						
						<form class="form-horizontal" id="register_form" role="form" method="POST" action="/admin/staffs/{{$data->id}}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}" />
							<input type="hidden" name="_method" value="PUT" />
							<input type="hidden" name="area_name" id="area_name" value="{{$data->area_name}}" />
		            <div class="form-group">
								  <label for="disabledinput" class="col-sm-3 control-label">用户</label>
								  <div class="col-sm-6">
										<select name="user_id"class="form-control">
											@foreach ($present_users as $user)
												<option value="{{ $user->id }}" {{$data->user_id == $user->id ? 'selected' : ''}}>{{$user->id}}:{{ $user->name }}</option>
											@endforeach
										</select>
								  </div>
								</div>
            
		            <div class="form-group">
								  <label for="disabledinput" class="col-sm-3 control-label">标题</label>
								  <div class="col-sm-6">
									 <input type="text" class="form-control" placeholder="标题" name="title" value="{{$data->title}}">
								  </div>
								</div>
            
		            <div class="form-group">
								  <label for="disabledinput" class="col-sm-3 control-label">工种</label>
								  <div class="col-sm-6">
										<select name="work_category"class="form-control">
											@foreach ($work_categories as $work_category)
												<option value="{{ $work_category->id }}" {{$work_category->id == $data->work_category_id ? 'selected' : ''}}>{{$work_category->up_id == 0 ? '' : '--'}}{{ $work_category->name }}</option>
											@endforeach
										</select>
								  </div>
								</div>
            
		            <div class="form-group">
								  <label for="disabledinput" class="col-sm-3 control-label">期望工作区域</label>
								  <div class="col-sm-6">
				 						<select name="area_province" id="area_province" class="form-control">
				 							<option value="">请选择地区</option>
				 							@foreach ($area_provinces as $province)
				 							<option value="{{ $province->code }}" {{$data->province == $province->code ? 'selected' : ''}}>{{ $province->name }}</option>
				 							@endforeach
				 						</select>
										<select name="area_city" id="area_city" class="form-control" style="{{isset($area_cities) ? '' : 'display: none'}}">
											@if(isset($area_cities))
												@foreach ($area_cities as $city)
													<option value="{{ $city->code }}" {{$data->city == $city->code ? 'selected' : ''}}>{{ $city->name }}</option>
												@endforeach
											@endif
										</select>
										<select name="area_street" id="area_street" class="form-control" style="{{isset($area_streets) ? '' : 'display: none'}}">
											@if(isset($area_streets))
												@foreach ($area_streets as $street)
													<option value="{{ $street->code }}" {{$data->street == $street->code ? 'selected' : ''}}>{{ $street->name }}</option>
												@endforeach
											@endif
										</select>
								  </div>
								</div>
            
		            <div class="form-group">
								  <label for="disabledinput" class="col-sm-3 control-label">详细地址</label>
								  <div class="col-sm-6">
 								  	<input type="text" class="form-control" placeholder="详细地址" name="address" value="{{$data->address}}" />
									 	<div id="map_box" style="width: 500px; height: 400px; display: none">
									 		<div id="allmap"></div>
										</div>
								  </div>
								</div>
								
		            <div class="form-group">
								  <label for="disabledinput" class="col-sm-3 control-label">联系人</label>
								  <div class="col-sm-6">
									 <input type="text" class="form-control" placeholder="联系人" name="contacts" value="{{$data->contacts}}">
								  </div>
								</div>
								
		            <div class="form-group">
								  <label for="disabledinput" class="col-sm-3 control-label">联系方式</label>
								  <div class="col-sm-6">
									 <input type="text" class="form-control" placeholder="联系方式" name="mobile" value="{{$data->mobile}}">
								  </div>
								</div>
            
		            <div class="form-group">
								  <label for="disabledinput" class="col-sm-3 control-label">可工作时间</label>
								  <div class="col-sm-6">
									 <input type="text" id="start_at" class="form-control" placeholder="可工作时间" name="start_at" value="{{$data->start_at}}">
									 <input type="text" id="end_at" class="form-control" placeholder="可工作时间" name="end_at" value="{{$data->end_at}}">
								  </div>
								</div>
								
		            <div class="form-group">
								  <label for="disabledinput" class="col-sm-3 control-label">详细内容</label>
								  <div class="col-sm-6">
										<script id="editor" type="text/plain" style="width:1024px;height:500px;"></script>
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
	
@endsection

@section('js')
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=lXeAbeMF4NG6YczveCyamS6T"></script>
	<style type="text/css" media="screen">
		#allmap{width: 500px;height: 400px;overflow: hidden;margin:0;font-family:"微软雅黑";}
	</style>
	<script type="text/javascript">
		var map = new BMap.Map("allmap");  // 创建Map实例
		$(function(){
			$("[name=address]").click(function(){
				if($("#area_city").val() == null || $("#area_city").val() == "")
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
<script type="text/javascript" charset="utf-8" src="/js/admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/js/admin/ueditor/ueditor.all.js"> </script>

<script type="text/javascript">
	$(function(){
		//编辑器
	
		//实例化编辑器
	  //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
	  var ue = UE.getEditor(
			'editor',
			{
	      //这里可以选择自己需要的工具按钮名称,此处仅选择如下五个
	      //toolbars:[['FullScreen', 'Source', 'Undo', 'Redo','Bold','test','simpleupload']],
	      //focus时自动清空初始化时的内容
	      autoClearinitialContent:true,
	      //关闭字数统计
	      wordCount:false,
	      //关闭elementPath
	      elementPathEnabled:false,
				//宽度
				initialFrameWidth:660,
	      //默认的编辑区域高度
	      initialFrameHeight:300,
				textarea:'content',
				serverUrl:'/admin/ueditor'
		});
		ue.addListener("ready", function () {
			ue.setContent('{!!$data->content!!}');
		});
		
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
		
		$( "#start_at" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
			dateFormat: 'yy-mm-dd',
      onClose: function( selectedDate ) {
        $( "#end_at" ).datepicker( "option", "minDate", selectedDate );
      }
    });
		
		$( "#end_at" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
			dateFormat: 'yy-mm-dd',
      onClose: function( selectedDate ) {
        $( "#start_at" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
	});
</script>
@endsection