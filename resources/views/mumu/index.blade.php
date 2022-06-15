@extends('mumu.template')

@section('pageTittle')
    暮沐美學－台中霧眉｜紋唇｜美睫｜護膚｜美容丙級
@endsection

@section('cssCdn')
    <!-- Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css">
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- vov.css -->
    <link href="https://cdn.jsdelivr.net/gh/vaibhav111tandon/vov.css@latest/vov.css" rel="stylesheet" type="text/css">
@endsection

@section('cssLink')
    <link rel="stylesheet" href="{{ asset('./css/index.css') }}">
@endsection

@section('mainSec')
    <main>
        <section id="banner">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($banAry as $ban)
                        <div class="swiper-slide">
                            <img src="{{ asset($ban->img) }}">
                        </div>
                    @endforeach
                </div>
                <div class="myswiper-btn swiper-button-next"></div>
                <div class="myswiper-btn swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </section>
        <section id="pink-top-area"></section>
        <section id="mumu_faith" class="">
            <div class="container">
                <div id="mumu_faith_slogan" class="d-flex align-items-center justify-content-center" data-aos="zoom-in"
                    data-aos-duration="1500">
                    <!-- aos -->
                    <div id="mumu_slogan_frame" class="d-flex flex-column align-items-center">
                        <div id="mumu_slogan_brush" class=" ">
                            <div class="mumu_brush"></div>
                            <img class="mumu_logo_name" src="{{ asset('./img/index/logo_txt.png') }}" alt="">
                            <div class="slogan_contents d-flex flex-column">
                                <div>
                                    <p>自信，來自你願意為自已投資多少</p>
                                    <p>暮沐美學秉持 品質｜專業｜衛生｜技術</p>
                                    <p>專為顧客打造無瑕的偽妝感</p>
                                </div>
                            </div>
                        </div>
                        <p class="studio mb-3">MUMU Beauty Studio</p>
                    </div>
                </div>

                <div id="mumu_faith_content_and_notice" class="d-flex flex-column justify-content-around" data-aos="zoom-in"
                    data-aos-easing="ease-in-sine" data-aos-delay="500" data-aos-duration="1000">
                    <!-- aos -->
                    <div class="mumu_faith_content p-2 d-flex justify-content-start">
                        <div class="img_box d-flex justify-content-center">
                            <img class="flower_img" src="{{ asset('./img/index/cir_flower.png') }}" alt="">
                        </div>
                        <div class="mumu_content_words">衛生．舒適．安心的操作環境</div>
                    </div>
                    <div class="mumu_faith_content p-2 d-flex justify-content-start">
                        <div class="img_box d-flex justify-content-center">
                            <img class="material_img" src="{{ asset('./img/index/cir_material.png') }}" alt="">
                        </div>
                        <div class="mumu_content_words">嚴選進口材料，品質穩定有保證</div>
                    </div>
                    <div class="mumu_faith_content p-2 d-flex justify-content-start">
                        <div class="img_box d-flex justify-content-center">
                            <img class="service_img" src="{{ asset('./img/index/cir_service.png') }}" alt="">
                        </div>
                        <div class="mumu_content_words">專業呈現，提供最好的美學體驗</div>
                    </div>
                    <div class="mumu_faith_notice">
                        <ul>
                            <li>入內需酒精消毒及測量體溫</li>
                            <li>暮沐美學選用「醫療級拋棄式耗材」，一人一組、不重複使用</li>
                            <li>鋪床巾、頭巾等均採拋棄式，維護品質、衛生及專業</li>
                            <li>一人操作完畢立即以藍光酒精噴霧進行消毒</li>
                            <li>本店使用產品由韓國、日本、德國進口，皆有衛生合格認證</li>
                            <li>紋繡美睫師及皮膚管理師，皆通過專業考試領取證照，且持續進修研習</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section id="para_ad">
            <section id="pink-bottom-area"></section>
            <section id="mumu_advertisement" class="">
                <div class="container">
                    <!-- Swiper -->
                    <div class="services_title d-flex flex-column align-items-center">
                        <div>最新消息</div>
                        <div class="title_dot_line d-flex align-items-center">
                            <div class="dot dot1"></div>
                            <div class="dot_line"></div>
                            <div class="dot dot2"></div>
                        </div>
                    </div>
                    <div class="swiper ad_mySwiper">
                        <div class="swiper-wrapper">
                            @foreach ($newsAry as $news)
                                <div class="swiper-slide">
                                    <img src="{{ asset($news->img) }}" alt="" data-bs-toggle="modal"
                                        data-bs-target="#myModal" data-bs-pic="{{ $loop->index }}">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <!-- Modal News -->
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="myModalLabel">最新消息</h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="modal_swiper_area">
                                    <div class="swiper modal_swiper">
                                        <div class="swiper-wrapper">
                                            @foreach ($newsAry as $news)
                                                <div class="swiper-slide"><img src="{{ asset($news->img) }}" /></div>
                                            @endforeach
                                        </div>
                                        {{-- <div class="myswiper-btn swiper-button-next"></div>
                                    <div class="myswiper-btn swiper-button-prev"></div> --}}
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="pink-top-area"></section>
        </section>
        <section id="mumu_services">
            <div class="service container d-flex flex-column align-items-center">
                <div class="services_title d-flex flex-column align-items-center">
                    <div>服務項目</div>
                    <div class="title_dot_line d-flex align-items-center">
                        <div class="dot dot1"></div>
                        <div class="dot_line"></div>
                        <div class="dot dot2"></div>
                    </div>
                </div>
                <!-- aos -->
                <div class="services_card">
                    @foreach ($servAry as $serv)
                        <div class="sevice_cards_container" data-aos="flip-up" data-aos-easing="linear" data-aos-once="true"
                            data-bs-toggle="modal" data-bs-target="#myServiceModal" data-bs-pic="{{ $loop->index }}">
                            <div class="each_service_option d-flex align-items-center justify-content-center">
                                {{ $serv->title }}</div>
                            <div class="service_img d-flex justify-content-end">
                                <img src="{{ asset($serv->img) }}" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="button" data-aos="flip-down" data-aos-easing="linear" data-aos-once="true"
                    data-aos-offset="100">
                    <button onclick="location.href='/gallery'">完整作品</button>
                    <button onclick="location.href='/course'">課程項目</button>
                    <button onclick="location.href='/appointment'">立即預約</button>
                </div>
            </div>
            <!-- Modal Service -->
            <div class="modal fade" id="myServiceModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="myServicModalLabel">...</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="myser_img_area">
                                ...
                            </div>
                            <div class="myser_content">
                                <ul>...</ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="para_faq">
            <section id="pink-bottom-area"></section>
            <section id="faq">
                <div class="faq">
                    <div class="title">
                        <h2>常見問題FAQ</h2>
                    </div>
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        @foreach ($faqAry as $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-{{ $loop->index }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="flush-{{ $loop->index }}" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        {{ $faq->answer }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                </div>
            </section>
        </section>
        <section id="map">
            <div class="mymap">
                <iframe class="w-100 h-100"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7280.504087726315!2d120.68146719423413!3d24.16289190429414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346917a090fac0d9%3A0x1b36831166da4871!2z5rKQ5oWV576O5a24!5e0!3m2!1szh-TW!2stw!4v1653485724716!5m2!1szh-TW!2stw"
                    style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
    </main>
@endsection

@section('jsCdn')
    <!-- Swiper -->
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endsection

@section('js')
    <script>
        // 加navbar底線
        var myli = document.querySelector('#navbarNav li:nth-child(1)');
        myli.classList.add('myactive');
    </script>


    <script>
        var swiper = new Swiper(".mySwiper", {
            // cssMode: true,
            speed: 1200,
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            keyboard: true,
        });
    </script>
    <!-- 首頁暮沐環境卡swiper -->
    <script>
        var ad_swiper = new Swiper(".ad_mySwiper", {
            slidesPerView: 1,
            loop: true,

            breakpoints: {
                768: {
                    slidesPerView: 3,
                }
            },

            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },

            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
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

        // Service Modal script
        const myServiceModal = document.getElementById('myServiceModal');
        myServiceModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const modalTitle = myServiceModal.querySelector('.modal-title');
            const modalImg = myServiceModal.querySelector('.myser_img_area');
            const modalContent = myServiceModal.querySelector('.myser_content ul');


            const pic_index = button.getAttribute('data-bs-pic');

            // 傳資料到JS，使用JSON_HEX_TAG來正常顯示element
            var servObjAry = {!! json_encode($servAry, JSON_HEX_TAG) !!};

            // 取目標的obj
            var tarServ = servObjAry[pic_index];

            // 帶資料
            modalTitle.innerHTML = tarServ.title;
            modalImg.innerHTML = `<img src="${tarServ.img}">`;
            modalContent.innerHTML = tarServ.content;
        })
    </script>
@endsection
