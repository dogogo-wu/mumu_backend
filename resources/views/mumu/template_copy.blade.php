<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Add your Tittle --}}
    <title>
        @yield('pageTittle')
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- Add your CSS Link --}}
    @yield('cssLink')
</head>

<body>
    <nav class="container-xl navbar navbar-expand-md navbar-light">
        <a class="navbar-brand p-0" href="{{ url('/') }}">
            <img class="logo m-2" src="{{ asset('img/img_bs/logo.svg') }}" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav fw-bold d-flex align-items-center">
                <li class="nav-item mx-2" hidden>
                    <a href="{{ url('/banner') }}" class="btn btn-outline-secondary border-0 px-3 py-2">Banner管理</a>
                </li>
                <li class="nav-item mx-2" hidden>
                    <a href="{{ url('/product') }}" class="btn btn-outline-secondary border-0 px-3 py-2">商品列表</a>
                </li>
                <li class="nav-item mx-2">
                    <a href="#" class="btn btn-outline-secondary border-0 px-3 py-2">About</a>
                </li>
                <li class="nav-item mx-2">
                    <a href="{{ url('/comment') }}" class="btn btn-outline-secondary border-0 px-3 py-2">留言板</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link my-link" href="{{ url('/cart01') }}"><i
                            class="fa-solid fa-cart-shopping fs-3"></i></a>
                </li>
                @auth
                    <li class="nav-item mx-2">
                        <a href="{{ url('/order_list') }}" class="btn btn-outline-secondary border-0 px-3 py-2">訂單列表</a>
                    </li>
                @endauth

                @auth
                    <li class="nav-item mx-2">
                        <a class="nav-link my-link">{{ Auth::user()->name }}, 您好</a>
                    </li>
                    <li class="nav-item mx-2">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-secondary border-0 px-3 py-2">登出</button>
                        </form>
                    </li>
                    @if (Auth::user()->power == 1)
                        <li class="nav-item mx-2">
                            <a href="{{ url('/dashboard') }}" class="btn btn-outline-secondary border-0 px-3 py-2">後台</a>
                        </li>
                    @endif
                @endauth
                @guest
                    <li class="nav-item mx-2">
                        <a class="nav-link my-link " href="/login">
                            <i class="fa-solid fa-circle-user fs-2 me-1"></i>
                            <span>登入</span>
                        </a>
                    </li>
                @endguest

                {{-- <li class="nav-item mx-2 d-flex align-items-center">
                    <a class="nav-link my-link" href="{{ url('/cart01') }}"><i
                            class="fa-solid fa-cart-shopping fs-3"></i></a>

                    <a class="btn nav-link my-link dropdown-toggle ms-3" role="button" id="dropdown-1"
                        data-bs-toggle="dropdown" aria-expanded="false" href="#"><i
                            class="fa-solid fa-circle-user fs-2"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end me-2 mt-0" aria-labelledby="dropdown-1">
                        <li><a class="dropdown-item" href="{{ url('/login') }}">Login</a></li>
                    </ul>
                </li> --}}
            </ul>
        </div>
    </nav>

    {{-- Add your Main --}}
    @yield('mainSec')

    <footer>
        <section id="sitemap">
            <div class="container my-foot-con">
                <div
                    class="d-flex align-items-center flex-column flex-md-row justify-content-md-start justify-content-center">
                    <div class="text-center text-md-start my-box-L">
                        <div class="d-flex align-items-center justify-content-md-start justify-content-center">
                            <div class="logo-2 float-start">
                                <svg class="text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40">
                                    <defs>
                                        <style>
                                            .cls-1 {
                                                fill: #162446;
                                            }

                                            .cls-2 {
                                                fill: #fff;
                                            }

                                        </style>
                                    </defs>
                                    <title>資產 2</title>
                                    <g id="圖層_2" data-name="圖層 2">
                                        <g id="圖層_1-2" data-name="圖層 1">
                                            <circle class="cls-1" cx="20" cy="20" r="20"></circle>
                                            <path class="cls-2"
                                                d="M20,7l7.13,4.11a7.91,7.91,0,0,1,3.95,6.84v6.8l-8.61-5V18.32l7.37,4.26V18.63a7.89,7.89,0,0,0-3.95-6.85L21.28,9.1V33.25L9,26.14V13.35l5.89,3.4a7.91,7.91,0,0,1,3.95,6.85v4.76l-1.23-.71V24.31a7.92,7.92,0,0,0-4-6.85l-3.42-2v9.94L20,31.11Z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <p class="h5 mb-0 ms-3">數位方塊</p>
                        </div>
                        <div>
                            <p class="small text-muted mt-2">Air plant banjo lyft occupy retro adaptogen indego</p>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap pe-0 my-box-R text-center text-md-start">
                        <div class="px-3 my-footbox mt-4 mt-md-0">
                            <p>CATEGORIES</p>
                            <ul class="text-muted">
                                <li>First Link</li>
                                <li>Second Link</li>
                                <li>Third Link</li>
                                <li>Fourth Link</li>
                            </ul>
                        </div>
                        <div class="px-3 my-footbox">
                            <p>CATEGORIES</p>
                            <ul class="text-muted">
                                <li>First Link</li>
                                <li>Second Link</li>
                                <li>Third Link</li>
                                <li>Fourth Link</li>
                            </ul>
                        </div>
                        <div class="px-3 my-footbox">
                            <p>CATEGORIES</p>
                            <ul class="text-muted">
                                <li>First Link</li>
                                <li>Second Link</li>
                                <li>Third Link</li>
                                <li>Fourth Link</li>
                            </ul>
                        </div>
                        <div class="px-3 my-footbox">
                            <p>CATEGORIES</p>
                            <ul class="text-muted">
                                <li>First Link</li>
                                <li>Second Link</li>
                                <li>Third Link</li>
                                <li>Fourth Link</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="copyright" class="bg-light">
            <div
                class="container my-foot-con py-3 d-flex flex-column flex-sm-row align-items-center justify-content-sm-between text-secondary">
                <p class="mb-0 small">© 2020 Tailblocks — @knyttneve</p>
                <div class="mt-2 mt-sm-0">
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-linkedin-in"></i>
                </div>
            </div>

        </section>

    </footer>

    {{-- Add your JS CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    @yield('jsCdn')

    {{-- Add your JS --}}
    @yield('js')



</body>

</html>
