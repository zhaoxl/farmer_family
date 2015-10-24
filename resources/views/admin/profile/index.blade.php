@extends('admin.base')

@section('content')
  <div class="pageheader">
    <h2><i class="fa fa-envelope"></i> 账号设置 </h2>
  </div>
  
  <div class="contentpanel">
		<div class="panel panel-default">
			<form id="login_form" class="form-horizontal form-bordered" method="POST" action="{{ url('/admin/profile') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
      	<div class="panel-body panel-body-nopadding">
          <div class="form-group">
            <label class="col-sm-3 control-label">姓名</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="admin[name]" value="{{$admin->name}}" placeholder="姓名">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">mobile</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="admin[mobile]" value="{{$admin->mobile}}" placeholder="手机号">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">qq</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="admin[qq]" value="{{$admin->qq}}" placeholder="QQ">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">weixin</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="admin[weixin]" value="{{$admin->weixin}}" placeholder="微信">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">email</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="admin[email]" value="{{$admin->email}}" placeholder="邮箱" readonly="true" disabled="true">
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