@extends('admin.base')

@section('content')
  <div class="pageheader">
    <h2><i class="fa fa-envelope"></i> 添加区县 </h2>
  </div>
  
  <div class="contentpanel">
		<div class="panel panel-default">
			<form id="login_form" class="form-horizontal form-bordered" method="POST" action="/admin/areas/{{$city->id}}/streets">
				<input type="hidden" name="_token" value="{{ csrf_token() }}" />
				<input type="hidden" name="city_id" value="{{$city->id}}" />
				<input type="hidden" name="citycode" value="{{$city->code}}" />
      	<div class="panel-body panel-body-nopadding">
          <div class="form-group">
            <label class="col-sm-3 control-label">区县名称</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="name" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">区县编码</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="code" />
            </div>
          </div>
      	</div><!-- panel-body -->
      	<div class="panel-footer">
		 			<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
			  			<button class="btn btn-primary" type="submit">保存</button>&nbsp;
			  		 	<a class="btn btn-default" href="/admin/areas/{{$city->id}}/streets">取消</a>
					 	</div>
		 			</div>
	  		</div><!-- panel-footer -->
 		 </form>
  	</div>
  </div>		
					
@endsection
