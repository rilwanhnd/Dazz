@extends('layout')
@section('htmlheader_title')
Completed Orders
@endsection  
@section('htmlheader_title_small')
@endsection 
@section('class')
<i class="icon-basket-loaded"></i>
@endsection
@section('Main')
Order
@endsection
@section('sub')
<i class="fa fa-angle-right"></i> 
<a href="{{ URL::to('completed')}}">
    Completed 
</a>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet">
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th class="center">Original</th>
                            <th align="center">Output</th>
                            <th>Order Details</th>
                            <th>Photo Style</th>
                            <th>Designer</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($neworder as $staff_detail)
                        <tr class="odd gradeX">
                            <td>{{ $staff_detail['order_id']}}</td>
                            <td class="center">
                                <?php
                                $images = explode(',', $staff_detail['image_path']);
                                $x = 1;
                                $count = count($images);
                                foreach ($images as $image) {
                                    if (empty($image) || $image == '')
                                        continue;
                                    if ($count > 1) {
                                        ?>
                                        <span class="badge badge-success">{{$x}}</span>
                                    <?php } ?>
                                    <a href="{{ $image}}" download="{{ $image}}"><img src="{{ $image}}" alt="image" width="100"/></a><br>
                                    <br>
                                    <?php $x++;
                                } ?>
                            <!--<a href="{{ $staff_detail['image_path']}}" download="{{ $staff_detail['image_path']}}"><img src="{{ $staff_detail['image_path']}}" alt="image" width="100"/></a>-->
                            </td>
                            <td class="center">
                                @if(!empty($staff_detail['output_image_path']))
                                <?php
                                $images = explode(',', $staff_detail['output_image_path']);
                                
                                $count = count($images);
                                foreach ($images as $image) {
                                    if (empty($image) || $image == '')
                                        continue;
                                        ?>
                                    <a href="{{ $image}}" download="{{ $image}}"><img src="{{ $image}}" alt="image" width="100"/></a><br>
                                    <br>
    <?php 
} ?>
                            <!--<a href="{{ $staff_detail['output_image_path']}}" download="{{ $staff_detail['output_image_path']}}"><img src="{{ $staff_detail['output_image_path']}}" alt="image" width="100"/></a>-->
                                @endif
                            </td>
                            <td>{{$staff_detail['customer_name']}}<br>
                                {{$staff_detail['email']}}<br>
                                {{$staff_detail['tel']}}<br>
                                <b>Assign :</b>{{$staff_detail['orderassigndate']}}<br>
                                <b>Due Date :</b>{{$staff_detail['need_by_date']}}</td>
                            <td class="center">
                                <span class="badge badge-important">{{$staff_detail['work_roal']}}</span><br>
                                <?php if ($staff_detail['frametype']) { ?>
                                    <span class="badge badge-primary">{{$staff_detail['frametype']}}</span><br>
                                <?php } ?>
                                <?php if ($staff_detail['headlinetext']) { ?>
                                    <span class="badge badge-info">{{$staff_detail['headlinetext']}}</span><br>
<?php } ?>
                            </td>
                            <td>{{$staff_detail['name']}}</td>
                            <td>
                                <a class="icon-btn notehistory" data-toggle="modal" href="#notes" orderitemid="{{$staff_detail['orderitemid']}}">
                                    <i class="fa fa-envelope"></i>
                                    <div>
                                        Comments
                                    </div>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="lastcomplete" tabindex="-1" role="lastcomplete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">
                    ×
                </button>
                <h2>Complete Order</h2>
            </div>
            <div class="portlet">
                <div class="portlet-body form">
                    <form method="post" action="{{ URL::to('lastcomplete') }}" id="cancelorder" class="cancelorder form-horizontal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="order_id" id="order_id_">
                        <input type="hidden" name="orderitemid" id="orderitem_id">
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
                                <label class="col-md-3 control-label">Mail Address</label>
                                <div class="col-md-9">
                                    <input type="text" name="email" class="form-control" id="mailaddress" placeholder="Mail Address" readonly="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Cancel Reason</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" rows="8" name="completemail"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">
                                Close
                            </button>

                            <input type="submit" name="update" value="Submit Order!" class="btn btn-success remove-staff">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-assign" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">
                    ×
                </button>
                <h4 id="myLargeModalLabel" class="modal-title">Assign Staff</h4>
            </div>
            <form action="{{ URL::to('reassignstaff') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="orderid" name="orderid">
                <input type="hidden" id="orderitemid" name="orderitemid">
                <div class="modal-body">
                    <select name="staff" id="mySelect" class="form-control">

                    </select>
                </div>
                <div class="modal-body">
                    <textarea class="form-control" rows="8" name="note" placeholder="Note"></textarea>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">
                        Close
                    </button>
                    <input type="submit" name="update" value="Assign" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="reaction" tabindex="-1" role="reaction" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">
                    ×
                </button>
                <h2>Reaction</h2>
            </div>
            <div class="portlet">
                <div class="portlet-body form">
                    <form method="post" action="{{ URL::to('reaction') }}" id="cancelorder" class="cancelorder form-horizontal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <input type="hidden" name="orderitemid" id="orderitemid" class="orderitemid">
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
                                <!--<label class="col-md-4 control-label">Reaction Comment</label>-->
                                <div class="col-md-12">
                                    <textarea class="form-control" rows="8" name="reason" placeholder="Comment"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">
                                Close
                            </button>
                            <input type="submit" name="update" value="Sent to Staff!" class="btn btn-warning remove-staff">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="notes" tabindex="-1" role="notes" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">
                    ×
                </button>
                <h2>Comments</h2>
            </div>
            <div class="portlet">
                <div class="portlet-body form">
                    <form method="post" action="" id="submitnote" class="submitnote form-horizontal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="orderitemid" id="orderitemid_note">
                        <div class="form-body">
                            <div class="form-group">
                                <div class="col-md-12" id="message">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button aria-hidden="true" data-dismiss="modal" class="btn btn-default" type="button">
                                Close
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="staffcomplete" tabindex="-1" role="staffcomplete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Complete Order</h4>
            </div>
            <div class="portlet">
                <div class="portlet-body form">
                    <form method="post" action="{{ URL::to('submitfile') }}" id="form_sample_1" class="form_sample_1 form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="orderitemid" id="orderitemid_complete">
                        <input type="hidden" name="orderid" id="orderid_complete">
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
                                <label class="col-md-3 control-label">Upload File</label>
                                <div class="col-md-9">
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
                                                <input type="file" name="submitfile" required="" placeholder="Upload File">
                                            </span>
                                            <a href="#" class="input-group-addon btn btn-danger fileinput-exists" data-dismiss="fileinput">
                                                Remove </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea class="form-control" rows="8" name="comment" placeholder="Comment"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info" id="btn-submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="reject" tabindex="-1" role="reject" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Reject Order</h4>
            </div>
            <div class="portlet">
                <div class="portlet-body form">
                    <form method="post" action="{{ URL::to('rejectorder') }}" id="rejectorder" class="rejectorder">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="orderitemidreject" id="orderitemid_reject">
                        <input type="hidden" name="orderidreject" id="orderid_reject">
                        <input type="hidden" name="orderusersid" id="orderusersid">
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
                                <div class="col-md-12">
                                    <textarea class="form-control" rows="8" name="rejectreason"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info" id="btn-submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection