@extends('layouts.main')
@section('content')
<div>
    <div class="row">

        <div class="col-lg-12">
            <div class="card" style="margin-top: 5%">
                {{-- <a href="{{Route('files.create')}}" class="createUser btn btn-primary" ><i class="fa fa-user-plus"></i> اضافه</a> --}}
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> قائمة التحصيلات
                </div>
                <div class="card-block">
                    <table class="table">
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
                                    <form style="display: inline" style="padding-right: 10px;color: red;" action="{{Route('files.edit',$file['id'])}}" method="GET"><button class="dashbordButton"><i class="fa-regular fa-pen-to-square"></i></button></form>
                                    <span> | </span>
                                    <form style="display: inline" style="padding-left: 10px; color: rgb(23, 159, 238);" action="{{Route('files.destroy',$file['id'])}}" method="POST">@method('DELETE')@csrf<button class="dashbordButton" style="color: red"><i class="fa-solid fa-trash-can"></i></button></form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div class="userPagination">
                        {{ $files->links() }}
                    </div> --}}

                    {{-- <div class="pagination" style="display: flex; justify-content:space-between;align-items:center">
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
                    </div> --}}

                    <!-- Pagination label -->

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
