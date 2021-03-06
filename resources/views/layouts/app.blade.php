<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name = "csrf-token" content = "{{csrf_token()}}">

    <title>{{config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href = "{{asset('css/app.css')}}" rel = "stylesheet">
    <link href = "{{asset('bootstrap/css/bootstrap-responsive.css')}}" rel = "stylesheet">
    <link href = "{{asset('bootstrap/css/bootstrap-social.css')}}" rel = "stylesheet">
    <link href = "{{asset('bootstrap/css/docs.css')}}" rel = "stylesheet">
    <link href = "{{asset('font-awesome-4.7.0/css/font-awesome.css')}}" rel = "stylesheet">
    <link href = "{{asset('css/footer.css')}}" rel = "stylesheet">
    @yield('css')
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <script>
        window.fbAsyncInit = function () {
            FB.init({
                appId: '102782740235682',
                cookie: true,
                xfbml: true,
                version: 'v2.8'
            });
            FB.AppEvents.logPageView();
        };

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
</head>
<body>

<div id = "app">
    <div class = "well">
        <nav class = "navbar navbar-default navbar-fixed-top">
            <div class = "container-fluid">
                <div class = "navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type = "button" class = "navbar-toggle collapsed" data-toggle = "collapse" data-target = "#app-navbar-collapse">
                        <span class = "sr-only">Toggle Navigation</span> <span class = "icon-bar"></span>
                        <span class = "icon-bar"></span> <span class = "icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class = "navbar-brand" href = "{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class = "collapse navbar-collapse" id = "app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class = "nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class = "nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href = "{{ url('/login') }}">Login</a></li>
                            <li><a href = "{{ url('/register') }}">Register</a></li>

                        @else
                            <li class = "dropdown">
                                <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown" role = "button" aria-expanded = "false">
                                    {{ Auth::user()->name }} <span class = "caret"></span> </a>

                                <ul class = "dropdown-menu" role = "menu">
                                    <li>
                                        <a href = "{{ url('/logout') }}" onclick = "event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> Logout </a>

                                        <form id = "logout-form" action = "{{ url('/logout') }}" method = "POST" style = "display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>


    <div class = "container-fluid">
        <div class = "container">
            <!--Begin Content-->

            @yield('content')<!--End Content-->

        </div>
    </div>
    @include('layouts.footer')<!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src = "{{asset('js/main.js')}}"></script>

    <script src = "js/app.js"></script>
    <script src = "bootstrap/js/bootstrap.js"></script>
    <script src = "https://unpkg.com/masonry-layout@4.1/dist/masonry.pkgd.js"></script>

</body>
</html>
