@extends('layouts.app')

@section('pageTittle')
    FAQ-Edit
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
    <section id="back_area" class="py-5">
        <div class="container my_con">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <p class="h2 fw-bold mb-0">FAQ編輯</p>
            </div>

            <form class="d-flex flex-column" action="/faq/update/{{ $myedit->id }}" method="post"
                enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="ques" class="form-label">問題</label>
                    <textarea name="ques" class="form-control" id="ques" cols="20"
                            rows="5" required>{{ $myedit->question }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="ans" class="form-label">答案</label>
                    <textarea name="ans" class="form-control" id="ans" cols="20"
                            rows="5" required>{{ $myedit->answer }}</textarea>
                </div>

                <div class="d-flex justify-content-center align-items-center mt-4">
                    <div class="d-flex justify-content-center align-items-center mt-4">
                        <a class="btn btn-secondary px-4" href="/faq">取消</a>
                        <input type="submit" value="送出" class="btn btn-primary px-4 mx-2">
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
