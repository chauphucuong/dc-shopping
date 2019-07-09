@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Người Dùng Edit
                    <small>{{$nguoidung->name}}</small>
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
                <form action="admin/nguoidung/sua/{{$nguoidung->nd_id}}" method="POST">
                  <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                  <div class="form-group">
                      <label>Mã loại nhân viên  :</label>
                      <select class="form-control" name="nd_lnd_id">
                        @foreach($loainguoidung as $lnd)
                          <option value="{{$lnd->lnd_id}}"
                          <?php if($lnd->lnd_id == $nguoidung->nd_lnd_id){echo 'selected';} ?>
                          >{{$lnd->lnd_ten}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Họ tên người dùng  :</label>
                      <input class="form-control" type="text" name="name" value="{{$nguoidung->name}}"placeholder="Nhập họ tên người dùng" />
                  </div>
                  <div class="form-group">
                      <label>Email :</label>
                      <input class="form-control" type="email" name="email"value="{{$nguoidung->email}}" placeholder="Nhập vào email" />
                  </div>
                  <div class="form-group">
                      <label>Password :</label>
                      <input type="password" class="form-control" name="password" placeholder="Nhập vào password" />
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
