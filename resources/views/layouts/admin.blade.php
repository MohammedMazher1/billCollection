<!DOCTYPE html>
<html lang="IR-fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Lukasz Holeczek">
    <link rel="shortcut icon" href="{{asset('/assets/img/logo.png')}}">
    <title>إدارة النظام</title>
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('/assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/all.min.css')}}">
    <link href="{{asset('/assets/css/dashbord.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/dashbord.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body class="navbar-fixed sidebar-nav fixed-nav">

    <header class="navbar">
        <div class="container-flHuid d-flex justify-center">
            <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
            <a class="navbar-brand" href="{{Route('admin')}}" style="background-color:#fff">
                <img  src="{{asset('assets/img/logo2.png')}}" alt="logo">
            </a>
            {{-- <ul class="nav navbar-nav hidden-md-down">
                <li class="nav-item p-x-1">
                    <a class="nav-link" href="{{Route('admin')}}">
                        <i class="fa-solid fa-arrow-right margin-0 backToDashbord">
                        </i>
                    </a>
                </li>
                <li class="nav-item p-x-1">
                    <a class="nav-link" href="{{Route('index')}}">الرئيسية</a>
                </li>
            </ul> --}}
        </div>
    </header>
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
    <script src="{{asset('/assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script>
        $('#refresh').on('click', function() {
            setTimeout(function() {
                window.location.reload();
            },800)
        });
    </script>
</body>

</html>
</body>

</html>
