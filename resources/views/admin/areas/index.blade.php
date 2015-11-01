@extends('admin.base')

@section('content')
  <div class="pageheader">
    <h2><i class="fa fa-envelope"></i> 地区管理 </h2>
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
		              <th>省</th>
		              <th>市</th>
		              <th>地区编码</th>
		              <th>显示顺序</th>
		              <th>热门地区</th>
		              <th>操作</th>
		            </tr>
		          </thead>
		          <tbody>
								@foreach ($datas as $data)	
		            <tr>
		              <td>{{$data->id}}</td>
		              <td>{{$data->province_name}}</td>
		              <td>{{$data->name}}</td>
		              <td>{{$data->code}}</td>
		              <td>{{$data->sort}}</td>
									<td>{!!$data->isHot()!!}</td>
									<td>
										<a href="/admin/areas/{{$data->id}}/streets">区县管理</a>&nbsp;
										<a href="/admin/areas/{{$data->id}}/edit">编辑</a>&nbsp;
										<a href="javascript:deleteItem({{$data->id}});">删除</a>
									</td>
		            </tr>
								@endforeach
		          </tbody>
		        </table>
					</div>
		    </div>
			</div>
		</row>
  </div>		
					
	<script type="text/javascript">
	function deleteItem(id) {
		if (confirm('确定删除?')) {
	    $.ajax({
	      type: "DELETE",
	      url: '/admin/areas/' + id,
				data: {'_token': '{{ csrf_token() }}'},
	      success: function(result) {
	        location.reload();
	      }
	    });
	  }
	}
	</script>
@endsection