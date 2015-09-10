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
			<div class="area_list">
				<div>
					<div class="area_name">
						华东
					</div>
					<div class="area_name_line"></div>
					<div class="clearfix"></div>
				</div>
				<div class="row">
					<div class="province">
						山东
					</div>
					<div class="city">
						<a href="#">青岛</a>
						<a href="#">济南</a>
						<a href="#">烟台</a>
						<a href="#">潍坊</a>
						<a href="#">临沂</a>
						<a href="#">淄博</a>
						<a href="#">济宁</a>
						<a href="#">泰安</a>
						<a href="#">聊城</a>
						<a href="#">威海</a>
						<a href="#">枣庄</a>
						<a href="#">德州</a>
						<a href="#">日照</a>
						<a href="#">东营</a>
						<a href="#">菏泽</a>
						<a href="#">滨州</a>
						<a href="#">莱芜</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
				<div class="row">
					<div class="province">
						江苏
					</div>
					<div class="city">
						<a href="#">济南</a>
						<a href="#">青岛</a>
						<a href="#">济南</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
				<div class="row">
					<div class="province">
						山东
					</div>
					<div class="city">
						<a href="#">济南</a>
						<a href="#">青岛</a>
						<a href="#">济南</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
			</div>
			<div class="area_list">
				<div>
					<div class="area_name">
						华东
					</div>
					<div class="area_name_line"></div>
					<div class="clearfix"></div>
				</div>
				<div class="row">
					<div class="province">
						山东
					</div>
					<div class="city">
						<a href="#">青岛</a>
						<a href="#">济南</a>
						<a href="#">烟台</a>
						<a href="#">潍坊</a>
						<a href="#">临沂</a>
						<a href="#">淄博</a>
						<a href="#">济宁</a>
						<a href="#">泰安</a>
						<a href="#">聊城</a>
						<a href="#">威海</a>
						<a href="#">枣庄</a>
						<a href="#">德州</a>
						<a href="#">日照</a>
						<a href="#">东营</a>
						<a href="#">菏泽</a>
						<a href="#">滨州</a>
						<a href="#">莱芜</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
				<div class="row">
					<div class="province">
						山东
					</div>
					<div class="city">
						<a href="#">济南</a>
						<a href="#">青岛</a>
						<a href="#">济南</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
				<div class="row">
					<div class="province">
						山东
					</div>
					<div class="city">
						<a href="#">济南</a>
						<a href="#">青岛</a>
						<a href="#">济南</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection