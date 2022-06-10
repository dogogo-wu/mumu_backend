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
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="microblading-tab" data-bs-toggle="pill"
                            data-bs-target="#microblading-tab-pane" type="button" role="tab">紋繡</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="skin-tab" data-bs-toggle="pill" data-bs-target="#skin-tab-pane"
                            type="button" role="tab">皮膚管理</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="eyelash-tab" data-bs-toggle="pill"
                            data-bs-target="#eyelash-tab-pane" type="button" role="tab">美睫</button>
                    </li>
                </ul>
                <div class="tab_divider"></div>

                <div class="tab-content outer_tab_content" id="myTabContent">
                    <div class="tab-pane fade show active" id="microblading-tab-pane" role="tabpanel" tabindex="0">
                        <div class="tab_content_area">
                            @foreach ($galAry_1 as $gal_1)
                                <div class="tab_subtitle">
                                    {{$gal_1->subtitle}}
                                </div>
                                <div class="tab_pic" data-aos="zoom-in" data-aos-once="true">
                                    @foreach ($gal_1->imgAry as $img_1)
                                        <div class="img_div">
                                            <img src="{{asset($img_1->img)}}" alt="" data-bs-toggle="modal"
                                                data-bs-target="#myModal_1" data-bs-outer="{{$loop->parent->index}}" data-bs-pic="{{$loop->index}}">
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- 紋繡 Modal -->
                    <div class="modal fade mymodal_all" id="myModal_1" tabindex="-1">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="myModal_1_Label">紋繡</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal_swiper_area">
                                        <div class="swiper modal_swiper">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide"><img src="./img/gallery/eyebrow-1.jpg" /></div>
                                                <div class="swiper-slide"><img src="./img/gallery/eyebrow-2.jpg" /></div>
                                                <div class="swiper-slide"><img src="./img/gallery/eyebrow-3.jpg" /></div>
                                                <div class="swiper-slide"><img src="./img/gallery/lip-1.jpg" /></div>
                                                <div class="swiper-slide"><img src="./img/gallery/lip-2.jpg" /></div>
                                                <div class="swiper-slide"><img src="./img/gallery/lip-3.jpg" /></div>
                                                <div class="swiper-slide"><img src="./img/gallery/eyes-line-1.jpg" />
                                                </div>
                                                <div class="swiper-slide"><img src="./img/gallery/eyes-line-2.jpg" />
                                                </div>
                                                <div class="swiper-slide"><img src="./img/gallery/eyes-line-3.jpg" />
                                                </div>
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
                    <div class="tab-pane fade" id="skin-tab-pane" role="tabpanel" tabindex="0">
                        <div class="tab_content_area">
                            <div class="tab_subtitle">

                            </div>
                            <!-- 皮膚管理照片 -->
                            <div class="tab_pic">
                                <div class="img_div">
                                    <img src="./img/gallery/skin-1.jpg" alt="" data-bs-toggle="modal"
                                        data-bs-target="#myModal_2" data-bs-pic="1">
                                </div>
                                <div class="img_div">
                                    <img src="./img/gallery/skin-2.jpg" alt="" data-bs-toggle="modal"
                                        data-bs-target="#myModal_2" data-bs-pic="2">
                                </div>
                                <div class="img_div">
                                    <img src="./img/gallery/skin-3.jpg" alt="" data-bs-toggle="modal"
                                        data-bs-target="#myModal_2" data-bs-pic="3">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 皮膚管理 Modal -->
                    <div class="modal fade mymodal_all" id="myModal_2" tabindex="-1">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="myModal_2_Label">皮膚管理</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal_swiper_area">
                                        <div class="swiper modal_swiper">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide"><img src="./img/gallery/skin-1.jpg" /></div>
                                                <div class="swiper-slide"><img src="./img/gallery/skin-2.jpg" /></div>
                                                <div class="swiper-slide"><img src="./img/gallery/skin-3.jpg" /></div>
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
                    <div class="tab-pane fade" id="eyelash-tab-pane" role="tabpanel" tabindex="0">
                        <div class="tab_content_area">
                            <div class="tab_subtitle">

                            </div>
                            <!-- 美睫照片 -->
                            <div class="tab_pic" data-aos="zoom-in">
                                <div class="img_div">
                                    <img src="./img/gallery/eyelash-1.jpg" alt="" data-bs-toggle="modal"
                                        data-bs-target="#myModal_3" data-bs-pic="1">
                                </div>
                                <div class="img_div">
                                    <img src="./img/gallery/eyelash-2.jpg" alt="" data-bs-toggle="modal"
                                        data-bs-target="#myModal_3" data-bs-pic="2">
                                </div>
                                <div class="img_div">
                                    <img src="./img/gallery/eyelash-3.jpg" alt="" data-bs-toggle="modal"
                                        data-bs-target="#myModal_3" data-bs-pic="3">
                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- 美睫 Modal -->
                    <div class="modal fade mymodal_all" id="myModal_3" tabindex="-1">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="myModal_3_Label">美睫</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal_swiper_area">
                                        <div class="swiper modal_swiper">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide"><img src="./img/gallery/eyelash-1.jpg" /></div>
                                                <div class="swiper-slide"><img src="./img/gallery/eyelash-2.jpg" /></div>
                                                <div class="swiper-slide"><img src="./img/gallery/eyelash-3.jpg" /></div>
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
    <!-- ------------------- JS Section ------------------- -->
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
            const pic_outer = button.getAttribute('data-bs-outer');
            const pic_index = button.getAttribute('data-bs-pic');
            modal_swiper[0].slideTo(parseInt(pic_index)* + parseInt(pic_index) + 1);
        })
        const myModal_2 = document.getElementById('myModal_2');
        myModal_2.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const pic_index = button.getAttribute('data-bs-pic');
            modal_swiper[1].slideTo(pic_index);
        })
        const myModal_3 = document.getElementById('myModal_3');
        myModal_3.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const pic_index = button.getAttribute('data-bs-pic');
            modal_swiper[2].slideTo(pic_index);
        })
    </script>
@endsection
