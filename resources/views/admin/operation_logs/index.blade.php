@extends('admin.base')

@section('content')
<div class="row">
	<div class="col-md-2">
		<ul style="max-width: 300px;" class="nav nav-pills nav-stacked">
      <li class="active"><a href="#">所有操作记录</a></li>
      <li><a href="#">已删除操作记录</a></li>
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
              <th>操作员</th>
              <th>动作</th>
              <th>时间</th>
              <th>备注</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
						@foreach ($datas as $data)	
            <tr>
              <td>{{$data->id}}</td>
              <td>{{$data->admin->name}}</td>
              <td>{{$data->action}}</td>
              <td>{{$data->created_at}}</td>
							<td>{{$data->remark}}</td>
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