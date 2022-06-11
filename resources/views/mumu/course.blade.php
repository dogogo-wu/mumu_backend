@extends('mumu.template')

@section('pageTittle')
    暮沐美學-創業教學
@endsection

@section('cssCdn')
    <!-- Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css">
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- VOV.css -->
    <link href="https://cdn.jsdelivr.net/gh/vaibhav111tandon/vov.css@latest/vov.css" rel="stylesheet" type="text/css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
@endsection

@section('cssLink')
    <link rel="stylesheet" href="{{ asset('./css/course.css') }}">
@endsection

@section('mainSec')
    <!-- content -->
    <section id="course" class="container">
        <div class="mytitle">
            創業教學
        </div>
        <div class="divider"></div>
        <div class="card_sec">
            @foreach ($itemAry as $item)
                <div class="card" data-aos="zoom-in" data-aos-easing="linear" data-aos-once="true">
                    <img src="{{ asset($item->img) }}" alt="" style="opacity: {{ $item->opacity }};">
                    <div class="info">
                        <p class="card_title">{{ $item->title }}</p>
                        <ul>
                            {!! $item->content !!}
                        </ul>
                        <div class="card_btn" data-aos="flip-down">
                            <button onclick="location.href='/appointment'">立即預約</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="btn_sec" data-aos="flip-down">
            <button onclick="location.href='/appointment'">立即預約</button>
        </div>
        <div id="course_pic" class="mytitle">
            課程花絮
        </div>
        <div class="swiper_area">
            <div class="swiper course_swiper">
                <div class="swiper-wrapper">
                    @foreach ($picAry as $pic)
                        <div class="swiper-slide">
                            <img src="{{ asset($pic->img) }}" data-bs-toggle="modal" data-bs-target="#myModal"
                                data-bs-pic="{{ $loop->index }}" />
                        </div>
                    @endforeach
                </div>

                <div class="swiper-pagination"></div>
            </div>
            <div class="myswiper-btn swiper-button-next"></div>
            <div class="myswiper-btn swiper-button-prev"></div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="myModalLabel">課程花絮</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal_swiper_area">
                            <div class="swiper modal_swiper">
                                <div class="swiper-wrapper">
                                    @foreach ($picAry as $pic)
                                        <div class="swiper-slide"><img src="{{ asset($pic->img) }}" /></div>
                                    @endforeach
                                </div>
                                <div class="myswiper-btn swiper-button-next"></div>
                                <div class="myswiper-btn swiper-button-prev"></div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('jsCdn')
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endsection

@section('js')
    <script>
        // 加navbar底線
        var myli = document.querySelector('#navbarNav li:nth-child(2)');
        myli.classList.add('myactive');
    </script>
    <!-- Initialize Swiper -->
    <script>
        // course swiper
        var swiper = new Swiper(".course_swiper", {
            slidesPerView: 1,
            spaceBetweenSlides: 50,
            centeredSlides: true,
            speed: 1200,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            keyboard: true,
            breakpoints: {
                768: {
                    slidesPerView: 3,
                    spaceBetweenSlides: 20,
                },
                1200: {
                    slidesPerView: 5,
                    spaceBetweenSlides: 20,
                },

            }
        });

        // modal swiper
        var modal_swiper = new Swiper(".modal_swiper", {
            slidesPerView: 1,
            spaceBetweenSlides: 50,
            centeredSlides: true,
            speed: 1200,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            keyboard: true,
        });


        // Modal script
        const myModal = document.getElementById('myModal');
        myModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const pic_index = button.getAttribute('data-bs-pic');
            modal_swiper.slideTo(parseInt(pic_index) + 1);
        })
    </script>
@endsection
