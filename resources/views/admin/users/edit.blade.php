@extends('admin.base')

@section('content')
  <div class="pageheader">
    <h2><i class="fa fa-envelope"></i> 用户 <span>所有用户</span></h2>
  </div>
  
  <div class="contentpanel">
		<div class="row">
			<div class="col-md-13">
				<div class="panel panel-primary">
					<div class="panel-body panel-body-nopadding">
          
					          <form class="form-horizontal form-bordered">
            
					            <div class="form-group">
					              <label class="col-sm-3 control-label">ID</label>
					              <div class="col-sm-6">
					              <label class="control-label">{{$data->id}}</label>
					              </div>
					            </div>
            
					            <div class="form-group">
											  <label for="disabledinput" class="col-sm-3 control-label">手机号</label>
											  <div class="col-sm-6">
												 <input type="text" class="form-control" placeholder="手机号" value="{{$data->mobile}}">
											  </div>
											</div>
            
					            <div class="form-group">
											  <label for="disabledinput" class="col-sm-3 control-label">Email</label>
											  <div class="col-sm-6">
												 <input type="text" class="form-control" placeholder="Email" value="{{$data->email}}">
											  </div>
											</div>
            
					            <div class="form-group">
											  <label for="disabledinput" class="col-sm-3 control-label">QQ</label>
											  <div class="col-sm-6">
												 <input type="text" class="form-control" placeholder="QQ" value="{{$data->qq}}">
											  </div>
											</div>
            
					            <div class="form-group">
											  <label for="disabledinput" class="col-sm-3 control-label">微信</label>
											  <div class="col-sm-6">
												 <input type="text" class="form-control" placeholder="微信" value="{{$data->weixin}}">
											  </div>
											</div>
            
					            <div class="form-group">
											  <label for="disabledinput" class="col-sm-3 control-label">公开联系方式</label>
											  <div class="col-sm-6">
													<div class="checkbox block" style="width: 100px; float: left"><label><input type="checkbox" name="public_mobile" class="ck" {{$data->public_mobile ? 'checked' : ''}}>手机</label></div>
													<div class="checkbox block" style="width: 100px; float: left"><label><input type="checkbox" name="public_qq" class="ck" {{$data->public_qq ? 'checked' : ''}}>QQ号</label></div>
													<div class="checkbox block" style="width: 100px; float: left"><label><input type="checkbox" name="public_weixin" class="ck" {{$data->public_weixin ? 'checked' : ''}}>微信</label></div>
													<div class="checkbox block" style="width: 100px; float: left"><label><input type="checkbox" name="public_email" class="ck" {{$data->public_email ? 'checked' : ''}}>邮箱</label></div>
											  </div>
											</div>
            
					            <div class="form-group">
									  <label for="readonlyinput" class="col-sm-3 control-label">Read-Only Input</label>
									  <div class="col-sm-6">
										 <input type="text" readonly="readonly" class="form-control" id="readonlyinput" value="Read Only Input">
									  </div>
									</div>
            
					            <div class="form-group">
					              <label class="col-sm-3 control-label">Help Text</label>
					              <div class="col-sm-6">
					                <input type="text" class="form-control" placeholder="Help Text">
					                <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
					              </div>
					            </div>
            
					            <div class="form-group">
					              <label class="col-sm-3 control-label">Input w/ Tooltip</label>
					              <div class="col-sm-6">
					                <input type="text" class="form-control tooltips" data-trigger="hover" data-toggle="tooltip" title="" placeholder="Hover me" data-original-title="Tooltip goes here">
					              </div>
					            </div>
            
					            <div class="form-group">
					              <label class="col-sm-3 control-label">Input w/ Popover</label>
					              <div class="col-sm-6">
					                <input type="text" data-trigger="click" data-content="Content goes here..." data-original-title="The Title" data-placement="top" data-toggle="popover" class="form-control popovers" placeholder="Click Me">
					              </div>
					            </div>
            
					            <div class="form-group">
					              <label class="col-sm-3 control-label">Placeholder</label>
					              <div class="col-sm-6">
					                <input type="text" class="form-control" placeholder="This is a placeholder">
					              </div>
					            </div>
            
					            <div class="form-group has-success">
					              <label class="col-sm-3 control-label">Input with success</label>
					              <div class="col-sm-6">
					                <input type="text" class="form-control">
					              </div>
					            </div>
            
					            <div class="form-group has-warning">
					              <label class="col-sm-3 control-label">Input with warning</label>
					              <div class="col-sm-6">
					                <input type="text" class="form-control">
					              </div>
					            </div>
            
					            <div class="form-group has-error">
					              <label class="col-sm-3 control-label">Input with error</label>
					              <div class="col-sm-6">
					                <input type="text" class="form-control">
					              </div>
					            </div>
            
					            <div class="form-group">
					              <label class="col-sm-3 control-label">Column sizing</label>
					              <div class="col-sm-4">
					                <input type="text" class="form-control" placeholder=".col-sm-4">
					              </div>
					              <div class="col-sm-3">
					                <input type="text" class="form-control" placeholder=".col-sm-3">
					              </div>
					              <div class="col-sm-2">
					                <input type="text" class="form-control" placeholder=".col-sm-2">
					              </div>
					            </div>
            
					            <div class="form-group">
					              <label class="col-sm-3 control-label">Input Sizing</label>
					              <div class="col-sm-5">
					                <input type="text" class="form-control input-sm mb15" placeholder=".input-sm">
					                <input type="text" class="form-control mb15" placeholder="default">
					                <input type="text" class="form-control input-lg" placeholder=".input-lg">
					              </div>
					            </div>
            
					            <div class="form-group">
					              <label class="col-sm-3 control-label">Input Tags</label>
					              <div class="col-sm-7">
					                <input value="foo,bar,baz" class="form-control" id="tags" name="tags" style="display: none;"><div class="tagsinput" id="tags_tagsinput" style="width: auto; height: 100px;"><span class="tag"><span>foo&nbsp;&nbsp;</span><a href="#" title="Removing tag">x</a></span><span class="tag"><span>bar&nbsp;&nbsp;</span><a href="#" title="Removing tag">x</a></span><span class="tag"><span>baz&nbsp;&nbsp;</span><a href="#" title="Removing tag">x</a></span><div id="tags_addTag"><input data-default="add a tag" value="" id="tags_tag" style="color: rgb(102, 102, 102); width: 68px;"></div><div class="tags_clear"></div></div>
					              </div>
					            </div>
            
					            <div class="form-group">
					              <label class="col-sm-3 control-label">Textarea</label>
					              <div class="col-sm-7">
					                <textarea rows="5" class="form-control"></textarea>
					              </div>
					            </div>
            
					            <div class="form-group">
					              <label class="col-sm-3 control-label">Autogrow Textarea</label>
					              <div class="col-sm-7">
					                <textarea rows="5" class="form-control" id="autoResizeTA" style="height: 108px;"></textarea>
					              </div>
					            </div>
            
					            <div class="form-group">
					              <label class="col-sm-3 control-label">Radio</label>
					              <div class="col-sm-6">
										 <div class="radio"><label><input type="radio"> Unchecked</label></div>
										 <div class="radio"><label><input type="radio" checked=""> Checked</label></div>
										 <div class="radio"><label><input type="radio" disabled=""> Disabled Unchecked</label></div>
										 <div class="radio"><label><input type="radio" disabled="" checked=""> Disabled Checked</label></div>
									  </div>
					            </div>
            
					            <div class="form-group">
									  <label for="checkbox" class="col-sm-3 control-label">Checkbox</label>
									  <div class="col-sm-6">
										 <div class="checkbox block"><label><input type="checkbox"> Unchecked</label></div>
										 <div class="checkbox block"><label><input type="checkbox" checked=""> Checked</label></div>
										 <div class="checkbox block"><label><input type="checkbox" disabled=""> Disabled Unchecked</label></div>
										 <div class="checkbox block"><label><input type="checkbox" disabled="" checked=""> Disabled Checked</label></div>
									  </div>
									</div>
            
            
					            <div class="form-group">
					              <label class="col-sm-3 control-label">Spinner</label>
					              <div class="col-sm-9">
					                <span class="ui-spinner ui-widget ui-widget-content ui-corner-all"><input type="text" id="spinner" class="ui-spinner-input" autocomplete="off" role="spinbutton" aria-valuenow="0"><a class="ui-spinner-button ui-spinner-up ui-corner-tr" tabindex="-1"><span class="ui-icon ui-icon-triangle-1-n">▲</span></a><a class="ui-spinner-button ui-spinner-down ui-corner-br" tabindex="-1"><span class="ui-icon ui-icon-triangle-1-s">▼</span></a></span>
					                <span class="help-block">Enhance a text input for entering numeric values, with up/down buttons and arrow key handling.</span>
					              </div>
					            </div>
            
					          </form>
          
					        </div>
		    </div>
			</div>
		</row>
  </div>		
					
@endsection