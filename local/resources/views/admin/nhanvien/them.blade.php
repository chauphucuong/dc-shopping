@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Nhân Viên
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(count($errors)>0)
                <div class="alert alert-danger">
                  @foreach($errors->all() as $err)
                      {{$err}}<br>
                  @endforeach
                  </div>
            @endif
            @if(session('thongbao'))
            <div class="alert alert-success">{{session('thongbao')}}</div>
            @endif
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/nhanvien/them" method="POST">
                  <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                  <div class="form-group">
                      <label>Mã loại nhân viên  :</label>
                      <select class="form-control" name="nv_lnv_id">
                        @foreach($loainhanvien as $lnv)
                          <option value="{{$lnv->lnv_id}}">{{$lnv->lnv_ten}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Họ tên nhân viên  :</label>
                      <input class="form-control" name="nv_ten"  placeholder="Nhập họ tên nhân viên" />
                  </div>
                  <div class="form-group">
                      <label>Số điện thoại :</label>
                      <input class="form-control" type="text" name="nv_sdt"  placeholder="Nhập số điện thoại" />
                  </div>
                  <div class="form-group">
                      <label>Địa chỉ :</label>
                      <input class="form-control" type="text" name="nv_dia_chi" placeholder="Nhập địa chỉ nhân viên" />
                  </div>
                  <div class="form-group">
                      <label>Email :</label>
                      <input class="form-control" type="email" name="nv_email" placeholder="Nhập email nhân viên" />
                  </div>
                    <button type="submit" class="btn btn-default">Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
