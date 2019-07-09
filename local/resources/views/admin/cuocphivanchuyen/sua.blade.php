@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cước Phí Vận Chuyển
                    <small>{{$cuocphivanchuyen->cvpc_id}}</small>
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
                <form action="admin/cuocphivanchuyen/sua/{{$cuocphivanchuyen->cpvc_id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                    <div class="form-group">
                      <label>Mã loại thành phố  :</label>
                      <select class="form-control" name="tp_id">
                        @foreach($thanhpho as $tp)
                          <option value="{{$tp->tp_id}}"
                          <?php
                            if($tp->tp_id == $cuocphivanchuyen->cpvc_tp_id)    {
                                echo 'selected';
                            }
                          ?>
                          >{{$tp->tp_ten}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                        <label>Giá cước :</label>
                        <input class="form-control" type="number" min="0" name="cpvc_gia_cuoc" value="{{$cuocphivanchuyen->cpvc_gia_cuoc}}" placeholder="Nhập giá cước" />
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
