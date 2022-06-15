@extends('mumu.template')

@section('pageTittle')
    預約諮詢｜聯絡我們｜台中霧眉｜紋唇｜美睫｜護膚｜美容丙級－暮沐美學
@endsection

@section('cssCdn')
    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@endsection

@section('cssLink')
    <link rel="stylesheet" href="{{ asset('./css/appointment.css') }}">
@endsection

@section('mainSec')
    <main>
        <section id="appointment" class="container d-flex flex-column align-items-center justify-content-center">
            <div id="title" class="d-flex align-items-center">預約諮詢</div>
            <div class="divider"></div>
            <div id="book" class="d-flex justify-content-between pt-4 pb-4">
                <div class="appointment_notice" data-aos="fade-right" data-aos-easing="linear">
                    <!-- 電腦版 -->
                    <div class="appointment_notice_title d-flex justify-content-center">
                        預約注意事項
                    </div>
                    @if (count($appoAry) != 0)
                        <div class="appointment_notice_content d-flex flex-column justify-content-center p-4">
                            <div id="foo">
                                <p>{{ $appoAry[0]->subtitle }}</p>

                                {!! $appoAry[0]->content !!}
                            </div>
                            <div class="d-flex justify-content-center">
                                <button id="button"
                                    data-clipboard-text="{{ rtrim(ltrim(str_replace('</p><p>', "\r\n", $appoAry[0]->content), '<p>'), '</p>') }}">點擊複製預約資料</button>
                            </div>
                            <hr>
                            <p>{{ $appoAry[1]->subtitle }}</p>

                            {!! $appoAry[1]->content !!}
                        </div>
                    @endif
                </div>
                <div class="divider2"></div>
                <div class="appointment_info d-flex flex-column align-items-center" data-aos="fade-left"
                    data-aos-easing="linear">
                    <div class="line_info d-flex flex-column align-items-center justify-content-between mb-3">
                        <div class="line_title">加Line好友進行預約或諮詢</div>
                        <img class="mt-3 mb-3" src="{{ asset('./img/line_qrcode.png') }}" alt=""
                            style="width: 170px; height: 170px;">
                        <div class="line_id">Line ID: &nbsp; @669akkyc</div>
                    </div>
                    <div class="mumu_info">
                        <div class="d-flex">
                            <i class="me-2 bi bi-file-earmark-text"></i>
                            <p>紋繡｜美睫｜皮膚管理｜創業教學</p>
                        </div>
                        <div class="d-flex">
                            <i class=" me-2 bi bi-alarm"></i>
                            <p>週一至週六，早上10點至晚上9點</p>
                        </div>
                        <div class="d-flex">
                            <i class=" me-2 bi bi-geo-alt"></i>
                            <p>404台中市北區進化北路177之2號(暮沐美學)</p>
                        </div>
                    </div>
                    <!-- 手機版 -->
                    <div class="appointment_notice2 mb-3">
                        <div class="appointment_notice_title d-flex justify-content-center">
                            預約注意事項
                        </div>
                        @if (count($appoAry) != 0)
                            <div class="appointment_notice_content d-flex flex-column justify-content-center p-4">
                                <p>{{ $appoAry[0]->subtitle }}</p>

                                {!! $appoAry[0]->content !!}
                                <div class="d-flex justify-content-center">
                                    <button id="button"
                                        data-clipboard-text="{{ rtrim(ltrim(str_replace('</p><p>', "\r\n", $appoAry[0]->content), '<p>'), '</p>') }}">點擊複製預約資料</button>
                                </div>
                                <hr>
                                <p>{{ $appoAry[1]->subtitle }}</p>

                                {!! $appoAry[1]->content !!}
                            </div>
                        @endif
                    </div>

                    <div class="map_info d-flex justify-content-center">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58256.2180397846!2d120.64728120533003!3d24.13615955713905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346917a090fac0d9%3A0x1b36831166da4871!2z5rKQ5oWV576O5a24!5e0!3m2!1szh-TW!2stw!4v1653628866385!5m2!1szh-TW!2stw"
                            style="border:0;" width="100%" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('jsCdn')
    <!-- clipboard.js 複製 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.7.1/clipboard.min.js"></script>
    <script>
        new Clipboard('#button');
    </script>

    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endsection

@section('js')
    <script>
        // 加navbar底線
        var myli = document.querySelector('#navbarNav li:nth-child(5)');
        myli.classList.add('myactive');
    </script>
@endsection
