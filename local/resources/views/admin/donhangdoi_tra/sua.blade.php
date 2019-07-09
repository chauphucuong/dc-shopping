@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh Sách Đơn Hàng Đổi Trả Edit
                    <small>{{$donhangdoi_tra->dhdt_id}}</small>
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
                <form action="admin/donhangdoi_tra/sua/{{$donhangdoi_tra->dhdt_id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                  <div class="form-group">
                      <label>Khách hàng  :</label>
                      <input class="form-control" name="dhdt_kh_id"
                             value="{{\App\KhachHang::find($donhangdoi_tra->dhdt_kh_id)->kh_ten}}" readonly/>
                  </div>
                  <div class="form-group">
                      <label>Đơn hàng của ngày :</label>
                      <select class="form-control" name="dhdt_dh_id">
                        @foreach($donhang as $dh)
                          <option value="{{$dh->dh_id}}"
                          <?php
                                if($dh->dh_id == $donhangdoi_tra->dhdt_dh_id){
                                    echo 'selected';
                                }
                          ?>
                          >{{$dh->dh_ngay_dat_hang}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Ngày đổi trả  :</label>
                      <input class="form-control" name="dhdt_ngay_doi_tra" value="{{$donhangdoi_tra->dhdt_ngay_doi_tra}}" placeholder="Nhập ngày đổi tra" />
                  </div>
                  <div class="form-group">
                      <label>Thao tác :</label>
                      <select class="form-control" name="dhdt_thao_tac">
                          <option value="Đổi hàng"
                          <?php if($donhangdoi_tra->dhdt_thao_tac == 'Đổi hàng'){echo 'selected';} ?>
                          >Đổi hàng</option>
                          <option value="Trả hàng"
                          <?php if($donhangdoi_tra->dhdt_thao_tac == 'Trả hàng'){echo 'selected';} ?>
                          >Trả hàng</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Lý do :</label>
                      <input class="form-control" name="dhdt_ly_do" value="{{$donhangdoi_tra->dhdt_ly_do}}" placeholder="Nhập lý do" />
                  </div>
                  <div class="form-group">
                      <label>Mã tình trạng  :</label>
                      <select class="form-control" name="dhdt_tinh_trang_id">
                        @foreach($tinhtrangdonhang as $ttdh)
                          <option value="{{$ttdh->tinh_trang_id}}"
                          <?php if($donhangdoi_tra->dhdt_tinh_trang_id == $ttdh->tinh_trang_id){echo 'selected';} ?>
                          >{{$ttdh->tinh_trang_ten}}</option>
                        @endforeach
                      </select>
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
