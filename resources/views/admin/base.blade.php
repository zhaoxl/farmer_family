<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="images/favicon.png" type="image/png">

  <title>后台管理</title>

	<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
  <link href="/css/admin.default.css" rel="stylesheet">
  <link href="{{ asset('/css/bootstrap-override.css') }}" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>


<section>
  
  <div class="leftpanel">
    
    <div class="logopanel">
        <h1><span>[</span> 后台管理 <span>]</span></h1>
    </div><!-- logopanel -->
    
    <div class="leftpanelinner">
        
        <!-- This is only visible to small devices -->
        <div class="visible-xs hidden-sm hidden-md hidden-lg">   
            <div class="media userlogged">
                <img alt="" src="images/photos/loggeduser.png" class="media-object">
                <div class="media-body">
                    <h4>John Doe</h4>
                    <span>"Life is so..."</span>
                </div>
            </div>
          
        </div>
      
      <h5 class="sidebartitle">Navigation</h5>
      <ul class="nav nav-pills nav-stacked nav-bracket">
        <li class="nav-parent"><a href=""><i class="fa fa-edit"></i> <span>用户</span></a>
          <ul class="children">
						<li><a href="/admin/users"><i class="fa fa-caret-right"></i> 所有用户</a></li>
						<li><a href="/admin/users/company_users"><i class="fa fa-caret-right"></i> 企业用户</a></li>
						<li><a href="/admin/users/hire_users"><i class="fa fa-caret-right"></i> 发活方用户</a></li>
						<li><a href="/admin/users/present_users"><i class="fa fa-caret-right"></i> 找活方用户</a></li>
						<li><a href="/admin/users/suicide_users"><i class="fa fa-caret-right"></i> 已注销用户</a></li>
						<li><a href="/admin/users/create"><i class="fa fa-caret-right"></i> 添加用户</a></li>
          </ul>
        </li>
        <li class="nav-parent"><a href=""><i class="fa fa-bug"></i> <span>发布信息管理</span></a>
          <ul class="children">
            <li><a href="/admin/works/create"><i class="fa fa-caret-right"></i> 发布雇人信息</a></li>
            <li><a href="/admin/staffs/create"><i class="fa fa-caret-right"></i> 发布找活信息</a></li>
            <li><a href="/admin/works"><i class="fa fa-caret-right"></i> 雇人信息</a></li>
            <li><a href="/admin/staffs"><i class="fa fa-caret-right"></i> 找活信息</a></li>
          </ul>
        </li>
        <li class="nav-parent"><a href=""><i class="fa fa-bug"></i> <span>用户评价管理</span></a>
          <ul class="children">
            <li><a href="/admin/staff_evaluates"><i class="fa fa-caret-right"></i> 找活信息评价</a></li>
            <li><a href="/admin/work_evaluates"><i class="fa fa-caret-right"></i> 招工信息评价</a></li>
          </ul>
        </li>
        <li><a href="/admin/messages"><i class="fa fa-suitcase"></i> <span>站内信息</span></a></li>
        <li><a href="/admin/work_categories"><i class="fa fa-suitcase"></i> <span>工种管理</span></a></li>
        <li><a href="/admin/work_categories/create"><i class="fa fa-suitcase"></i> <span>添加工种</span></a></li>
        <li><a href="/admin/industries"><i class="fa fa-suitcase"></i> <span>行业管理</span></a></li>
        <li><a href="/admin/industries/create"><i class="fa fa-suitcase"></i> <span>添加行业</span></a></li>
        <li class="nav-parent"><a href=""><i class="fa fa-edit"></i> <span>地区管理</span></a>
          <ul class="children">
						<li><a href="/admin/areas"><i class="fa fa-caret-right"></i> 省市管理</a></li>
						<li><a href="/admin/areas/create"><i class="fa fa-caret-right"></i> 添加城市</a></li>
          </ul>
        </li>
        <li><a href="/admin/settings"><i class="fa fa-suitcase"></i> <span>系统设置</span></a></li>
        <li><a href="/admin/operation_logs"><i class="fa fa-suitcase"></i> <span>后台操作记录</span></a></li>
      </ul>
      
      <div class="infosummary">
        <h5 class="sidebartitle">Information Summary</h5>    
        <ul>
            <li>
                <div class="datainfo">
                    <span class="text-muted">个人用户数</span>
                    <h4>{{\App\User::where('category', '=', 0)->count()}}</h4>
                </div>
                <div id="sidebar-chart" class="chart"></div>   
            </li>
            <li>
                <div class="datainfo">
                    <span class="text-muted">企业用户数</span>
                    <h4>{{\App\User::where('category', '=', 1)->count()}}</h4>
                </div>
                <div id="sidebar-chart2" class="chart"></div>   
            </li>
            <li>
                <div class="datainfo">
                    <span class="text-muted">雇人用户数</span>
                    <h4>{{\App\User::where('category', '=', 2)->count()}}</h4>
                </div>
                <div id="sidebar-chart3" class="chart"></div>   
            </li>
            <li>
                <div class="datainfo">
                    <span class="text-muted">雇人信息</span>
                    <h4>{{\App\Work::count()}}</h4>
                </div>
                <div id="sidebar-chart4" class="chart"></div>   
            </li>
            <li>
                <div class="datainfo">
                    <span class="text-muted">找活信息</span>
                    <h4>{{\App\Staff::count()}}</h4>
                </div>
                <div id="sidebar-chart5" class="chart"></div>   
            </li>
        </ul>
      </div><!-- infosummary -->
      
    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->
  
  <div class="mainpanel">

    <div class="headerbar">
      
      <a class="menutoggle"><i class="fa fa-bars"></i></a>
      
      <div class="header-right">
        <ul class="headermenu">
          <li>
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <img src="images/photos/loggeduser.png" alt="" />
                {{\Auth::admin()->get()->name}}
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                <li><a href="/admin/profile"><i class="glyphicon glyphicon-user"></i> 账号设置</a></li>
                <li><a href="/admin/profile/change_pwd"><i class="glyphicon glyphicon-user"></i> 修改密码</a></li>
                <li><a href="/auth_admin/logout"><i class="glyphicon glyphicon-log-out"></i> 退出登录</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div><!-- header-right -->
      
    </div><!-- headerbar -->

		@if (Session::has('success'))
		<div class="alert alert-success">
      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      <strong>{{Session::get('success')}}</strong>.
    </div>
		@elseif (Session::has('error'))
		<div class="alert alert-danger">
      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      <strong>{{Session::get('error')}}</strong>.
    </div>
		@endif
		
 		@yield('content')
    
  </div><!-- mainpanel -->
</section>


<script src="/js/admin/jquery-1.11.1.min.js"></script>
<script src="/js/admin/jquery-migrate-1.2.1.min.js"></script>
<script src="/js/admin/jquery-ui-1.10.3.min.js"></script>
<script src="/js/admin/bootstrap.min.js"></script>
<script src="/js/admin/modernizr.min.js"></script>
<script src="/js/admin/jquery.sparkline.min.js"></script>
<script src="/js/admin/toggles.min.js"></script>
<script src="/js/admin/retina.min.js"></script>
<script src="/js/admin/jquery.cookies.js"></script>
<script src="/js/admin/custom.js"></script>
<script type="text/javascript">
<!--
 
$(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert").fadeTo(1500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);
 
});
//-->
</script>
@yield('js')
</body>
</html>

<!-- http://themepixels.com/demo/webpage/bracket/buttons.html -->