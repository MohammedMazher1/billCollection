@extends('layouts.admin')
@section('content')

<div class="col-sm-10">
    <form method="POST"  action="{{ route('users.update', $user['id']) }}">
        @method('PUT')
        @csrf
    <div class="card" style="margin-right: 25%;margin-top: 10%;">
        <div class="card-header">
            <strong>تعديل بيانات المستخدم </strong>
        </div>
        <div class="card-block">
            @if (Session::get('error'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('error')}}
            </div>
            @endif
            <div class="form-group">
                <label for="company">اسم  الفرع</label>
                <input type="text" required class="form-control" value="{{$user['name']}}" name="name" id="name" placeholder="اسم المستخدم">
            </div>

            <div class="form-group">
                <label for="vat">الرقم التعريفي</label>
                <input type="tel" required class="form-control" name="id" value="{{$user['id']}}" id="vat" placeholder="35">
            </div>

            <div class="row" style="margin: 0; display:flex ; justify-content:space-between">

                <div class="form-group col-sm-6" style="padding: 0">
                    <label for="city">اسم المستخدم</label>
                    <input type="text" class="form-control" value="{{$user['user_name']}}" required name="user_name" id="city" placeholder="Mo123">
                </div>

                <div class="form-group col-sm-5" style="padding: 0 ;">
                    <label for="city">كلمة المرور</label>
                    <input type="password" class="form-control" value="*****" required name="password" id="city" placeholder="******">

                </div>
            <!--/row-->

            </div>
            <div class="row" style="margin: 0">
               <div class="card-footer" style="text-align: left; padding-left:0">
                <button type="submit" class="btn btn-sm btn-primary" style="margin: 0"><i class="fa fa-dot-circle-o"></i> حفظ</button>
                <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> الغاء</button>
                </div>
            </div>


        </div>
    </div>
    </form>
</div>
@endsection




{{-- <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
    <div class="wrapper wrapper--w960">
        <div class="card card-2">
            <div class="card-heading"></div>
            <div class="card-body">
                <h2 class="title">تعديل البينات</h2>
                <form method="POST"  action="{{ route('users.update', $user['id']) }}">
                    @method('PUT')
                    @csrf
                    <div class="input-group">
                        <input class="input--style-2" type="text" required placeholder="الاسم" value="{{$user['name']}}" name="name">
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <input class="input--style-2" type="tel" value="{{$user['phone']}}" required placeholder="رقم الجوال" name="phone">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <input class="input--style-2" type="email" value="{{$user['email']}}" required placeholder="الايميل" name="email">
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="gender">
                                        <option disabled="disabled" value="{{$user['gender']}}" selected="selected">الجنس</option>
                                        @if ($user['gender'] == 'Male')
                                        <option selected>Male</option>
                                        <option>Female</option>
                                        @else
                                        <option>Male</option>
                                        <option selected>Female</option>
                                        @endif

                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="type">
                                    <option disabled="disabled" selected="selected">نوع المستخدم</option>
                                    @if ($user['type'] == 'trainer')
                                    <option selected>trainer</option>
                                    <option>trainee</option>
                                    @else
                                    <option>trainer</option>
                                    <option selected>trainee</option>
                                    @endif
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                    </div>
                    <div class="p-t-30">
                        <button class="btn btn--radius btn--green" type="submit">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
