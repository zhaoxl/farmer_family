@extends('base')

@section('content')
	<link href="{{ asset('/css/works.css') }}" rel="stylesheet">
	<div class="left_nav">
		<ul>
			<li style="border-top: none;" class="current">
				<a href="/works">
					雇人信息
				</a>
			</li>
			<li class="">
				<a href="/staffs">
					找活信息
				</a>
			</li>
		</ul>
		<div class="left_nav_bc"></div>
	</div>
	<div class="right">
		<div class="search">
			<form action="/works" method="get" accept-charset="utf-8">
				<input type="hidden" name="day" value="{{\Request::get('day')}}" />
				<div class="row date_filter">
					<span class="title">信息发布日期：</span>
					<span><a href="/works" class="{{empty(Request::get('day')) ? 'current' : ''}}">全部</a></span>
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
					<input type="submit" class="submit" value="" />
				</div>
			</form>
		</div>
		<div class="list">
			@foreach ($works as $work)
			<div class="item">
				<div class="title">
					<span class="name">
						发布日期：{{date('Y-m-d', strtotime($work->created_at))}}
					</span>
					<span class="stars">
						好评度：<span class="star star1"></span>
					</span>
					<span class="evaluate">
						<a href="#">我要点评</a>
					</span>
				</div>
				<div class="descs">
					<span>姓名：{{$work->name}}</span>
					<span>所在区域：{{$work->area_name}}</span>
					<span>服务类型：{{$work->work_category_name}}</span>
				</div>
				<div class="descs">
					<span>手机号：{{$work->mobile}}</span>
					<span>QQ：{{$work->qq}}</span>
					<span>微信：{{$work->weixin}}</span>
				</div>
				<div class="more">
					<a href="/works/{{$work->id}}" target="_blank">查看详情>></a>
				</div>
			</div>
			@endforeach
		</div>
		{!! with(new App\Providers\CustomPaginationLinks($works))->render() !!}
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>
	
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
	});
	</script>
@endsection
