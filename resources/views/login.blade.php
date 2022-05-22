<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">

    <style>
        .login {
            height: 100vh;
            background-color: rgb(229, 231, 235);
        }

        .loginform {
            width: 500px;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 2px 2px 20px 3px rgba(0, 0, 0, 0.2);
            ;
        }

        .loginform button {
            width: 50%;
        }

        @media (max-width: 540px) {
            .loginform {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <div class="login d-flex justify-content-center align-items-center flex-column">
        <div class="mb-3 h3">暮沐美學 後台登入</div>
        <form class="loginform d-flex flex-column" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-5">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary rounded-pill mx-auto py-2 fw-bold">登入</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
