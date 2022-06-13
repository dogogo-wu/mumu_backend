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
            height: 240px;
            object-fit: contain;
            margin-right: auto
        }
    </style>
@endsection

@section('mainSec')
    <section id="back_area" class="py-5">
        <div class="container my_con">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <p class="h3 fw-bold mb-0">作品照片-編輯</p>
            </div>

            <form class="d-flex flex-column" action="/photo/update/{{ $myedit->id }}" method="post"
                enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <p class="fw-bold">類別</p>

                    <p>
                        <input type="radio" checked>
                        @if ($myedit->category == 1)
                            紋繡
                        @elseif ($myedit->category == 2)
                            美睫
                        @elseif ($myedit->category == 3)
                            皮膚管理
                        @endif
                    </p>
                </div>
                <div class="mb-3">
                    <label for="photo_subtitle" class="form-label fw-bold">次類別 <small>(非必填)</small></label>
                    <input type="text" name="photo_subtitle" id="photo_subtitle" class="form-control"
                        value="{{ $myedit->subtitle }}" disabled>
                </div>
                <p class="mb-0 fw-bold">現在圖片</p>
                <div class="d-flex flex-wrap">
                    @foreach ($myimg as $item)
                        <div class="d-flex flex-column align-items-center" id="sec_img_div{{ $item->id }}">
                            <img src="{{ $item->img }}" alt="" class="me-3 mb-2 sec_img mt-3">
                            <div class="btn_area d-flex mb-3">
                                <button onclick="frontmove({{ $item->id }})"
                                    class="btn btn-outline-primary btn-sm me-2 mb-2 px-3" type="button">前移</button>
                                <button onclick="del_sec_prod({{ $item->id }})"
                                    class="btn btn-outline-danger btn-sm me-2 mb-2 px-3 px-4" type="button">刪除</button>
                                <button onclick="backmove({{ $item->id }})"
                                    class="btn btn-outline-primary btn-sm me-2 mb-2 px-3" type="button">後移</button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mb-3">
                    <label for="second_img" class="form-label fw-bold">圖片上傳 <small>(可一次上傳多張圖)</small></label>
                    <input type="file" class="form-control" id="second_img" name="second_img[]" accept="image/*" multiple>
                </div>

                <div class="d-flex justify-content-center align-items-center mt-4">
                    <div class="d-flex justify-content-center align-items-center mt-4">
                        <a class="btn btn-secondary px-4" href="/photo">返回</a>
                        <input type="submit" value="送出上傳的圖片" class="btn btn-primary px-4 mx-2">
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
        // photo_img.onchange = evt => {
        //     const [file] = photo_img.files
        //     if (file) {
        //         blah.src = URL.createObjectURL(file)
        //     }
        // }

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

        //---------- 圖片順序移動 ----------//
        function frontmove(myid) {

            let formData = new FormData();
            formData.append('_method', 'POST');
            formData.append('_token', '{{ csrf_token() }}');

            fetch("/photo/frontmove/" + myid, {
                    method: "POST",
                    body: formData
                })
                .then(response => {
                    location.reload();
                    return response.json();
                })
                .then(data => {
                    if (data.pos == 'frontmax') {
                        alert('已經是最前面囉！')
                    }
                })

        }

        function backmove(myid) {

            let formData = new FormData();
            formData.append('_method', 'POST');
            formData.append('_token', '{{ csrf_token() }}');

            fetch("/photo/backmove/" + myid, {
                    method: "POST",
                    body: formData
                })
                .then(response => {
                    location.reload();
                    return response.json();
                })
                .then(data => {
                    if (data.pos == 'backmax') {
                        alert('已經是最後面囉！')
                    }
                })
        }
    </script>
@endsection
