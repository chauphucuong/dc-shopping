@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tình Trạng Đơn Hàng
                    <small>{{$tinhtrangdonhang->tinh_trang_ten}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
              @if(count($errors)>0)
                  <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                    <div>
              @endif
              @if(session('thongbao'))
              <div class="alert alert-success">{{session('thongbao')}}</div>
              @endif
                <form action="admin/tinhtrangdonhang/sua/{{$tinhtrangdonhang->tinh_trang_id}}" method="POST">
                  <input type="hidden"name="_token" value="{{csrf_token()}}"/>
                  <div class="form-group">
                      <label>Tên tình trạng đơn hàng  :</label>
                      <input class="form-control" name="tinh_trang_ten" value="{{$tinhtrangdonhang->tinh_trang_ten}}" placeholder="Nhập tên tình trạng đơn hàng" />
                  </div>
                    <button type="submit" class="btn btn-default"> Edit</button>
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
