var send_sms_second = 60;
var send_sms_timer = null;
var send_sms_visible = false;

$(function(){
	send_sms_second = parseInt($("#send_sms_second").val());
	//启动计时器
	timer();
	
	//$(".send_sms_btn").css("color", "#AAAAAA");
	
	$("#v_mobile").keyup(function(){
		var _this = $(this);
		var regexp = /^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
		if(regexp.test(_this.val()))
		{
			send_sms_visible = true;
			$(".send_sms_btn").css("color", "#2cc378");
		}
		else
		{
			send_sms_visible = false;
			$(".send_sms_btn").css("color", "#AAAAAA");
		}
		console.log(send_sms_visible);
	});
	
	$(".send_sms_btn").click(function(){
		if(send_sms_visible == false)
		{
			return false;
		}
		var regexp = /^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
		var mobile = $("#v_mobile").val();
		var token = $('[name="_token"]').val();
		
		if(!regexp.test(mobile))
		{
			return false;
		}
		//发送
		send_sms_visible = false;
    $.ajax({
      type: "POST",
      url: '/auth/send-sms',
			data: {'mobile': mobile, '_token': token},
      success: function(result) {
				if(result == "error")
				{
					$("#send_sms_result_label").html("发送失败，请稍后再试");
				}
      }
    });
		//启动计时器
		send_sms_second = 60;
		timer();
	});
});

function timer()
{
	if(send_sms_timer != "undefined")
		clearInterval(send_sms_timer);
	//计时器
	send_sms_timer = setInterval(function(){
		send_sms_second -= 1;
		if(send_sms_second < 1)
		{
			send_sms_visible = true;
			send_sms_second = 60;
			$(".send_sms_btn").val("发送验证码到手机");	
			clearInterval(send_sms_timer);
		}
		else
		{
			$(".send_sms_btn").val(send_sms_second+"秒后可重新发送");	
		}
	}, 1000);
}