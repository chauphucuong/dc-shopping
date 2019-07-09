@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thành Phố
                    <small>{{$thanhpho->tp_name}}</small>
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
                <form action="admin/thanhpho/sua/{{$thanhpho->tp_id}}" method="POST">
                  <input type="hidden"name="_token" value="{{csrf_token()}}"/>
                  <div class="form-group">
                      <label>Tên thành phố:</label>
                      <input class="form-control" name="tp_ten" value="{{$thanhpho->tp_ten}}" placeholder="Nhập tên thành phố:"  />
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
