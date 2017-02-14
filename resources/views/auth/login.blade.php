@extends('layouts.app')

@section('css')

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                        Forgot Your Password
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-md-10 sol-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0">
                                <div class="row">

                                    <div class="col-xs-4 col-sm-2">
                                        <button class="btn btn-block btn-social btn-facebook" type="submit">
                                            <i class="fa fa-home"></i>CamVgo Login
                                        </button>
                                    </div>
                                    <div class="col-xs-4 col-sm-2">
                                        <a class="btn btn-block btn-social btn-facebook" href="{{route('redirectFacebook',['facebook'])}}">
                                            <i class="fa fa-facebook"></i>Sign in with Facebook
                                        </a>
                                    </div>
                                    <div class="col-xs-4 col-sm-2">
                                        <a class="btn btn-block btn-social btn-twitter" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-twitter']);">
                                            <span class="fa fa-twitter"></span> Sign in with Twitter
                                        </a>
                                    </div>
                                    <div class="col-xs-4 col-sm-2">
                                        <a class="btn btn-block btn-social btn-google" href="{{route('redirectGoogle',['google'])}}">
                                            <span class="fa fa-google"></span> Sign in with Google
                                        </a>
                                    </div>
                                     <div class="col-xs-4 col-sm-2">
                                         <a class="btn btn-block btn-social btn-instagram" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-instagram']);">
                                             <span class="fa fa-instagram"></span> Sign in with Instagram
                                         </a>
                                    </div>
                                        <div class="col-xs-4 col-sm-2">
                                            <a class="btn btn-block btn-social btn-vimeo" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-vimeo']);">
                                                <span class="fa fa-vimeo-square"></span> Sign in with Vimeo
                                            </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
