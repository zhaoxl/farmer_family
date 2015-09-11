$(function(){
	$("#index .login_box .uname").focus(function(){
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