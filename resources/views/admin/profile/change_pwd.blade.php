@extends('admin.base')

@section('content')
  <div class="pageheader">
    <h2><i class="fa fa-envelope"></i> 账号设置 </h2>
  </div>
  
  <div class="contentpanel">
		<div class="panel panel-default">
			<form id="login_form" class="form-horizontal form-bordered" method="POST" action="{{ url('/admin/profile/change_pwd') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
      	<div class="panel-body panel-body-nopadding">
          <div class="form-group">
            <label class="col-sm-3 control-label">原始密码</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="old_pwd" placeholder="原始密码">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">新密码</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="new_pwd" placeholder="新密码">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">确认新密码</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="re_new_pwd" placeholder="确认新密码">
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