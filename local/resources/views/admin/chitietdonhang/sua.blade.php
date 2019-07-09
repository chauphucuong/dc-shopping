@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">  Chi Tiết Đơn Hàng
                    <small>Edit</small>
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
            <form action="admin/chitietdonhang/sua/{{$chitietdonhang->ctdh_sp_id}}" method="POST">
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

              <input type="hidden" name="_token" value="{{csrf_token()}}"/>
              <div class="form-group">
                  <label>Mã sản phẩm  :</label>
                  <select class="form-control" name="ctdh_sp_id">
                    @foreach($sanpham as $sp)
                      <option value="{{$sp->sp_id}}">{{$sp->sp_ten}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label>Mã đơn hàng  :</label>
                  <select class="form-control" name="ctdh_dh_id">
                    @foreach($donhang as $dh)
                      <option value="{{$dh->dh_id}}">{{$dh->dh_ten}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label>Số lượng  :</label>
                  <input class="form-control" name="ctdh_so_luong" value="{{$chitietdonhang->ctdh_so_luong}}" placeholder="Nhập số lượng" />
              </div>
              <div class="form-group">
                  <label>Giá bán :</label>
                  <input class="form-control" name="ctdh_gia_ban" value="{{$chitietdonhang->ctdh_gia_ban}}" placeholder="Nhập giá bán" />
              </div>
                <div class="form-group">
                  <label>Ghi chú :</label>
                  <input class="form-control" name="ctdh_ghi_chu" value="{{$chitietdonhang->ctdh_gia_ban}}" placeholder="Nhập giá bán" />
              </div>
              <div class="form-group">
                  <label>Ngày tạo:</label>
                  <input class="form-control" name="updated_at" value="{{date('d/m/Y - H:i:s')}}" placeholder="Nhập ngày update đơn hàng chi tiết" />
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
