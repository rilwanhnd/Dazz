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
        <link href="{{ URL::to('assets') }}/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
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
        <!--<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>-->
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


        <div class="page-container">
            <div class="page-content-g">
                <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
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
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                        <div class="portlet">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-reorder"></i> More Form Samples
                                </div>
                                <div class="tools">
                                    <a href="" class="reload"></a>
                                    <a href="" class="remove"></a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <h4>Personal Info</h4>
                                <form onsubmit="return Validate(this);" method="post" action="{{ URL::to('addorder') }}" id="createorder" class="createorder form-horizontal" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-body">
                                        <div class="alert alert-danger display-hide">
                                            <button class="close" data-close="alert"></button>
                                            You have some form errors. Please check below.
                                        </div>
                                        <div class="alert alert-success display-hide">
                                            <button class="close" data-close="alert"></button>
                                            Your form validation is successful!
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Name</label>
                                            <div class="col-md-8">
                                                <input type="text" name="name" class="form-control" id="" placeholder="Your Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Mail </label>
                                            <div class="col-md-8">
                                                <input type="text" name="email" class="form-control" id="" placeholder="Mail Address">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail1" class="col-md-2 control-label">Phone Number</label>
                                            <div class="col-md-8">
                                                <input type="text" name="phonenumber" class="form-control" id="PhoneNumber" placeholder="Phone Number">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Address</label>
                                            <div class="col-md-8">
                                                <textarea class="form-control" rows="2" name="address"></textarea>
                                            </div>
                                        </div>
<!--                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Web</label>
                                            <div class="col-md-6">
                                                <input type="text" name="web" class="form-control" id="" placeholder="Web Address">
                                            </div>
                                        </div>-->

                                        <hr>
                                        <h4>Order Details</h4>

<!--                                        <div class="form-group">
                                            <label class="col-md-2 control-label">File Name</label>
                                            <div class="col-md-8">
                                                <input type="text" name="filename" class="form-control" id="" placeholder="File Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">File Size</label>
                                            <div class="col-md-8">
                                                <input type="text" name="filesize" class="form-control" id="" placeholder="File Size">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">File Type</label>
                                            <div class="col-md-8">
                                                <input type="text" name="filetype" class="form-control" id="" placeholder="File Type">
                                            </div>
                                        </div>-->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Photo Style</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="photestyle" required="">
                                                    <option value="">-- Select Style--</option>
                                                    @foreach($staff_works as $staff_work)
                                                    <option value="{{$staff_work->id}}">{{$staff_work->work_roal}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Need by date</label>
                                            <div class="col-md-4">
                                                <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" data-date-start-date="+0d">
                                                    <input type="text" class="form-control" readonly="" name="needbydate">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Upload File</label>
                                            <div class="col-md-10">
                                                <div class="fileinput fileinput-new" data-provides="fileinput"><input type="hidden" value="" name="...">
                                                    <div class="input-group input-large">
                                                        <div class="form-control uneditable-input span3" data-trigger="fileinput">
                                                            <i class="fa fa-file fileinput-exists"></i>&nbsp; <span class="fileinput-filename"></span>
                                                        </div>
                                                        <span class="input-group-addon btn default btn-file">
                                                            <span class="fileinput-new">
                                                                Select file </span>
                                                            <span class="fileinput-exists">
                                                                Change </span>
                                                            <input type="file" name="originalfile[]" multiple="multiple" required="" id="image">
                                                        </span>
                                                        <a href="#" class="input-group-addon btn btn-danger fileinput-exists" data-dismiss="fileinput">
                                                            Remove </a>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                        <div class="form-group">

                                            <label class="col-md-2 control-label">Message</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" rows="8" name="message"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-6"></div>
                                            <div class="col-lg-6">
                                                <!--<button type="submit" class="btn btn-info" id="btn-submit">Save</button>-->
                                                <button type="submit" class="btn btn-info btn-block">Sent Order</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="footer-inner">
                2013 &copy; Conquer by keenthemes.
            </div>
            <div class="footer-tools">
                <span class="go-top">
                    <i class="fa fa-angle-up"></i>
                </span>
            </div>
        </div>
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
jQuery(document).ready(function () {
    // initiate layout and plugins
    App.init();
    FormComponents.init();
    FormValidation.init();
    
});
        </script>
         <script>
            $("#image").on("change", function () {
                if ($("#image")[0].files.length > 10) {
                    alert("You can select only 10 images");
                    $('#image').val('');
//                    alert();
                } 
            });
        </script>
    </body>
</html>