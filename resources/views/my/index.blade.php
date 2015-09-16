@extends('my.layout')
@section('content')
<!--<div class="register_mes_box">
<table width="100%"  class="register_mes_table">
<tr>
<td width="15%" align="right">姓名:</td>
<td width="85%" >王操蛋</td>
</tr>
<tr>
<td align="right">手机号:</td>
<td>13122342322 &nbsp; &nbsp; &nbsp; &nbsp;QQ:122312434234  &nbsp; &nbsp; &nbsp; &nbsp;微信:23234234sw &nbsp; &nbsp; &nbsp; &nbsp; 邮箱：323423@2sdf.com </td>
</tr>
<tr>
<td align="right">所在区域:</td>
<td>北京市西城区体坛日报</td>
</tr>
<tr>
<td align="right">年龄:</td>
<td>28</td>
</tr>
<tr>
<td align="right">性别:</td>
<td>女</td>
</tr>
<tr>
<td align="right">籍贯:</td>
<td>山东省浪逼市荡妇县</td>
</tr>
<tr>
<td align="right">工作:</td>
<td>卖淫，卖肉</td>
</tr>
<tr>
<td align="right">身份证:</td>
<td><img src="" width="80"  alt=""></td>
</tr>
<tr>
<td align="right">个人照片:</td>
<td><img src="" width="80"  alt=""></td>
</tr>
<tr>
<td align="right">学历证书:</td>
<td><img src="" width="80"  alt=""></td>
</tr>
<tr>
<td align="right">期望收入:</td>
<td>一炮八百</td>
</tr>
<tr>
<td  colspan="2" >
<a href="" class="btn_a_style1">
修改
</a>
</td>
</tr>
</table>
</div>-->
<div class="register_mes_Modify">
	<table width="100%" class="register_mes_table"  >
		<tr>
			<td width="15%" align="right">
				姓名：
			</td>
			<td width="40%">
				<div class="form-group">
					<input type="text" class="form-control" name="name" id="" placeholder="请输入您的年龄">
				</div>
			</td>
			<td width="45%">
			</td>
		</tr>
		<tr>
			<td width="15%" align="right">
				联系方式：
			</td>
			<td width="40%">
				<div class="form-group">
					<input type="text" class="form-control" name="mobile" id="" placeholder="请输入您的手机号">
				</div>
			</td>
			<td width="45%">
				<a href="javascript" id='send_mes'  class="send_mes" >
					发送验证码到手机
				</a>
			</td>
		</tr>
		<tr>
			<td width="15%" align="right">
			</td>
			<td width="40%">
				<div class="form-group text_input_box">
					<label for="mboile_verification">验证码:</label>
					<input type="text" class="form-control mboile_verification" id="mboile_verification"  placeholder="验证码">
					<span class="error">333</span>
				</div>
			</td>
			<td width="45%">
			</td>
		</tr>
		<tr>
			<td width="15%" align="right">
			</td>
			<td  colspan="2"  class="qq_wx_email">
				<div class="form-group text_input_box">
					<label for="mboile_verification">验证码:</label>
					<input type="text" class="form-control " id="mboile_verification"  placeholder="验证码">
					<span class="error">333</span>
				</div>
				<div class="form-group text_input_box">
					<label for="mboile_verification">验证码:</label>
					<input type="text" class="form-control " id="mboile_verification"  placeholder="验证码">
					<span class="error">333</span>
				</div>
				<div class="form-group text_input_box">
					<label for="mboile_verification">验证码:</label>
					<input type="text" class="form-control " id="mboile_verification"  placeholder="验证码">
					<span class="error">333</span>
				</div>
			</td>
		</tr>
		<tr>
			<td width="15%" align="right">
				公开联系方式:
			</td>
			<td colspan="2"  class="gklxfs">
					<div class="checkbox">
						<label>
							<input type="checkbox">
							手机
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox">
							QQ号
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox">
							微信
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox">
							邮箱
						</label>
					</div>
			</td>
			
		</tr>
		<tr>
			<td width="15%" align="right">
				所在区域：
			</td>
			<td colspan="2" class="select_area">
				<div class="form_select_box">
				<select class="form-control">
                    <option>选择省份</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                 </select>
                 </div>
                 <div class="form_select_box">
				<select class="form-control">
                    <option>选择省份</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                 </select>
                 </div>
                 <div class="form_select_box">
				<select class="form-control">
                    <option>选择省份</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                 </select>
                 </div>
                 <div class="form_select_box">
				<select class="form-control">
                    <option>选择省份</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                 </select>
                 </div>
			</td>
		</tr>
		<tr>
			<td width="15%" align="right">
				生日:
			</td>
			<td width="40%">
				<div class="form-group">
					<input type="text" class="form-control" name="name" id="" placeholder="请输入您的生日例“1990-10-01”">
				</div>
			</td>
			<td width="45%">
			</td>
		</tr>
		<tr>
			<td width="15%" align="right">
				性别:
			</td>
			<td width="40%">
				
			</td>
			<td width="45%">
			</td>
		</tr>
	</table>
</div>
@endsection
