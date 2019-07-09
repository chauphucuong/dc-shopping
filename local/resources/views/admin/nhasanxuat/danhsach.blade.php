@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">  Danh Sách Nhà Sản Xuất
                </h1>
            </div>
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
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Mã nhà sản xuất</th>
                        <th>Họ tên</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Hình ảnh nhà cung cấp</th>
                        <th>Trạng thái</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($nhasanxuat as $nsx)
                  <tr class="odd gradeX" align="center">
                      <td>{{$nsx->nsx_id}}</td>
                      <td>{{$nsx->nsx_ten}}</td>
                      <td>{{$nsx->nsx_dia_chi}}</td>
                      <td>{{$nsx->nsx_sdt}}</td>
                      <td><img width="100px" height="50px" src="uploads/nhasanxuat/{{$nsx->nsx_hinh_anh}}"/></td>
                      <td>{{$nsx->trang_thai}}</td>
                      <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/nhasanxuat/xoa/{{$nsx->nsx_id}}"> Delete</a></td>
                      <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/nhasanxuat/sua/{{$nsx->nsx_id}}">Edit</a></td>
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
