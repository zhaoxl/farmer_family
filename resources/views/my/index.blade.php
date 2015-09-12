@extends('base')
@section('content')
<link href="{{ asset('/css/personcenter.css') }}" rel="stylesheet">
<div class="container-fluid">
	<div class="row person_center_wrap">
		<div class="person_nav_left">
			<ul>
				<li class="current">
					<a href="#">
						注册信息管理
					</a>
				</li>
				<li>
					<a href="#">
						已发布信息
					</a>
				</li>
				<li>
					<a href="#">
						站内信
					</a>
				</li>
				<li>
					<a href="#">
						修改密码
					</a>
				</li>
				<li>
					<a href="#">
						注销用户
					</a>
				</li>
			</ul>
			<div class="person_nav_left_bc"></div>
		</div>
		<div class="person_center_right">
			
		</div>
		
	</div>
</div>
@endsection
