@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">


                        <div class="card" style="width: 20rem;">
                            <img class="card-img-top" src="{{$users->SocialAccount->avatar}}" alt="Card image cap">
                            <div class="card-block">
                                <h4 class="card-title">Card title</h4>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>


                </div>
            </div>
        </div>
    </div>
@endsection
