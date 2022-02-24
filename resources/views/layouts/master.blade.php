<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, follow" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
    <!-- CSS 
    ============================================ -->
    <link rel="stylesheet" href="/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="/css/vendor/slick.css">
    <link rel="stylesheet" href="/css/vendor/slick-theme.css">
    <link rel="stylesheet" href="/css/vendor/aos.css">
    <link rel="stylesheet" href="/css/plugins/feature.css">
    <!-- Style css -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bootstrap-tagsinput.css">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 

</head>
<body class="template-color-1 spybody" data-spy="scroll" data-target=".navbar-example2" data-offset="70">
    <div id="app">
        <header class="rn-header-area d-flex align-items-start flex-column left-header-style">
            <div class="logo-area">
                <a href="index.html">
                    <img src="/images/logo/logo-07.png" alt="personal-logo">
                </a>
            </div>
            <nav id="sideNavs" class="mainmenu-nav navbar-example2">
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    
                </ul>
                <ul class="primary-menu nav nav-pills">
                    <li class="nav-item"><a  href="/home"><i
                        data-feather="home"></i>Home</a></li>


                    <li class="nav-item"><a  href="/ingredients"> <i
                                data-feather="shopping-cart"></i>Ingredients</a></li>


                    <li class="nav-item"><a  href="/recipes"> <i
                                    data-feather="layers"></i>Recipes</a></li>


                    <li class="nav-item"><a class="nav-link" href="/roles"><i
                        data-feather="layers"></i>Roles</a></li>


                    <li class="nav-item"><a  href="/users"><i
                                data-feather="users"></i>User management</a></li>


                    <li class="nav-item"><a class="nav-link smoth-animation-two" href="#clients"><i
                    data-feather="user"></i>Clients</a></li>


                    <li class="nav-item"><a class="nav-link smoth-animation-two" href="#pricing"><i
                        data-feather="shopping-cart"></i>Pricing</a></li>


                    <li class="nav-item"><a class="nav-link smoth-animation-two" href=""><i
                        data-feather="image"></i>blog</a></li>


                    <li class="nav-item"><a class="nav-link smoth-animation-two" href="#contacts"><i
                                data-feather="message-circle"></i>Contact</a></li>

                </ul>
            </nav>
            <div class="footer">
                <div class="social-share-style-1">
                    <span class="title">find with me</span>
                    <ul class="social-share d-flex liststyle">
                        <li class="facebook"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                </svg></a>
                            </li>
                            <li class="instagram"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg></a>
                        </li>
                        <li class="linkedin"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin">
                            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z">
                                    </path>
                                    <rect x="2" y="9" width="4" height="12"></rect>
                                    <circle cx="4" cy="4" r="2"></circle>
                                </svg></a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <button class="menu-button">Menu</button>
        <main id="home" class="slider-style-6 rn-section-gap align-items-center" >
            @yield('content')
        </main>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    
    <script src="/js/vendor/jquery.js"></script>
    <script src="/js/vendor/modernizer.min.js"></script>
    <script src="/js/vendor/feather.min.js"></script>
    <script src="/js/vendor/slick.min.js"></script>
    <script src="/js/vendor/bootstrap.js"></script>
    <script src="/js/vendor/text-type.js"></script>
    <script src="/js/vendor/wow.js"></script>
    <script src="/js/vendor/aos.js"></script>
    <script src="/js/vendor/particles.js"></script>
    <!-- main JS -->
    <script src="/js/main.js"></script>
    <script src="/js/bootstrap-tagsinput.js"></script>
    
    
    
    
   

   @yield('script')
</body>
</html>