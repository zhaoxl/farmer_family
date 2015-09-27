@extends('base')

@section('content')
	<link href="{{ asset('/css/works.css') }}" rel="stylesheet">
	<div class="left_nav">
		<ul>
			<li style="border-top: none;" class="">
				<a href="/works">
					招工信息
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
		<div class="show">
			<div class="title">
				{{$staff->title}}
			</div>
			<div class="attrs">
				<span class="date">
					发布日期：{{date('Y-m-d', strtotime($staff->created_at))}}
				</span>
				<span class="stars">
					好评度：<span class="star star1"></span>
				</span>
				<span class="evaluate">
					<a href="#">我要点评</a>
				</span>
			</div>
			<div class="descs">
				<div class="title">
					基础信息
				</div>
				<ul class="desc_ul">
					<li>
						姓名：{{$staff->name}}
					</li>
					<li>
						所在区域：{{$staff->area_name}}
					</li>
					<li>
						服务类型：{{$staff->work_category_name}}
					</li>
					<li>
						工种：收割、耕种、挖掘
					</li>
					<li>
						年龄：{{$staff->age}}
					</li>
					<li>
						性别：{{$staff->gender == 'm' ? '男' : '女'}}
					</li>
					<li>
						籍贯：{{$staff->home_twon}}
					</li>
					<li>
						手机号：{{$staff->mobile}}
					</li>
					<li>
						QQ：{{$staff->qq}}
					</li>
					<li>
						微信：{{$staff->weixin}}
					</li>
				</ul>
			</div>
			<div class="clearfix"></div>
			<div class="descs">
				<div class="title">
					详细内容
				</div>
				<div class="content">
					{{$staff->content}}
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>
	
@endsection

		
		
		
		
		
		
		
		
		
		
		
		
		
		
