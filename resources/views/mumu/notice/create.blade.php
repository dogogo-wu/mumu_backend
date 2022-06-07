@extends('layouts.app')

@section('pageTittle')
    Notice-Create
@endsection

@section('cssLink')
    <!-- ------------------- CDN CSS Section ------------------- -->
    <!-- Bootstrap 5.1.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- ------------------- My CSS Section ------------------- -->
    <link rel="stylesheet" href="{{ asset('css/back.css') }}">

@endsection

@section('mainSec')
    <section id="back_area">
        <div class="container my_con">
            <form class="d-flex flex-column" action="/notice/store" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="subtitle" class="form-label">小標題</label>
                    <input type="text" name="subtitle" id="subtitle" class="form-control"
                        required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">內文</label>
                    <textarea name="content" class="form-control" id="content" cols="20"
                            rows="10" required></textarea>
                </div>
                <div class="d-flex justify-content-center align-items-center mt-4">
                    <a class="btn btn-secondary px-4" href="/notice">取消</a>
                    <input type="submit" value="新增注意事項" class="btn btn-primary px-4 mx-3">
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