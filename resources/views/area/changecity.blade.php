@extends('base')

@section('content')
	<link href="{{ asset('/css/area.css') }}" rel="stylesheet">
	<div id="changecity">
		<div class="header">
			<div class="context">
				<div class="logo">
					<a href="/"><img src="/images/logo.jpg"></a>
				</div>
				<div class="space"></div>
				<div class="page_title">
					注册
				</div>
				<div class="qq_links">
					联系QQ：<span class="color_green">458048940</span>
				</div>
			</div>
		</div>
		<div class="content">
			<div class="search">
				<form>
					<input type="submit" value="搜索城市" class="submit" />
					<input type="text" class="text"/>
					<div class="hot">
						<span class="title">热门</span>
						<span class="links">
							<a href="#">北京</a>
							<a href="#">上海</a>
							<a href="#">广州</a>
							<a href="#">吉林</a>
						</span>
					</div>
				</form>
			</div>
			<div class="search_bottom"></div>
			<div class="clearfix"></div>
			<div class="area_list">
				<span class="province">
					山东
				</span>
				<span class="city">
					<a href="#">济南</a>
					<a href="#">青岛</a>
					<a href="#">济南</a>
				</span>
			</div>
		</div>
	</div>
@endsection