@extends('admin.base')

@section('content')
  <div class="pageheader">
    <h2><i class="fa fa-envelope"></i> 系统设置 </h2>
  </div>
  
  <div class="contentpanel">
		<div class="panel panel-default">
			<form id="login_form" class="form-horizontal form-bordered" method="POST" action="{{ url('/admin/settings') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
      	<div class="panel-body panel-body-nopadding">
					@foreach ($datas as $data)	
          <div class="form-group">
            <label class="col-sm-3 control-label">{{$data->name}}</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="setting[{{$data->key}}]" value={{$data->val}} placeholder="{{$data->name}}">
            </div>
          </div>
					@endforeach
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