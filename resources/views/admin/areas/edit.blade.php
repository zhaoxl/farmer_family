@extends('admin.base')

@section('content')
  <div class="pageheader">
    <h2><i class="fa fa-envelope"></i> 编辑城市 </h2>
  </div>
  
  <div class="contentpanel">
		<div class="panel panel-default">
			<form id="login_form" class="form-horizontal form-bordered" method="POST" action="/admin/areas/{{$data->id}}">
				<input type="hidden" name="_method" value="PUT" />
				<input type="hidden" name="_token" value="{{ csrf_token() }}" />
      	<div class="panel-body panel-body-nopadding">
          <div class="form-group">
            <label class="col-sm-3 control-label">所属省份</label>
            <div class="col-sm-6">
							<select class="form-control input-sm mb15" name="provincecode">
								@foreach ($provinces as $province)
								<option value="{{$province->code}}" {{$data->provincecode == $province->code ? 'selected' : ''}}>{{$province->name}}</option>
								@endforeach
              </select>
            </div>
					</div>
          <div class="form-group">
            <label class="col-sm-3 control-label">城市名称</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="name" value="{{$data->name}}" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">城市编码</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="code" value="{{$data->code}}" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">热门城市</label>
            <div class="col-sm-6">
							<div class="checkbox block">
								<label>
									<input type="checkbox" name="is_hot" {{$data->is_hot == true ? "checked" : ''}} />
								</label>
							</div>
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