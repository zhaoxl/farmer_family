$(function(){
	//注册按钮
	$(".reg_btn").mouseover(function(){
		$(this).find("div").show();
	}).mouseout(function(){
		$(this).find("div").hide();
	});
	
	//登陆框
	$("#index .login_box .mobile").focus(function(){
		if($(this).val() == "请输入手机号")
		{
			$(this).val("");
		}
	}).blur(function(){
		if($(this).val() == "")
		{
			$(this).val("请输入手机号");
		}
	});
	
	$("#index .login_box .pwd").focus(function(){
		if($(this).val() == "请输入密码")
		{
			$(this).val("").attr("type", "password");
		}
	}).blur(function(){
		if($(this).val() == "")
		{
			$(this).val("请输入密码").attr("type", "text");
		}
	});
	
});

  var validate = $("#login_form").validate({
    //errorClass: "label.error", //默认为错误的样式类为：error   
    focusInvalid: true, //当为false时，验证无效时，没有焦点响应  
    onkeyup: false,   
    submitHandler: function(form){   //表单提交句柄,为一回调函数，带一个参数：form   
    	form.submit();   //提交表单   
    },   
		errorPlacement: function(error, element) {
			$("#login_form input.error").each(function() {
				if ($(element).is(":checkbox"))
				{
					$(element).parent().css("color", "red");
				}
				else
				{
					$(element).attr($(element).attr('html'), $(error).html());
				}
			});
		},   
    rules:{
			mobile:{
			  required:true,
			  phone:true
			},
			password:{
				required:true,
				rangelength:[3,10],
				pwd: true
			}
    },
    messages:{
      mobile:{
      	required:"请输入手机号",
      	phone:'手机号码格式错误'
      },
		 password:{
		   required: "请输入密码",
		 }
   }
});    
jQuery.validator.addMethod("phone", function(value, element) {
  var length = value.length;
  var mobile = /^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/
  return this.optional(element) || (length == 11 && mobile.test(value));
}, "手机号码格式错误");  