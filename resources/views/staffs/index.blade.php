@extends('base')

@section('content')
	<link href="{{ asset('/css/works.css') }}" rel="stylesheet">
	<div class="left_nav">
		<ul>
			<li style="border-top: none;" class="">
				<a href="/works">
					雇人信息
				</a>
			</li>
			<li class="current">
				<a href="/staffs">
					找活信息
				</a>
			</li>
		</ul>
		<div class="left_nav_bc"></div>
	</div>
	<div class="right">
		<div class="search">
			<form action="" method="get" accept-charset="utf-8">
				<input type="hidden" name="day" value="{{\Request::get('day')}}" />
				<div class="row date_filter">
					<span class="title">信息发布日期：</span>
					<span><a href="/staffs" class="{{empty(Request::get('day')) ? 'current' : ''}}">全部</a></span>
					<span><a href="?day=1" class="{{Request::get('day') == 1 ? 'current' : ''}}">今天</a></span>
					<span><a href="?day=7" class="{{Request::get('day') == 7 ? 'current' : ''}}">一周内</a></span>
					<span><a href="?day=14" class="{{Request::get('day') == 14 ? 'current' : ''}}">2周内</a></span>
					<span><a href="?day=30" class="{{Request::get('day') == 30 ? 'current' : ''}}">1个月内</a></span>
					<span><a href="?day=60" class="{{Request::get('day') == 60 ? 'current' : ''}}">2个月内</a></span>
				</div>
				<div class="row">
					<div class="input">
						<div class="title">
							服务类型
						</div>
						<select name="category_id" id="category_id" class="form-control">
							<option value="">请选择服务类型</option>
							@foreach ($work_categories as $work_category)
								<option value="{{ $work_category->id }}" {{Request::get('category_id') == $work_category->id ? 'selected' : ''}}>{{ $work_category->full_name }}</option>
							@endforeach
						</select>
					</div>
					<div class="input">
						<div class="title">
							所在区域
						</div>
						<select name="area_province" id="area_province" class="form-control">
							<option value="">请选择地区</option>
						@foreach ($area_provinces as $province)
							<option value="{{ $province->code }}" {{Request::get('area_province') == $province->code ? 'selected' : ''}}>{{ $province->name }}</option>
						@endforeach
						</select>
						<select name="area_city" id="area_city" class="form-control" style="{{isset($area_cities) ? '' : 'display: none'}}">
							@if(isset($area_cities))
								@foreach ($area_cities as $city)
									<option value="{{ $city->code }}" {{Request::get('area_city') == $city->code ? 'selected' : ''}}>{{ $city->name }}</option>
								@endforeach
							@endif
						</select>
					</div>
				</div>
				<div class="row">
					<div class="input">
						<div class="title">
							工人性别
						</div>
						<label class="gender"><input type="radio" name="gender" value="" {{Request::get('gender') == '' ? 'checked' : ''}}>&nbsp;&nbsp;不限</label>
						<label class="gender"><input type="radio" name="gender" value="male" {{Request::get('gender') == 'male' ? 'checked' : ''}}>&nbsp;&nbsp;男</label>
						<label class="gender"><input type="radio" name="gender" value="fmale" {{Request::get('gender') == 'fmale' ? 'checked' : ''}}>&nbsp;&nbsp;女</label>
					</div>
					<div class="input">
						<div class="title">
							工人年龄
						</div>
						<input type="text" class="field age" name="age_start" value="{{Request::get('age_start')}}"/>
						<div class="age_label">岁到</div>
						<input type="text" class="field age" name="age_end" value="{{Request::get('age_end')}}"/>
					</div>
					<input type="submit" class="submit" value="" />
				</div>
			</form>
		</div>
		<div class="list">
			@foreach ($staffs as $staff)
			<div class="item">
				<div class="title">
					<span class="name">
						发布日期：{{date('Y-m-d', strtotime($staff->created_at))}}
					</span>
					<span class="stars">
						好评度：<span class="star star{{ceil($staff->starCount())}}"></span>
					</span>
					<span class="evaluate">
						<a class="evaluate_open" data-id="{{$staff->id}}" href="#evaluate">我要点评</a>
					</span>
				</div>
				<div class="descs">
					<span>姓名：{{$staff->name}}</span>
					<span>所在区域：{{$staff->area_name}}</span>
					<span>服务类型：{{$staff->work_category_name}}</span>
					<span>工种：收割、耕种、挖掘</span>
				</div>
				<div class="descs">
					<span>年龄：{{$staff->age}}</span>
					<span>性别：{{$staff->gender == 'm' ? '男' : '女'}}</span>
					<span>籍贯：{{$staff->home_twon}}</span>
				</div>
				<div class="descs">
					<span>手机号：{{$staff->mobile}}</span>
					<span>QQ：{{$staff->qq}}</span>
					<span>微信：{{$staff->weixin}}</span>
				</div>
				<div class="more">
					<a href="/staffs/{{$staff->id}}" target="_blank">查看详情>></a>
				</div>
			</div>
			@endforeach
		</div>
		{!! with(new App\Providers\CustomPaginationLinks($staffs))->render() !!}
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>
	
	<div class="evaluate_box" style="display: none">
		<input type="hidden" id="evaluate_item_id" />
		<label class="star_title">请您评分：</label><div id="star" class="star_raty"></div>
		<textarea id="star_content" class="star_content" style="color: #AAAAAA; resize: none;">请写下对这条信息的感受吧。</textarea>
		<input id="evaluate_submit" type="button" value="提交点评" class="submit" />
		<input id="evaluate_cancel" type="button" value="取消点评" class="cancel" />
		<div class="status">正在提交...</div>
	</div>
	<script src="/js/jquery.raty.js" type="text/javascript" charset="utf-8"></script>
	<script src="/js/jquery-ui/jquery-ui.js" type="text/javascript" charset="utf-8"></script>
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
		
		
		//star
		$('#star').raty({ score: 3 });
		$("#star_content").focus(function(){
			var _this = $(this);
			if(_this.val() == "请写下对这条信息的感受吧。")
			{
				_this.val("").css("color", "#000000");
			}
		});
		
		$("#star_content").blur(function(){
			var _this = $(this);
			if(_this.val() == "")
			{
				_this.val("请写下对这条信息的感受吧。").css("color", "#AAAAAA");
			}
		});
		
		$("#evaluate_cancel").click(function(){
			$(".evaluate_box").dialog("close");
		});
		
		$(".evaluate_open").click(function(){
			var id = $(this).attr("data-id");
			$("#evaluate_item_id").val(id);
			$(".evaluate_box").dialog();
		});
		
		$("#evaluate_submit").click(function(){
			if($("#star_content").val() == "请写下对这条信息的感受吧。")
			{
				return false;
			}
			$(".evaluate_box .status").show();
			$.ajax({
				url: '/staffs/evaluate',
				data: {"_token": "{{ csrf_token() }}", "id": $("#evaluate_item_id").val(), "content": $("#star_content").val(), "star": $('#star').raty('score')},
				dataType: 'text',
				type: 'POST',
				success: function(response)
				{
					$("#star_content").val("请写下对这条信息的感受吧。");
					$(".evaluate_box .status").hide();
					$(".evaluate_box").dialog("close");
				}
			});
			
		});
		$("#star_content").change(function(){
			var _this = $(this);
			_this.val(_this.val().substr(0, 200));
		});
		$("#star_content").keyup(function(){
			var _this = $(this);
			_this.val(_this.val().substr(0, 200));
		});
	});
	</script>
@endsection
