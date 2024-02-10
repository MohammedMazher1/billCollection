@extends('layouts/main')
@section('content')
<main class="mainContent">
    <div class="bankText">
        <p>
            شركة بن دول للصرافة
        </p>
        <p>
            Bin Dowal Exchange Co.
        </p>
    </div>
    <a href="{{ Route('login') }}">
        <div class="start">
            إبداء
        </div>
    </a>
</main>
@endsection
