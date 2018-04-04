<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Jaya Farms</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,200,100,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ URL::to('assets') }}/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ URL::to('assets') }}/plugins/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ URL::to('assets') }}/plugins/iCheck/skins/all.css">
        <link rel="stylesheet" href="{{ URL::to('assets') }}/plugins/perfect-scrollbar/src/perfect-scrollbar.css">
        <link rel="stylesheet" href="{{ URL::to('assets') }}/plugins/animate.css/animate.min.css">
        <link rel="stylesheet" href="{{ URL::to('assets') }}/plugins/owl-carousel/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="{{ URL::to('assets') }}/plugins/owl-carousel/owl-carousel/owl.theme.css">
        <link rel="stylesheet" href="{{ URL::to('assets') }}/plugins/owl-carousel/owl-carousel/owl.transitions.css">
        <link rel="stylesheet" href="{{ URL::to('assets') }}/plugins/summernote/dist/summernote.css">
        <link rel="stylesheet" href="{{ URL::to('assets') }}/plugins/fullcalendar/fullcalendar/fullcalendar.css">
        <link rel="stylesheet" href="{{ URL::to('assets') }}/plugins/toastr/toastr.min.css">
        <link rel="stylesheet" href="{{ URL::to('assets') }}/plugins/bootstrap-select/bootstrap-select.min.css">
        <link rel="stylesheet" href="{{ URL::to('assets') }}/plugins/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css">
        <link rel="stylesheet" href="{{ URL::to('assets') }}/plugins/DataTables/media/css/DT_bootstrap.css">
        <link rel="stylesheet" href="{{ URL::to('assets') }}/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">
        <link rel="stylesheet" href="{{ URL::to('assets') }}/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css">
        <link rel="stylesheet" href="{{ URL::to('assets') }}/css/styles.css">
        <link rel="stylesheet" href="{{ URL::to('assets') }}/css/styles-responsive.css">
        <link rel="stylesheet" href="{{ URL::to('assets') }}/css/plugins.css">
        <link rel="stylesheet" href="{{ URL::to('assets') }}/css/themes/theme-style9.css" type="text/css" id="skin_color">
        <link rel="stylesheet" href="{{ URL::to('assets') }}/css/print.css" type="text/css" media="print"/>
    </head>
    <?php
    $id = Session::get('user')->user_type;
    $userid = Session::get('user')->user_type;
    $permissions = Session::get('user')->permissions_page;
    $permissions_page = explode(',', $permissions);
    ?>
    <body>
        <div class="main-wrapper">
            <header class="topbar navbar navbar-inverse navbar-fixed-top inner">
                <div class="container">
                    <div class="navbar-header">
                        <a class="sb-toggle-left hidden-md hidden-lg" href="#main-navbar">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <div class="topbar-tools">
                        <ul class="nav navbar-right">
                            <li class="dropdown current-user">
                                <?php
                                $date = date('Y-m-d');
                                $befor_1days = date('Y-m-d', strtotime($date . '- 37 day'));
                                $count = BuyBagsOrders::join('dealers', 'dealers.id', '=', 'buy_bags_orders.dealers_id')
                                        ->join('user', 'user.id', '=', 'buy_bags_orders.user_id')
//                ->join('buy_bags_orders', 'buy_bags_orders.id', '=', 'birdes_order.buy_bags_orders_id')
                                        ->where('buy_bags_orders.status', 0)
                                        ->where('date', '<=', $befor_1days)
                                        ->select('buy_bags_orders.status as buystatus', 'dealers.phone as dealerphone', 'dealers.name as dealername', 'dealers.id as dealers_id', 'buy_bags_orders.id as buy_bags_orders_id', 'user.id as user_id', 'buy_bags_orders.*', 'user.*')
                                        ->Orderby('buy_bags_orders.date', 'desc')
                                        ->count();
                                 if ($count == 0)
                                    $count = '';
                                ?>
                                @if($count !=0)
                                <a href="{{ URL::to('Harvestnotification') }}" class="dropdown-toggle" data-close-others="true" >
                                    <i class="fa fa-twitter fa-2x"></i><span class="notifications-count badge badge-info animated bounceIn">{{$count}}</span>
                                </a>
                                @endif
                            </li>
                            <li class="dropdown current-user">
                                <?php
                                $counts = BuyBagsOrders::where('feedpercentage', '>', 70)
                                        ->where('status', 0)
                                        ->where('feed_status', 0)
                                        ->get();
                                $count = 0;
                                foreach ($counts as $cou) {
                                    $d = date('Y-m-d');
                                    $date1 = date_create("$cou->date");
                                    $date2 = date_create("$d");
                                    $diff = date_diff($date1, $date2);
                                    $daye = 1 + $diff->days;
                                    if ($daye > 40)
                                        continue;
                                    $count++;
                                }
                                if ($count == 0)
                                    $count = '';
                                ?>
                                @if($count !=0)
                                <a href="{{ URL::to('feednotification') }}" class="dropdown-toggle" data-close-others="true" >
                                    <i class="fa fa-bell fa-2x"></i><span class="notifications-count badge badge-danger animated bounceIn">{{$count}}</span>
                                </a>
                                @endif
                            </li>
                            <li class="dropdown current-user">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
                                    <span class="username hidden-xs">{{ Session::get('user')->full_name }}</span> <i class="fa fa-caret-down "></i>
                                </a>
                                <ul class="dropdown-menu dropdown-dark">
                                    <li>
                                        <a href="{{ URL::to('logout') }}">
                                            Log Out
                                        </a>
                                    </li>
                                    <li>
                                        <?php $accountid = Session::get('ebayaccountid'); ?>
                                        <a href="{{ URL::to('accountsettings')}}">
                                            Profile Settings
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
            <a class="closedbar inner hidden-sm hidden-xs" href="#">
            </a>
            <nav id="pageslide-left" class="pageslide inner">
                <div class="navbar-content">
                    <div class="main-navigation left-wrapper transition-left">
                        <div class="navigation-toggler hidden-sm hidden-xs">
                            <a href="#main-navbar" class="sb-toggle-left">
                            </a>
                        </div>
                        <div class="user-profile border-top padding-horizontal-10 block">
                            <div class="inline-block">
                                <img src="{{ URL::to(Session::get('user')->img) }}" alt="" width="60">
                            </div>
                            <div class="inline-block">
                                <h5 class="no-margin"> Welcome </h5>
                                <h4 class="no-margin"> {{ Session::get('user')->full_name }} </h4>
                                <a href="{{ URL::to('accountsettings')}}"" class="btn user-options sb_toggle">
                                    <i class="fa fa-cog"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="main-navigation-menu">
                            <li>
                                <a href="{{ URL::to('dashboard') }}"><i class="fa fa-home"></i> <span class="title"> Home </span></a>
                            </li>
                            <?php if (in_array("item", $permissions_page)) { ?>
                                <li>
                                    <a href="javascript:void(0)"><i class="fa fa-flask"></i> <span class="title"> Feed & Medicine stock </span><i class="icon-arrow"></i> </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="{{ URL::to('itemdashboard/Feed') }}"><i class="fa fa-cutlery"></i> <span class="title"> Feed</span></a>
                                        </li>
                                    </ul>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="{{ URL::to('itemdashboard/Medicine') }}"><i class="fa fa-medkit"></i> <span class="title"> Medicine </span></a>
                                        </li>
                                    </ul>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="{{ URL::to('itemdashboard/Chicks') }}"><i class="fa fa-twitter"></i> <span class="title"> Chicks </span></a>
                                        </li>
                                    </ul>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="{{ URL::to('feedtotal') }}"><i class="fa fa-twitter"></i> <span class="title"> Feed Total Balance </span></a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>
                            <?php if (in_array("buybags", $permissions_page)) { ?>
                                <li>
                                    <a href="javascript:void(0)"><i class="fa fa fa-shopping-cart"></i> <span class="title"> Buy Bags </span><i class="icon-arrow"></i> </a>

                                    <ul class="sub-menu">
                                        <li>
                                            <a href="{{ URL::to('buybagorder') }}"><i class="fa fa-truck"></i> <span class="title"> Issue</span></a>
                                        </li>
                                    </ul>
                                    @if($userid ==0)
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="{{ URL::to('managedealers') }}"><i class="fa fa-user"></i> <span class="title"> Farms Profile </span></a>
                                        </li>
                                    </ul>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="{{ URL::to('feednotification') }}"><i class="fa fa-bell"></i> <span class="title"> Feed Runout Notification</span></a>
                                        </li>
                                    </ul>
                                    @endif
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="{{ URL::to('nextorder') }}"><i class="fa fa-pencil"></i> <span class="title"> Next Issue List </span></a>
                                        </li>
                                    </ul>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="{{ URL::to('completebuybagsorder') }}"><i class="fa fa-anchor"></i> <span class="title"> Complete Orders </span></a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>
                            <?php if (in_array("livebirds", $permissions_page)) { ?>
                                <li>
                                    <a href="javascript:void(0)"><i class="fa fa-pencil-square"></i> <span class="title"> Live Birds </span><i class="icon-arrow"></i> </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="{{ URL::to('sellchicks') }}"><i class="fa fa-truck"></i> <span class="title"> Get Order </span></a>
                                        </li>
                                    </ul>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="{{ URL::to('chickspayment') }}"><i class="fa fa-credit-card"></i> <span class="title"> Payment </span></a>
                                        </li>
                                    </ul>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="{{ URL::to('livebirdsbalance') }}"><i class="fa fa-pencil-square"></i> <span class="title"> Seller Balance </span></a>
                                        </li>
                                    </ul>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="{{ URL::to('sellerprofile') }}"><i class="fa fa-user"></i> <span class="title"> Seller Profile </span></a>
                                        </li>
                                    </ul>

                                </li>
                            <?php } ?>
                            <?php if (in_array("settings", $permissions_page)) { ?>
                                <li>
                                    <a href="javascript:void(0)"><i class="fa fa-cogs"></i> <span class="title"> Settings </span><i class="icon-arrow"></i> </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="{{ URL::to('staffprivilege') }}"><i class="fa fa-server"></i> <span class="title"> Manage Staff</span> </a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>
                            <li>
                                <a href="{{ URL::to('logout') }}"><i class="fa fa-power-off"></i> <span class="title"> Log Out </span> </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="slide-tools hidden-print">
                    <div class="col-xs-6 text-left no-padding">
                    </div>
                    <div class="col-xs-6 text-right no-padding">
                        <a class="btn btn-sm log-out text-right" href="{{ URL::to('logout')}}">
                            <i class="fa fa-power-off"></i> Log Out
                        </a>
                    </div>
                </div>
            </nav>
            <div class="main-container inner">
                <div class="main-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <ol class="breadcrumb">
                                </ol>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-3 col-sm-6" style="width:100%">
                                <div class="panel panel-default panel-white core-box">
                                    <div class="panel-body no-padding">
                                        @yield('content') </div>						
                                </div>
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Add Shipment</h4>
                                            </div>
                                            <div class="modal-body" id="modal-body" >
                                                Please wait while page is loading...Just 
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="subviews">
                        <div class="subviews-container"></div>
                    </div>
                </div>
            </div>
            <footer class="inner">
                <div class="footer-inner hidden-print">
                    <div class="pull-left">
                        <a href="{{ URL::previous() }}" class="btn btn btn-info tooltips hidden-print" data-placement="top" data-original-title="Back"><i class="fa fa-chevron-left"></i></a>&nbsp;
                        <strong>{{date('Y-m-d')}} - Jaya Farms. </strong>Nattandiya Road Marawila  Tel:032-22545811 | 032-4980404
                    </div>
                    <div class="pull-right hidden-print">
                        <span class="go-top"><i class="fa fa-chevron-up"></i></span>
                    </div>
                </div>
            </footer>
        </div>
        <script>
            var selectpaymentm = "<?php echo URL::to('selectpaymentm'); ?>";
            var getdocdetails = "<?php echo URL::to('getdocdetails') ?>";
            var getuserdetails = "<?php echo URL::to('getuserdetails') ?>";
            var getforms = "<?php echo URL::to('getforms') ?>";
            var getstaffdetails = "<?php echo URL::to('getstaffdetails') ?>";
            var saveform = "<?php echo URL::to('saveform') ?>";
            var removedocument = "<?php echo URL::to('removedocument') ?>";
            var verify = "<?php echo URL::to('verify'); ?>";
            var addnote = "<?php echo URL::to('addnote'); ?>";
        </script>
        <script src="{{ URL::to('assets') }}/plugins/jQuery/jquery-2.1.1.min.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/blockUI/jquery.blockUI.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/iCheck/jquery.icheck.min.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/moment/min/moment.min.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/bootbox/bootbox.min.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/jquery.scrollTo/jquery.scrollTo.min.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/ScrollToFixed/jquery-scrolltofixed-min.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/jquery.appear/jquery.appear.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/jquery-cookie/jquery.cookie.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/velocity/jquery.velocity.min.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/TouchSwipe/jquery.touchSwipe.min.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/jquery-mockjax/jquery.mockjax.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/toastr/toastr.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/bootstrap-modal/js/bootstrap-modal.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/bootstrap-modal/js/bootstrap-modalmanager.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/truncate/jquery.truncate.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/summernote/dist/summernote.min.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="{{ URL::to('assets') }}/js/subview.js"></script>
        <script src="{{ URL::to('assets') }}/js/subview-examples.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/jquery-inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/autosize/jquery.autosize.min.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/select2/select2.min.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/jquery.maskedinput/src/jquery.maskedinput.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/jquery-inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/jquery-maskmoney/jquery.maskMoney.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/bootstrap-colorpicker/js/commits.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/jQuery-Tags-Input/jquery.tagsinput.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/ckeditor/ckeditor.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/ckeditor/adapters/jquery.js"></script>
        <script src="{{ URL::to('assets') }}/js/form-elements.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/nvd3/lib/d3.v3.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/nvd3/nv.d3.min.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/nvd3/src/models/historicalBar.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/nvd3/src/models/historicalBarChart.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/nvd3/src/models/stackedArea.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/nvd3/src/models/stackedAreaChart.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/jquery.sparkline/jquery.sparkline.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/toastr/toastr.js"></script>
        <script src="{{ URL::to('assets') }}/js/form-builder.min.js"></script>
        <script src="{{ URL::to('assets') }}/js/form-render.min.js"></script>
        <script src="{{ URL::to('assets') }}/js/demo.js"></script>
        <script src="{{ URL::to('assets') }}/js/form-elements.js"></script>
        <script type="text/javascript" src="{{ URL::to('assets') }}/plugins/select2/select2.min.js"></script>
        <script type="text/javascript" src="{{ URL::to('assets') }}/js/table-data.js"></script>
        <script src="{{ URL::to('assets') }}/js/ui-notifications.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/sweetalert/lib/sweet-alert.min.js"></script>
        <script src="{{ URL::to('assets') }}/js/form-validation.js"></script>
        <script src="{{ URL::to('assets') }}/js/subview-examples.js"></script>
        <script src="{{ URL::to('assets') }}/js/ui-buttons.js"></script>
        <script src="{{ URL::to('assets') }}/js/userupdate.js"></script>
        <script src="{{ URL::to('assets') }}/js/all-js.js"></script>
        <script src="{{ URL::to('assets') }}/js/main.js"></script>
        <script src="{{ URL::to('assets') }}/js/ui-modals.js"></script>
        <script src="{{ URL::to('assets') }}/js/form-elements.js"></script>
        <script src="{{ URL::to('assets') }}/js/Index.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/tableExport/tableExport.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/tableExport/jquery.base64.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/tableExport/html2canvas.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/tableExport/jquery.base64.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/tableExport/jspdf/libs/sprintf.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/tableExport/jspdf/jspdf.js"></script>
        <script src="{{ URL::to('assets') }}/plugins/tableExport/jspdf/libs/base64.js"></script>
        <script src="{{ URL::to('assets') }}/js/table-export.js"></script>
        <script src="{{ URL::to('assets') }}/js/table-export.js"></script>
        <script>
            jQuery(document).ready(function () {
                $(document).click(function () {
                    var labelid;
                    var nameid;
                    $(".fld-label").each(function () {
                        labelid = this.id;
                    });
                    $(".fld-name").each(function () {
                        nameid = this.id;
                    });
                    $("#" + labelid).focusout(function () {
                        var name = $("#" + labelid).val();
                        $('#' + nameid).val(name);
                    });
                    $(".fld-multiple").click(function () {
                        var name = $("#" + labelid).val();
                        $('#' + nameid).val(name + '[]');
                    });
                });
            });
        </script>
        <script>
            jQuery(document).ready(function () {
                TableExport.init();
                Main.init();
                SVExamples.init();
                FormElements.init();
                UIModals.init();
                UINotifications.init();
                FormValidator.init();
                Index.init();
                TableData.init();
            });
        </script>
    </body>
</html
