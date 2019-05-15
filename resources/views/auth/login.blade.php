<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login</title>

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
               <img alt="image" class="img-circle" src="{{asset('source/ajinomoto/logo/logo-ajinomoto.png')}}" />

            </div>
            <h3>Ajinomoto cooking studio CMS</h3>
           
            <p>Đăng nhập để sử dụng hệ thống</p>
            <form method="POST" class="m-t" action="{{ route('login') }}">
               @csrf

               <div class="form-group row">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group row">
             <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Mật khẩu">

             @error('password')
             <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary block full-width m-b">Đăng nhập</button>
        @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Quên mật khẩu?') }}
        </a>
        @endif


        <p class="text-muted text-center"><small>Chưa có tài khoản?</small></p>
        <a class="btn btn-sm btn-white btn-block" href="register.html">Tạo tài khoản mới</a>
    </form>
</div>
</div>

<!-- Mainly scripts -->
<script src="{{asset('assets/js/jquery-2.1.1.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

</body>

</html>
