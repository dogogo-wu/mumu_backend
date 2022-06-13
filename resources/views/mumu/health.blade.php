@extends('mumu.template')

@section('pageTittle')
    暮沐美學-衛教資訊
@endsection

@section('cssCdn')
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@endsection

@section('cssLink')
    <link rel="stylesheet" href="{{ asset('./css/health.css') }}">
@endsection

@section('mainSec')
    <main>
        <section id="health" class="container">
            <div class="mytitle">
                衛教資訊
            </div>
            <div class="divider"></div>
            <div class="mytab_area">
                <ul class="nav nav-pills" id="myTab" role="tablist">

                    @foreach ($healthAry as $item)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link @if($item->category == 1) active @endif" data-bs-toggle="pill"
                                data-bs-target="#tab-pane-{{$item->category}}" type="button" role="tab">{{$item->title}}</button>
                        </li>
                    @endforeach
                </ul>
                <div class="tab_divider"></div>

                <div class="tab-content outer_tab_content" id="myTabContent">
                    @foreach ($healthAry as $item)
                        <div class="tab-pane fade @if ($item->category == 1) show active @endif"
                            id="tab-pane-{{ $item->category }}" role="tabpanel" tabindex="0">
                            <div class="add_info">
                                {!! $item->describe !!}
                            </div>
                            <div class="tab_content_area">
                                <div class="left_area" data-aos="fade-right" data-aos-easing="linear">
                                    <div class="my_subtitle">
                                        術前準備
                                    </div>
                                    <ul>
                                        {!! $item->pre !!}
                                    </ul>
                                </div>
                                <div class="divider2"></div>
                                <div class="right_area" data-aos="fade-left" data-aos-easing="linear">
                                    <div class="my_subtitle">
                                        術後照護
                                    </div>
                                    <ul>
                                        {!! $item->care !!}
                                    </ul>
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
    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endsection

@section('js')
    <script>
        // 加navbar底線
        var myli = document.querySelector('#navbarNav li:nth-child(4)');
        myli.classList.add('myactive');
    </script>
@endsection
