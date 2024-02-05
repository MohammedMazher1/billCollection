@extends('layouts.dashbord')
@section('content')
<!-- Main content -->
<main class="main">

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a>الصفحة الرئيسية</a>
        </li>
    </ol>
    <div class="container-fluid main-dashbord" >

        <div class="bankText">
            <p>
                بنك بن دول للتمويل الأصغر الأسلامي
            </p>
            <p>
                Bin Dowal Islamic Microfinance Bank
            </p>
        </div>
        <div>
            <img src="{{asset('assets/img/logo.png')}}" alt="">
        </div>
    </div>
    {{-- </div> --}}

</main>
@endsection
