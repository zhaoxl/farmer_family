@extends('admin.base')

@section('content')
  <div class="pageheader">
    <h2><i class="fa fa-envelope"></i> 编辑工种 </h2>
  </div>
  
  <div class="contentpanel">
		<div class="panel panel-default">
			<form id="login_form" class="form-horizontal form-bordered" method="POST" action="/admin/work_categories/{{$data->id}}">
				<input type="hidden" name="_method" value="PUT" />
				<input type="hidden" name="_token" value="{{ csrf_token() }}" />
      	<div class="panel-body panel-body-nopadding">
          <div class="form-group">
            <label class="col-sm-3 control-label">名称</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="name" value="{{$data->name}}" placeholder="名称"/>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">完整名称</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="full_name" value="{{$data->full_name}}" placeholder="完整名称"/>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">显示顺序</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="sort" placeholder="显示顺序" value="{{$data->sort}}"/>
            </div>
          </div>
      	</div><!-- panel-body -->
      	<div class="panel-footer">
		 			<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
			  			<button class="btn btn-primary" type="submit">保存</button>&nbsp;
			  		 	<a class="btn btn-default" href="{{ URL::previous() }}">取消</a>
					 	</div>
		 			</div>
	  		</div><!-- panel-footer -->
 		 </form>
  	</div>
  </div>		
					
@endsection
