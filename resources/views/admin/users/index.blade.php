@extends('admin.base')

@section('content')
<div class="row">
	<div class="col-md-2">
		<ul style="max-width: 300px;" class="nav nav-pills nav-stacked">
      <li class="active"><a href="#">所有用户</a></li>
      <li><a href="#">企业用户</a></li>
      <li><a href="#">发活方用户</a></li>
      <li><a href="#">找活方用户</a></li>
      <li><a href="#">已注销用户</a></li>
    </ul>
	</div>
	<div class="col-md-10">
		<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">所有操作记录</h3>
      </div>
      <div class="panel-body">
				<table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>邮箱</th>
              <th>姓名</th>
              <th>手机号</th>
              <th>QQ</th>
              <th>微信</th>
              <th>所在区域</th>
              <th>年龄</th>
              <th>性别</th>
              <th>籍贯</th>
              <th>期望收入</th>
              <th>注册时间</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
						@foreach ($datas as $data)	
            <tr>
              <td>{{$data->id}}</td>
              <td>{{$data->email}}</td>
              <td>{{$data->name}}</td>
              <td>{{$data->mobile}}</td>
							<td>{{$data->qq}}</td>
							<td>{{$data->weixin}}</td>
							<td>{{$data->area_name}}</td>
							<td>{{$data->age}}</td>
							<td>{{$data->gender}}</td>
							<td>{{$data->hometown}}</td>
							<td>{{$data->expect_salary}}</td>
							<td>{{$data->created_at}}</td>
							<td>
								<a href="#">查看</a>&nbsp;
								<a href="#">删除</a>
							</td>
            </tr>
						@endforeach
          </tbody>
        </table>
			</div>
    </div>
	</div>
</row>

	

	

	

	

	

	

	

	

	


					
@endsection