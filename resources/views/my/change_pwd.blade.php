@extends('my.layout')
@section('content')

<div class="change_pwd">
	<form>
	<table class="change_table">
		<tr>
			<td width="25%" align="right">原密码：</td>
			<td width="50%">
				<input type="password" name="" />
			</td>
			<td width="25%"></td>
			
		</tr>
		<tr>
			<td width="25%" align="right">新密码：</td>
			<td width="50%">
				<input type="password" name="" />
			</td>
			<td width="25%"></td>
			
		</tr>
		<tr>
			<td width="25%" align="right">重复密码：</td>
			<td width="50%">
				<input type="password" name="" />
			</td>
			<td width="25%"></td>
			
		</tr>
		<tr>
			<td width="25%" align="right">手机号：</td>
			<td width="50%">
				<input type="text" name="" />
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

@endsection
