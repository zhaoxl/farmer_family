@extends('new_base')

@section('css')	
	<link href="{{ asset('/css/staffs.css') }}" rel="stylesheet">
@endsection

@section('content')
	<div id="staffs">
		<div class="left_nav">
			<label>生活服务信息</label>
		</div>
		<div class="context">
			<div class="filter">
				<form action="" method="get" accept-charset="utf-8">
				<div class="row">
					<label class="title">信息发布日期</label>
					<ul class="date">
						<li class="{{Request::get('day') == 1 ? 'current' : ''}}"><a href="?day=1">今天</a></li>
						<li class="{{Request::get('day') == 7 ? 'current' : ''}}"><a href="?day=7">1周</a></li>
						<li class="{{Request::get('day') == 30 ? 'current' : ''}}"><a href="?day=30">1月</a></li>
						<li class="{{is_null(Request::get('day')) ? 'current' : ''}}"><a href="/staffs">全部</a></li>
					</ul>
				</div>
				<div class="row">
					<div class="attr">
						<label>年龄要求：</label>
						<input type="text" name="age_start" class="small" value="{{Request::get('age_start')}}" />
						-
						<input type="text" name="age_end" class="small" value="{{Request::get('age_end')}}" />岁
					</div>
					<div class="attr">
						<label>所在区域：</label>
						<input type="text" name="address" />
					</div>
				</div>
				<div class="row">
					<div class="attr">
						<label>性别要求：</label>
						<label>
							<input type="checkbox" name="gender_m" value="male" {{Request::get('gender_m') == 'male' ? 'checked' : ''}} />&nbsp;男
						</label>
						&nbsp;&nbsp;
						<label>
							<input type="checkbox" name="gender_f" value="fmale" {{Request::get('gender_f') == 'fmale' ? 'checked' : ''}} />&nbsp;女
						</label>
					</div>
					<div class="attr">
						<label>服务项目：</label>
						<input type="text" />
					</div>
						<input type="submit" class="submit" value="搜索" />
				</div>
				</form>
			</div>
			<div class="list">
				<div class="title">
					信息列表
				</div>
				<ul>
					@foreach ($staffs as $staff)
					<li>
						<span class="time">发布时间 {{date('Y-m-d', strtotime($staff->created_at))}}</span>
						<span class="stars">好评度&nbsp;&nbsp;&nbsp;&nbsp;<span class="star star{{ceil($staff->starCount())}}"></span></span>
						<span class="desc">
							<p class="col_1">▪{{$staff->name}}</p>
							<p class="col_1">
								男&nbsp;&nbsp;&nbsp;&nbsp;
								@if(!is_null($staff->user))
								{{$staff->user->age()}}岁
								@endif
							</p>
							<p class="col_2">{{$staff->workCategoryName()}}</p>
							<p class="col_2">电话：{{$staff->mobile}}</p>
							<p class="col_3">地址：{{$staff->address}}</p>
							<p class="col_1"><a href="/staffs/{{$staff->id}}" target="_blank">查看详情>></a></p>
						</span>
					</li>
					@endforeach
				</ul>
			</div>
			<div class="clearfix"></div>
			{!! with(new App\Providers\CustomPaginationLinks($staffs))->render() !!}
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
@endsection
