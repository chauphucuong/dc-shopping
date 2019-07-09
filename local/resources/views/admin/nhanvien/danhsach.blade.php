@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">  Danh Sách Nhân viên
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
                        <th>Mã nhân viên</th>
                        <th>Loại nhân viên</th>
                        <th>Họ tên nhân viên</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Email</th>
                        <th>Số ngày nghỉ</th>
                        <th>Ngày lào làm </th>
                        <th>Ngày Update</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($nhanvien as $nv)
                  <tr class="odd gradeX" align="center">
                      <td>{{$nv->nv_id}}</td>
                      <td>{{\App\LoaiNhanVien::find($nv->nv_lnv_id)->lnv_ten}}</td>
                      <td>{{$nv->nv_ten}}</td>
                      <td>{{$nv->nv_sdt}}</td>
                      <td>{{$nv->nv_dia_chi}}</td>
                      <td>{{$nv->nv_email}}</td>
                      <td>{{$nv->nv_so_ngay_nghi}}</td>
                      <td>{{$nv->created_at}}</td>
                      <td>{{$nv->updated_at}}</td>
                      <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/nhanvien/xoa/{{$nv->nv_id}}"> Delete</a></td>
                      <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/nhanvien/sua/{{$nv->nv_id}}">Edit</a></td>
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
