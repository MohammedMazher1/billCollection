    @extends('layouts.admin')
    @section('content')
    <div class="col-sm-10 mb-5">
        <form method="POST"  action="{{Route('users.store')}}">
            @csrf
        <div class="card" style="margin-right: 25%;margin-top: 10%;">
            <div class="card-header">
                <strong>إضافة مستخدم </strong>
            </div>
            <div class="card-block">
                @if (Session::get('error'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('error')}}
                </div>
                @endif
                <div class="form-group">
                    <label for="company">اسم  المستخدم</label>
                    <input type="text" required class="form-control" name="name" id="name" placeholder="اسم المستخدم">
                </div>

                <div class="form-group">
                    <label for="vat">الرقم التعريفي</label>
                    <input type="tel" required class="form-control" name="id" id="vat" placeholder="35">
                </div>

                <div class="row" style="margin: 0; display:flex ; justify-content:space-between">

                    <div class="form-group col-sm-6" style="padding: 0">
                        <label for="username">اسم المستخدم</label>
                        <input type="text" class="form-control"  name="username" id="username" placeholder="Mo123">
                    </div>

                    <div class="form-group col-sm-5" style="padding: 0 ;">
                        <label for="username">كلمة المرور</label>
                        <input type="password" class="form-control" required name="password" id="password" placeholder="******">

                    </div>
                <!--/row-->
                </div>
                <div class="row">
                    <div class="form-group col-md-5" style="margin: 0;">
                        <label for="postal-code">نوع المستخدم</label>
                        <select name="type" class="form-control">
                            <option value="customer">فرع</option>
                            <option value="admin">مدير نظام</option>
                        </select>
                        <div class="select-dropdown"></div>
                    </div>
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

