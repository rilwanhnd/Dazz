@extends('layout')

@section('htmlheader_title')
All Orders
@endsection  

@section('htmlheader_title_small')
@endsection 

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>Managed Table
                </div>
                <div class="tools">
                    <a href="javascript:;" class="reload">
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                        <tr>
                            <th class="table-checkbox">
                                Order ID
                            </th>
                            <th>
                                Order By
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Points
                            </th>
                            <th>
                                Received Date 
                            </th>
                            <th>
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd gradeX">
                            <td>
                               001
                            </td>
                            <td>
                                shuxer
                            </td>
                            <td>
                                <a href="mailto:shuxer@gmail.com">
                                    shuxer@gmail.com </a>
                            </td>
                            <td>
                                120
                            </td>
                            <td class="center">
                                12 Jan 2012
                            </td>
                            <td>
                                <span class="label label-sm label-success">
                                    Approved </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
@endsection