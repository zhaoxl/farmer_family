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
		<div class="search">
			<div class="row">
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
			</div>
			<div class="row">
				<div class="input">
					<div class="title">
						工人性别
					</div>
					<input type="text" class="field" />
				</div>
				<div class="input">
					<div class="title">
						工人年龄
					</div>
					<input type="text" class="field" />
				</div>
				<input type="submit" class="submit" value="" />
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
@endsection
