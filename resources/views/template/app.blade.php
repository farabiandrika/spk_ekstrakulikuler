<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="/images/logo.png" type="image/x-icon">

  <title>SPK Perbaikan Jalan</title>

  <!-- Bootstrap -->
  <link href="/template/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="/template/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="/template/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="/template/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Datatables -->
  <link href="/template/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="/template/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="/template/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="/template/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="/template/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="/template/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="/home" class="site_title"> <img src="images/logopku.png" width="30" height="30" alt=""> <span>SPK</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info 
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/logo.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2>Admin</h2>
              </div>
            </div>
            -->
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3></h3>
              <ul class="nav side-menu">
                <li><a href="/home"><i class="fa fa-home"></i> Home </a></li>


                {{-- @if(auth()->user()->isAdmin())
                <li><a><i class="fa fa-table"></i> Data Master <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="/data_user">Data User</a></li>
                    <li><a href="/data_kriteria">Data Kriteria</a></li>
                    <li><a href="/data_alternatif">Data Jalan</a></li>
                    <li><a href="/data_bobot_alternatif">Data Penilaian</a></li>
                    <li><a href="/data_hasil">Hasil Perhitungan</a></li>
                  </ul>
                </li>
                @endif --}}

                <li><a href="/data_perhitungan"><i class="fa fa-calculator"></i>Perhitungan </a></li>

              </ul>
            </div>


          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons 
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
          -->
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/logo.png" alt="">{{ Auth::user()->name }}
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">

                  <br>
                  <li>
                    <form action="/logout" method="POST">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <center> <button type="submit"><i class="fa fa-sign-out pull-right"></i>Keluar</button></center>
                      <br>
                    </form>
                  </li>
                </ul>
              </li>


            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->
      @yield('content')