@extends('layout')
@section('htmlheader_title')
<?php echo $staffdetails->name; ?>
@endsection  
@section('htmlheader_title_small')
Profile
@endsection 
@section('class')
<i class="icon-users"></i>
@endsection
@section('Main')
My Profile
@endsection
@section('sub')
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row profile">
            <div class="col-md-12">
                <div class="tabbable tabbable-custom">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_1_1" data-toggle="tab">Overview</a>
                        </li>
                        <li>
                            <a href="#tab_1_3" data-toggle="tab">Account</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1_1">
                            <div class="row">
                                <div class="col-md-3">
                                    <ul class="list-unstyled profile-nav">
                                        <li>
                                            <img src="{{ URL::to($staffdetails->img) }}" class="img-responsive" alt=""/>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-8 profile-info">
                                            <h1>{{ $staffdetails->name }}</h1>
                                            <p>{{ $staffdetails->about }}</p>
                                            <ul class="list-inline">
                                                <li>
                                                    <i class="fa fa-map-marker"></i> {{ $staffdetails->address }}
                                                </li>
                                                <li>
                                                    <?php
                                                    if (!empty($staffdetails->dateofbirth)) {
                                                        ?>  <i class="fa fa-calendar"></i>
                                                        <?php
                                                        $dat = explode(' ', $staffdetails->dateofbirth);
                                                        echo $dat[0];
                                                    }
                                                    ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="portlet sale-summary">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        Order Summary
                                                    </div>
                                                    <div class="tools">
                                                        <a class="reload" href="javascript:;"></a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            <span class="sale-info">
                                                                Processing <i class="fa fa-img-down"></i>
                                                            </span>
                                                            <span class="sale-num">
                                                                87 </span>
                                                        </li>
                                                        <li>
                                                            <span class="sale-info">
                                                                Completed </span>
                                                            <span class="sale-num">
                                                                2377 </span>
                                                        </li>
                                                        <li>
                                                            <span class="sale-info">
                                                                Canceled </span>
                                                            <span class="sale-num">
                                                                2 </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if(!empty($wortasks))
                                    <div><i class="fa fa-graduation-cap"></i> Working Skills :&nbsp;<?php
                                       
                                        foreach ($wortasks as $wortask) {
                                            if (empty($wortask))
                                                continue;
                                            ?>
                                            <span class="label label-success">{{$wortask}}</span>&nbsp;&nbsp;
                                        <?php }
                                        ?></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_1_3">
                            <div class="row profile-account">
                                <div class="col-md-3">
                                    <ul class="ver-inline-menu tabbable margin-bottom-10">
                                        <li class="active">
                                            <a data-toggle="tab" href="#tab_1-1">
                                                <i class="fa fa-cog"></i> Personal info </a>
                                            <span class="after">
                                            </span>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#tab_2-2"><i class="fa fa-picture-o"></i> Change Avatar</a>
                                        </li>
                                         <?php if(Auth::user()->id == $staffdetails->id){?>
                                        <li>
                                            <a data-toggle="tab" href="#tab_3-3"><i class="fa fa-lock"></i> Change Password</a>
                                        </li>
                                         <?php }?>
                                    </ul>
                                </div>
                                <div class="col-md-9">
                                    <div class="tab-content">
                                        <div id="tab_1-1" class="tab-pane active">
                                            <form role="form" action="{{ URL::to('edituser') }}" method="POST">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="userid" value="{{$staffdetails->id}}">
                                                <div class="form-group">
                                                    <label class="control-label">Name</label>
                                                    <input type="text" value="{{$staffdetails->name}}" class="form-control" name="name"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Mobile Number</label>
                                                    <input type="text" value="{{$staffdetails->phonenumber}}" class="form-control" name="phonenumber"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Address</label>
                                                    <textarea class="form-control" rows="3" name="address" >{{$staffdetails->address}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Date of Birth</label>
                                                    <input data-date-format="yyyy-mm-dd" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="{{$staffdetails->dateofbirth}}" name="dateofbirth">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">About</label>
                                                    <textarea class="form-control" rows="3" name="about">{{$staffdetails->about}}</textarea>
                                                </div>
                                                <div class="margiv-top-10">
                                                    <button type="submit" class="btn btn-success">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div id="tab_2-2" class="tab-pane">
                                            <form action="{{ URL::to('editimg') }}" method="POST" role="form" enctype="multipart/form-data">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="userid" value="{{$staffdetails->id}}">
                                                <input type="hidden" name="name" value="{{$staffdetails->name}}">
                                                <input type="hidden" name="img" value="{{$staffdetails->img}}">
                                                <div class="form-group">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 250px;">
                                                            <img src="{{URL::to($staffdetails->img)}}" alt=""/>
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                        </div>
                                                        <div>
                                                            <span class="btn btn-default btn-file">
                                                                <span class="fileinput-new">
                                                                    Select image </span>
                                                                <span class="fileinput-exists">
                                                                    Change </span>
                                                                <input type="file" name="user_img">
                                                            </span>
                                                            <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">
                                                                Remove </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="margin-top-10">
                                                    <button type="submit" class="btn btn-success">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div id="tab_3-3" class="tab-pane">
                                            <form method="post" action="{{ URL::to('changepassword') }}" id="form_password" class="form_password">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="userid" value="{{$staffdetails->id}}" id="userid">
                                                <div class="alert alert-danger display-hide">
                                                    <button class="close" data-close="alert"></button>
                                                    You have some form errors. Please check below.
                                                </div>
                                                <div class="alert alert-success display-hide">
                                                    <button class="close" data-close="alert"></button>
                                                    Your form validation is successful!
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Current Password</label>
                                                    <input type="password" class="form-control" name="currentpassword" size="16" id="editpassword"/>
                                                    <label id="currentpassworderror" ></label>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">New Password</label>
                                                    <input type="password" class="form-control" name="newpassword" id="newpassword"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Re-type New Password</label>
                                                    <input type="password" class="form-control" name="repassword" id="repassword"/>
                                                </div>
                                                <div class="margin-top-10">
                                                    <button type="submit" class="btn btn-info" id="btn-submit">Change Password</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection