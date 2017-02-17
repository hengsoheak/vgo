@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-md-10 sol-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2">
                                <div class="row">
                                    <div class="panel-heading">
                                        <h4>You can also register by click below social button </h4>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                        <button class="btn btn-block btn-social btn-facebook" type="submit">
                                            <i class="fa fa-home"></i>CamVgo
                                        </button>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                        <a class="btn btn-block btn-social btn-facebook" href="{{route('redirectFacebook',['facebook'])}}">
                                            <i class="fa fa-facebook"></i>Facebook
                                        </a>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                        <a class="btn btn-block btn-social btn-twitter" href="{{route('redirectTwitter',['twitter'])}}">
                                            <span class="fa fa-twitter"></span>Twitter
                                        </a>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                        <a class="btn btn-block btn-social btn-google" href="{{route('redirectGoogle',['google'])}}">
                                            <span class="fa fa-google"></span>Google
                                        </a>
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                        <a class="btn btn-block btn-social btn-linkedin" href="{{route('redirectLinkedin',['linkedin'])}}">
                                            <span class="fa fa-linkedin"></span> linkedin
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
@endsection
