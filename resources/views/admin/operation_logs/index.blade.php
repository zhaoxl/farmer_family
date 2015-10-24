@extends('admin.base')

@section('content')
	<div class="pageheader">
	  <h2><i class="fa fa-envelope"></i> 后台操作记录 <span></span></h2>
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
		              <th>操作员</th>
		              <th>动作</th>
		              <th>时间</th>
		              <th>备注</th>
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