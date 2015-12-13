@extends('my.layout')
@section('content')

<div class="aleady_send_box">
	<table width="100%">
		<thead>
			<th width="30%">发布日期</th>
			<th width="70%" colspan="3">发布内容</th>
		</thead>
		@foreach($staffs as $staff)
		<tr>
			<td width="30%" align="center"  class="time">{{date('Y-m-d', strtotime($staff->created_at))}}</td>
			<td width="45%">{{ $staff->title }}</td>
			<td width="30%" align="right">
				<a href="/staffs/{{$staff->id}}" class="more">查看详情</a>
				<a href="/staffs/{{$staff->id}}/edit" class="more">修改</a>
				<a href="#" onclick="delete_staff({{$staff->id}})"><img src="/images/delete_icon.jpg"></a>
			</td>
		</tr>
		@endforeach
	</table>
	{!! with(new App\Providers\CustomPaginationLinks($staffs))->render() !!}
	<form id="delete_staff_from" action="/my/delete-staff" method="post" accept-charset="utf-8">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
		<input type="hidden" name="delete_staff_id" id="delete_staff_id" />
	</form>
</div>
<script type="text/javascript">
function delete_staff(id)
{
	if(confirm("确认要删除这条找活信息？"))
	{
		$("#delete_staff_id").val(id);
		$("#delete_staff_from").submit();
	}
	return false;
}
</script>
@endsection
