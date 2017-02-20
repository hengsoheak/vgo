@extends('layouts.app')

@section('content')

	<div class="container">
        <div class="flex-row row">

            <a href="{{route('cards')}}">
               <div class="col-xs-6 col-sm-4 col-lg-3">
               <div class="thumbnail">
                  <img src="{{asset('image/card/thumbnail.png')}}">
                  <div class="caption">
                     <h5>Title</h5>
                        <p class="flex-text text-muted">
                            Lorem ipsum dolor sit amet, consectetur
                        </p>
                      <a class="btn btn-primary btn-xs" href="#">Link</a>
                      <a class="btn btn-primary btn-xs" href="#">Link</a>
                      <a class="btn btn-primary btn-xs" href="#">Link</a>
                      <a class="btn btn-primary btn-xs" href="#">Link</a>
                  </div>
               </div>
            </div>
            </a>

        </div>
   </div>


@endsection

