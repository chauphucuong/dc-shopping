@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại khuyến mãi
                    <small>{{$loaikhuyenmai->km_ten}}</small>
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
                <form action="admin/loaikhuyenmai/sua/{{$loaikhuyenmai->km_id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                  <div class="form-group">
                      <label>Tên khuyến mãi  :</label>
                      <input class="form-control" name="km_ten" value="{{$loaikhuyenmai->km_ten}}" placeholder="Nhập tên khuyến mãi" />
                  </div>
                  <div class="form-group">
                      <label>Giá :</label>
                      <input class="form-control" name="km_gia" value="{{$loaikhuyenmai->km_gia}}" placeholder="Nhập giá khuyến mãi" />
                  </div>
                  <div class="form-group">
                      <label>Ngày bắt đầu :</label>
                      <input class="form-control" type="date" name="km_ngay_bat_dau"
                             value="{{date("Y-m-d", strtotime($loaikhuyenmai->km_ngay_bat_dau))}}"/>
                  </div>
                  <div class="form-group">
                      <label>Ngày kết thúc :</label>
                      <input class="form-control" type="date" name="km_ngay_ket_thuc"
                             value="{{date("Y-m-d", strtotime($loaikhuyenmai->km_ngay_ket_thuc))}}"/>
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

                    <button type="submit" class="btn btn-default">Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
