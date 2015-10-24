@extends('admin.base')

@section('content')
  <div class="pageheader">
    <h2><i class="fa fa-envelope"></i> 站内消息管理 </h2>
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
									<th>消息类型</th>
		              <th>发送人</th>
		              <th>接收人</th>
		              <th>标题</th>
		              <th>是否已读</th>
		              <th>发送时间</th>
		              <th>操作</th>
		            </tr>
		          </thead>
		          <tbody>
								@foreach ($datas as $data)	
		            <tr>
		              <td>{{$data->id}}</td>
		              <td>{{$data->getCategoryNameAttribute()}}</td>
		              <td>{{$data->getFromUserNameAttribute()}}</td>
		              <td>{{$data->getToUserNameAttribute()}}</td>
									<td>{{$data->title}}</td>
		              <td>{!!$data->getIsReadAttribute()!!}</td>
									<td>{{$data->created_at}}</td>
									<td>
										<a href="#">查看</a>&nbsp;
										<a href="#">删除</a>
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
					
@endsection