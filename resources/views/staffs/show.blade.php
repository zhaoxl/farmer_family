@extends('base')

@section('content')
	<link href="{{ asset('/css/works.css') }}" rel="stylesheet">
	<div class="left_nav">
		<ul>
			<li>招工信息</li>
			<li>找活信息</li>
		</ul>
	</div>
	<div class="right">
		<div class="show">
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
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>
@endsection
