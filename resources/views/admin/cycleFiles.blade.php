@extends('layouts.admin')
@section('content')
<div>
    <div class="row">

        <div class="col-lg-12">
            <div class="card" style="margin-top: 10%">
                {{-- <a href="{{Route('files.create')}}" class="createUser btn btn-primary" ><i class="fa fa-user-plus"></i> اضافه</a> --}}
                <div class="card-header" style="text-align: right">
                    <i class="fa fa-align-justify"></i> قائمة ملفات الدورة
                </div>
                <div class="card-block">
                    @if (Session::get('error'))
                    <div class="alert alert-danger" role="alert">
                        {{Session::get('error')}}
                    </div>
                    @endif
                    <table class="table" width='50%'>
                        <thead>
                            <tr>
                                <th>اسم الملف</th>
                                <th>المؤسسة</th>
                                <th>تاريخ الرفع</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($files as $file)
                            <tr>
                                <td>{{$file->file_name}}</td>
                                <td>{{$file->user->name}}</td>
                                <td>{{$file->created_at->format('Y-m-d')}}</td>
                                <td>
                                    <a   href="{{route('cycleDownload',$file->id)}}"><i class="fa-solid fa-download"></i></a>
                                </td>
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
