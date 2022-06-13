@extends('mumu.template')

@section('pageTittle')
    暮沐美學-作品照片
@endsection

@section('cssCdn')
    <!-- Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css">
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@endsection

@section('cssLink')
    <link rel="stylesheet" href="{{ asset('./css/gallery.css') }}">
@endsection

@section('mainSec')
    <main>
        <section id="gallery" class="container">
            <div class="mytitle">
                作品照片
            </div>
            <div class="divider"></div>
            <div class="mytab_area">
                <ul class="nav nav-pills" id="myTab" role="tablist">
                    @foreach ($galAry_all as $item)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link @if ($item->first()->category == 1) active @endif" data-bs-toggle="pill"
                                data-bs-target="#tab-pane-{{ $item->first()->category }}" type="button"
                                role="tab">{{ $item->first()->title }}</button>
                        </li>
                    @endforeach
                </ul>
                <div class="tab_divider"></div>

                <div class="tab-content outer_tab_content" id="myTabContent">

                    @foreach ($galAry_all as $galAry)
                        <!-- 照片 -->
                        <div class="tab-pane fade @if ($loop->index == 0) show active @endif" id="tab-pane-{{$loop->index + 1}}" role="tabpanel" tabindex="0">
                            <div class="tab_content_area">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($galAry as $item)
                                    <div class="tab_subtitle">
                                        {{ $item->subtitle }}
                                    </div>
                                    <div class="tab_pic" data-aos="zoom-in" data-aos-once="true">
                                        @foreach ($item->imgAry as $myimg)
                                            <div class="img_div">
                                                <img src="{{ asset($myimg->img) }}" alt="" data-bs-toggle="modal"
                                                    data-bs-target="#myModal_{{$loop->parent->parent->index + 1}}" data-bs-cnt="{{ $i }}">
                                            </div>
                                            @php
                                                $i += 1;
                                            @endphp
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade mymodal_all" id="myModal_{{$loop->index + 1}}" tabindex="-1">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="myModalLabel">{{$galAry->first()->title}}</h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="modal_swiper_area">
                                            <div class="swiper modal_swiper">
                                                <div class="swiper-wrapper">
                                                    @foreach ($galAry as $item)
                                                        @foreach ($item->imgAry as $myimg)
                                                            <div class="swiper-slide">
                                                                <img src="{{ asset($myimg->img) }}" />
                                                            </div>
                                                        @endforeach
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
                    @endforeach
                </div>
            </div>
        </section>
    </main>
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
        var myli = document.querySelector('#navbarNav li:nth-child(3)');
        myli.classList.add('myactive');
    </script>

    <script>
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
        const myModal_1 = document.getElementById('myModal_1');
        myModal_1.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const pic_cnt = button.getAttribute('data-bs-cnt');
            modal_swiper[0].slideTo(parseInt(pic_cnt) + 1);
        })
        const myModal_2 = document.getElementById('myModal_2');
        myModal_2.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const pic_cnt = button.getAttribute('data-bs-cnt');
            modal_swiper[1].slideTo(parseInt(pic_cnt) + 1);
        })
        const myModal_3 = document.getElementById('myModal_3');
        myModal_3.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const pic_cnt = button.getAttribute('data-bs-cnt');
            modal_swiper[2].slideTo(parseInt(pic_cnt) + 1);
        })
    </script>
@endsection
