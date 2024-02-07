@extends('layouts.main')
@section('content')
<main>
<div class="col-sm-10 mb-5">
    <form method="POST"  action="{{Route('files.store')}}" enctype="multipart/form-data">
        @csrf
    <div class="card" style="margin-right: 25%;margin-top: 10%; padding:10px ; text-align:start">
        @if (Session::get('error'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('error')}}
                </div>
         @endif
         <div class="row">
            <div class="form-group col-md-7">
                <label for="name">اسم الفرع</label>
                <input type="text" readonly value="{{$user->name}}" class="form-control" name="name" id="name">
            </div>
            <div class="form-group col-md-5">
                <label for="cycle">رقم الدورة</label>
                <input type="text" required class="form-control" name="cycle" id="cycle">
            </div>
         </div>

         <div class="row">
           <div class="form-group col-md-12">
            <label for="file">ملف الدورة</label>
            <input type="file" required class="form-control" name="file" id="file">
            </div>
         </div>


        <button type="submit" class="btn btn-sm btn-primary" style="margin: 0"><i class="fa fa-dot-circle-o"></i>ارسال</button>

    </div>
    </form>
</div>
</main>

@endsection
