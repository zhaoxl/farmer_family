@extends('new_base')

@section('css')	
	<link href="{{ asset('/css/staffs.css') }}" rel="stylesheet">
@endsection

@section('content')
	<div id="staffs">
		<div class="left_nav">
			<label>招工雇人信息</label>
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
						<li class="{{is_null(Request::get('day')) ? 'current' : ''}}"><a href="/works">全部</a></li>
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
						<input type="text" name="address" value="{{Request::get('address')}}" />
					</div>
				</div>
				<div class="row">
					<div class="attr">
						<label>性别要求：</label>
						<label>
							<input type="checkbox" name="gender_m" value="男" {{Request::get('gender_m') == '男' ? 'checked' : ''}} />&nbsp;男
						</label>
						&nbsp;&nbsp;
						<label>
							<input type="checkbox" name="gender_f" value="女" {{Request::get('gender_f') == '女' ? 'checked' : ''}} />&nbsp;女
						</label>
					</div>
					<div class="attr">
						<label>服务项目：</label>
						<input type="text" name="work_category" value="{{Request::get('work_category')}}" />
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
					@foreach ($works as $work)
					<li>
						<span class="time">发布时间 {{date('Y-m-d', strtotime($work->created_at))}}</span>
						<span class="desc">
							<p class="col_2">雇主：{{$work->name}}</p>
							<p class="col_2">招聘：{{$work->workCategoryName()}}</p>
							<p class="col_2">电话：{{$work->mobile}}</p>
							<p class="col_3">地址：{{$work->address}}</p>
							<p class="col_1"><a href="/works/{{$work->id}}" target="_blank">查看详情>></a></p>
						</span>
					</li>
					@endforeach
				</ul>
			</div>
			<div class="clearfix"></div>
			{!! with(new App\Providers\CustomPaginationLinks($works))->render() !!}
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
@endsection
