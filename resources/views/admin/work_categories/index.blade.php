@extends('admin.base')

@section('content')
  <div class="pageheader">
    <h2><i class="fa fa-envelope"></i> 工种管理 </h2>
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
		              <th>名称</th>
		              <th>完整名称</th>
		              <th>显示顺序</th>
		              <th>操作</th>
		            </tr>
		          </thead>
		          <tbody>
								@foreach ($datas as $data)	
		            <tr>
		              <td>{{$data->id}}</td>
		              <td>{{$data->name}}</td>
		              <td>{{$data->full_name}}</td>
		              <td>{{$data->sort}}</td>
									<td>
										<a href="/admin/work_categories/{{$data->id}}/edit">编辑</a>&nbsp;
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
	      url: '/admin/work_categories/' + id,
				data: {'_token': '{{ csrf_token() }}'},
	      success: function(result) {
	        location.reload();
	      }
	    });
	  }
	}
	</script>
@endsection