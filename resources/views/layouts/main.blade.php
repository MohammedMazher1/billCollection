<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8" />
    <title>billCollection</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link rel="shortcut icon" href="{{asset('/assets/img/logo2.png')}}">

    <!-- Flaticon Font -->
    <link href="{{ asset('/assets/lib/flaticon/font/flaticon.css') }}" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('/assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/all.min.css') }}" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
            <a href="/"
                class="navbar-brand font-weight-bold text-secondary d-flex justify-content-center align-item-center"
                style="font-size: 50px">
                <img class="logo" src="{{ asset('/assets/img/logo.png') }}" alt="">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between small" id="navbarCollapse">
                <div class="navbar-nav font-weight-bold mx-auto py-0">

                    <a href="/" class="nav-item nav-link active">
                        <i class="fa fa-home"></i>
                        الرئسية
                    </a>
                    <a href="{{route('files.index')}}" class="nav-item nav-link">
                        <i class="fa-solid fa-download"></i>
                          تنزيل المحصلة
                    </a>
                    <a href="{{route('files.create')}}" class="nav-item nav-link">
                        <i class="fa-solid fa-upload"></i>
                        رفع ملف الدورة
                    </a>
                    <a href="{{route('accountFiles')}}" class="nav-item nav-link">
                        <i class="fa-solid fa-upload"></i>
                          تنزيل كشف الحساب
                    </a>
                    <a href="#footer" class="nav-item nav-link">
                        <i class="fa fa-phone"></i>
                        تواصل معنا
                    </a>
                </div>
                @guest
                    <a href="{{ Route('login') }}" class="btn btn-primary px-4 ">تسجيل الدخول</a>
                @else
                    @if (Auth::user()->type == 'admin')
                        <a href="{{ Route('admin') }}" class="btn btn-primary px-5 ml-2 ">الإدارة</a>
                    @endif
                    <div class="mx-3 text-primary">
                        @isset($user)

                 @endisset
                        <i class="fa fa-user"></i>
                        <span>{{ Auth::user()->name }}</span>
                    </div>
                    <form id="logout" action="{{ route('logout') }}" method="POST">
                        <a role="button" class="btn btn-primary px-4"
                            onclick="document.getElementById('logout').submit();">تسجيل الخروج</a>
                        @csrf
                    </form>
                @endguest
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
    <!-- start main -->
    <main>
        @yield('content')
    </main>
    <!-- end main -->
    <!-- Footer Start -->
    <div class="container-fluid bg-primary text-white mt-5 py-5 px-sm-3 px-md-5" id="footer">
        <div class="container-fluid pt-5" style="border-top: 1px solid rgba(23, 162, 184, 0.2) ;">
            <p class="m-0 text-center text-white">
                &copy;
                <a class="btn-outline-primary font-weight-bold" href="https:\\mohammedmazher1.github.io\aboutme">About
                    me</a>.
                Designed by
                <a class="btn-outline-primary font-weight-bold" href="https:\\mohammedmazher1.github.io\aboutme">Mohammed
                    Mazher</a>
            </p>
        </div>
    </div>
    <!-- Footer End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top border"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('/assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('/assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/assets/lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('/assets/lib/lightbox/js/lightbox.min.js') }}"></script>


    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        $('#refresh').on('click', function() {
            setTimeout(function() {
                window.location.reload();
            },200)
        });
    </script>
</body>

</html>
