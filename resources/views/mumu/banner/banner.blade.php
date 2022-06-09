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
                <p class="h3 fw-bold mb-0">Banner-管理</p>
                <a href="/banner/create" class="btn btn-success">新增-Banner</a>
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
                    @foreach ($dataAry as $mydata)
                        <tr>

                            <td>
                                <button onclick="upmove({{ $mydata->id }})"
                                    class="btn btn-outline-primary btn-sm me-2 mb-2 px-4" type="button">上移</button>
                                <br>
                                <button onclick="downmove({{ $mydata->id }})"
                                    class="btn btn-outline-primary btn-sm me-2 mb-2 px-4" type="button">下移</button>
                            </td>
                            <td>{{ $mydata->order + 1 }}</td>
                            <td>
                                <img src="{{ asset($mydata->img) }}" alt="">
                            </td>
                            <td>{{ $mydata->remark }}</td>
                            <td>
                                <a href="/banner/edit/{{ $mydata->id }}"
                                    class="btn btn-outline-success btn-sm me-3 mb-2">編輯</a>
                                {{-- 有加Modal --}}
                                <button class="btn btn-outline-danger btn-sm mb-1" data-bs-toggle="modal"
                                    data-bs-target="#myModal" data-bs-tarid="{{ $mydata->id }}">刪除</button>

                                {{-- 未加Modal --}}
                                {{-- <button class="btn btn-outline-danger btn-sm mb-2"
                                    onclick="del_obj({{ $mydata->id }})">刪除</button> --}}
                                <form id="delForm{{ $mydata->id }}" action="/banner/delete/{{ $mydata->id }}"
                                    method="POST">
                                    @csrf
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">訊息</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        是否要刪除資料？
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                        <button type="button" id="modal_del" class="btn btn-danger">刪除</button>
                    </div>
                </div>
            </div>
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

        // 未加modal時
        // function del_obj($id) {
        //     document.querySelector('#delForm' + $id).submit();
        // }

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
        const myModal = document.getElementById('myModal');
        myModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget;

            const mytar = button.getAttribute('data-bs-tarid');
            const mydel_btn = document.getElementById('modal_del');
            mydel_btn.onclick = function(){
                document.querySelector('#delForm' + mytar).submit();
            }
        })
    </script>
@endsection
