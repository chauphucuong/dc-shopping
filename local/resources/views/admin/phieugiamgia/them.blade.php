@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Phiếu Giảm Giá
                    <small>Add</small>
                </h1>
            </div>
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
                <form action="admin/phieugiamgia/them" method="POST">
                  <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                  <div class="form-group">
                      <label>Tên phiếu giảm giá  :</label>
                      <input class="form-control" name="pgg_ten" placeholder="Nhập tên phiếu giảm giá" />
                  </div>
                  <div class="form-group">
                      <label>Giá phiếu giảm :</label>
                      <input class="form-control" type="number" name="pgg_giam_gia" min="1000" placeholder="Nhập phần trăm phiếu giảm giá" />
                  </div>

                  <div class="form-group">
                      <label>Ngày bắt đầu :</label>
                      <input type="date" class="form-control" name="pgg_ngay_bat_dau" placeholder="Nhập ngày bắt đầu của voucher" />
                  </div>
                  <div class="form-group">
                      <label>Ngày kết thúc:</label>
                      <input type="date" class="form-control" name="pgg_ngay_ket_thuc" placeholder="Nhập ngày kết thúc của voucher" />
                  </div>
                    <div class="form-group">
                        <label>Trạng thái :</label>
                        <label class="radio-inline">
                            <input name="trang_thai" value="ON" checked="" type="radio">ON
                        </label>
                        <label class="radio-inline">
                            <input name="trang_thai" value="OFF" type="radio">OFF
                        </label>
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
