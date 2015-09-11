@extends('base')
  
@section('content')
	<link href="{{ asset('/css/forget.css') }}" rel="stylesheet">
	<div id="forget">
		<div class="header">
			<div class="context">
				<div class="logo">
					<a href="/"><img src="/images/logo.jpg"></a>
				</div>
				<div class="space"></div>
				<div class="page_title">
					忘记密码
				</div>
				<div class="qq_links">
					联系QQ：<span class="color_green">458048940</span>
				</div>
			</div>
		</div>
		<div class="for_context">
			<form id="" action="action" method="post">
				<div class="form">
					<div class="row">
						<div class="title">
							已注册手机号：
						</div>
						<div class="text_field">
							181******70
						</div>
						<div class="send_sms">
							<input type="button" class="send_sms_btn" value="发送验证码到手机" />
						</div>
					</div>
					<div class="row">
						<div class="title">
							验证码：
						</div>
						<div class="field">
							<input type="text" />
						</div>
					</div>
					<div class="row">
						<div class="title">
							设置新密码：
						</div>
						<div class="field">
							<input type="text" />
						</div>
					</div>
					<div class="row">
						<div class="title">
							确认新密码：
						</div>
						<div class="field">
							<input type="text" />
						</div>
					</div>
				</div>
				<div class="submit">
					<input type="submit" value="下一步" />
				</div>
			</form>
		</div>
	</div>
@endsection
