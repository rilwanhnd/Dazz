@extends('layout')
@section('htmlheader_title')
New Orders
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
<a href="{{ URL::to('neworder')}}">
    New 
</a>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet">
            <div class="navbar-right">
                <a href="{{ URL::to('readmail') }}" class="btn btn-primary black" > Refresh </a>
                <a href="{{ URL::to('CreateOrder') }}" class="btn btn-success black" > Add New Order</a>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th class="table-checkbox center">Photo</th>
                            <th>Customer Details</th>
                            <th>Create Date</th>
                            <th>Age in minutes</th>
                            <th>Due Date</th>
                            <th>Photo Style</th>
                            <th>Status</th>
                            <th>Designer</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobs as $jobsInfo)
                        <tr class="odd gradeX">
                            <td>{{ $jobsInfo['order_id']}}</td>
                            <td class="center">
                                @if(!empty($jobsInfo['image_path']))
                                @foreach($jobsInfo['image_path'] as $key => $value)
                                @if(count($jobsInfo['image_path']) !==1)
                                <span class="badge badge-success">{{$key}}</span>
                                @endif
                                <a href="{{ $value}}" download="{{ $value}}"><img src="{{ $value}}" alt="image" width="100"/></a><br>
                                <br>
                                @endforeach
                                @endif
                            </td>
                            <td>{{$jobsInfo['customer_name']}}<br>{{$jobsInfo['email']}}<br>{{$jobsInfo['tel']}}</td>
                            <td>{{$jobsInfo['ordercreate']}}</</td>
                            <td>@if (isset($jobsInfo['how_months']) != 0)
                                <div><span>{{$jobsInfo['how_months']}}</span> Months</div>
                                @endif
                                @if (isset($jobsInfo['days']) != 0)
                                <div><span>{{$jobsInfo['days']}}</span> Days</div>
                                @endif
                                @if(isset($jobsInfo['hours']) != 0) 
                                <div><span>{{$jobsInfo['hours']}}</span> Hours</div>
                                @endif
                                <div><span>{{$jobsInfo['min']}}</span> Mins</div>
                            </td>
                            <td>{{$jobsInfo['duedate']}}</td>
                            <td class="center">
                                <span class="badge badge-important">{{$jobsInfo['work_roal']}}</span><br>
                                <?php if ($jobsInfo['frametype']) { ?>
                                    <span class="badge badge-primary">{{$jobsInfo['frametype']}}</span><br>
                                <?php } ?>
                                <?php if ($jobsInfo['headlinetext']) { ?>
                                    <span class="badge badge-info">{{$jobsInfo['headlinetext']}}</span><br>
                                <?php } ?>
                            </td>
                            <td>
                                @if($jobsInfo['reject']==0)
                                <span class="label label-primary">
                                    New Order </span>
                                @else
                                <a class="btn btn-warning btn-xs black rejectby" orderitemid="{{$jobsInfo['orderitemid']}}" data-toggle="modal" href="#reject_note"><i class="fa fa-thumbs-o-down"></i> Staff Reject</a>
                                @endif
                            </td>
                            <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-assign" orderid="{{$jobsInfo['order_id']}}" orderitemid="{{$jobsInfo['orderitemid']}}" userroleId="{{$jobsInfo['userrole_id']}}"class="assign"><span style="color: red; text-decoration: underline;">assign</span></a></td>
                            <td><a class="btn btn-danger btn-xs black cencelorder" e-mail="{{$jobsInfo['email']}}" orderid="{{$jobsInfo['order_id']}}" orderitemid="{{$jobsInfo['orderitemid']}}" data-toggle="modal" href="#delete"><i class="fa fa-times-circle"></i> Cancel</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
            <form action="{{ URL::to('assignstaff') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="orderid" name="orderid">
                <input type="hidden" id="orderitemid" name="orderitemid">
                <div class="modal-body">
                    <select name="staff" id="mySelect" class="form-control" required="">
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
<div class="modal fade" id="delete" tabindex="-1" role="delete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">
                    ×
                </button>
                <h2>Are you sure?</h2>
            </div>
            <div class="portlet">
                <div class="portlet-body form">
                    <form method="post" action="{{ URL::to('cancelorder') }}" id="cancelorder" class="cancelorder form-horizontal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="order_id" id="order_id_">
                        <input type="hidden" name="orderitemid" id="orderitemid_">
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
                                    <input type="text" name="email" class="form-control mailaddress" id="" placeholder="Mail Address" readonly="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Cancel Reason</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" rows="8" name="reason"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">
                                Close
                            </button>
                            <input type="submit" name="update" value="Yes, cancel it!" class="btn btn-danger remove-staff">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="reject_note" tabindex="-1" role="reject_note" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">
                    ×
                </button>
                <h2>Reject By</h2>
            </div>
            <div class="portlet">
                <div class="portlet-body form">
                    <form method="post" action="#" class="form-horizontal">
                        <div class="form-group" >
                            <div class="col-md-12" id="reject_by">
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
@endsection