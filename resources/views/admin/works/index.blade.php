@extends('admin.base')

@section('content')
  <div class="pageheader">
    <h2><i class="fa fa-envelope"></i> 发布信息管理 <span>雇人信息</span></h2>
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
		              <th>发布人</th>
		              <th>标题</th>
		              <th>行业</th>
		              <th>工种</th>
		              <th>区域</th>
		              <th>报酬</th>
		              <th>服务时间</th>
		              <th>所需人数</th>
		              <th>发布时间</th>
		              <th>修改时间</th>
		              <th>置顶</th>
		              <th>操作</th>
		            </tr>
		          </thead>
		          <tbody>
								@foreach ($datas as $data)	
		            <tr>
		              <td>{{$data->id}}</td>
		              <td>{{is_null($data->user) ? '' : $data->user->name}}</td>
		              <td>{{$data->title}}</td>
		              <td>{{$data->industry_name}}</td>
		              <td>{{$data->work_category_name}}</td>
									<td>{{$data->area_name}}</td>
									<td>{{$data->price}}</td>
									<td>
										@if(isset($data->start_at) || isset($data->end_at))
											{{date('Y-m-d', strtotime($data->start_at))}}
											&nbsp;-&nbsp;
											{{date('Y-m-d', strtotime($data->end_at))}}
										@else
											长期
										@endif
									</td>
									<td>{{$data->people_number}}</td>
									<td>{{$data->created_at}}</td>
									<td>{{$data->updated_at}}</td>
									<td>{!!$data->isTop()!!}</td>
									<td>
										<a href="/admin/works/refresh?id={{$data->id}}">刷新</a>&nbsp;
										<a href="/admin/works/top?id={{$data->id}}">置顶</a>&nbsp;
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