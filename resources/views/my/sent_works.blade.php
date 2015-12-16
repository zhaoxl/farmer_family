@extends('my.layout')
@section('content')

<div class="aleady_send_box">
	<table width="100%">
		<thead>
			<th width="30%">发布日期</th>
			<th width="70%" colspan="3">发布内容</th>
		</thead>
		@foreach($works as $work)
		<tr>
			<td width="30%" align="center"  class="time">{{date('Y-m-d', strtotime($work->created_at))}}</td>
			<td width="45%">{{ $work->title }}</td>
			<td width="30%">
				<a href="/works/{{$work->id}}" class="more">查看详情>></a>
				<a href="/works/{{$work->id}}/edit" class="more">修改</a>
				<a href="#" onclick="delete_work({{$work->id}})"><img src="/images/delete_icon.jpg"></a>
			</td>
		</tr>
		@endforeach
	</table>
	{!! with(new App\Providers\CustomPaginationLinks($works))->render() !!}
	<form id="delete_work_from" action="/my/delete-work" method="post" accept-charset="utf-8">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
		<input type="hidden" name="delete_work_id" id="delete_work_id" />
	</form>
</div>
<script type="text/javascript">
function delete_work(id)
{
	if(confirm("确认要删除这条雇人信息？"))
	{
		$("#delete_work_id").val(id);
		$("#delete_work_from").submit();
	}
	return false;
}
</script>
@endsection
