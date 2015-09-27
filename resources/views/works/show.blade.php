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
				<a href="/works">
					找活信息
				</a>
			</li>
		</ul>
		<div class="left_nav_bc"></div>
	</div>
	<div class="right">
		<div class="show">
			<div class="title">
				{{$work->title}}
			</div>
			<div class="attrs">
				<span class="date">
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
				<div class="title">
					基础信息
				</div>
				<ul class="desc_ul">
					<li>
						所属行业：{{$work->industry_name}}
					</li>
					<li>
						服务类型：{{$work->work_category_name}}
					</li>
					<li>
						所在区域：{{$work->area_name}}
					</li>
					<li>
						详细地址：{{$work->address}}
					</li>
					<li>
						联系电话：{{$work->mobile}}
					</li>
					<li>
						QQ：{{$work->qq}}
					</li>
					<li>
						微信：{{$work->weixin}}
					</li>
					<li>
						服务报酬：{{is_null($work->price) ? '面议' : $work->price.'/天'}}
					</li>
					<li>
						服务时间：
						@if(isset($work->start_at) || isset($work->end_at))
							{{date('Y-m-d', strtotime($work->start_at))}}
							&nbsp;-&nbsp;
							{{date('Y-m-d', strtotime($work->end_at))}}
						@else
							长期
						@endif
					</li>
					<li>
						服务人数：{{$work->people_number}}人
					</li>
				</ul>
			</div>
			<div class="clearfix"></div>
			<div class="descs">
				<div class="title">
					详细内容
				</div>
				<div class="content">
					{{$work->content}}
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>
	
@endsection

		
		
		
		
		
		
		
		
		
		
		
		
		
		
