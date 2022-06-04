@extends('layouts.app')

@section('pageTittle')
    Teach-Pic-Edit
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
                <p class="h2 fw-bold mb-0">教學花絮-編輯</p>
            </div>

            <form class="d-flex flex-column" action="/teach_pic/update/{{ $myedit->id }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-3 d-flex flex-column">
                    <p class="mb-0">現在的圖片</p>
                    <img id="blah" src="{{ asset($myedit->img) }}" alt="your image" />
                    <label for="teach_pic_img" class="form-label mt-3">教學花絮-圖片上傳</label>
                    <input class="form-control" type="file" name="teach_pic_img" id="teach_pic_img">
                </div>

                <div class="mb-3">
                    <label for="teach_pic_remark" class="form-label">備註 (非必填)</label>
                    <input type="text" name="teach_pic_remark" id="teach_pic_remark" class="form-control"
                        value="{{ $myedit->remark }}">
                </div>

                <div class="d-flex justify-content-center align-items-center mt-4">
                    <div class="d-flex justify-content-center align-items-center mt-4">
                        <a class="btn btn-secondary px-4" href="/teach_pic">取消</a>
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

@section('js')
    <script>
        teach_pic_img.onchange = evt => {
            const [file] = teach_pic_img.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
