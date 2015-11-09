@extends('my.layout')
@section('content')

<div class="message_sf_box">
	<div class="message_nav_box clearfix">
		<ul id="tab_ul">
			<li class="current">收到的站内信</li>
			<li><a href="/my/messages/outbox">发送的站内信</a></li>
		</ul>
	</div>
	<table class="message_table ">
		<thead>
			<th>发送日期</th>
			<th>消息类型</th>
			<th>发信用户</th>
			<th colspan="2">操作</th>
		</thead>
		@foreach ($messages as $message)
		<tr>
			<td width="27%" align="center">{{date('Y-m-d', strtotime($message->created_at))}}</td>
			<td width="27%" align="center">{{$message->getCategoryNameAttribute()}}</td>
			<td width="27%" align="center">{{$message->getFromUserNameAttribute()}}</td>
			<td width="30%" align="center" class="more"><a href="/my/messages/{{$message->id}}">点击查看</a><span class="unread">{{$message->readed ? '' : '*'}}</span></td>
			<td width="5%" align="center" class="delete">
				@if($message->category == 0)
				<a href="/my/messages/{{$message->id}}/destroy"><img src="/images/delete_icon.jpg"></a>
				@endif
			</td>
		</tr>
		@endforeach
	</table>
	
</div>


@endsection
