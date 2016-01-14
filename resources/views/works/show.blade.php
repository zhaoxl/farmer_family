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
			<div class="show">
				<div class="title">
					服务项目：{{$work->title}}&nbsp;·&nbsp;
					<div class="stars">
						好评度&nbsp;&nbsp;<span class="star star{{ceil($work->starCount())}}"></span>
						&nbsp;&nbsp;
						<a href="#" class="dianping evaluate_open" data-id="{{$work->id}}" href="#evaluate">我要点评</a>
					</div>
				</div>
				<div class="date">
					发布日期：{{date('Y-m-d', strtotime($work->created_at))}}
				</div>
				<br />
				<br />
				<div class="desc_box">
					<h4>招聘需求</h4>
					<table class="desc">
						<tr>
							<td width="300">
								工种类别：{{$work->workCategoryName()}}
							</td>
						</tr>
						<tr>
							<td width="300">
								性别要求：{{$work->gender}}
							</td>
						</tr>
						<tr>
							<td width="300">
								年龄要求：
								@if(!is_null($work->age_start))
									{{$work->age_start}}—{{$work->age_end}}岁
								@endif
							</td>
						</tr>
						<tr>
							<td width="300">
								工作经验：
								@if(!is_null($work->work_experience))
									{{$work->work_experience}}年以上
								@endif
							</td>
						</tr>
						<tr>
							<td width="300">
								工作区域：{{$work->address}}
							</td>
						</tr>
					</table>
				</div>
				<div class="desc_box">
					<h4>雇主信息</h4>
					<table class="desc">
						<tr>
							<td width="300">
								雇主：{{$user->name}}
							</td>
						</tr>
						<tr>
							<td>
								行业：{{$work->industryName()}}
							</td>
						</tr>
						<tr>
							<td>
								电话：{{$user->mobile}}
							</td>
						</tr>
						<tr>
							<td>
								邮箱：{{$user->email}}
							</td>
						</tr>
						<tr>
							<td>
								地址：{{$work->address}}
							</td>
						</tr>
					</table>
				</div>
				
				<div id="address_map" class="map_preview">
					<div id="allmap">
			
					</div>
				</div>
				<div class="clearfix"></div>
				
				
				<div class="content">
					<div class="head">
						<div class="title">
							其他介绍
						</div>
						<div class="bg"></div>
					</div>
					<div class="clearfix"></div>
					<div class="body">
						{!!strip_tags($work->content, "<p><div><ul><li><span><img><table><tr><td><h1><h2><h3><h4><h5>")!!}
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
	
		<div class="evaluate_box" style="display: none">
			<input type="hidden" id="evaluate_item_id" />
			<label class="star_title">请您评分：</label><div id="star" class="star_raty"></div>
			<textarea id="star_content" class="star_content" style="color: #AAAAAA; resize: none;">请写下对这条信息的感受吧。</textarea>
			<input id="evaluate_submit" type="button" value="提交点评" class="submit" />
			<input id="evaluate_cancel" type="button" value="取消点评" class="cancel" />
			<div class="status">正在提交...</div>
		</div>
		<script src="/js/jquery.raty.js" type="text/javascript" charset="utf-8"></script>
		<script src="/js/jquery-ui/jquery-ui.js" type="text/javascript" charset="utf-8"></script>

		<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=lXeAbeMF4NG6YczveCyamS6T"></script>
		<script type="text/javascript">
	// 百度地图API功能
		var map = new BMap.Map("allmap");
		var myGeo = new BMap.Geocoder();
		// 将地址解析结果显示在地图上,并调整地图视野
		myGeo.getPoint("{{$work->address}}", function(point){
			if (point) {
				map.centerAndZoom(point, 12);
				map.addOverlay(new BMap.Marker(point));
			}else{
				alert("您选择地址没有解析到结果!");
			}
		}, "{{$work->cityName()}}");
		</script>
		
		<script type="text/javascript">
		$(function(){
			//star
			$('#star').raty({ score: 3 });
			$("#star_content").focus(function(){
				var _this = $(this);
				if(_this.val() == "请写下对这条信息的感受吧。")
				{
					_this.val("").css("color", "#000000");
				}
			});
	
			$("#star_content").blur(function(){
				var _this = $(this);
				if(_this.val() == "")
				{
					_this.val("请写下对这条信息的感受吧。").css("color", "#AAAAAA");
				}
			});
	
			$("#evaluate_cancel").click(function(){
				$(".evaluate_box").dialog("close");
			});
	
			$(".evaluate_open").click(function(){
				var id = $(this).attr("data-id");
				$("#evaluate_item_id").val(id);
				$(".evaluate_box").dialog();
			});
	
			$("#evaluate_submit").click(function(){
				@if(Auth::user()->guest())
				alert('请先登录');
				return false;
				@endif
				
				if($("#star_content").val() == "请写下对这条信息的感受吧。")
				{
					return false;
				}
				$(".evaluate_box .status").show();
				$.ajax({
					url: '/works/evaluate',
					data: {"_token": "{{ csrf_token() }}", "id": $("#evaluate_item_id").val(), "content": $("#star_content").val(), "star": $('#star').raty('score')},
					dataType: 'text',
					type: 'POST',
					success: function(response)
					{
						$("#star_content").val("请写下对这条信息的感受吧。");
						$(".evaluate_box .status").hide();
						$(".evaluate_box").dialog("close");
					}
				});
		
			});
			$("#star_content").change(function(){
				var _this = $(this);
				_this.val(_this.val().substr(0, 200));
			});
			$("#star_content").keyup(function(){
				var _this = $(this);
				_this.val(_this.val().substr(0, 200));
			});
		});
		</script>
@endsection
