@extends('layouts.admin')
@section('content')
<div>
    <div class="row">

        <div class="col-lg-12">
            <div class="card" style="margin-top: 10%">
                <a href="{{Route('users.create')}}" class="createUser btn btn-primary" ><i class="fa fa-user-plus"></i> اضافه</a>
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> قائمة المستخدمين
                </div>
                <div class="card-block">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>اسم الفرع</th>
                                <th>اسم المستخدم</th>
                                <th>نوع المستخدم</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user['name']}}</td>
                                <td>{{$user['user_name']}}</td>
                                <td>{{$user['type']}}</td>
                                <td>
                                    <form style="display: inline" style="padding-right: 10px;color: red;" action="{{Route('users.edit',$user['id'])}}" method="GET"><button class="dashbordButton"><i class="fa-regular fa-pen-to-square"></i></button></form>
                                    <span> | </span>
                                    <form style="display: inline" style="padding-left: 10px; color: rgb(23, 159, 238);" action="{{Route('users.destroy',$user['id'])}}" method="POST">@method('DELETE')@csrf<button class="dashbordButton" style="color: red"><i class="fa-solid fa-trash-can"></i></button></form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div class="userPagination">
                        {{ $users->links() }}
                    </div> --}}

                    <div class="pagination" style="display: flex; justify-content:space-between;align-items:center">
                        <ul class="pagination justify-content-center">
                            @if ($users->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">&laquo;</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $users->previousPageUrl() }}" rel="prev"><i class="fa-solid fa-chevron-right"></i></a>
                                </li>
                            @endif
                            @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $users->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach
                            @if ($users->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $users->nextPageUrl() }}" rel="next">&raquo;</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link"><i class="fa-solid fa-chevron-left"></i></span>
                                </li>
                            @endif
                        </ul>
                        <div class="pagination-label">
                            الصفحة {{ $users->currentPage() }} من {{ $users->lastPage() }}
                        </div>
                    </div>

                    <!-- Pagination label -->

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
