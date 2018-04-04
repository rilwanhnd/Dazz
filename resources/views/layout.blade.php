<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8"/>
        <title>DAZZ Photo Design</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <meta name="MobileOptimized" content="320">
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::to('assets') }}/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::to('assets') }}/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::to('assets') }}/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::to('assets') }}/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
        <link href="{{ URL::to('assets') }}/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::to('assets') }}/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::to('assets') }}/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
        <!-- END PAGE LEVEL PLUGIN STYLES -->
        <!-- BEGIN THEME STYLES -->
        <link rel="stylesheet" type="text/css" href="{{ URL::to('assets') }}/plugins/select2/select2.css"/>
        <link rel="stylesheet" type="text/css" href="{{ URL::to('assets') }}/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
        <link href="{{ URL::to('assets') }}/css/style-conquer.css" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::to('assets') }}/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::to('assets') }}/css/style-responsive.css" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::to('assets') }}/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::to('assets') }}/css/pages/tasks.css" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::to('assets') }}/css/themes/{{ Auth::user()->theam_name }}.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="{{ URL::to('assets') }}/css/custom.css" rel="stylesheet" type="text/css"/>
        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="{{ URL::to('assets') }}/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
        <link rel="stylesheet" type="text/css" href="{{ URL::to('assets') }}/plugins/gritter/css/jquery.gritter.css"/>
        <link rel="stylesheet" type="text/css" href="{{ URL::to('assets') }}/plugins/clockface/css/clockface.css"/>
        <link rel="stylesheet" type="text/css" href="{{ URL::to('assets') }}/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
        <link rel="stylesheet" type="text/css" href="{{ URL::to('assets') }}/plugins/bootstrap-datepicker/css/datepicker.css"/>
        <link rel="stylesheet" type="text/css" href="{{ URL::to('assets') }}/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
        <link rel="stylesheet" type="text/css" href="{{ URL::to('assets') }}/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
        <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
        <link rel="stylesheet" type="text/css" href="{{ URL::to('assets') }}/plugins/bootstrap-datetimepicker/css/datetimepicker.css"/>
        <link rel="stylesheet" type="text/css" href="{{ URL::to('assets') }}/plugins/jquery-multi-select/css/multi-select.css"/>
        <link rel="stylesheet" type="text/css" href="{{ URL::to('assets') }}/plugins/bootstrap-switch/css/bootstrap-switch.min.css"/>
        <link rel="stylesheet" type="text/css" href="{{ URL::to('assets') }}/plugins/jquery-tags-input/jquery.tagsinput.css"/>
        <link rel="stylesheet" type="text/css" href="{{ URL::to('assets') }}/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
        <link rel="stylesheet" type="text/css" href="{{ URL::to('assets') }}/plugins/typeahead/typeahead.css">
        <link rel="stylesheet" type="text/css" href="{{ URL::to('assets') }}/plugins/select2/select2.css"/>
        <link rel="stylesheet" type="text/css" href="{{ URL::to('assets') }}/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
        <link rel="stylesheet" type="text/css" href="{{ URL::to('assets') }}/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
        <link rel="stylesheet" type="text/css" href="{{ URL::to('assets') }}/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="page-header-fixed">
        <!-- BEGIN HEADER -->
        <div class="header navbar navbar-fixed-top">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="header-inner">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="{{ URL::to('home') }}">
                        <img src="{{ URL::to('assets') }}/img/logo.png" alt="logo" width="80"/>
                    </a>
                </div>
                <form class="search-form search-form-header" role="form" action="">
                    <div class="input-icon right">
                        <i class="icon-magnifier"></i>
                        <!--<input type="text" class="form-control input-sm" name="query" placeholder="Search...">-->
                    </div>
                </form>
                <ul class="nav navbar-nav pull-right">
                    <li class="devider">
                        &nbsp;
                    </li>
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" src="{{ URL::to(Auth::user()->img) }}" width="20"/>
                            <span class="username username-hide-on-mobile">{{ Auth::user()->name }}</span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ URL::to('profile/'.Auth::user()->id) }}"><i class="fa fa-user"></i> My Profile</a>
                            </li>
                            <li class="divider">
                            </li>
                            <li>
                                <a href="{{ URL::to('logout') }}"><i class="fa fa-key"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END HEADER -->
        <div class="clearfix">
        </div>
        <div class="page-container">
            <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse">
                    <ul class="page-sidebar-menu">
                        <li class="sidebar-toggler-wrapper">
                            <div class="sidebar-toggler">
                            </div>
                            <div class="clearfix">
                            </div>
                        </li>
                        <li class="sidebar-search-wrapper">
                            <form class="search-form" role="form" action="index.html" method="get">
                                <div class="input-icon right">
                                    <i class="icon-magnifier"></i>
                                    <input type="text" class="form-control" name="query" placeholder="Search...">
                                </div>
                            </form>
                        </li>
                        <li class="start active ">
                            <a href="{{ URL::to('dashboard') }}">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li >
                            <a href="javascript:;">
                                <i class="icon-basket-loaded"></i>
                                <span class="title">Jobs</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                                <?php if (Auth::user()->status == 1) { ?>
                                    <li>
                                        <!--{{ URL::to('orders') }}-->
                                        <a href="{{ URL::to('neworder') }}">
                                            <span class="badge badge-warning">{{Session::get('neworder')}}</span>New</a>
                                    </li>
                                    <li>
                                        <!--{{ URL::to('assign') }}-->
                                        <a href="{{ URL::to('assigned') }}">
                                            <span class="badge badge-info">{{Session::get('assigned')}}</span>Assigned</a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::to('completed') }}">
                                            <span class="badge badge-success">{{Session::get('completed')}}</span>Completed</a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::to('cencel') }}">
                                            <span class="badge badge-inverse">{{Session::get('cencel')}}</span>Canceled</a>
                                    </li>
                                <?php } else { ?>
                                    <li>
                                        <!--{{ URL::to('assign') }}-->
                                        <a href="{{ URL::to('assigned') }}">
                                            <span class="badge badge-info">{{Session::get('assigned')}}</span>Processing Order</a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::to('completed') }}">
                                            <span class="badge badge-success">{{Session::get('completed')}}</span>Completed</a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::to('cencel') }}">
                                            <span class="badge badge-inverse">{{Session::get('cencel')}}</span>Reject</a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php if (Auth::user()->status == 1) { ?>
                            <li >
                                <a href="javascript:;">
                                    <i class="icon-users"></i>
                                    <span class="title">Dazzers</span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{ URL::to('staff') }}">
                                            <i class="icon-user-follow"></i>
                                            Manage Staff</a>
                                    </li>
                                </ul>
                            </li>
                            <li >
                                <a href="javascript:;">
                                    <i class="icon-settings"></i>
                                    <span class="title">Settings</span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{ URL::to('skills') }}">
                                            <i class="icon-user-follow"></i>
                                            Manage Dazzers</a>
                                    </li>
                                    <li class="last ">
                                        <a href="{{ URL::to('settings') }}">
                                            <i class="icon-settings"></i>
                                            <span class="title">Settings</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>



                        <?php } ?>
                        <li class="last ">
                            <a href="{{ URL::to('logout') }}">
                                <i class="icon-key"></i>
                                <span class="title">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Modal title</h4>
                                </div>
                                <div class="modal-body">
                                    Widget settings form goes here
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success">Save changes</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="theme-panel hidden-xs hidden-sm">
                        <div class="toggler">
                            <i class="fa fa-gear"></i>
                        </div>
                        <div class="theme-options">
                            <div class="theme-option theme-colors clearfix">
                                <span>
                                    Theme Color </span>
                                <ul>
                                    <li class="color-black current color-default tooltips theme-color-user" user_id="{{ Auth::user()->id }}" data-style="default" data-original-title="Default">
                                    </li>
                                    <li class="color-grey tooltips theme-color-user" user_id="{{ Auth::user()->id }}" data-style="grey" data-original-title="Grey">
                                    </li>
                                    <li class="color-blue tooltips theme-color-user" user_id="{{ Auth::user()->id }}" data-style="blue" data-original-title="Blue">
                                    </li>
                                    <li class="color-red tooltips theme-color-user" user_id="{{ Auth::user()->id }}" data-style="red" data-original-title="Red">
                                    </li>
                                    <li class="color-light tooltips theme-color-user" user_id="{{ Auth::user()->id }}" data-style="light" data-original-title="Light">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END BEGIN STYLE CUSTOMIZER -->
                    <!-- BEGIN PAGE HEADER-->
                    <h3 class="page-title">
                        @yield('htmlheader_title') <small>@yield('htmlheader_title_small')</small>
                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                @yield('class')
                                <b>@yield('Main')</b>
                            </li>
                            <li>
                                @yield('sub')
                            </li>
                        </ul>
                        <div class="page-toolbar">
                            <!--                            <div id="dashboard-report-range" class="btn btn-primary">
                                                            <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp;
                                                        </div>-->
                        </div>
                    </div>
                    <div class="clearfix">
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="footer-inner">
                2018 © Dazz.
            </div>
            <div class="footer-tools">
                <span class="go-top">
                    <i class="fa fa-angle-up"></i>
                </span>
            </div>
        </div>
        <script>
            var settheme = "<?php echo URL::to('settheme'); ?>";
            var verify = "<?php echo URL::to('verify'); ?>";
            var getuserdetails = "<?php echo URL::to('getuserdetails'); ?>";
            var verifypassword = "<?php echo URL::to('verifypassword'); ?>";
            var typeahead_countries = "<?php echo URL::to('typeahead_countries'); ?>";
            var getstaffname = "<?php echo URL::to('getstaffname'); ?>";
            var getnote = "<?php echo URL::to('getnote'); ?>";
            var rejectby = "<?php echo URL::to('rejectby'); ?>";
            var removestyle = "<?php echo URL::to('removestyle'); ?>";
        </script>
        <script src="{{ URL::to('assets') }}/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="{{ URL::to('assets') }}/plugins/jquery-validation/js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="{{ URL::to('assets') }}/plugins/jquery-validation/js/additional-methods.min.js"></script>
        <script type="text/javascript" src="{{ URL::to('assets') }}/plugins/select2/select2.min.js"></script>
        <script type="text/javascript" src="{{ URL::to('assets') }}/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="{{ URL::to('assets') }}/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/jquery.peity.min.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/jquery-knob/js/jquery.knob.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/scripts/app.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/scripts/table-managed.js"></script>
        <script src="{{ URL::to('assets') }}/scripts/index.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/scripts/tasks.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/js/all.js"></script>
        <script src="{{ URL::to('assets') }}/scripts/form-validation.js"></script>
        <script src="{{ URL::to('assets') }}/scripts/form-components.js"></script>
        <script type="text/javascript" src="{{ URL::to('assets') }}/plugins/fuelux/js/spinner.min.js"></script>
        <script type="text/javascript" src="{{ URL::to('assets') }}/plugins/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="{{ URL::to('assets') }}/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
        <script type="text/javascript" src="{{ URL::to('assets') }}/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
        <script type="text/javascript" src="{{ URL::to('assets') }}/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
        <script type="text/javascript" src="{{ URL::to('assets') }}/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="{{ URL::to('assets') }}/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
        <script type="text/javascript" src="{{ URL::to('assets') }}/plugins/clockface/js/clockface.js"></script>
        <script type="text/javascript" src="{{ URL::to('assets') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
        <script type="text/javascript" src="{{ URL::to('assets') }}/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
        <script type="text/javascript" src="{{ URL::to('assets') }}/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
        <script type="text/javascript" src="{{ URL::to('assets') }}/plugins/jquery.input-ip-address-control-1.0.min.js"></script>
        <script type="text/javascript" src="{{ URL::to('assets') }}/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/jquery-tags-input/jquery.tagsinput.min.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
        <script src="{{ URL::to('assets') }}/scripts/form-components.js"></script>
        <script src="{{ URL::to('assets') }}/scripts/table-advanced.js"></script>
        <script>
            $("#image").on("change", function () {
                if ($("#image")[0].files.length > 10) {
                    alert("You can select only 10 images");
                }
            });
        </script>
        <script>
            jQuery(document).ready(function () {
                App.init(); // initlayout and core plugins
                TableManaged.init();
                Index.init();
                FormValidation.init();
                FormComponents.init();
                TableAdvanced.init();
                Index.initJQVMAP(); // init index page's custom scripts
                Index.initCalendar(); // init index page's custom scripts
                Index.initCharts(); // init index page's custom scripts
                Index.initChat();
                Index.initMiniCharts();
                Index.initPeityElements();
                Index.initKnowElements();
                Index.initDashboardDaterange();
                Tasks.initDashboardWidget();
            });
        </script>
    </body>
    <!-- END BODY -->
</html>