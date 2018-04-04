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
Setting
@endsection
@section('sub')
<i class="fa fa-angle-right"></i> 
<a href="{{ URL::to('skills')}}">
    Manage Skills 
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
                                <a class="btn btn-success" data-toggle="modal" href="#basic">Add New Skills <i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                        <tr>
                            <th class="table-checkbox">ID</th>
                            <th>Skills</th>
                            <th>Skills Description</th>
                            <th>Staff</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($staff_works as $staff_detail)
                        <tr class="odd gradeX">
                            <td>{{$staff_detail['id']}}</td>
                            <td>{{$staff_detail['work_roal']}}</td>
                            <td>{{$staff_detail['note']}}</td>
                            <td class="center"><?php
                            if(!empty($staff_detail['staffname'])){
                                $wortasks = $staff_detail['staffname'];
                                foreach ($wortasks as $wortask) {
                                    if (empty($wortask))
                                        continue;
                                    ?>
                                <div><span class="label label-primary">{{strtoupper($wortask)}}</span></div><br>
                            <?php }}
                                ?></td>
                            <td>
                                <a class="btn btn-default btn-xs purple editskill" skill-id="{{$staff_detail['id']}}" skillname="{{$staff_detail['work_roal']}}" skill-note="{{$staff_detail['note']}}" data-toggle="modal" href="#edit"><i class="fa fa-edit"></i> Edit</a>
                                <a class="btn btn-default btn-xs black editskill" skill-id="{{$staff_detail['id']}}" data-toggle="modal" href="#delete"><i class="fa fa-trash-o"></i> Delete</a>
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
            <form action="{{ URL::to('deleteskill') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="skill_id" name="skill_id" class="skill_id">
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
                    <form method="post" action="{{ URL::to('editskill') }}" id="skilledit_form" class="skilledit_form form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" id="skill_id" name="skill_id" class="skill_id">
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
                                Skill
                            </label>
                            <div class="col-sm-6">
                                <input type="text" name="skillname" data-required="1" class="form-control" id="skillname"/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">
                                Skill Description
                            </label>
                            <div class="col-sm-6">
                                  <!--<input type="text" name="note" data-required="1" class="form-control"/>-->
                                <textarea class="form-control" rows="3" name="note" id="skillnote"></textarea>
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
                <h4 class="modal-title">Create New Skills</h4>
            </div>
            <div class="portlet">
                <div class="portlet-body form">
                    <form method="post" action="{{ URL::to('createnewskills') }}" id="form_sample_5" class="form_sample_5 form-horizontal">
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
                                <label class="col-sm-3 control-label">Skill Name <span class="required">
                                        * </span>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" name="skillname" data-required="1" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Description <span class="required">
                                        * </span>
                                </label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="3" name="skilldescription"></textarea>
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