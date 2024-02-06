@extends('layouts.main')

@section('content')

<section class="login">
    <form method="POST" action="{{ route('login') }}">
        @csrf
    <div class="LoginCard shadow borderd p-5 mx-auto my-5 text-right text-primary" style="width: 350px">
            <p>اسم المستخدم</p>
            <div class="input-group ">
                <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <i class="fa fa-user" style="position: absolute;left: 10px;top: 50%;transform: translateY(-50%)"></i>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <p class="text-primary mt-3">كلمة المرور</p>
            <div class="input-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <i class="fa fa-lock" style="position: absolute;left: 10px;top: 50%;transform: translateY(-50%)"></i>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary d-flex mx-auto mt-3">
                {{ __('تسجيل الدخول') }}
            </button>
        </div>
    </form>
</section>
@endsection
