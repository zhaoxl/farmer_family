@if(Auth::user()->guest())
<div class="header">
	<div class="context">
		<div class="logo">
			<a href="/">首页</a>
		</div>
		<div class="space"></div>
		<div class="page_title">
			@yield('title')
		</div>
		<div class="qq_links">
			联系QQ：<span class="color_green">458048940</span>
		</div>
	</div>
</div>
@else
<div class="header">
	<div class="context">
		<div class="logo">
			<a href="/">首页</a>
		</div>
		<div class="space"></div>
		<div class="header_nav">
			<ul>
				<li><a href="/my" class="{{preg_match('/my/', Request::path()) ? 'current' : ''}}">个人中心</a></li>
				@if(Auth::user()->get()->category == 0)
				<li><a href="/staffs/create" class="{{preg_match('/staffs\/create/', Request::path()) ? 'current' : ''}}">发布信息</a></li>
				@else
				<li><a href="/works/create" class="{{preg_match('/works\/create/', Request::path()) ? 'current' : ''}}">发布信息</a></li>
				@endif
				<li><a href="/staffs" class="{{preg_match('/staffs$/', Request::path()) ? 'current' : ''}}">查询信息</a></li>
			</ul>
		</div>
		<div class="header_rig_nav">
			<ul>
				<li><a href="/my">{{Auth::user()->get()->mobile}}</a></li>
				<li><div class="space"></div></li>
				<li><a href="/my/inbox"><span>站内信</span><span class="msg_count">{{\App\Message::where('to_user_id', '=', Auth::user()->get()->id)->count()}}</span></a></li>
				<li><div class="space"></div></li>
				<li><a href="/auth/logout">退出</a></li>
				<li><div class="space"></div></li>
				<li class="qq">联系QQ：<span class="color_green">458048940</span></li>
			</ul>
		</div>
	</div>
</div>
@endif