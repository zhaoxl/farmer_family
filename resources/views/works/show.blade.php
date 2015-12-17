@extends('base')

@section('content')
	<link href="{{ asset('/css/works.css') }}" rel="stylesheet">
	<div class="left_nav">
		<ul>
			<li style="border-top: none;" class="current">
				<a href="/works">
					雇人信息
				</a>
			</li>
			<li class="">
				<a href="/works">
					找活信息
				</a>
			</li>
		</ul>
		<div class="left_nav_bc"></div>
	</div>
	<div class="right">
		<div class="show">
			<div class="title">
				{{$work->title}}
			</div>
			<div class="attrs">
				<span class="date">
					发布日期：{{date('Y-m-d', strtotime($work->created_at))}}
				</span>
				<span class="stars">
					好评度：<span class="star star{{ceil($work->starCount())}}"></span>
				</span>
				<span class="evaluate">
					<a class="evaluate_open" data-id="{{$work->id}}" href="#evaluate">我要点评</a>
				</span>
			</div>
			<div class="descs">
				<div class="title">
					基础信息
				</div>
				<ul class="desc_ul">
					<li>
						所属行业：{{$work->industryName()}}
					</li>
					<li>
						服务类型：{{$work->workCategoryName()}}
					</li>
					<li>
						所在区域：{{$work->area_name}}
					</li>
					<li>
						详细地址：{{$work->address}}
					</li>
					<li>
						联系电话：{{$user->mobile}}
					</li>
					<li>
						QQ：{{$user->qq}}
					</li>
					<li>
						微信：{{$user->weixin}}
					</li>
					<li>
						服务报酬：{{is_null($work->price) ? '面议' : $work->price.'/天'}}
					</li>
					<li>
						服务时间：
						@if(isset($work->start_at) || isset($work->end_at))
							{{date('Y-m-d', strtotime($work->start_at))}}
							&nbsp;-&nbsp;
							{{date('Y-m-d', strtotime($work->end_at))}}
						@else
							长期
						@endif
					</li>
					<li>
						服务人数：{{$work->people_number}}人
					</li>
				</ul>
				<div class="photo">
					<img src="/{{$work->user->getImg('photo')}}" />
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="descs">
				<div class="title">
					详细内容
				</div>
				<div class="content">
					{{$work->content}}
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

		
		
		
		
		
		
		
		
		
		
		
		
		
		
