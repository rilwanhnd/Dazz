@extends('layout')
@section('htmlheader_title')
Dashboard
@endsection  
@section('htmlheader_title_small')
statistics and more
@endsection 
@section('class')
<i class="icon-users"></i>
@endsection
@section('Main')
Home
@endsection
@section('sub')
<i class="fa fa-angle-right"></i> 
<a href="{{ URL::to('dashboard')}}">
    Dashboard 
</a>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="stats-overview stat-block">
            <div class="display stat ok huge">
                <span class="line-chart" style="display: inline;"><span style="display: none;"><span style="display: none;"><span style="display: none;">
                                5, 6, 7, 11, 14, 10, 15, 19, 15, 2 </span><canvas width="62.5" height="25" style="width:50px;height:20px"></canvas></span><canvas width="62.5" height="25" style="width:50px;height:20px"></canvas></span><canvas width="50" height="25" style="width:40px;height:20px"></canvas></span>
                <div class="percent">
                </div>
            </div>
            <div class="details">
                <div class="title">
                    Jobs on hold
                </div>
                <div class="numbers">
                    {{$details['totalstaff']}}
                </div>
            </div>
            <div class="progress">
                <span style="width: {{$details['totalstaff']}}%;" class="progress-bar progress-bar-info" aria-valuenow="{{$details['totalstaff']}}" aria-valuemin="0" aria-valuemax="100">
                    <span class="sr-only">
                        {{$details['totalstaff']}}% Complete </span>
                </span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="stats-overview stat-block">
            <div class="display stat good huge">
                <span class="line-chart" style="display: inline;"><span style="display: none;"><span style="display: none;"><span style="display: none;">
                                2,6,8,12, 11, 15, 16, 11, 16, 11, 10, 3, 7, 8, 12, 19 </span><canvas width="62.5" height="25" style="width:50px;height:20px"></canvas></span><canvas width="62.5" height="25" style="width:50px;height:20px"></canvas></span><canvas width="50" height="25" style="width:40px;height:20px"></canvas></span>
                <div class="percent">
                </div>
            </div>
            <div class="details">
                <div class="title">
                    Total Jobs in Queue
                </div>
                <div class="numbers">
                    {{$details['totalorder']}}
                </div>
                <div class="progress">
                    <span style="width: {{$details['totalorder']}}%;" class="progress-bar progress-bar-warning" aria-valuenow="{{$details['totalorder']}}" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">
                            {{$details['totalorder']}}% Complete </span>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="stats-overview stat-block">
            <div class="display stat bad huge">
                <span class="line-chart" style="display: inline;"><span style="display: none;"><span style="display: none;"><span style="display: none;">
                                2,6,8,11, 14, 11, 12, 13, 15, 12, 9, 5, 11, 12, 15, 9,3 </span><canvas width="62.5" height="25" style="width:50px;height:20px"></canvas></span><canvas width="62.5" height="25" style="width:50px;height:20px"></canvas></span><canvas width="50" height="25" style="width:40px;height:20px"></canvas></span>
                <div class="percent">
                </div>
            </div>
            <div class="details">
                <div class="title">
                    Total Jobs in Progress 
                </div>
                <div class="numbers">
                    {{$details['assigned']}}
                </div>
                <div class="progress">
                    <span style="width: {{$details['assigned']}}%;" class="progress-bar progress-bar-success" aria-valuenow="{{$details['assigned']}}" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">
                            {{$details['assigned']}}% Complete </span>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="stats-overview stat-block">
            <div class="display stat good huge">
                <span class="bar-chart" style="display: inline;"><span style="display: none;"><span style="display: none;"><span style="display: none;">
                                1,4,9,12, 10, 11, 12, 15, 12, 11, 9, 12, 15, 19, 14, 13, 15 </span><canvas width="62.5" height="25" style="width:50px;height:20px"></canvas></span><canvas width="62.5" height="25" style="width:50px;height:20px"></canvas></span><canvas width="50" height="25" style="width:40px;height:20px"></canvas></span>
                <div class="percent">
                </div>
            </div>
            <div class="details">
                <div class="title">
                    Jobs Completed
                </div>
                <div class="numbers">
                    {{$details['completed']}}
                </div>
                <div class="progress">
                    <span style="width: {{$details['completed']}}%;" class="progress-bar progress-bar-warning" aria-valuenow="{{$details['completed']}}" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">
                            {{$details['completed']}}% Complete </span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row ">
    <div class="col-md-6 col-sm-6">
        <div class="portlet">
            <div class="portlet-title">
                @if(Auth::user()->status ==1)
                <div class="caption">
                    <i class="fa fa-bell"></i>Jobs On Hold
                </div>
                @else
                <div class="caption">
                    <i class="fa fa-bell"></i>Assigned Jobs
                </div>
                @endif
                <div class="actions">
                    @if(Auth::user()->status ==1)
                    <div class="btn-group">
                        <a class="btn btn-default btn-sm" href="{{ URL::to('neworder') }}" data-toggle="" data-hover="" data-close-others="">
                            View All 
                        </a>
                    </div>
                    @else
                    <div class="btn-group">
                        <a class="btn btn-default btn-sm" href="{{ URL::to('assigned') }}" data-toggle="" data-hover="" data-close-others="">
                            View All 
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            <div class="portlet-body">
                <div class="table">
                    <table class="table table-striped table-bordered table-hover" id="">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Create Date</th>
                                <th>Photo Style</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Jobs_hold as $jobOn_Hold)
                            <tr>
                                <td>{{ $jobOn_Hold['Number'] }}</td>
                                <td><a href="{{$jobOn_Hold['image']}}" download="{{$jobOn_Hold['image']}}"><img src="{{$jobOn_Hold['image']}}" alt="image" width="35" height="35"/></a><br></td>
                                <td>{{ $jobOn_Hold['created_at'] }}</td>
                                <td><span class="label label-sm label-info">{{$jobOn_Hold['work_roal']}}</span></td>
                                <td><a href="{{ URL::to('job')}}{{'/'.$jobOn_Hold['id']}}" class="btn btn-default btn-xs">View</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6">
        <div class="portlet">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-anchor"></i>Completed Jobs
                </div>
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn btn-default btn-sm" href="{{ URL::to('completed') }}" data-toggle="" data-hover="" data-close-others="">
                            View All 
                        </a>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table">
                    <table class="table table-striped table-bordered table-hover" id="">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Dazzer Name</th>
                                <th>Create Date</th>
                                <th>Photo Style</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($CompletedJobs as $list_all_job_inprogress)
                            <tr>
                                <td>{{ $list_all_job_inprogress['order_id']}}</td>
                                <td>{{ $list_all_job_inprogress['name']}}</td>
                                <td>{{ $list_all_job_inprogress['orderassigndate']}}</td>
                                <td>{{ $list_all_job_inprogress['work_roal']}}</td>
                                <td><a href="{{ URL::to('job')}}{{'/'.$list_all_job_inprogress['id']}}" class="btn btn-default btn-xs">View</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@if(Auth::user()->status ==1)
<div class="row ">
    <div class="col-md-12 col-sm-12">
        <div class="portlet">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-users"></i>Dazzers
                </div>
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn btn-default btn-sm" href="{{ URL::to('staff') }}" data-toggle="" data-hover="" data-close-others="">
                            View All 
                        </a>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table">
                    <table class="table table-striped table-bordered table-hover list_of_jobs_com">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>Photo Style</th>
                                <th>completed Jobs</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_top_dazzers as $list_top_dazzer) { ?>
                                <tr>
                                    <td><img src="{{ $list_top_dazzer['img']}}" alt="image" width="30"/></td>
                                    <td>{{ $list_top_dazzer['name']}}</td>
                                    <td>{{ $list_top_dazzer['email']}}</td>
                                    <td>{{ $list_top_dazzer['phonenumber']}}</td>
                                    <td>@if ($list_top_dazzer['skills'] != 0)
                                        @foreach ($list_top_dazzer['skills'] as $wortask) 
                                        <span class="badge badge-important">{{$wortask}}</span>
                                        @endforeach
                                        @endif</td>
                                    <td>{{$list_top_dazzer['completejobs']}}</td>
                                    <td><a href="{{ URL::to('profile')}}{{'/'.$list_top_dazzer['id']}}" class="btn btn-default btn-xs">View</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(Auth::user()->status ==0)
<div class="row ">
    <div class="col-md-6 col-sm-6">
        <div class="portlet">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-pencil"></i>Jobs on Hold.
                </div>
            </div>
            <div class="portlet-body">
                <div class="table">
                    <table class="table table-striped table-bordered table-hover" id="">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Create Date</th>
                                <th>Photo Style</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Jobs_hold_ as $jobOn_Hold)
                            <tr>
                                <td>{{ $jobOn_Hold['Number'] }}</td>
                                <td><a href="{{$jobOn_Hold['image']}}" download="{{$jobOn_Hold['image']}}"><img src="{{$jobOn_Hold['image']}}" alt="image" width="35" height="35"/></a><br></td>
                                <td>{{ $jobOn_Hold['created_at'] }}</td>
                                <td><span class="label label-sm label-info">{{$jobOn_Hold['work_roal']}}</span></td>
                                <td><a href="{{ URL::to('job')}}{{'/'.$jobOn_Hold['id']}}" class="btn btn-default btn-xs">View</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection