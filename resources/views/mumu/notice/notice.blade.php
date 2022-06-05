@extends('layouts.app')

@section('pageTittle')
    Notice
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
@endsection

@section('mainSec')
    <section id="back_area">
        <div class="container my_con">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <p class="h3 fw-bold mb-0">預約注意事項-管理 <small>(最多2筆資料)</small></p>
                <a href="/notice/create" class="btn btn-success">新增-預約注意事項</a>
            </div>
            <table id="myDataTable" class="display">
                <thead>
                    <tr>
                        <th>小標題</th>
                        <th>內文</th>
                        <th>功能</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataAry as $mydata)
                        <tr>
                            <td>
                                {{ $mydata->subtitle}}
                            </td>
                            <td>
                                {!! $mydata->content !!}
                            </td>
                            <td>
                                <a href="/notice/edit/{{ $mydata->id }}" class="btn btn-outline-success btn-sm me-3 mb-2">編輯</a>

                                {{-- 未加Modal --}}
                                <button class="btn btn-outline-danger btn-sm mb-1"
                                    onclick="del_obj({{ $mydata->id }})">刪除</button>
                                <form id="delForm{{ $mydata->id }}" action="/notice/delete/{{ $mydata->id }}"
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
        function del_obj($id) {
            document.querySelector('#delForm' + $id).submit();
        }
    </script>
@endsection
