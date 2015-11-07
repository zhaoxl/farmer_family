@extends('my.layout')
@section('content')

<div class="message_sf_box">
	<div class="message_nav_box clearfix">
		<ul id="tab_ul">
			<li><a href="/my/messages">收到的站内信</a></li>
			<li class="current">发送的站内信</li>
		</ul>
	</div>
	<table class="message_table ">
		<thead>
			<th>发送日期</th>
			<th>发信用户</th>
			<th colspan="2">操作</th>
		</thead>
		@foreach ($messages as $message)
		<tr>
			<td width="37%" align="center">{{date('Y-m-d', strtotime($message->created_at))}}</td>
			<td width="37%" align="center">{{$message->name}}</td>
			<td width="23%" align="center" class="more"><a href="/my/messages/{{$message->id}}">点击查看</a><span class="num">{{$message->count}}</span></td>
			<td width="5%" align="center" class="delete"><a href="/my/messages/{{$message->id}}/destroy"><img src="/images/delete_icon.jpg"></a></td>
		</tr>
		@endforeach
	</table>
	
</div>


@endsection
