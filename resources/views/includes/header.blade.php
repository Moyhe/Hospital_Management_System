<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- animate css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <title>{{ config('app.name', 'Laravel') }}</title>
     <!-- date picker -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
     <!-- nice select -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/b89b4b2308.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
     <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset('/css/styles.css') }}" />
    <!-- Scripts -->

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

    <!-- LOADER -->
    <div id="preloader">
        <img class="preloader" src="/avatars/heart-loading2.gif" alt="">
     </div>
    <!-- END LOADER -->

    <div id="app" class="hero_area">

        <div class="hero_bg_box">
            <img src="/avatars/hero-bg.png" alt="">
        </div>

 <!-- header section strats -->

  <header class="header_section">

     <div class="container">

        <nav class="navbar navbar-expand-lg bg-body-tertiary custom">
            <div class="container-fluid">
              <a class="navbar-brand" href="{{ route('home') }}"> {{ __('Taleen') }}</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('home') }}">{{ __('Home') }}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">{{ __('About') }}</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link " href="{{ route('departments') }}">{{ __('Departments') }}</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link " href="{{ route('doctors') }}">{{ __('Doctors') }}</a>
                  </li>


                  <li class="nav-item">
                    <a class="nav-link " href="{{ route('messages.create') }}">{{ __('Contact us') }}</a>
                  </li>

                </ul>

                     <!-- Right Side Of Navbar -->
                     <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link  me-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                        @endguest

                        <form class="d-flex justify-content-center" role="search">
                            {{-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> --}}
                            <div class="pt-1 btn-search  ms-2">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                        </form>
                    </ul>
              </div>
            </div>
          </nav>
     </div>
  </header>

   <!-- end header section -->

    <!-- slider section -->
  <section class="slider_section">

    <div id="carouselExampleIndicators" class="carousel slide">

        <div class="carousel-inner">
          <div class="carousel-item active">

            <div class="container">
                <div class="row">
                <div class="col-md-7">
                <div class="detail-box">
                    <h1>
                        We Provide Best Healthcare
                    </h1>
                    <p>
                        Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat hic? Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel architecto veritatis delectus repellat modi impedit sequi.
                    </p>
                    <div class="btn-box">
                        <a href="" class="btn1">
                        Read More
                        </a>
                    </div>
                    </div>
                </div>

                </div>
              </div>

          </div>
          <div class="carousel-item">
            <div class="container">
                <div class="row">
                <div class="col-md-7">
                <div class="detail-box">
                    <h1>
                        We Provide Best Healthcare
                    </h1>
                    <p>
                        Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat hic? Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel architecto veritatis delectus repellat modi impedit sequi.
                    </p>
                    <div class="btn-box">
                        <a href="" class="btn1">
                        Read More
                        </a>
                    </div>
                    </div>
                </div>

                </div>
              </div>

          </div>
          <div class="carousel-item">
            <div class="container">
                <div class="row">
                <div class="col-md-7">
                <div class="detail-box">
                    <h1>
                        We Provide Best Healthcare
                    </h1>
                    <p>
                        Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat hic? Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel architecto veritatis delectus repellat modi impedit sequi.
                    </p>
                    <div class="btn-box">
                        <a href="" class="btn1">
                        Read More
                        </a>
                    </div>
                    </div>
                </div>

                </div>
              </div>

          </div>
        </div>
        <ol class="carousel-indicators">
            <li type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></li>
            <li type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></li>
            <li type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></li>
        </ol>
      </div>

</section>
</div>
    <!-- end slider section -->

    <main class="">
        @yield('content')
    </main>


</body>
</html>
