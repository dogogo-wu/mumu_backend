@extends('layouts.app')

@section('pageTittle')
    Info-Create
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
            <div class="d-flex justify-content-between align-items-center mb-4">
                <p class="h3 fw-bold mb-0">衛教資訊-新增</p>
            </div>
            <form class="d-flex flex-column" action="/info/store" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <p class="fw-bold">種類</p>

                    <input type="radio" name="category" id="microblade" class="" value=1 required>
                    <label for="microblade" class="form-label me-3">紋繡</label>

                    <input type="radio" name="category" id="skin" class="" value=2>
                    <label for="skin" class="form-label me-3">皮膚管理</label>

                    <input type="radio" name="category" id="eyelash" class="" value=3>
                    <label for="eyelash" class="form-label me-3">美睫</label>
                </div>

                <div class="mb-3">
                    <label for="describe" class="form-label fw-bold">說明 <small>(非必填)</small></label>
                    <textarea name="describe" class="form-control" id="describe" cols="20" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="pre" class="form-label fw-bold">術前準備 <small>(換行產生項目符號)</small></label>
                    <textarea name="pre" class="form-control" id="pre" cols="20" rows="12" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="care" class="form-label fw-bold">術後照護 <small>(換行產生項目符號)</small></label>
                    <textarea name="care" class="form-control" id="care" cols="20" rows="12" required></textarea>
                </div>
                <div class="d-flex justify-content-center align-items-center mt-4">
                    <a class="btn btn-secondary px-4" href="/info">取消</a>
                    <input type="submit" value="新增衛教資訊" class="btn btn-primary px-4 mx-3">
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
