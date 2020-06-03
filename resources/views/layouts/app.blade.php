<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'User Dashboard') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/buttons.dataTables.min.css')}}">

    <!-- Compiled and minified CSS -->

    <script src="{{ asset('assets/js/jquery.min.js') }}" ></script>
    <script type="text/javascript" charset="utf8" src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="{{ asset('assets/js/materialize.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.button.min.js') }}"></script>
    <script src="{{ asset('assets/js/button.flash.min.js') }}"></script>
    <script src="{{ asset('assets/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/vfs_fonts.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.print.min.js') }}"></script>    
    <script src="{{ asset('assets/js/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('assets/js/highcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/exporting.min.js') }}"></script>
    <script src="{{ asset('assets/js/export-data.min.js') }}"></script>
    <script src="{{ asset('assets/js/accessibility.min.js') }}"></script>


    <style>
        select { display:block;}
    </style>          
</head>
<body style="background:#EEEEEE;">
    <div id="app">

  
    <nav class="grey darken-2">
	<div class="nav-wrapper">
		<a  class="brand-logo">
			<img style="width:46px; margin-top:4px; margin-left:5px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/985px-Laravel.svg.png" alt="" />
		</a>
		<a href="#" data-target="mobile-demo" class="sidenav-trigger">
			<i class="material-icons">menu</i>
		</a>
		<ul id="nav-mobile" class="right hide-on-med-and-down">
			<!-- Authentication Links -->
                        @guest
                            
			<li>
				<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
			</li>
                            @if (Route::has('register'))
                                
			<li >
				<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
			</li>
                            @endif
                        @else
                            
			<li>
				<a>{{ Auth::user()->name }} 
					<span class="caret"></span>
				</a>
			</li>
			<li >
				<a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                        </form>
			</li>
                        @endguest
                    
		</ul>
	</div>
</nav>

        <ul class="sidenav" id="mobile-demo">
                        <!-- Authentication Links -->
                        @guest
                            <li>
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li >
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li>
                                <a>{{ Auth::user()->name }} <span class="caret"></span></a>    
                            </li>
                            <li >
                            <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                        </form>
                            </li>
                        @endguest
        </ul> 

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
<script>
  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
</script>