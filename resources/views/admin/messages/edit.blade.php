@extends('admin.base')

@section('content')
  <div class="pageheader">
    <h2><i class="fa fa-envelope"></i> 站内信息 </h2>
  </div>
  
  <div class="contentpanel">
		<div class="panel panel-default">
			<form id="login_form" class="form-horizontal form-bordered" method="POST" action="{{ url('/admin/messages/'.$data->id) }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="_method" value="PUT">
      	<div class="panel-body panel-body-nopadding">
          <div class="form-group">
            <label class="col-sm-3 control-label">收件人</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" value="{{$data->getToUserNameAttribute()}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">发件人</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" value="{{$data->getFromUserNameAttribute()}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">标题</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="title" value="{{$data->title}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">内容</label>
            <div class="col-sm-6">
              <textarea class="form-control" name="content">{{$data->content}}</textarea>
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