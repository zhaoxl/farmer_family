@extends('my.layout')
@section('content')

<div class="messages message_sf_box">
	@if (Session::has('success'))
	<div style="margin: 25px; color: green">
    {{Session::get('success')}}
		<script type="text/javascript">
			setTimeout(function(){
				location.href = '{{$back_url}}';
			}, 2000);
		</script>
  </div>
	@elseif (Session::has('error'))
	<div class="alert alert-danger">
    <div style="margin: 25px; color: green">
    {{Session::get('error')}}
  </div>
	@endif
	<form id="register_mes_Modify" action="/my/messages" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
		<input type="hidden" name="back_url" value="{{ URL::previous() }}" />
		<table style="margin: 20px auto auto 25px">
			<tr>
				<td style="font-size: 16px; font-weight: both; ">标　题：</td>
				<td><input type="text" name="title" style="width: 400px; font-size: 16px; font-weight: bold" /></td>
			</tr>
			<tr>
				<td style="color: #798699; height: 47px">
					收件人：
				</td>
				<td style="color: #798699">
					<input type="text" name="mobile" style="width: 400px;" value="{{$mobile}}" readonly />
				</td>
			</tr>
		</table>
		<div style="width:98%; border-bottom: 1px solid #aac1de; margin: 5px auto auto 10px"></div>
		<table style="margin: 10px auto auto 25px">
			<tr>
				<td>
					<textarea name="content" style="width: 715px; height: 350px; border: 1px solid #bbbbbb; margin-bottom: 10px"></textarea>
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">
					<a href="{{ URL::previous() }}" class="btn btn-success-alt" style="margin-left: 280px">返回</a>
					<input type="submit" class="btn btn-success-alt" value="发送" />
				</td>
			</tr>
		</table>
	</form>
</div>


@endsection
