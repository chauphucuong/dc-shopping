@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">  Danh Sách Đơn Hàng Đổi Trả
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
                        <th>Mã đơn hàng đổi trả</th>
                        <th>Khách hàng</th>
                        <th>Đơn hàng của ngày</th>
                        <th>Ngày đổi trả</th>
                        <th>Thao tác</th>
                        <th>Lý do</th>
                        <th>Tình trạng</th>
                        <th>Ngày tạo</td>
                        <th>Ngày update</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($donhangdoi_tra as $dhdt)
                  <tr class="odd gradeX" align="center">
                      <td>{{$dhdt->dhdt_id}}</td>
                      <td>{{\App\KhachHang::find($dhdt->dhdt_kh_id)->kh_ten}}</td>
                      <td>{{\App\DonHang::find($dhdt->dhdt_dh_id)->dh_ngay_dat_hang}}</td>
                      <td>{{$dhdt->dhdt_ngay_doi_tra}}</td>
                      <td>{{$dhdt->dhdt_thao_tac}}</td>
                      <td>{{$dhdt->dhdt_ly_do}}</td>
                      <td>{{\App\TinhTrangDonHang::find($dhdt->dhdt_tinh_trang_id)->tinh_trang_ten}}</td>
                      <td>{{$dhdt->created_at}}</td>
                      <td>{{$dhdt->updated_at}}</td>
                      <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/donhangdoi_tra/xoa/{{$dhdt->dhdt_id}}"> Delete</a></td>
                      <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/donhangdoi_tra/sua/{{$dhdt->dhdt_id}}">Edit</a></td>
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
