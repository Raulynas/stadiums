<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
        integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous" />
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css" />
    <link rel="stylesheet" href="/css/custom.css" />

    <title>Stadiums</title>
</head>

<body>
    <header>
        <nav class="nav-wraper grey lighten-1">
            <div class="container ">
                <a href="{{ route('stadiums.index') }}" class="brand-logo">City Stadiums</a>
                <a href="#" class="sidenav-trigger" data-target="mobile-menu">
                    <i class="material-icons">menu</i>
                </a>

                <ul class="right hide-on-med-and-down">
                    @guest @if(Route::has('login'))
                    <li>
                        <a href="{{ route('login') }}">{{ __("Login") }}</a>
                    </li>
                    @endif @if (Route::has('register'))

                    <li>
                        <a href="{{ route('register') }}">{{
                                __("Register")
                            }}</a>
                    </li>
                    @endif @else

                    <li> <a class="dropdown-trigger" href="#" data-target="dropdown1">Admin</a> </li>
                    <ul id="dropdown1" class="dropdown-content">
                        <li><a href="{{ route('stadiums.viewAll') }}">All stadiums</a></li>
                        <li><a href="{{ route('stadiums.create') }}">Create stadium</a></li>
                        <li><a href="#">All users</a></li>
                    </ul>

                    <li> <a class="dropdown-trigger" href="#" data-target="dropdown2">{{ Auth::user()->name }}</a> </li>
                    <ul id="dropdown2" class="dropdown-content">
                        <li><a href="{{ route('user.account', [ Auth::user()->id ]) }}">Your account</a></li>
                        <li><a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __("Logout") }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf
                            </form>
                        </li>
                    </ul>

                </ul>
                <ul class="sidenav grey lighten-2" id="mobile-menu">
                    <li>
                        <a href="{{ route('stadiums.index') }}">{{ Auth::user()->name }}</a>
                    </li>
                </ul>

                @endguest
            </div>
        </nav>
    </header>
    <main>
        <div id='app'></div>
        {{-- INFO MESSAGES --}}
        <div class="container">
            <div class="row">
                <div class="col s12 l5 offset-l3">

                    @if ($errors->any())

                    @foreach ($errors->all() as $error)
                    <div class="card blue-grey lighten-1">
                        <div class="card-content white-text">
                            <li>{{ $error }}</li>
                        </div>
                    </div>

                    @endforeach

                    @endif
                </div>
            </div>
        </div>


        @yield("content")

    </main>

    <footer class="page-footer grey">
        <div class="container">
            <div class="row">
                <div class="col s12 l6">
                    <h5>About City Stadiums</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing
                        elit. Quidem, aspernatur.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing
                        elit. Quidem, aspernatur.
                    </p>
                </div>
                <div class="col s12 l4 offset-l2">
                    <h5>Connect</h5>
                    <ul>
                        <li>
                            <a href="" class="grey-text text-lighten-3">Facebook</a>
                        </li>
                        <li>
                            <a href="" class="grey-text text-lighten-3">Twiter</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright grey darken-1">
            <div class="container center-align">
                &copy; 2021 City Stadiums
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }} "></script>
    <script src="{{ asset('js/custom.js') }} "></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <!-- Scripts -->

    <script>
        $(document).ready(function() {
                $(".sidenav").sidenav();
                $(".parallax").parallax();
                $("select").formSelect();
                $(".tooltipped").tooltip();
                $(".datepicker").datepicker({
                    disableDays: true,
                    firstDay: 1,
                    maxDate: new Date(),
                    format: "yyyy-mm",
                    yearRange: [100, 2030], 
                });
                $('.dropdown-trigger').dropdown({
                    inDuration: 400,
                    outDuration: 225,
                    belowOrigin: true,
                    coverTrigger: false,
                    constrainWidth: false,
                })
                $('.sidenav').sidenav();


            });
    </script>
</body>

</html>