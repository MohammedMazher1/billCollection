@extends('layouts.main')
@section('content')
<div>
    <div class="row">

        <div class="col-lg-12">
            <div class="card" style="margin-top: 5% ;width: 90%; margin-left: auto;margin-right: auto;text-align: center">
                <a href="{{Route('files.index')}}" class ><i class="fa-solid fa-arrow-right"></i></a>
                <div class="card-header" style="text-align: right; background-color:#13168F ; color:white">
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
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="font-weight:bold;">
                                    المبلغ الكلي : {{$amount}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
