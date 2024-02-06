@extends('layouts/main')
@section('content')
<main class="mainContent">
    <div class="bankText">
        <p>
            بنك بن دول للتمويل الأصغر الأسلامي
        </p>
        <p>
            Bin Dowal Islamic Microfinance Bank
        </p>
    </div>
    <a href="{{ Route('login') }}">
        <div class="start">
            إبداء
        </div>
    </a>
</main>
@endsection
