@extends('layouts.app')
@section('css')
    <link rel = "stylesheet" type = "text/css" href="{{asset('css/breadcrumb/home/home.css') }}"/>
@endsection
@section('content')
    <div class = "row">

        <div class = "panel panel-default">

            <ul class="breadcrumb">
                <li class="completed"><a href="javascript:void(0);">Personal Contact</a></li>
                <li class="active"><a href="javascript:void(0);">Educational/Experience</a></li>
                <li><a href="javascript:void(0);">Photo Upload</a></li>
                <li><a href="javascript:void(0);">Payment</a></li>
            </ul>

            <div class = "panel-body">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >

                    <div id="exTab2" class="container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a  href="#1" data-toggle="tab"> Overview </a></li>
                        </ul>

                        <div class="tab-content ">

                            <div class="tab-pane active" id="1">

                                <a href="#">
                                    <div class="col-xs-6 col-sm-4 col-lg-3">
                                        <div class="thumbnail">
                                            <img src="{{asset('image/card/thinking/ThinkingAbout.png')}}">
                                            <div class="caption">
                                                <h5>Title</h5>
                                                <p class="flex-text text-muted">Lorem ipsum dolor sit amet, consectetur</p>
                                                <!--<p><a class="btn btn-primary btn-xs" href="#">Link</a></p>-->
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </div>

                        </div>
                    </div>

                </div>
                <hr/>
                <div class="load-more-block"></div>
            </div>
        </div>
    </div>

@endsection

