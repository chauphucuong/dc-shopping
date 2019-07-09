@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">  Danh Sách Phiếu Giảm Giá
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
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Mã phiếu giảm giá</th>
                        <th>Tên phiếu giảm giá</th>
                        <th>Giá phiếu giảm</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Trạng thái</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($phieugiamgia as $pgg)
                  <tr class="odd gradeX" align="center">
                      <td>{{$pgg->pgg_id}}</td>
                      <td>{{$pgg->pgg_ten}}</td>
                      <td>{{$pgg->pgg_giam_gia}}</td>
                      <td>{{$pgg->ngay_bat_dau}}</td>
                      <td>{{$pgg->ngay_ket_thuc}}</td>
                      <td>{{$pgg->trang_thai}}</td>
                      <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/phieugiamgia/xoa/{{$pgg->pgg_id}}"> Delete</a></td>
                      <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/phieugiamgia/sua/{{$pgg->pgg_id}}">Edit</a></td>
                  </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

<!-- /#page-wrapper -->

@endsection
