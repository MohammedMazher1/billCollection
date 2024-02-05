@php
    $user = Session()->get('user');
@endphp
<!DOCTYPE html>
<html lang="IR-fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
    <meta name="author" content="Lukasz Holeczek">
    <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
    <link rel="shortcut icon" href="{{asset('/assets/img/logo.png')}}">
    <title>إدارة النظام</title>
    <!-- Icons -->

    <link rel="stylesheet" href="{{asset('/assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/main.css')}}">
    <link href="./output.css" rel="stylesheet">
     <link href="{{asset('/assets/css/dashbord.css')}}" rel="stylesheet">
    <!-- Main styles for this application -->
</head>

<body class="navbar-fixed sidebar-nav fixed-nav">

    <header class="navbar">
        <div class="container-flHuid">
            <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
            <a class="navbar-brand" href="#">
                <img  src="{{asset('assets/img/whitelogo.png')}}" alt="logo">
            </a>
            <ul class="nav navbar-nav hidden-md-down">
                <li class="nav-item">
                    <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
                </li>
                <li class="nav-item p-x-1">
                    <a class="nav-link">الرئيسية</a>
                </li>
            </ul>

        </div>
    </header>
    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="icon-user"></i>إدارة النظام</a>
                </li>

                <li class="nav-title">إدارة النظام</li>
                    <li class="nav-item">
                    <a class="nav-link" href=""><i class="fa fa-group"></i>  ادارة المستخدمين </a>
                    <a class="nav-link" href=""><i class="fa fa-newspaper-o"></i> ادارة البرامج</a>
                    <a class="nav-link" href="#"><i class="fa fa-comments"></i>ادارة المتدربين</a>
                    <a class="nav-link" href=""><i class="fa fa-calendar"></i> إدارة الاختبارات </a>
                </li>

                <li class="nav-title">
                    الخصوصية الأمان
                </li>
                {{-- <li class="nav-item">
                    <form id="logout" action="{{route('logout') }}" method="POST">
                        @csrf
                    <a class="nav-link" onclick="document.getElementById('logout').submit();"><i class="fa-solid fa-right-from-bracket"></i> تسجيل الخروج </a>
                    </form>
                </li> --}}

            </ul>
        </nav>
    </div>
    @yield('content')
    <footer class="footer">
        <span class="text-left">
            <a href="https://mohammedmazher1.github.io/aboutMe/">Mohammed</a> &copy; 2023.
        </span>

    </footer>
    <!-- Bootstrap and necessary plugins -->
    <script src="{{asset('/assets/lib/jquery-3.7.1.js')}}"></script>
    <script src="{{asset('/assets/js/tether.min.js')}}"></script>
    <script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/assets/js/pace.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>


</body>

</html>
</body>

</html>
