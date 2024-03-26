@extends('layouts.main')
@section('content')
<div style="height: calc(100vh - 365px)">

    <div class="col-lg-12">
        <div class="card" style="margin-top: 5%;width:90% ; margin-left: auto;margin-right: auto;text-align: center">
            {{-- <a href="{{Route('files.create')}}" class="createUser btn btn-primary" ><i class="fa fa-user-plus"></i> اضافه</a> --}}
            <div class="card-header" style="text-align: right; background-color:#13168F ; color:white; display:flex;justify-content:space-between">
                <div><i class="fa fa-align-justify"></i> قائمة التحصيلات</div>
                <div><a class="allFiles" href="{{ Route("allFiles") }}"><i class="fa-regular fa-eye"></i></a></div>
            </div>
            <div class="card-block">
                <table class="table" width='50%'>
                    @if (Session::get('error'))
                    <div class="alert alert-danger" role="alert">
                        {{Session::get('error')}}
                    </div>
                    @endif
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
                                <a href="{{route('files.edit',$file->id)}}"><i class="fa-solid fa-download"></i></a>
                                <span> | </span>
                                <a href="{{route('files.show',$file->id)}}"><i class="fa-solid fa-eye"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination" style="display: flex; justify-content:space-between;align-items:center">
                    <ul class="pagination justify-content-center">
                        @if ($files->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">&laquo;</span>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $files->previousPageUrl() }}" rel="prev"><i class="fa-solid fa-chevron-right"></i></a>
                        </li>
                        @endif
                        @foreach ($files->getUrlRange(1, $files->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $files->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                        @endforeach
                        @if ($files->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $files->nextPageUrl() }}" rel="next">&raquo;</a>
                        </li>
                        @else
                        <li class="page-item disabled">
                            <span class="page-link"><i class="fa-solid fa-chevron-left"></i></span>
                        </li>
                        @endif
                    </ul>
                    <div class="pagination-label">
                        الصفحة {{ $files->currentPage() }} من {{ $files->lastPage() }}
                    </div>
                </div>

                <!-- Pagination label -->
            </div>
        </div>
    </div>

</div>
@endsection
