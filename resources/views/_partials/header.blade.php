<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Product Appliction</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{asset('public/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    
    <link href="{{asset('public/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css')}}" rel="stylesheet" />
    <link href="{{asset('public/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}" rel="stylesheet" />
    <link href="{{asset('public/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/css/chosen.css')}}" rel="stylesheet" />
    <link href="{{asset('public/css/animate.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/css/style.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/css/style-responsive.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/css/invoice-print.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/css/theme/default.css')}}" rel="stylesheet" id="theme" />
    <link href="{{asset('public/plugins/bootstrap-wysihtml5/dist/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
    <link href="{{asset('public/plugins/jquery-jvectormap/jquery-jvectormap.css')}}" rel="stylesheet" />
    <link href="{{asset('public/plugins/bootstrap-calendar/css/bootstrap_calendar.css')}}" rel="stylesheet" />
    <link href="{{asset('public/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" />
    <link href="{{asset('public/plugins/morris/morris.css')}}" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL CSS STYLE ================== -->
    <link href="{{asset('public/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/css/custom.css')}}" rel="stylesheet" />
    
    <link href="{{asset('plugins/bootstrap-wizard/css/bwizard.min.css')}}" rel="stylesheet" />
    <link href="{{asset('plugins/parsley/src/parsley.css')}}" rel="stylesheet" />
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{asset('public/plugins/pace/pace.min.js')}}"></script>
    <!-- ================== END BASE JS ================== -->
</head>
<body>
<!-- begin #page-loader -->
<div id="page-loader" class="fade in"><span class="spinner"></span></div>
<!-- end #page-loader -->

<!-- begin #page-container -->
<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
    <!-- begin #header -->
    <div id="header" class="header navbar navbar-default navbar-fixed-top">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin mobile sidebar expand / collapse button -->
            <div class="navbar-header">
                <a href="#" class="navbar-brand">CMS</a>
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- end mobile sidebar expand / collapse button -->

            <!-- begin header navigation right -->
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form class="navbar-form full-width">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter keyword" />
                            <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
                        <i class="fa fa-bell-o"></i>
                        <span class="label">5</span>
                    </a>
                    <ul class="dropdown-menu media-list pull-right animated fadeInDown">
                        <li class="dropdown-header">Notifications (5)</li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left"><i class="fa fa-bug media-object bg-red"></i></div>
                                <div class="media-body">
                                    <h6 class="media-heading">Server Error Reports</h6>
                                    <div class="text-muted f-s-11">3 minutes ago</div>
                                </div>
                            </a>
                        </li>

                        <li class="dropdown-footer text-center">
                            <a href="javascript:;">View more</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown navbar-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <?php 
                            $profile = Auth::user()->profile; 
                            $userId = Auth::user()->id;
                        ?>
                        <img src='{{asset("images/users/$profile")}}' alt="" />
                        <span class="hidden-xs">{{ Auth::user()->name }}</span> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu animated fadeInLeft">
                        <li class="arrow"></li>
                        <li><a href="{{URL::to('my-profile')}}">View Profile</a></li>
                        <li><a href='{{ URL::to("my-profile/$userId/edit")}}'>Edit Profile</a></li>
                        <li><a href="{{URL::to('/change-my-password')}}">Change Password</a></li>
                        
                        <li class="divider"></li>
                        <li><a href="{{ url('/logout') }}">Log Out</a></li>
                    </ul>
                </li>
            </ul>
            <!-- end header navigation right -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end #header -->
    
    @include('_partials.sidebar')