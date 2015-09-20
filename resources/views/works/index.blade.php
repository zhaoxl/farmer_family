@extends('base')

@section('content')
	<link href="{{ asset('/css/works.css') }}" rel="stylesheet">
	<div class="left_nav">
		<ul>
			<li style="border-top: none;" class="current">
				<a href="/works">
					招工信息
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
			<form action="find-list" method="get" accept-charset="utf-8">
				<div class="row date_filter">
					<span class="title">信息发布日期：</span>
					<span>全部</span>
					<span><a href="#">今天</a></span>
					<span><a href="#">一周内</a></span>
					<span><a href="#">2周内</a></span>
					<span><a href="#">1个月内</a></span>
					<span><a href="#">2个月内</a></span>
				</div>
				<div class="row">
					<div class="input">
						<div class="title">
							服务类型
						</div>
						<input type="text" class="field" />
					</div>
					<div class="input">
						<div class="title">
							所在区域
						</div>
						<input type="text" class="field" />
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
					<a href="/works/{{$work->id}}">查看详情>></a>
				</div>
			</div>
			@endforeach
		</div>
		{!! with(new App\Providers\CustomPaginationLinks($works))->render() !!}
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>
@endsection
