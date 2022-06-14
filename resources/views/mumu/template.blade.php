<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"  content="台中市北區暮沐美學工作室，提供霧眉、紋唇、美瞳線、美睫、睫毛嫁接、臉部保養、韓式皮膚管理等服務！更有美容乙丙級輔導考照、美容創業等課程！暮沐美學秉持品質｜專業｜衛生｜技術，為您打造無瑕的偽妝感。" />
    <link rel="shortcut icon" href="{{asset('./img/mumu_fav.ico')}}" />
    <link rel="bookmark" href="{{asset('./img/mumu_fav.ico')}}" />

    {{-- Add your Tittle --}}
    <title>
        @yield('pageTittle')
    </title>

    <!-- ------------------- CDN CSS Section ------------------- -->
    <!-- Bootstrap 5.1.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- 字體 (使用 Noto Sans TC) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    {{-- Add your CSS CDN --}}
    @yield('cssCdn')

    <!-- ------------------- My CSS Section ------------------- -->
    <link rel="stylesheet" href="{{asset('./css/style.css')}}">

    {{-- Add your CSS Link --}}
    @yield('cssLink')

</head>

<body>
    <nav id="mynav" class="navbar navbar-expand-md navbar-light container-fluid">
        <div class="mylogo-area">
            <a class="d-flex" href="/">
                <img src="{{ asset('./img/logo.png')}}" class="logo" alt="LOGO">
                <p class="m-0 ch logo-txt">暮沐美學</p>
                <p class="m-0 en logo-txt"><em>MUMU Beauty Studio &ensp;</em></p>
            </a>
        </div>

        <button class="navbar-toggler collapsed d-flex d-md-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav">
            <div class="mystick stick1"></div>
            <div class="mystick stick2"></div>
            <div class="mystick stick3"></div>
        </button>
        <div class="mycollapse collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav ms-auto d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="/">首頁</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/course">創業教學</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/gallery">作品照片</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/health">衛教資訊</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/appointment">預約諮詢</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#faq">FAQ</a>
                </li>
                <li class="nav-item">
                    <div class="myicon_area">
                        <a class="nav-link" target="_blank" href="https://www.instagram.com/mu_mu.studio/">
                            <img src="{{asset('./img/icon_ig.png')}}" alt="">
                        </a>
                        <a class="nav-link" href="/appointment">
                            <img src="{{asset('./img/icon_line.png')}}" alt="">
                        </a>
                        <a class="nav-link" target="_blank"
                            href="https://www.facebook.com/%E6%9A%AE%E6%B2%90%E7%BE%8E%E5%AD%B8-%E1%B4%8D%E1%B4%9C%E1%B4%8D%E1%B4%9C-%CA%99%E1%B4%87%E1%B4%80%E1%B4%9C%E1%B4%9B%CA%8F-s%E1%B4%9B%E1%B4%9C%E1%B4%85%C9%AA%E1%B4%8F-107472771588774">
                            <img src="{{asset('./img/icon_fb.png')}}" alt="">
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    {{-- Add your Main --}}
    @yield('mainSec')

    <footer id="myfooter">
        <div class="footer_info">
            <div>
                <img class="logo_foot" src="{{asset('./img/logo.png')}}" alt="">
            </div>
            <div class="left_info">
                <p>暮沐美學 <em>MUMU Beauty Studio</em></p>
                <p>地址：404台中市北區進化北路177之2號</p>
            </div>
            <div class="right_info">
                <p>營業時間：週一至週六，早上10點至晚上9點</p>
                <p>LINE ID：@669akkyc</p>
            </div>
        </div>
        <div class="copyright">
            <p><em>Copyright © 2022 MUMU Beauty Studio.&ensp;</em></p>
            <p><em>All rights reserved.</em></p>
        </div>
    </footer>

    <!-- ------------------- CDN JS Section ------------------- -->
    <!-- Bootstrap 5.1.3 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    {{-- Add your JS CDN --}}
    @yield('jsCdn')

    {{-- Add your JS --}}
    @yield('js')
</body>

</html>
