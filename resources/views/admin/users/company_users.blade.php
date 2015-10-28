@extends('admin.base')

@section('content')
  <div class="pageheader">
    <h2><i class="fa fa-envelope"></i> 用户 <span>企业用户</span></h2>
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
		              <th>姓名</th>
		              <th>邮箱</th>
		              <th>企业名称</th>
		              <th>所在区域</th>
		              <th>详细地址</th>
		              <th>电话</th>
		              <th>所属行业</th>
		              <th>注册时间</th>
		              <th>操作</th>
		            </tr>
		          </thead>
		          <tbody>
								@foreach ($datas as $data)	
		            <tr>
		              <td>{{$data->id}}</td>
		              <td>{{$data->name}}</td>
		              <td>{{$data->email}}</td>
		              <td>{{$data->company_name}}</td>
									<td>{{$data->area_name}}</td>
		              <td>{{$data->address}}</td>
		              <td>{{$data->tel}}</td>
		              <td>{{$data->industry_name}}</td>
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