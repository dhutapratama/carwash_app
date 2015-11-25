<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Go Green Carwash | Administration</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?php admin_static('css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php admin_static('css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php admin_static('css/ionicons.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php admin_static('css/morris/morris.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php admin_static('css/jvectormap/jquery-jvectormap-1.2.2.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php admin_static('css/fullcalendar/fullcalendar.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php admin_static('css/daterangepicker/daterangepicker-bs3.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php admin_static('css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php admin_static('css/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php admin_static('css/AdminLTE.css'); ?>" rel="stylesheet" type="text/css" />
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?php admin_url(); ?>" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Go Green Carwash
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left info">
                            <p>Husein S.</p>

                            <a href="#">Supervisor</a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="<?php admin_url('dashboard'); ?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php admin_url('member'); ?>">
                                <i class="fa fa-angle-double-right"></i> <span>Members</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php admin_url('contract'); ?>">
                                <i class="fa fa-angle-double-right"></i> <span>Customer Contracts</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php admin_url('sales'); ?>">
                                <i class="fa fa-angle-double-right"></i> <span>Sales Report</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php admin_url('schedule'); ?>">
                                <i class="fa fa-angle-double-right"></i> <span>Schedule Report</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php admin_url('user'); ?>">
                                <i class="fa fa-angle-double-right"></i> <span>Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php admin_url('setting'); ?>">
                                <i class="fa fa-angle-double-right"></i> <span>Settings</span>
                            </a>
                        </li>
                        <li class="treeview active">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Member Application</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="active"><a href="<?php admin_url('app_info'); ?>"><i class="fa fa-angle-double-right"></i> <span>Info</span></a></li>
                                <li><a href="<?php admin_url('app_news'); ?>"><i class="fa fa-angle-double-right"></i> <span>News</span></a></li>
                                <li><a href="<?php admin_url('app_location'); ?>"><i class="fa fa-angle-double-right"></i> <span>Location</span></a></li>
                                <li><a href="<?php admin_url('app_price'); ?>"><i class="fa fa-angle-double-right"></i> <span>Price</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>