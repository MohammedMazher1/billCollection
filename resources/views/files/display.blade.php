@extends('layouts.main')
@section('content')
<div>
    <div class="row">

        <div class="col-lg-12">
            <div class="card" style="margin-top: 5%">
                {{-- <a href="{{Route('files.create')}}" class="createUser btn btn-primary" ><i class="fa fa-user-plus"></i> اضافه</a> --}}
                <div class="card-header" style="text-align: right">
                    <i class="fa fa-align-justify"></i> قائمة التحصيلات
                </div>
                <div class="card-block">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>رقم الفرع</th>
                                <th>رقم العقد</th>
                                <th>رقم الدورة</th>
                                <th>المبلغ</th>
                                <th>تاريخ الدفع</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_array as $array)
                            <tr>
                                <td>{{$array[0]}}</td>
                                <td>{{$array[1]}}</td>
                                <td>{{$array[2]}}</td>
                                <td>{{$array[3]}}</td>
                                <td>{{$array[4]}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
