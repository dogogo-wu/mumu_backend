@extends('layouts.app')

@section('pageTittle')
    Password-Change
@endsection

@section('cssLink')
    <!-- ------------------- CDN CSS Section ------------------- -->
    <!-- Bootstrap 5.1.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- ------------------- My CSS Section ------------------- -->
    <link rel="stylesheet" href="{{ asset('css/back.css') }}">
    <style>
        .my_con {
            max-width: 500px;
        }
    </style>
@endsection

@section('mainSec')
    <section id="back_area" class="py-5">
        <div class="container my_con">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <p class="h4 fw-bold mb-0">變更密碼</p>
            </div>

            <form class="d-flex flex-column" action="{{ route('update_pwd') }}" method="post">
                @csrf
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="mb-3">
                    <label for="old_password" class="form-label">舊密碼</label>
                    <input type="password" class="form-control @error('old_password') is-invalid @enderror" id="old_password"
                        name="old_password" required>
                    @error('old_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="new_password" class="form-label">新密碼</label>
                    <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                        id="new_password" name="new_password" required>
                    @error('new_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="new_password_confirmation" class="form-label">確認新密碼</label>
                    <input type="password" class="form-control" id="new_password_confirmation"
                        name="new_password_confirmation" required>
                </div>

                <div class="d-flex justify-content-center align-items-center mt-2">
                    <div class="d-flex justify-content-center align-items-center mt-3">
                        <a class="btn btn-secondary px-4 mx-3" href="/admin">取消</a>
                        <input type="submit" value="送出" class="btn btn-primary px-4 mx-3">
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
