@extends('my.layout')
@section('content')

<div class="messages message_sf_box">
	<table style="margin: 20px auto auto 25px">
		<tr>
			<td colspan="2" style="font-size: 16px; font-weight: both">{{$message->title}}</td>
		</tr>
		<tr>
			<td style="color: #798699">
				发件人：
			</td>
			<td style="color: #798699">
				{{$message->getFromUserNameAttribute()}}
			</td>
		</tr>
		<tr>
			<td style="color: #798699">
				时　间：
			</td>
			<td style="color: #798699">
				{{$message->created_at}}
			</td>
		</tr>
	</table>
	<div style="width:98%; border-bottom: 1px solid #aac1de; margin: 5px auto auto 10px"></div>
	<table style="margin: 10px auto auto 25px">
		<tr>
			<td>
				{{$message->content}}
			</td>
		</tr>
		<tr>
			<td style="text-align: center;">
				<a href="{{ URL::previous() }}" class="btn btn-success-alt" style="margin-left: 280px">返回</a>
				<a href="/my/messages/create?mobile={{$message->getFromUserMobile()}}" class="btn btn-success-alt">回复</a>
			</td>
		</tr>
	</table>
</div>


@endsection
