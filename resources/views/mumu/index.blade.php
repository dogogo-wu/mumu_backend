@extends('mumu.template')

@section('pageTittle')
    暮沐美學-首頁
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
    <link rel="stylesheet" href="{{ asset('./css/index.css')}}">
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
                <div id="mumu_faith_slogan" class="d-flex align-items-center justify-content-center"
                    data-aos="fade-right">
                    <!-- aos -->
                    <div id="mumu_slogan_frame" class="d-flex flex-column align-items-center">
                        <div id="mumu_slogan_brush" class=" ">
                            <div class="mumu_brush"></div>
                            <img class="mumu_logo_name" src="{{ asset('./img/index/logo_txt.png')}}" alt="">
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

                <div id="mumu_faith_content_and_notice" class="d-flex flex-column justify-content-around"
                    data-aos="fade-left" data-aos-easing="linear" data-aos-offset="300">
                    <!-- aos -->
                    <div class="mumu_faith_content p-2 d-flex justify-content-start">
                        <div class="img_box d-flex justify-content-center">
                            <img class="flower_img" src="{{ asset('./img/index/cir_flower.png')}}" alt="">
                        </div>
                        <div class="mumu_content_words">衛生．舒適．安心的操作環境</div>
                    </div>
                    <div class="mumu_faith_content p-2 d-flex justify-content-start">
                        <div class="img_box d-flex justify-content-center">
                            <img class="material_img" src="{{ asset('./img/index/cir_material.png')}}" alt="">
                        </div>
                        <div class="mumu_content_words">嚴選進口材料，品質穩定有保證</div>
                    </div>
                    <div class="mumu_faith_content p-2 d-flex justify-content-start">
                        <div class="img_box d-flex justify-content-center">
                            <img class="service_img" src="{{ asset('./img/index/cir_service.png')}}" alt="">
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
                        <div class="swiper-slide">
                            <img src="./img/index/skin_care_img.jpeg" alt="" data-bs-toggle="modal"
                                data-bs-target="#myModal" data-bs-pic="1">
                        </div>
                        <div class="swiper-slide">
                            <img src="./img/index/ad_2.jpg" alt="" data-bs-toggle="modal" data-bs-target="#myModal"
                                data-bs-pic="2">
                        </div>
                        <div class="swiper-slide">
                            <img src="./img/index/ad_3.jpg" alt="" data-bs-toggle="modal" data-bs-target="#myModal"
                                data-bs-pic="3">
                        </div>
                        <div class="swiper-slide">
                            <img src="./img/index/ad_1.jpg" alt="" data-bs-toggle="modal" data-bs-target="#myModal"
                                data-bs-pic="4">
                        </div>
                        <div class="swiper-slide">
                            <img src="./img/index/ad_2.jpg" alt="" data-bs-toggle="modal" data-bs-target="#myModal"
                                data-bs-pic="5">
                        </div>
                        <div class="swiper-slide">
                            <img src="./img/index/skin_care_img.jpeg" alt="" data-bs-toggle="modal"
                                data-bs-target="#myModal" data-bs-pic="6">
                        </div>
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
                                        <div class="swiper-slide"><img src="./img/index/skin_care_img.jpeg" /></div>
                                        <div class="swiper-slide"><img src="./img/index/ad_2.jpg" /></div>
                                        <div class="swiper-slide"><img src="./img/index/ad_3.jpg" /></div>
                                        <div class="swiper-slide"><img src="./img/index/ad_1.jpg" /></div>
                                        <div class="swiper-slide"><img src="./img/index/ad_2.jpg" /></div>
                                        <div class="swiper-slide"><img src="./img/index/skin_care_img.jpeg" /></div>
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
        <section id="pink-top-area"></section>
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

                    <div class="sevice_cards_container" data-aos="flip-up" data-aos-easing="linear" data-aos-once = "true" data-bs-toggle="modal" data-bs-target="#myServiceModal" data-bs-pic="1">
                        <div class="each_service_option d-flex align-items-center justify-content-center">訂製妝感霧眉</div>
                        <div class="service_img d-flex justify-content-end">
                            <img src="./img/service_img/serve-img-1訂製妝感霧眉.jpg" alt="">
                        </div>
                    </div>
                    <div class="sevice_cards_container" data-aos="flip-up" data-aos-easing="linear" data-aos-once = "true" data-bs-toggle="modal" data-bs-target="#myServiceModal" data-bs-pic="2">
                        <div class="each_service_option d-flex align-items-center justify-content-center">美瞳線</div>
                        <div class="service_img d-flex justify-content-end">
                            <img src="./img/service_img/serve-img-6美瞳線.jpg" alt="">
                        </div>
                    </div>
                    <div class="sevice_cards_container" data-aos="flip-up" data-aos-easing="linear" data-aos-once = "true" data-bs-toggle="modal" data-bs-target="#myServiceModal" data-bs-pic="3">
                        <div class="each_service_option d-flex align-items-center justify-content-center">蜜糖唇</div>
                        <div class="service_img d-flex justify-content-end">
                            <img src="./img/service_img/IMG_9057.jpg" alt="">
                        </div>
                    </div>
                    <div class="sevice_cards_container" data-aos="flip-up" data-aos-easing="linear" data-aos-once = "true" data-bs-toggle="modal" data-bs-target="#myServiceModal" data-bs-pic="4">
                        <div class="each_service_option d-flex align-items-center justify-content-center">3D美睫</div>
                        <div class="service_img d-flex justify-content-end">
                            <img src="./img/service_img/S__73777193.jpg" alt="">
                        </div>
                    </div>
                    <div class="sevice_cards_container" data-aos="flip-up" data-aos-easing="linear" data-aos-once = "true" data-bs-toggle="modal" data-bs-target="#myServiceModal" data-bs-pic="5">
                        <div class="each_service_option d-flex align-items-center justify-content-center">6D美式奢華</div>
                        <div class="service_img d-flex justify-content-end">
                            <img src="./img/service_img/serve-img-5-6D美式奢華.jpg" alt="">
                        </div>
                    </div>
                    <div class="sevice_cards_container" data-aos="flip-up" data-aos-easing="linear" data-aos-once = "true" data-bs-toggle="modal" data-bs-target="#myServiceModal" data-bs-pic="6">
                        <div class="each_service_option d-flex align-items-center justify-content-center">睫毛捲翹管理</div>
                        <div class="service_img d-flex justify-content-end">
                            <img src="./img/service_img/serve-img-4睫毛捲翹管理.jpg" alt="">
                        </div>
                    </div>
                    <div class="sevice_cards_container" data-aos="flip-up" data-aos-easing="linear" data-aos-once = "true" data-bs-toggle="modal" data-bs-target="#myServiceModal" data-bs-pic="7">
                        <div class="each_service_option d-flex align-items-center justify-content-center">韓式皮膚管理</div>
                        <div class="service_img d-flex justify-content-end">
                            <img src="./img/service_img/serve-img-2韓式皮膚管理.jpg" alt="">
                        </div>
                    </div>
                    <div class="sevice_cards_container" data-aos="flip-up" data-aos-easing="linear" data-aos-once = "true" data-bs-toggle="modal" data-bs-target="#myServiceModal" data-bs-pic="8">
                        <div class="each_service_option d-flex align-items-center justify-content-center">客製化皮膚課程</div>
                        <div class="service_img d-flex justify-content-end">
                            <img src="./img/service_img/客製化皮膚課程_1.jpg" alt="">
                        </div>
                    </div>
                    <div class="sevice_cards_container" data-aos="flip-up" data-aos-easing="linear" data-aos-once = "true" data-bs-toggle="modal" data-bs-target="#myServiceModal" data-bs-pic="9">
                        <div class="each_service_option d-flex align-items-center justify-content-center">乙丙級輔導考證
                        </div>
                        <div class="service_img d-flex justify-content-end">
                            <img src="./img/service_img/乙丙級輔導考證_1.jpg" alt="">
                        </div>
                    </div>
                    <div class="sevice_cards_container" data-aos="flip-up" data-aos-easing="linear" data-aos-once = "true" data-bs-toggle="modal" data-bs-target="#myServiceModal" data-bs-pic="10">
                        <div class="each_service_option d-flex align-items-center justify-content-center">美容創業教學</div>
                        <div class="service_img d-flex justify-content-end">
                            <img src="./img/service_img/美容創業教學.jpg" alt="">
                        </div>
                    </div>
                </div>

                <div class="button" data-aos="flip-down" data-aos-easing="linear" data-aos-once = "true" data-aos-offset="100">
                    <button onclick="location.href='./gallery.html'">完整作品</button>
                    <button onclick="location.href='./course.html'">課程項目</button>
                    <button onclick="location.href='./appointment.html'">立即預約</button>
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
                                <!-- <img src="./img/service_img/serve-img-1訂製妝感霧眉.jpg" alt=""> -->
                            </div>
                            <div class="myser_content">
                                <ul>...</ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="pink-bottom-area"></section>

        <section id="faq">
            <div class="faq">
                <div class="title">
                    <h2>常見問題FAQ</h2>
                </div>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                關於眉毛 – 做完會像蠟筆小新一樣很粗很黑嗎?
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">不會哦!操作完就像眉筆畫上去一樣自然，脫屑時也只會有薄薄的皮屑脫落

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                aria-controls="flush-collapseTwo">
                                關於眉毛 – 做完眉毛可以洗臉碰水嗎?

                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">可以的! 可以碰水但清潔用品不能碰到，清洗完拿面紙壓乾保持乾燥即可
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                關於睫毛 – 嫁接睫毛會使真睫毛越來越少嗎?
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                不會!因為本身毛髮都有生長週期，嫁接睫毛是接在距離睫毛根部0.1–0.2MM處，而不是接在眼瞼上，所以假睫毛正常會跟著真睫毛週期脫落
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseFour" aria-expanded="false"
                                aria-controls="flush-collapseFour">
                                關於睫毛 – 為什麼接完睫毛眼皮容易紅腫癢?
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">因為嫁接時距離根部太接近或嫁接服貼度不夠，容易導致假睫毛根部搓到眼皮
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseFive" aria-expanded="false"
                                aria-controls="flush-collapseFive">
                                關於皮膚 – 任何膚質都適合操作藻針嗎?
                            </button>
                        </h2>
                        <div id="flush-collapseFive" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">不是哦!蟹足腫、孕婦、糖尿病以及極度敏感膚質不建議使用此課程
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseSix" aria-expanded="false"
                                aria-controls="flush-collapseSix">
                                關於皮膚 – 為什麼擦保養品感覺都無法吸收?

                            </button>
                        </h2>
                        <div id="flush-collapseSix" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">因為肌膚屏障受損(肌膚屏障=角質層)，PH值無法平衡，導致保養品擦再多都吸收不了，建議先修復肌膚再針對問題保養
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>
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
    <script>AOS.init();</script>
@endsection

@section('js')
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
                992: {
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
            modal_swiper.slideTo(pic_index);
        })

        // Service Modal script
        const myServiceModal = document.getElementById('myServiceModal');
        myServiceModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const modalTitle = myServiceModal.querySelector('.modal-title');
            const modalImg = myServiceModal.querySelector('.myser_img_area');
            const modalContent = myServiceModal.querySelector('.myser_content ul');


            const pic_index = button.getAttribute('data-bs-pic');
            if (pic_index == 1) {
                modalTitle.innerHTML = `訂製妝感霧眉`;
                modalImg.innerHTML = `<img src="./img/service_img/serve-img-1訂製妝感霧眉.jpg" alt="">`;
                modalContent.innerHTML = `  <li>柔霧眉</li>
                                            <li>男士眉</li>
                                            <li>改眉（橘紅眉/眉型）</li>`;
            } else if (pic_index == 2) {
                modalTitle.innerHTML = `美瞳線`;
                modalImg.innerHTML = `<img src="./img/service_img/serve-img-6美瞳線.jpg" alt="">`;
                modalContent.innerHTML = `  <li>隱形美瞳線</li>
                                            <li>妝感美瞳線</li>`;
            } else if (pic_index == 3) {
                modalTitle.innerHTML = `蜜糖唇`;
                modalImg.innerHTML = `<img src="./img/service_img/IMG_9057.jpg" alt="">`;
                modalContent.innerHTML = `  <li>漸層唇</li>
                                            <li>改烏唇</li>
                                            <li>改唇（唇形調整/顏色不均）</li>`;
            } else if (pic_index == 4) {
                modalTitle.innerHTML = `3D美睫`;
                modalImg.innerHTML = `<img src="./img/service_img/S__73777193.jpg" alt="">`;
                modalContent.innerHTML = `  <li>150根</li>
                                            <li>250根</li>
                                            <li>接滿</li>`;
            } else if (pic_index == 5) {
                modalTitle.innerHTML = `6D美式奢華`;
                modalImg.innerHTML = `<img src="./img/service_img/serve-img-5-6D美式奢華.jpg" alt="">`;
                modalContent.innerHTML = `  <li>300根</li>
                                            <li>400根</li>
                                            <li>500根</li>
                                            <li>接滿</li>`;
            } else if (pic_index == 6) {
                modalTitle.innerHTML = `睫毛捲翹管理`;
                modalImg.innerHTML = `<img src="./img/service_img/serve-img-4睫毛捲翹管理.jpg" alt="">`;
                modalContent.innerHTML = `  <li>本身睫毛條件佳</li>
                                            <li>不喜歡嫁接的異物感</li>`;
            } else if (pic_index == 7) {
                modalTitle.innerHTML = `韓式皮膚管理`;
                modalImg.innerHTML = `<img src="./img/service_img/serve-img-2韓式皮膚管理.jpg" alt="">`;
                modalContent.innerHTML = `  <li>基礎管理</li>
                                            <li>再生管理</li>
                                            <li>美白管理</li>
                                            <li>抗痘管理</li>`;
            } else if (pic_index == 8) {
                modalTitle.innerHTML = `客製化皮膚課程`;
                modalImg.innerHTML = `<img src="./img/service_img/客製化皮膚課程_1.jpg" alt="">`;
                modalContent.innerHTML = `<li>依現場皮膚管理師規劃療程</li>`;

            } else if (pic_index == 9) {
                modalTitle.innerHTML = `乙丙級輔導考證`;
                modalImg.innerHTML = `<img src="./img/service_img/乙丙級輔導考證_1.jpg" alt="">`;
                modalContent.innerHTML = `  <li>美容丙級證照</li>
                                            <li>美容乙級證照</li>`;
            } else if (pic_index == 10) {
                modalTitle.innerHTML = `美容創業教學`;
                modalImg.innerHTML = `<img src="./img/service_img/美容創業教學.jpg" alt="">`;
                modalContent.innerHTML = `  <li>半永久紋繡教學</li>
                                            <li>眉毛單科班教學</li>
                                            <li>3D/6D美睫教學</li>
                                            <li>睫毛捲翹管理教學</li>
                                            <li>K-Beauty 韓式皮膚管理教學</li>`;
            }
        })
    </script>
@endsection
