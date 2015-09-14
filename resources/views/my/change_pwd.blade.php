@extends('my.layout')
@section('content')

<div class="change_pwd">
	<form id="change_pwd">
	<table class="change_table">
		<tr>
			<td width="25%" align="right">原密码：</td>
			<td width="50%">
				<input type="password" name="passward" />
			</td>
			<td width="25%"></td>
			
		</tr>
		<tr>
			<td width="25%" align="right">新密码：</td>
			<td width="50%">
				<input type="password" name="new_passward" id="new_passward" />
			</td>
			<td width="25%"></td>
			
		</tr>
		<tr>
			<td width="25%" align="right">重复密码：</td>
			<td width="50%">
				<input type="password" name="confirm_new_password" />
			</td>
			<td width="25%"></td>
			
		</tr>
		<tr>
			<td width="25%" align="right">手机号：</td>
			<td width="50%">
				<input type="text" name="mobile" />
			</td>
			<td width="25%">
               <a href="javascript:void(0)">发送验证码到手机</a>				
			</td>
			
		</tr>
		
		<tr>
			<td width="25%" align="right"></td>
			<td width="50%">
				<label class="lab_yzm">验证码：</label><input type="text" name="" class="yzm"  />
			</td>
			<td width="25%"></td>
			
		</tr>
		<tr>
			<td width="25%" align="right"></td>
			<td width="50%">
				<input type="submit" value="下一步" class="next_btn" />
			</td>
			<td width="25%"></td>
		</tr>
	</table>
	</form>
	
</div>
<script>
	  var validate = $("#change_pwd").validate({
	                debug: true, //调试模式取消submit的默认提交功能   
	                //errorClass: "label.error", //默认为错误的样式类为：error   
	                focusInvalid: false, //当为false时，验证无效时，没有焦点响应  
	                onkeyup: false,   
	                submitHandler: function(form){   //表单提交句柄,为一回调函数，带一个参数：form   
	                    form.submit();   //提交表单   
	                },   
                
	                rules:{
	                    passward:{
	                        required:true
	                    },
	                    new_passward:{
	                        required:true
	                    },
	                    confirm_new_password:{
	                        required:true,
	                        equalTo:"#new_passward"
	                    },
	                    mobile:{
	                    	    required:true,
	                    	     phone:true
	                    	    
	                    }
	  
	                },
	                messages:{
	                    passward:{
	                        required:"必填"
	                    },
	                     new_passward:{
	                        required:"必填"
	                    },
	                    confirm_new_password:{
	                        required:"必填",
	                        equalTo:"与新密码输入的不一致"
	                    },
	                    mobile:{
	                    	   required:"必填",
	                    	   phone:'请输入正确的电话号码'
	                    }
                                     
	                }
                          
	            });    
	
	    jQuery.validator.addMethod("phone", function(value, element) {
	    var length = value.length;
	    var mobile =  /^(((13[0-9]{1})|(15[0-9]{1}))+\d{8})$/
	    return this.optional(element) || (length == 11 && mobile.test(value));
	}, "手机号码格式错误");  
	
</script>

@endsection
