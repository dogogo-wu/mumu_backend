@extends('layouts.app')

@section('pageTittle')
    Photo-Create
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
            max-height: 400px;
            max-width: 400px;
        }

    </style>
@endsection

@section('mainSec')
    <section id="back_area">
        <div class="container my_con">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <p class="h3 fw-bold mb-0">作品照片-新增</p>
            </div>
            <form class="d-flex flex-column" action="/photo/store" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <p class="fw-bold">類別</p>

                    <input type="radio" name="photo_category" id="microblade" class="" value=1 required>
                    <label for="microblade" class="form-label me-3">紋繡</label>

                    <input type="radio" name="photo_category" id="skin" class="" value=2>
                    <label for="skin" class="form-label me-3">皮膚管理</label>

                    <input type="radio" name="photo_category" id="eyelash" class="" value=3>
                    <label for="eyelash" class="form-label me-3">美睫</label>
                </div>
                <div class="mb-3">
                    <label for="photo_subtitle" class="form-label fw-bold">次類別 <small>(非必填)</small></label>
                    <input type="text" name="photo_subtitle" id="photo_subtitle" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="second_img" class="form-label fw-bold">圖片上傳 <small>(可一次上傳多張圖)</small></label>
                    <input type="file" class="form-control" id="second_img" name="second_img[]" accept="image/*"
                        multiple required>
                </div>
                <div class="d-flex justify-content-center align-items-center mt-4">
                    <a class="btn btn-secondary px-4" href="/photo">取消</a>
                    <input type="submit" value="新增照片" class="btn btn-primary px-4 mx-3">
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
