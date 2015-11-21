@extends('admin.base')

@section('content')
  <div class="pageheader">
    <h2><i class="fa fa-envelope"></i> 发布信息管理 <span>发布雇人信息</span></h2>
  </div>
  
  <div class="contentpanel">
		<div class="row">
			<div class="col-md-13">
				<div class="panel panel-primary">
					<div class="panel-body panel-body-nopadding">
						
						<form class="form-horizontal" id="register_form" role="form" method="POST" action="/admin/staffs">
							<input type="hidden" name="_method" value="PUT" />
							<input type="hidden" name="_token" value="{{ csrf_token() }}" />
							<input type="hidden" id="area_name" name="area_name" value="{{$data->area_name}}"/>        
		            <div class="form-group">
								  <label for="disabledinput" class="col-sm-3 control-label">用户</label>
								  <div class="col-sm-6">
										<select name="city" id="area_city" class="form-control" style="{{isset($area_cities) ? '' : 'display: none'}}">
											@foreach ($present_users as $user)
												<option value="{{ $user->id }}" {{$data->user_id == $user->id ? 'selected' : ''}}>{{ $user->name }}</option>
											@endforeach
										</select>
								  </div>
								</div>
      
								</div>
		            <div class="form-group">
								  <label for="disabledinput" class="col-sm-3 control-label"></label>
								  <div class="col-sm-6">
										<input type="submit" class="btn btn-primary" value="保存" />
								  </div>
								</div>
		          </form>
    
		        </div>
		    </div>
			</div>
		</row>
  </div>