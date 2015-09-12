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
					<label><input type="radio" name="gender" value="male">&nbsp;&nbsp;男</label>
					<label><input type="radio" name="gender" value="fmale">&nbsp;&nbsp;女</label>
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
		<div class="list">
			<div class="work">
				<div class="title">
					<span class="name">
						发布日期：2015-08-08
					</span>
					<span class="stars">
						好评度：<span class="star star1"></span>
					</span>
					<span class="evaluate">
						<a href="#">我要点评</a>
					</span>
				</div>
				<div class="descs">
					<span>姓名：XXX</span>
					<span>所在区域：北京市西城区德胜街道</span>
					<span>服务类型：更重、收割</span>
					<span>工种：收割、耕种、挖掘</span>
				</div>
				<div class="descs">
					<span>年龄：21</span>
					<span>性别：女</span>
					<span>籍贯：吉林省</span>
				</div>
				<div class="descs">
					<span>手机号：18158414543</span>
					<span>QQ：99866770</span>
					<span>微信：DFDFFFD</span>
				</div>
				<div class="more">
					<a href="#">查看详情>></a>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
@endsection
