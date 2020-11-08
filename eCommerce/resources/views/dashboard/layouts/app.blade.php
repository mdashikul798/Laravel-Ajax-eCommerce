<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>CRM-Soft | Admin Panel</title>
      <!-- Favicon and touch icons -->
      <link rel="shortcut icon" href="{{ asset('public/component') }}/dashboard/dist/img/ico/favicon.png" type="image/x-icon">
      <!-- Start Global Mandatory Style
         =====================================================================-->
      <!-- jquery-ui css -->
      {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css"/> --}}
      <link rel="stylesheet" href="{{ asset('public/component') }}/dashboard/dist/css/chosen.min.css"/>
      <link href="{{ asset('public/component') }}/dashboard/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap -->
      <link href="{{ asset('public/component') }}/dashboard/bootstrap/css/bootstrap-toggle.min.css" rel="stylesheet">
      <link href="{{ asset('public/component') }}/dashboard/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap rtl -->
      <!--<link href="dashboard/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
      <!-- Lobipanel css -->
      <link href="{{ asset('public/component') }}/dashboard/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
      <!-- Pace css -->
      <link href="{{ asset('public/component') }}/dashboard/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>
      <!-- Font Awesome -->
      <link href="{{ asset('public/component') }}/dashboard/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
      <!-- Pe-icon -->
      <link href="{{ asset('public/component') }}/dashboard/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
      <!-- Themify icons -->
      <link href="{{ asset('public/component') }}/dashboard/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>
      <!-- End Global Mandatory Style
         =====================================================================-->
      <!-- Start Theme Layout Style
         =====================================================================-->
      <!-- Theme style -->
      <link href="{{ asset('public/component') }}/dashboard/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>

      <!-- Custom style -->
      <link href="{{ asset('public/component') }}/dashboard/dist/css/custome.css" rel="stylesheet" type="text/css"/>
      <!-- Theme style rtl -->
      <!--<link href="dashboard/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
      <!-- End Theme Layout Style
         =====================================================================-->
    </head>
   <body class="hold-transition sidebar-mini">

      <!-- Site wrapper -->
      <div class="wrapper">
         <header class="main-header">
            <a href="index.html" class="logo">
               <!-- Logo -->
               <span class="logo-mini">
               <img src="dashboard/dist/img/mini-logo.png" alt="">
               </span>
               <span class="logo-lg">
               <img src="dashboard/dist/img/logo.png" alt="">
               </span>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
               <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                  <!-- Sidebar toggle button-->
                  <span class="sr-only">Toggle navigation</span>
                  <span class="pe-7s-angle-left-circle"></span>
               </a>
               <!-- searchbar-->
               <a href="#search"><span class="pe-7s-search"></span></a>
               <div id="search">
                  <button type="button" class="close">×</button>
                  <form>
                     <input type="search" value="" placeholder="type keyword(s) here" />
                     <button type="submit" class="btn btn-add">Search...</button>
                  </form>
               </div>
               <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">

                     <!-- user -->
                     @if(isset(Auth::user()->email))
                     <li class="dropdown dropdown-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            {{ Auth::user()->name }}
                        <img src="{{ asset('public/component') }}/dashboard/dist/img/avatar.png" class="img-circle" width="45" height="45" alt="user"></a>
                        <ul class="dropdown-menu" >
                           <li>
                              <a href="profile.html">
                              <i class="fa fa-user"></i> User Profile</a>
                           </li>
                           <li><a href="{{ route('change.password') }}"><i class="fa fa-inbox"></i> Change Password</a></li>

                           <li><hr><a href="{{ route('admin.logout') }}">
                              <i class="fa fa-sign-out"></i> Signout</a>
                           </li>
                        </ul>
                     </li>
                     @endif
                  </ul>
               </div>
            </nav>
         </header>
         <!-- =============================================== -->
         <!-- Left side column. contains the sidebar -->
         <aside class="main-sidebar">
            <!-- sidebar -->
            <div class="sidebar">
               <!-- sidebar menu -->
               <ul class="sidebar-menu">
                  <li class="{{ request()->is('dashboard') ? 'active':'' }}">
                     <a href="{{ route('dashboard') }}"><i class="fa fa-tachometer"></i><span>Dashboard</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                  <li class="treeview {{ request()->is('dashboard/category/*') ? 'active': '' }}">
                     <a href="#">
                     <i class="fa fa-tag"></i><span>Manage Category</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                     </a>
                     <ul class="treeview-menu">
                        <li class="{{ request()->is('dashboard/category/view-category') ? 'active' : '' }}"><a href="{{ route('category') }}">Category</a></li>
                        <li class="{{ request()->is('dashboard/category/sub-category') ? 'active' : '' }}"><a href="{{ route('sub.category') }}">Sub-Category</a></li>
                     </ul>
                  </li>
                  <li class="treeview {{ request()->is('dashboard/manage-product') ? 'active':'' }}">
                     <a href="{{ route('manage.product') }}">
                     <i class="fa fa-product-hunt"></i><span>Manage Product</span>
                     </a>

                  </li>
                  <li class="treeview {{ request()->is('dashboard/manage-brand') ? 'active':'' }}">
                     <a href="{{ route('manage.brand') }}">
                     <i class="fa fa-connectdevelop"></i><span>Manage Brand</span>
                     </a>
                  </li>
                  <li class="treeview">
                     <a href="{{ route('slider.image') }}">
                     <i class="fa fa-book"></i><span>Slider Manage</span>
                     </a>
                  </li>
               </ul>
            </div>
            <!-- /.sidebar -->
         </aside>
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Main content -->

                @yield('content')

            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         <footer class="main-footer">
            <div class="pull-right hidden-xs"> <b>Version</b> 1.0</div>
            <strong>Copyright &copy; 2016-2017 <a href="#">thememinister</a>.</strong> All rights reserved.
         </footer>
      </div>
      <!-- ./wrapper -->
      <!-- Start Core Plugins
         =====================================================================-->
      <!-- jQuery -->
      <script src="{{ asset('public/component') }}/dashboard/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
      <script src="{{ asset('public/component') }}/dashboard/plugins/validation/1.16.0/jquery.validate.min.js"></script>
      <!-- jquery-ui -->
      <script src="{{ asset('public/component') }}/dashboard/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
      <!-- Bootstrap -->
      <script src="{{ asset('public/component') }}/dashboard/bootstrap/js/bootstrap-toggle.min.js"></script>
      <script src="{{ asset('public/component') }}/dashboard/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <!-- lobipanel -->
      <script src="{{ asset('public/component') }}/dashboard/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
      <!-- Pace js -->
      <script src="{{ asset('public/component') }}/dashboard/plugins/pace/pace.min.js" type="text/javascript"></script>
      <!-- SlimScroll -->
      <script src="{{ asset('public/component') }}/dashboard/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
      <!-- FastClick -->
      <script src="{{ asset('public/component') }}/dashboard/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
      <!-- CRMadmin frame -->
      <script src="{{ asset('public/component') }}/dashboard/dist/js/custom.js" type="text/javascript"></script>
      <!-- End Core Plugins
         =====================================================================-->
      <!-- Start Theme label Script
         =====================================================================-->
      <!-- Dashboard js -->
      <script src="{{ asset('public/component') }}/dashboard/dist/js/dashboard.js" type="text/javascript"></script>
      <!-- Pace js -->
      <!-- table-export js -->
      <script src="{{ asset('public/component') }}/dashboard/plugins/table-export/tableExport.js" type="text/javascript"></script>
      <script src="{{ asset('public/component') }}/dashboard/plugins/table-export/jquery.base64.js" type="text/javascript"></script>
      <script src="{{ asset('public/component') }}/dashboard/dist/js/chosen.jquery.js"></script>
      <script src="{{ asset('public/component') }}/dashboard/dist/js/delete.confirm.js"></script>
      <script src="{{ asset('public/component') }}/dashboard/dist/js/additional.js"></script>
      @yield('script')
      <!-- End Theme label Script
         =====================================================================-->
   </body>
</html>
