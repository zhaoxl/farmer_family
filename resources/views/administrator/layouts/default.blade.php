<!DOCTYPE html>
<html lang="<?php echo config('application.language') ?>">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<title>{{ config('administrator.title') }}</title>

		<link href="http://farmer_family/packages/frozennode/administrator/css/ui/jquery-ui-1.9.1.custom.min.css" media="all" type="text/css" rel="stylesheet">
		<link href="http://farmer_family/packages/frozennode/administrator/css/ui/jquery.ui.timepicker.css" media="all" type="text/css" rel="stylesheet">
		<link href="http://farmer_family/packages/frozennode/administrator/js/jquery/select2/select2.css" media="all" type="text/css" rel="stylesheet">
		<link href="http://farmer_family/packages/frozennode/administrator/css/jquery.lw-colorpicker.css" media="all" type="text/css" rel="stylesheet">
		<link href="http://farmer_family/packages/frozennode/administrator/js/jquery/customscroll/customscroll.css" media="all" type="text/css" rel="stylesheet">
		<link href="http://farmer_family/packages/frozennode/administrator/css/main.css" media="all" type="text/css" rel="stylesheet">

	<!--[if lte IE 9]>
	<link href="http://farmer_family/packages/frozennode/administrator/css/browsers/lte-ie9.css" media="all" type="text/css" rel="stylesheet">
	<![endif]-->

	</head>
	<body>
		<div id="wrapper">
			@include('administrator::partials.header')

			@yield('content')

			@include('administrator::partials.footer')
		</div>

		<script src="http://farmer_family/packages/frozennode/administrator/js/jquery/jquery-1.8.2.min.js"></script>
		<script src="http://farmer_family/packages/frozennode/administrator/js/jquery/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="http://farmer_family/packages/frozennode/administrator/js/jquery/customscroll/jquery.customscroll.js"></script>
		<script src="http://farmer_family/packages/frozennode/administrator/js/jquery/select2/select2.js"></script>
		<script src="http://farmer_family/packages/frozennode/administrator/js/jquery/jquery-ui-timepicker-addon.js"></script>
		<script src="http://farmer_family/packages/frozennode/administrator/js/ckeditor/ckeditor.js"></script>
		<script src="http://farmer_family/packages/frozennode/administrator/js/ckeditor/adapters/jquery.js"></script>
		<script src="http://farmer_family/packages/frozennode/administrator/js/markdown.js"></script>
		<script src="http://farmer_family/packages/frozennode/administrator/js/plupload/js/plupload.full.js"></script>
		<script src="http://farmer_family/packages/frozennode/administrator/js/plupload/js/i18n/zh-CN.js"></script>
		<script src="http://farmer_family/packages/frozennode/administrator/js/jquery/localization/jquery-ui-timepicker-zh-CN.js"></script>
		<script src="http://farmer_family/packages/frozennode/administrator/js/jquery/i18n/jquery.ui.datepicker-zh-CN.js"></script>
		<script src="http://farmer_family/packages/frozennode/administrator/js/jquery/select2/select2_locale_zh-CN.js"></script>
		<script src="http://farmer_family/packages/frozennode/administrator/js/knockout/knockout-2.2.0.js"></script>
		<script src="http://farmer_family/packages/frozennode/administrator/js/knockout/knockout.mapping.js"></script>
		<script src="http://farmer_family/packages/frozennode/administrator/js/knockout/KnockoutNotification.knockout.min.js"></script>
		<script src="http://farmer_family/packages/frozennode/administrator/js/knockout/knockout.updateData.js"></script>
		<script src="http://farmer_family/packages/frozennode/administrator/js/knockout/custom-bindings.js"></script>
		<script src="http://farmer_family/packages/frozennode/administrator/js/accounting.js"></script>
		<script src="http://farmer_family/packages/frozennode/administrator/js/jquery/jquery.lw-colorpicker.min.js"></script>
		<script src="http://farmer_family/packages/frozennode/administrator/js/history/native.history.js"></script>
		<script src="http://farmer_family/packages/frozennode/administrator/js/admin.js"></script>
		<script src="http://farmer_family/packages/frozennode/administrator/js/settings.js"></script>
		<script src="http://farmer_family/packages/frozennode/administrator/js/page.js"></script>
	</body>
</html>