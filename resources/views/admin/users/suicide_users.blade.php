@extends('admin.base')

@section('content')
  <div class="pageheader">
    <h2><i class="fa fa-envelope"></i> 用户 <span>已注销用户</span></h2>
  </div>
  
  <div class="contentpanel">
		<div class="row">
			<div class="col-md-13">
				<div class="panel panel-primary">
		      <div class="panel-body">
						<table class="table">
		          <thead>
		            <tr>
		              <th>#</th>
		              <th>用户类型</th>
		              <th>邮箱</th>
		              <th>姓名</th>
		              <th>手机号</th>
		              <th>QQ</th>
		              <th>微信</th>
		              <th>所在区域</th>
		              <th>性别</th>
		              <th>籍贯</th>
		              <th>注册时间</th>
		              <th>操作</th>
		            </tr>
		          </thead>
		          <tbody>
								@foreach ($datas as $data)
		            <tr>
		              <td>{{$data->id}}</td>
		              <td>{{$data->category == 0 ? "找活方" : ($data->category == 1 ? "企业用户" : "个人雇人")}}</td>
		              <td>{{$data->email}}</td>
		              <td>{{$data->name}}</td>
		              <td>{{$data->mobile}}</td>
									<td>{{$data->qq}}</td>
									<td>{{$data->weixin}}</td>
									<td>{{$data->area_name}}</td>
									<td>{{$data->gender}}</td>
									<td>{{$data->hometown}}</td>
									<td>{{$data->created_at}}</td>
									<td>
										<a href="javascript:unSuicideItem({{$data->id}});">恢复</a>&nbsp;
										<a href="javascript:deleteItem({{$data->id}});">删除</a>
									</td>
		            </tr>
								@endforeach
		          </tbody>
		        </table>
						<?php echo $datas->render(); ?>
					</div>
		    </div>
			</div>
		</row>
  </div>		
	<script type="text/javascript">
		function unSuicideItem(id) {
	    $.ajax({
	      type: "POST",
	      url: '/admin/users/' + id + '/un_suicide',
				data: {'_token': '{{ csrf_token() }}'},
	      success: function(result) {
	        location.reload();
	      }
	    });
		}
	</script>
@endsection