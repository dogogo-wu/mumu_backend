@extends('layouts.app')

@section('pageTittle')
    Photo-Edit
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
                <p class="h2 fw-bold mb-0">作品集錦-編輯</p>
            </div>

            <form class="d-flex flex-column" action="/photo/update/{{ $myedit->id }}" method="post"
                enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <p class="fw-bold">種類</p>

                    <input type="radio" name="photo_category" id="microblade" class="" value=1 required
                        @if ($myedit->category == 1) checked @endif>
                    <label for="microblade" class="form-label me-3">紋繡</label>

                    <input type="radio" name="photo_category" id="skin" class="" value=2
                        @if ($myedit->category == 2) checked @endif>
                    <label for="skin" class="form-label me-3">皮膚管理</label>

                    <input type="radio" name="photo_category" id="eyelash" class="" value=3
                        @if ($myedit->category == 3) checked @endif>
                    <label for="eyelash" class="form-label me-3">美睫</label>
                </div>
                <div class="mb-3">
                    <label for="photo_subtitle" class="form-label fw-bold">副標題</label>
                    <input type="text" name="photo_subtitle" id="photo_subtitle" class="form-control"
                        value="{{ $myedit->subtitle }}">
                </div>
                <p class="mb-0 fw-bold">現在圖片</p>
                <div class="d-flex flex-wrap">
                    @foreach ($myedit->imgAry as $item)
                        <div class="d-flex flex-column align-items-center" id="sec_img_div{{ $item->id }}">
                            <img src="{{ $item->img }}" alt="" class="me-3 mb-2 sec_img">
                            <button onclick="del_sec_prod({{ $item->id }})"
                                class="btn btn-outline-danger btn-sm me-2 mb-2 w-50" type="button">刪除</button>
                        </div>
                    @endforeach
                </div>
                <div class="mb-3">
                    <label for="second_img" class="form-label">圖片上傳</label>
                    <input type="file" class="form-control" id="second_img" name="second_img[]" accept="image/*" multiple>
                </div>

                <div class="d-flex justify-content-center align-items-center mt-4">
                    <div class="d-flex justify-content-center align-items-center mt-4">
                        <a class="btn btn-secondary px-4" href="/photo">取消</a>
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
        photo_img.onchange = evt => {
            const [file] = photo_img.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }

        function del_sec_prod(myid) {

            //---------- 使用Fetch時，刪除的方法 ----------//
            let formData = new FormData();
            formData.append('_method', 'DELETE');
            formData.append('_token', '{{ csrf_token() }}');

            fetch("/photo/del_sec_img/" + myid, {
                method: "POST",
                body: formData
            }).then(function(response) {

                //------ 子方法2，使用javescript刪除元件 ------//
                let ele = document.querySelector('#sec_img_div' + myid);
                ele.remove();
            })

        }
    </script>
@endsection
