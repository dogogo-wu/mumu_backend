@extends('mumu.template')


@section('pageTittle')
    暮沐美學-登入
@endsection

@section('cssLink')
    <link rel="stylesheet" href="{{ asset('./css/login.css')}}">
@endsection

@section('mainSec')
    <main>
        <section id="login_sec2">
            <div class="login d-flex justify-content-center align-items-center flex-column">
                <form class="loginform d-flex flex-column" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="img_div mb-3">
                        <img src="./img/logo.png" alt="">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">帳號</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-5">
                        <label for="password" class="form-label">密碼</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary rounded-pill mx-auto py-2">登入</button>
                </form>
            </div>
        </section>
    </main>
@endsection
