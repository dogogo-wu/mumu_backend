@extends('layouts.app')

@section('pageTittle')
    Service-Edit
@endsection

@section('cssLink')
    <!-- ------------------- CDN CSS Section ------------------- -->
    <!-- Bootstrap 5.1.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- ------------------- My CSS Section ------------------- -->
    <link rel="stylesheet" href="{{ asset('css/back.css') }}">
    <style>
        form img {
            max-height: 360px;
            object-fit: contain;
            margin-right: auto
        }

    </style>
@endsection

@section('mainSec')
    <section id="back_area" class="py-5">
        <div class="container my_con">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <p class="h3 fw-bold mb-0">服務項目-編輯</p>
            </div>

            <form class="d-flex flex-column" action="/service/update/{{ $myedit->id }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-3 d-flex flex-column">
                    <p class="mb-0">現在的圖片</p>
                    <img id="blah" src="{{ asset($myedit->img) }}" alt="your image" />
                    <label for="service_img" class="form-label mt-3">圖片上傳</label>
                    <input class="form-control" type="file" name="service_img" id="service_img">
                </div>

                <div class="mb-3">
                    <label for="service_title" class="form-label">標題</label>
                    <input type="text" name="service_title" id="service_title" class="form-control"
                        value="{{ $myedit->title }}" required>
                </div>

                <div class="mb-3">
                    <label for="service_content" class="form-label">內文</label>
                    <textarea name="service_content" class="form-control" id="service_content" cols="20"
                            rows="5" required>{{ rtrim(ltrim(str_replace('</li><li>', "\r\n", $myedit->content), '<li>'), '</li>') }}</textarea>
                </div>

                <div class="d-flex justify-content-center align-items-center mt-4">
                    <div class="d-flex justify-content-center align-items-center mt-4">
                        <a class="btn btn-secondary px-4" href="/service">取消</a>
                        <input type="submit" value="送出" class="btn btn-primary px-4 mx-2">
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('jsCdn')
    <!-- Bootstrap 5.1.3 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
@endsection

@section('js')
    <script>
        service_img.onchange = evt => {
            const [file] = service_img.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
