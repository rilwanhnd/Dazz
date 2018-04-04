@extends('layout')
@section('htmlheader_title')
Settings
@endsection  
@section('htmlheader_title_small')
@endsection 
@section('class')
<i class="icon-settings"></i>
@endsection
@section('Main')
Settings
@endsection
@section('sub')

@endsection
@section('content')
<div class="row">
    <div class="col-md-9">
        <div class="portlet ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-reorder"></i> Edit Setting
                </div>
                
            </div>
            <div class="portlet-body form">
                 <form method="post" action="{{ URL::to('savesetting') }}" id="savesetting" class="savesetting form-horizontal">
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
                                <label class="col-md-3 control-label">Host</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="host" name="host" placeholder="Host" value="{{$settings->host}}">
               
                                     </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Supported Port</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="portname" name="portname" placeholder="Port" value="{{$settings->port}}">
               
                                     </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Mail Server Username</label>
                                <div class="col-md-9">
                                    <input type="mail" class="form-control" id="username" name="username" placeholder="Username" value="{{$settings->mailaddress}}">
               
                                     </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Password</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="{{$settings->password}}">
               
                                     </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="update" value="Save!" class="btn btn-warning">
                        </div>
                    </form>
            </div>
        </div>

    </div>
</div>

@endsection