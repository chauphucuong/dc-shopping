@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại khuyến mãi
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
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/loaikhuyenmai/them" method="POST">
                      <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                  <div class="form-group">
                      <label>Tên khuyến mãi  :</label>
                      <input class="form-control" name="km_ten" placeholder="Nhập tên khuyến mãi" />
                  </div>
                  <div class="form-group">
                      <label>Giảm giá(%) :</label>
                      <input class="form-control" type="number" name="km_gia" placeholder="Nhập giá(%) khuyến mãi" min="0" max="100"/>
                  </div>
                  <div class="form-group">
                      <label>Ngày bắt đầu :</label>
                      <input type="date"class="form-control" name="km_ngay_bat_dau" placeholder="Nhập ngày khuyến mãi bắt đầu" />
                  </div>
                  <div class="form-group">
                      <label>Ngày kết thúc :</label>
                      <input type="date" class="form-control" name="km_ngay_ket_thuc" placeholder="Nhập ngày khuyến mãi kết thúc" />
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
