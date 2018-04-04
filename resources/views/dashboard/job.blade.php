@extends('layout')
@section('htmlheader_title')
Dashboard
@endsection  
@section('htmlheader_title_small')
statistics and more
@endsection 
@section('class')
<i class="icon-home"></i>
@endsection
@section('Main')
Home
@endsection
@section('sub')
<i class="fa fa-angle-right"></i> Job
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 blog-page">
        <div class="row">
            <div class="col-md-9 article-block">
                <h3>Hello here will be some recent news..</h3>
                <div class="blog-tag-data">
                    <img src="{{ URL::to($jobs['mainImage']) }}" class="img-responsive" alt="">
                   <!--<img src="{{ URL::to('assets') }}/img/gallery/item_img.jpg" class="img-responsive" alt="">-->
                    <div class="row">
                        
                        <div class="col-md-6 blog-tag-data-inner">
                            <ul class="list-inline">
                                <li>
                                    <i class="fa fa-calendar"></i>{{$jobs['created_at']}}
                                </li>
                                <li>
                                    <i class="fa fa-comments"></i>{{$jobs['comment_count']}} Comments
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="media">
                    <h3>Comments</h3>
                    @foreach($jobs['comments'] as $comment)
                    <div class="media">
                        <a href="#" class="pull-left">
                            <img alt="" src="{{URL::to($comment['img'])}}" class="media-object" width="40">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$comment['name']}}<span>
                                    {{$comment['date']}} 
                                </span>
                            </h4>
                            <p>{{$comment['note']}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <hr>
                <div class="post-comment">
                    <h3>Leave a Comment</h3>
                    <form method="post" action="{{ URL::to('ordernote') }}" id="submitnote" class="submitnote form-horizontal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="orderitemid"  value="{{$jobs['orderitemid']}}">
                        <input type="hidden" name="formname"  value="1">
                        <div class="form-group">
                            <label class="control-label">Name <span class="required">
                                    * </span>
                            </label>
                            <input type="text" class="form-control" value="{{$jobs['username']}}" readonly="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Message <span class="required">
                                    * </span>
                            </label>
                            <textarea class="col-md-10 form-control" rows="8" name="comment" placeholder="Comment"></textarea>
                        </div>
                        <button class="margin-top-20 btn btn-info" type="submit">Post a Comment</button>
                    </form>
                </div>
            </div>
            <!--end col-md-9-->
            <div class="col-md-3 blog-sidebar">
                <h3>Flickr</h3>
                <ul class="list-inline blog-images">
                    @foreach($jobs['images'] as $job)
                    <li>
                        <a class="fancybox-button" data-rel="fancybox-button" title="390 x 220 - keenthemes.com" href="{{ URL::to($job)}}">
                            <img alt="" src="{{ URL::to($job)}}">
                        </a>
                    </li>
                    @endforeach

                </ul>
                <div class="space20">
                </div>
            </div>
            <!--end col-md-3-->
        </div>
    </div>
</div>


@endsection