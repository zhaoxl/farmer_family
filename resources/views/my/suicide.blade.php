@extends('my.layout')
@section('content')
<div class="suicide_box">
	<!--成功后-->
	@if(isset($success))
	<div class="suicide_success">
	  <h3><img src="/images/zx_successed_iocn.jpg">
	  您的注销申请已经提交
	  </h3>
	  <p>如果以后想要恢复账户，请您联系爱农之家QQ:434342323</p>
	</div>
	@else
	<h2>
		请告诉我们您想要注销的原因
	</h2>
	<form action="/my/suicide" id="form" method="post" accept-charset="utf-8">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<table  width="100%" class="suicide_table">
			<tr>
				<td width="10%" align="right">
					<input type="checkbox" name="reason[]" value="不能帮助我找到工作" />
				</td>
				<td width="90%">
					不能帮助我找到工作
				</td>
			</tr>
			<tr>
				<td width="10%" align="right">
					<input type="checkbox" name="reason[]" value="不能帮助我找到干活的人" />
				</td>
				<td width="90%">
					不能帮助我找到干活的人
				</td>
			</tr>
			<tr>
				<td width="10%" align="right">
					<input type="checkbox" name="reason[]" value="网站操作不便/难" />
				</td>
				<td width="90%">
					网站操作不便/难
				</td>
			</tr>
			<tr>
				<td width="10%" align="right">
					<input type="checkbox" name="reason[]" value="其他同类网站更好" />
				</td>
				<td width="90%">
					其他同类网站更好
				</td>
			</tr>
			<tr>
				<td width="10%" align="right">
					<input type="checkbox" name="reason[]" value="我没有找活/雇人的需求了" />
				</td>
				<td width="90%">
					我没有找活/雇人的需求了
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<textarea class="text_area" id="text_area" name="content" placeholder="请输入注销账户的原因!">请输入注销账户的原因!</textarea>				
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit"  value="我要注销账户" class="btn_zx" />
				</td>
			</tr>
		</table>
	</form>
	@endif
</div>
<script>
	$("#form").submit(function(){
		if($('#text_area').val() == '' || $('#text_area').val() == '请输入注销账户的原因!')
		{
			$('#text_area').after('<span style="color: red; display: block; margin-left: 39px">请输入注销账户的原因!</span>');
			return false;
		}
	});
	$('#text_area').bind({
	'focus': function() {
		if ($.trim($(this).val()) == '请输入注销账户的原因!') {
			$(this).html('');
			$(this).css('color','#565656');
			$(this).parent().find("span").remove();
		}
	},
	'blur':function(){
		if ($.trim($(this).val()) == '') {
			$(this).text('请输入注销账户的原因!')
		}
	}
   })
</script>
@endsection
