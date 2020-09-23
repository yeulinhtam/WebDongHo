<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Trang Quản Trị</title>
  <base href="{{ asset('') }}">
  <script src="{{ url('ckeditor/ckeditor.js') }}"></script>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="backend/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="backend/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="backend/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="backend/dist/css/skins/_all-skins.min.css">
   <!-- Morris chart -->
   <link rel="stylesheet" href="backend/bower_components/morris.js/morris.css">
   <!-- jvectormap -->
   <link rel="stylesheet" href="backend/bower_components/jvectormap/jquery-jvectormap.css">
   <!-- Date Picker -->
   <link rel="stylesheet" href="backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="backend/bower_components/bootstrap-daterangepicker/daterangepicker.css">
   <!-- bootstrap wysihtml5 - text editor -->
   <link rel="stylesheet" href="backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>T</b>QT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Trang</b> Quản Trị</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="backend/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs">
                  @if(Auth::check())
                  Xin chào: {{ Auth::user()->username }}
                  @endif
                </span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                  <p>
                    {{ Auth::user()->fullname }}
                    <small>Thành viên 12 - 2019</small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Cá Nhân</a>
                  </div>
                  <form action="{{ route('logout')}}" method="post" id="logOutForm">
                   @csrf  
                  <div class="pull-right">
                    <a onclick="document.getElementById('logOutForm').submit()" class="btn btn-default btn-flat">Đăng Xuất</a>
                  </div>
                </form>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>Tuấn Vũ</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Tìm kiếm...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MENU</li>          
          <li>
            <a href="{{ route('product.index') }}">
              <i class="fa fa-product-hunt"></i> <span>Sản Phẩm</span>
            </a>
          </li>
          <li>
            <a href="{{ route('category.index') }}">
              <i class="fa fa-tags"></i> <span>Loại Sản Phẩm</span>
            </a>
          </li>
          <li>
            <a href="{{ route('producer.index') }}">
              <i class="fa fa-book"></i> <span>Nhà Cung Cấp</span>
            </a>
          </li>
          <li>
            <a href="{{ route('news.index') }}">
              <i class="fa fa-newspaper-o"></i> <span>Tin Tức</span>
            </a>
          </li>
          <li>
            <a href="{{ route('banner.index') }}">
              <i class="fa fa-flag"></i> <span>Quảng Cáo</span>
            </a>
          </li>
          <li>
            <a href="{{ route('bill.index') }}">
              <i class="fa fa-money"></i> <span>Đơn Hàng</span>
            </a>
          </li>
          <li>
            <a href="{{ route('user.index') }}">
              <i class="fa fa-user"></i> <span>Tài Khoản</span>
            </a>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      @yield('wrapper-header')
      @yield('wrapper-content') 

      <!-- Main content -->

      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
      </div>
      <strong>Copyright &copy; 2018-2020 <a href="https://www.facebook.com/profile.php?id=100008264074581">Tuấn Vũ</a>.</strong>
    </footer>


    <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
   <div class="control-sidebar-bg"></div>
 </div>
 <!-- ./wrapper -->

 <!-- jQuery 3 -->
 <script src="backend/bower_components/jquery/dist/jquery.min.js"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="backend/bower_components/jquery-ui/jquery-ui.min.js"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="backend/bower_components/raphael/raphael.min.js"></script>
<script src="backend/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="backend/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="backend/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="backend/bower_components/moment/min/moment.min.js"></script>
<script src="backend/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="backend/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="backend/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="backend/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="backend/dist/js/demo.js"></script>
@yield('js')
</body>
</html>
