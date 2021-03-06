<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>猫眼360</title>

	<link href="{{ asset('/css/base.css') }}" rel="stylesheet">
</head>
<body>
	<script src="/js/jquery.min.js"></script>
	<script src="/js/custom-form-elements.js"></script>
	<?php echo View::make('partials.header') ?>
	<div class="body_context">
		@yield('content')
	</div>
	<div class="footer">
		
<?php 
	$settings = array();
	$system_settings = \App\SystemSetting::get();
	$system_settings->each(function($setting) use (&$settings){
		$settings[$setting->key] = $setting->val;
	});
?> {{$settings['site_name']}}&nbsp;&nbsp;&nbsp;&nbsp;地址：{{$settings['address']}}&nbsp;&nbsp;&nbsp;&nbsp;联系电话：{{$settings['telphone']}}&nbsp;&nbsp;&nbsp;&nbsp;邮箱：{{$settings['email']}}
	</div>
</body>
</html>
