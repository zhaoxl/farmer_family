@extends('new_base')

@section('css')
	<link href="{{ asset('/css/index.css') }}" rel="stylesheet">
@endsection

@section('content')
	<div id="index">
		<div class="context">
			<a href="/auth/create" class="reg_btn reg_btn1">
				<div class="reg_btn_hover">
					注册后可以发布生活服务信息
				</div>
			</a>
			<a href="/auth/create" class="reg_btn reg_btn2">
				<div class="reg_btn_hover">
					注册后可以发布招工雇人信息
				</div>
			</a>
			<div class="login_box">
				<form id="login_form" class="form-horizontal" method="POST" action="{{ url('/auth/login') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="text" class="mobile" name="mobile" value="请输入手机号" />
					<input type="text" class="pwd" name="password" value="请输入密码" />
					<label class="error">{{$errors->first('mobile')}}</label>
					<div class="links">
				    <label><input type="checkbox" name="remember" /><span class="autologin_title">自动登录</span></label>  
						<a href="/auth/forget" class="forget">找回密码</a>
					</div>
					<input type="submit" class="login_btn" value="" />
				</form>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="base_list">
			<div class="find_list">
				<div class="head">
					<div class="adorn"></div>
					<div class="title">
						<span class="txt">最新生活服务信息</span>
						<a href="/staffs" class="more"></a>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="list">
					<ul>
						@foreach ($staffs as $staff)
							<?php $user = $staff->user?>
							@if(!is_null($user))
							<li>
								<a href="/staffs/{{$staff->id}}" class="{{$staff->flag ? 'hot':''}}">
									<span class="block1">{{$staff->user->name}}</span>
									<span class="block0_5">{{$staff->user->gender}}</span>
									<span class="block0_5">{{$staff->user->age()}}</span>
									<span class="block1">{{substr($staff->workCategoryName(), 0, 39)}}</span>
									<span class="block2_5">{{substr($staff->address, 0, 33)}}</span>
									<span class="block1_5" style="text-align: right">【{{date('Y-m-d', strtotime($staff->created_at))}}】</span>
								</a>
							</li>
							@endif
						@endforeach
					</ul>
				</div>
			</div>
			<div class="space"></div>
			<div class="pub_list">
				<div class="head">
					<div class="adorn"></div>
					<div class="title">
						<span class="txt">最新招工雇人信息</span>
						<a href="/works" class="more"></a>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="list">
					<ul>
						@foreach ($works as $work)
						<?php $user = $work->user?>
						@if(!is_null($user))
							<li>
								<a href="/works/{{$work->id}}" class="{{$work->flag ? 'hot':''}}">
									<span class="block2">
									<?php #企业用户?>
									@if($user->category == 1)
									{{substr($work->companyName(), 0, 30)}}
									@else
									<?php #个人用户?>
									{{$work->name}}
									@endif
									</span>
									<span class="block1">{{substr($work->workCategoryName(), 0, 30)}}</span>
									<span class="block2_5">{{substr($work->address, 0, 30)}}</span>
								</a>
								<span class="block1_5" style="text-align: right">【{{date('Y-m-d', strtotime($work->created_at))}}】</span>
							</li>
							@endif
						@endforeach
					</ul>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
		<div class="bottom_banner">
			<img src="/images/bottom_banner.jpg" />
		</div>
		<div class="bottom_ad">
			<img src="/images/index_bottom_ad.jpg" />
		</div>
	</div>
@endsection

@section('js')
	<script src="/js/jquery.min.js"></script>
	<script src="/js/custom-form-elements.js"></script>
	<script type="text/javascript" src="{{ asset('/js/jquery.validate.min.js') }}" ></script>
	<script src="/js/index.js"></script>
@endsection