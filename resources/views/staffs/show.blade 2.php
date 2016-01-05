@extends('base')

@section('content')
	<link href="{{ asset('/css/works.css') }}" rel="stylesheet">
	<div class="left_nav">
		<ul>
			<li style="border-top: none;" class="">
				<a href="/works">
					雇人信息
				</a>
			</li>
			<li class="current">
				<a href="/staffs">
					找活信息
				</a>
			</li>
		</ul>
		<div class="left_nav_bc"></div>
	</div>
	<div class="right">
		<div class="show">
			<div class="title">
				{{$staff->title}}
			</div>
			<div class="attrs">
				<span class="date">
					发布日期：{{date('Y-m-d', strtotime($staff->created_at))}}
				</span>
				<span class="stars">
					好评度：<span class="star star{{ceil($staff->starCount())}}"></span>
				</span>
				<span class="evaluate">
					<a class="evaluate_open" data-id="{{$staff->id}}" href="#evaluate">我要点评</a>
				</span>
			</div>
			<div class="descs">
				<div class="title">
					基础信息
				</div>
				<ul class="desc_ul">
					<li>
						姓名：{{$user->name}}
					</li>
					<li>
						期望工作区域：{{$staff->area_name}}
					</li>
					<li>
						服务行业：{{$staff->industryName()}}
					</li>
					<li>
						工种：{{$staff->workCategoryName()}}
					</li>
					<li>
						年龄：{{$user->age()}}
					</li>
					<li>
						性别：{{$user->gender == 'm' ? '男' : '女'}}
					</li>
					<li>
						籍贯：{{$user->hometown}}
					</li>
					<li>
						手机号：{{$user->mobile}}
					</li>
					<li>
						QQ：{{$user->qq}}
					</li>
					<li>
						微信：{{$user->weixin}}
					</li>
				</ul>
				<div id="address_map" class="photo">
					<div id="allmap">
						
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="descs">
				<div class="title">
					详细内容
				</div>
				<div class="content">
					{{$staff->content}}
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>
	
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
	<style type="text/css" media="screen">
		#allmap{width: 245px;height: 230px;overflow: hidden;margin:0;font-family:"微软雅黑";}
	</style>
	<script type="text/javascript">
// 百度地图API功能
	var map = new BMap.Map("allmap");
	var myGeo = new BMap.Geocoder();
	// 将地址解析结果显示在地图上,并调整地图视野
	myGeo.getPoint("{{$staff->address}}", function(point){
		if (point) {
			map.centerAndZoom(point, 12);
			map.addOverlay(new BMap.Marker(point));
		}else{
			alert("您选择地址没有解析到结果!");
		}
	}, "{{$staff->cityName()}}");
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
			if($("#star_content").val() == "请写下对这条信息的感受吧。")
			{
				return false;
			}
			$(".evaluate_box .status").show();
			$.ajax({
				url: '/staffs/evaluate',
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

		
		
		
		
		
		
		
		
		
		
		
		
		
		
