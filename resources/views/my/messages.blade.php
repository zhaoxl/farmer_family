@extends('my.layout')
@section('content')

<div class="message_sf_box">
	<div class="message_nav_box clearfix">
		<ul id="tab_ul">
			<li>收到的站内信</li>
			<li class="current">发送的站内信</li>
		</ul>
	</div>
	<table class="message_table hidden ">
		<thead>
			<th>发送日期</th>
			<th>发信用户</th>
			<th colspan="2">操作</th>
		</thead>
		<tr>
			<td width="37%" align="center">2015-07-11</td>
			<td width="37%" align="center">王操蛋</td>
			<td width="23%" align="center" class="more"><a href="#">点击查看</a><span class="num">5</span></td>
			<td width="5%" align="center" class="delete"><a href="#"><img src="/images/delete_icon.jpg"></a></td>
		</tr>
	</table>
	<table class="message_table ">
		<thead>
			<th>发送日期</th>
			<th>发信用户</th>
			<th colspan="2">操作</th>
		</thead>
		<tr>
			<td width="37%" align="center">2015-07-12</td>
			<td width="37%" align="center">王操蛋</td>
			<td width="23%" align="center" class="more"><a href="#">点击查看</a><span class="num">5</span></td>
			<td width="5%" align="center" class="delete"><a href="#"><img src="/images/delete_icon.jpg"></a></td>
		</tr>
	</table>
	<script>
		$('#tab_ul>li').bind('click',function(){
			var _index=$(this).index()
			$(this).addClass('current').siblings().removeClass('current');
			$('.message_table').eq(_index).removeClass('hidden').siblings('.message_table').addClass('hidden')
		})
		
	</script>
	
</div>


@endsection
