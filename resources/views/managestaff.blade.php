@extends('layout')
@section('htmlheader_title')
Staff Privileges
@endsection  
@section('htmlheader_title_small')
@endsection 
@section('class')
<i class="icon-users"></i>
@endsection
@section('Main')
Staff
@endsection
@section('sub')
<i class="fa fa-angle-right"></i> 
<a href="{{ URL::to('staff')}}">
    Manage Staff
</a>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet">
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="btn-group pull-right">
                                <a class="btn btn-success" data-toggle="modal" href="#basic">Add New Staff <i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                        <tr>
                            <th class="table-checkbox">Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Photo Style</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($staff_details as $staff_detail)
                        <tr class="odd gradeX">
                            <td><img src="{{ $staff_detail['img']}}" alt="image" width="40"/></td>
                            <td><a href="{{ URL::to('profile')}}{{'/'.$staff_detail['id']}}">{{$staff_detail['name']}}</a></td>
                            <td>{{$staff_detail['email']}}</</td>
                            <td>{{$staff_detail['phonenumber']}}</td>
                            <td class="center"><?php
                            if($staff_detail['skills']!=0){
                                $wortasks = $staff_detail['skills'];
                                foreach ($wortasks as $wortask) {
                                    if (empty($wortask))
                                        continue;
                                    ?>
                                    <span class="badge badge-important">{{$wortask}}</span>
                                    <a href="" class="btn btn-xs btn-red tooltips removestyle" user_id="{{$staff_detail['id']}}" style="{{$wortask}}" data-placement="top" data-original-title="Remove Style"><i class="fa fa-times fa fa-white"></i></a>
                                    <br>
                            <?php }}
                                ?></td>
                            <td>
                                <a class="btn btn-default btn-xs purple userstatus" user_id="{{$staff_detail['id']}}" data-toggle="modal" href="#edit"><i class="fa fa-edit"></i> Edit</a>
                                <?php if($staff_detail['status']==0){?>
                                <a class="btn btn-default btn-xs black userstatus" user_id="{{$staff_detail['id']}}" data-toggle="modal" href="#delete"><i class="fa fa-trash-o"></i> Delete</a>
                           <?php }?>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete" tabindex="-1" role="delete" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">
                    ×
                </button>
                <h2>Are you sure?</h2>
            </div>
            <form action="{{ URL::to('deleteuser') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="userid" class="userid">
                <div class="modal-footer center">
                    <button data-dismiss="modal" class="btn btn-default" type="button">
                        Close
                    </button>
                    <input type="submit" name="update" value="Yes, delete it!" class="btn btn-danger remove-staff">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="edit" tabindex="-1" role="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Edit Staff Privileges</h4>
            </div>
            <div class="portlet">
                <div class="portlet-body form">
                    <form method="post" action="{{ URL::to('editstaff') }}" id="form_sample" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" id="userid" name="userid" class="userid">
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
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">
                                Skills
                            </label>
                            <div class="col-sm-6">
                                <!--<input type="hidden" id="GetSkills" class="form-control select2 GetSkills" value="red, blue">-->

                                <select id="select2_sample_modal_2" class="form-control taskedit" multiple name="taskedit[]">
                                    @foreach($staff_works as $staff_work)
                                    <option value="{{$staff_work->id}}">{{$staff_work->work_roal}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info" id="btn-submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Create New Staff</h4>
            </div>
            <div class="portlet">
                <div class="portlet-body form">
                    <form method="post" action="{{ URL::to('createnewstaff') }}" id="form_sample_1" class="form_sample_1 form-horizontal" enctype="multipart/form-data">
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
                                <label class="col-sm-3 control-label">Name <span class="required">
                                        * </span>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" name="name" data-required="1" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Email <span class="required">
                                        * </span>
                                </label>
                                <div class="col-sm-8">
                                    <input name="email" type="text" id="email" class="form-control email"/>
                                    <label id="emailerror" ></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Password<span class="required">
                                        * </span>
                                </label>
                                <div class="col-sm-8">
                                    <input name="password" type="text" id="password" class="form-control"/>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Phone Number
                                </label>
                                <div class="col-sm-8">
                                    <input name="phonenumber" id="phonenumber" type="text" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Address
                                </label>
                                <div class="col-sm-8">
                                    <input name="address" id="address" type="text" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Skills  <span class="required">
                                        * </span>
                                </label>
                                <div class="col-sm-6">
                                    <select id="select2_sample_modal_2" class="form-control select2" multiple name="task[]" required="">
                                        @foreach($staff_works as $staff_work)
                                        <option value="{{$staff_work->id}}">{{$staff_work->work_roal}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-md-3">Staff Image</label>
                                <div class="col-md-9">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                        </div>
                                        <div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileinput-new">
                                                    Select image 
                                                </span>
                                                <span class="fileinput-exists">
                                                    Change 
                                                </span>
                                                <input type="file" name="user_img">
                                            </span>
                                            <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">
                                                Remove 
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info" id="btn-submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection