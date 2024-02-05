<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8" />
    <title>billCollection</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

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
                    <a href="#about-us" class="nav-item nav-link">
                        <i class="fa-regular fa-address-card"></i>
                          تنزيل المحصلة
                    </a>
                    <a href="#services" class="nav-item nav-link">
                        <i class="fa-solid fa-gears"></i>
                        رفع ملف الدورة
                    </a>
                    <a href="#footer" class="nav-item nav-link">
                        <i class="fa fa-phone"></i>
                        تواصل معنا
                    </a>
                </div>
                {{-- @guest
                    <a href="{{ Route('login') }}" class="btn btn-primary px-4 ">تسجيل الدخول</a>
                @else
                    @if (Auth::user()->type == 'admin')
                        <a href="{{ Route('admin') }}" class="btn btn-primary px-5 ml-2 ">الإدارة</a>
                    @endif --}}
                    <div class="mx-3 text-primary">
                        {{-- @isset($user)

            @endisset --}}
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
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5 d-flex justify-content-center align-item-start flex-column">
                <a href="" class="text-right">
                    <img src="{{ asset('/assets/img/whitelogo.png') }}" class="w-75" alt="logo">
                </a>
                <p class="text-right">
                    عناويننا على مواقع التواصل لا تتردد في التواصل معنا والاستفسار سيتم الرد على استفساراتكم خلال 24
                    ساعة
                </p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-primary border rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary border rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary border rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-primary border rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5 text-center">
                <h3 class=" btn-outline-primary mb-4">نتواجد</h3>
                <div class="d-flex justify-content-center">
                    <h4 class="fa fa-map-marker-alt btn-outline-primary"></h4>
                    <div class="pl-3">
                        <h5 class="btn-outline-primary text-white">العنوان</h5>
                        <p>المكلا - الشرج</p>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <h4 class="fa fa-envelope btn-outline-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white d-inline-block">الأيميل</h5>
                        <p>mo@gmail.com</p>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <h4 class="fa fa-phone-alt btn-outline-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">الهاتف</h5>
                        <p>+97 776533887</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5 d-flex flex-column justify-content-center">
                <h3 class="btn-outline-primary mb-4 text-center">روابط سريعة</h3>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <a class="d-flex text-whit justify-content-between pb-2 w-75" href="#">
                        الرئسية
                        <i class="fa fa-angle-right mr-2"></i>
                    </a>
                    <a class="d-flex text-white justify-content-between pb-2 w-75" href="#">
                        من نحن ؟
                        <i class="fa fa-angle-right mr-2"></i>
                    </a>
                    <a class="d-flex text-white justify-content-between pb-2 w-75" href="#">البرامج
                        <i class="fa fa-angle-right mr-2"></i>
                    </a>
                    <a class="d-flex text-white justify-content-between pb-2 w-75" href="#">الخدمات
                        <i class="fa fa-angle-right mr-2"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h3 class="btn-outline-primary mb-4 text-center">ارسل لنا</h3>
                <form action="">
                    <div class="form-group">
                        <input type="text" class="form-control border-0 py-4" placeholder="اسمك "
                            required="required" />
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control border-0 py-4" placeholder="الايميل "
                            required="required" />
                    </div>
                    <div>
                        <button class="btn btn-primary border btn-block py-3" type="submit">
                            ارسال
                        </button>
                    </div>
                </form>
            </div>
        </div>
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
    <script src="{{ asset('assets/js/tester.js') }}"></script>
    <script src="{{ asset('/assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('/assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/assets/lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('/assets/lib/lightbox/js/lightbox.min.js') }}"></script>


    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
