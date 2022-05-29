@extends('layouts.app')

@section('pageTittle')
    Banner
@endsection

@section('cssLink')
    <!-- ------------------- CDN CSS Section ------------------- -->
    <!-- Bootstrap 5.1.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <!-- ------------------- My CSS Section ------------------- -->
    <link rel="stylesheet" href="{{ asset('css/back.css') }}">

    <style>
        table img {
            max-height: 200px;
            max-width: 400px;
        }

    </style>
@endsection

@section('mainSec')
    <section id="back_area">
        <div class="container my_con">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <p class="h3 fw-bold mb-0">Banner 管理</p>
                <a href="/banner/create" class="btn btn-success">新增Banner</a>
            </div>
            <table id="myDataTable" class="display">
                <thead>
                    <tr>
                        <th>順序調整</th>
                        <th>順序</th>
                        <th>圖片預覽</th>
                        <th>備註</th>
                        <th>功能</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bannerAry as $banner)
                        <tr>

                            <td>
                                <button onclick="upmove({{ $banner->id }})"
                                    class="btn btn-outline-primary btn-sm me-2 mb-2 w-50" type="button">上移</button>
                                <button onclick="downmove({{ $banner->id }})"
                                    class="btn btn-outline-primary btn-sm me-2 mb-2 w-50" type="button">下移</button>
                            </td>
                            <td>{{ $banner->order + 1}}</td>
                            <td>
                                <img src="{{ asset($banner->img) }}" alt="">
                            </td>
                            <td>{{ $banner->remark }}</td>
                            <td>
                                <a href="/banner/edit/{{ $banner->id }}" class="btn btn-outline-success btn-sm me-3">編輯</a>
                                <button class="btn btn-outline-danger btn-sm"
                                    onclick="del_banner({{ $banner->id }})">刪除</button>
                                <form id="delForm{{ $banner->id }}" action="/banner/delete/{{ $banner->id }}"
                                    method="POST">
                                    @csrf
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection

@section('jsCdn')
    <!-- Bootstrap 5.1.3 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- DataTable -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
@endsection

@section('js')
    <script>
        // ------ init DataTable ------
        $(document).ready(function() {
            $('#myDataTable').DataTable();
        });
        $('#myDataTable').dataTable({
            "ordering": false,
            "searching": false,
            "lengthChange": false,
        });

        // ------------ my Func ------------
        function del_banner($id) {
            document.querySelector('#delForm' + $id).submit();
        }

        function upmove(myid) {

            let formData = new FormData();
            formData.append('_method', 'POST');
            formData.append('_token', '{{ csrf_token() }}');

            fetch("/banner/upmove/" + myid, {
                method: "POST",
                body: formData
            }).then(function(response) {
                location.reload();
            })

        }

        function downmove(myid) {

            let formData = new FormData();
            formData.append('_method', 'POST');
            formData.append('_token', '{{ csrf_token() }}');

            fetch("/banner/downmove/" + myid, {
                method: "POST",
                body: formData
            }).then(function(response) {
                location.reload();
            })

        }
    </script>
@endsection
