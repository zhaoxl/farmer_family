@extends('administrator.layouts.default')

@section('content')
	<div id="settings_page">
		<div data-bind="template: 'settingsTemplate'" id="content">
			<form class="settings_form" action="/admin_process/change-pwd" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<h2 data-bind="text: $root.settingsTitle">发布站内消息</h2>
					
						<div data-bind="attr: {class: type}" class="text">
							<label data-bind="attr: {for: field_id}, text: title + ':'" for="edit_field_site_name">收件人ID:</label>

								<div data-bind="charactersLeft: {value: $root[field_name], limit: limit}" class="characters_left"></div>
								<input type="password" name="old_pwd" />
								多个用户ID之间用,分隔; *表示所有用户; &表示发活方用户; $表示找活方用户
						</div>

						<div data-bind="attr: {class: type}" class="text">
							<label data-bind="attr: {for: field_id}, text: title + ':'" for="edit_field_site_name">标题:</label>

								<div data-bind="charactersLeft: {value: $root[field_name], limit: limit}" class="characters_left"></div>
								<input type="password" name="new_pwd" />
						</div>

						<div data-bind="attr: {class: type}" class="text">
							<label data-bind="attr: {for: field_id}, text: title + ':'" for="edit_field_site_name">内容:</label>

								<div data-bind="charactersLeft: {value: $root[field_name], limit: limit}" class="characters_left"></div>
								<input type="password" name="new_pwd" />
						</div>

				<div class="control_buttons">
					@if (count($errors) > 0)
						<div class="alert alert-danger" style="color: red">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
				
					<div style="color: green">
						{{ Session::get('success') }}
					</div>
					<input type="submit" data-bind="attr: {disabled: $root.freezeForm() || $root.freezeActions()}" value="保存">


					<span data-bind="css: { error: statusMessageType() == 'error', success: statusMessageType() == 'success' },
													notification: statusMessage " class="message" style="display: none;"></span>
				</div>
			</form>
		</div>
	</div>
@endsection
