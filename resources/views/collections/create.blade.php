@extends('layouts.admin')
@section('content')
<div class="col-sm-10 mb-5">
    <form method="POST"  action="{{Route('collection.store')}}" enctype="multipart/form-data">
        @csrf
    <div class="card" style="margin-right: 25%;margin-top: 10%;">
        <div class="form-group">
            <label for="file">ملف التحصيلات</label>
            <input type="file" required class="form-control" name="file" id="file">
        </div>
        <div class="form-group">
            <label for="postal-code">الجهه المعنية</label>
            <select name="user" class="form-control">
                @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <div class="select-dropdown"></div>
        </div>
        <button type="submit" class="btn btn-sm btn-primary" style="margin: 0"><i class="fa fa-dot-circle-o"></i>ارسال</button>

    </div>
    </form>
</div>
@endsection
