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
						<option>
							选择省份
						</option>
						<option>
							2
						</option>
						<option>
							3
						</option>
						<option>
							4
						</option>
						<option>
							5
						</option>
					</select>
				</div>
				<div class="form_select_box">
					<select class="form-control">
						<option>
							选择省份
						</option>
						<option>
							2
						</option>
						<option>
							3
						</option>
						<option>
							4
						</option>
						<option>
							5
						</option>
					</select>
				</div>
				<div class="form_select_box">
					<select class="form-control">
						<option>
							选择省份
						</option>
						<option>
							2
						</option>
						<option>
							3
						</option>
						<option>
							4
						</option>
						<option>
							5
						</option>
					</select>
				</div>
				<div class="form_select_box">
					<select class="form-control">
						<option>
							选择省份
						</option>
						<option>
							2
						</option>
						<option>
							3
						</option>
						<option>
							4
						</option>
						<option>
							5
						</option>
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
			<td width="40%" class="select_sex">
				<div class="radio">
					<label>
						<input type="radio" name="sex" id="blankRadio1"  checked="checked" value="男" aria-label="男">
						男
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="sex" id="blankRadio1" value="女" aria-label="男">
						女
					</label>
				</div>
			</td>
			<td width="45%">
			</td>
		</tr>
		<tr>
			<td width="15%" align="right">
				籍贯:
			</td>
			<td width="40%">
				<div class="form-group">
					<input type="text" class="form-control" name="name" id="" placeholder="请输入您的籍贯省市">
				</div>
			</td>
			<td width="45%">
			</td>
		</tr>
		<tr>
			<td width="15%" align="right">
				工种:
			</td>
			<td width="100%" colspan="2" class="select_job">
			  <div class="form_select_box">
			   <select class="form-control">
			   	<option>选择工种</option>
			   </select>
			  </div>
			   <div class="form_select_box">
			   <select class="form-control">
			   	<option>选择工种</option>
			   </select>
			  </div>
			  <a href="javascript:void(0)" class="add_job_btn btnstyle_1">添加</a>
			  <div class="red_tx">*您能够干哪些类型的活，例如：厨师，耕种，有几种填几种</div>
			  
			</td>
		</tr>
		<tr>
			<td width="15%" align="right">
				个人照片:
			</td>
			<td width="40%">
				<div class="form-group">
					<input type="text" class="form-control" name="name" id="" placeholder="个人照片">
				</div>
			</td>
			<td width="45%">
				<a  href="#"  class="btnstyle_1">添加</a>
				<a  href="#"  class="btnstyle_1">上传</a>
				<span class="right_tx">*照片文件不大于500KB</span>
			</td>
		</tr>
		<tr>
			<td width="15%" align="right">
				学历证书:
			</td>
			<td width="40%">
				<div class="form-group">
					<input type="text" class="form-control" name="name" id="" placeholder="学历证书">
				</div>
			</td>
			<td width="45%">
				<a  href="#"  class="btnstyle_1">添加</a>
				<a  href="#"  class="btnstyle_1">上传</a>
				<span class="right_tx">*照片文件不大于500KB</span>
			</td>
		</tr>
		<tr>
			<td width="15%" align="right">
				期望收入:
			</td>
			<td width="40%">
				<div class="form-group">
					<input type="text" class="form-control" name="name" id="" placeholder="200元/天">
				</div>
			</td>
			<td width="45%">
				<p class="red_tx red_tx_text_more">*可以是数字,也可以是一个收入范围,例如200元一天，或50-100元一小时</p>
			</td>
		</tr>
		<tr>
			<td width="15%" align="right">
				
			</td>
			<td width="40%" colspan="2">
				<input type="submit" class="inputsub" value="保存修改" />
				<a  href="#" class="table_qx">取消</a>
		   </td>
		</tr>
	</table>
</div>
@endsection
