@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">  Danh Sách Địa Chỉ Giao Hàng
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Số địa chỉ giao hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Địa chỉ</th>
                        <th>Phường/Xã</th>
                        <th>Quận/Huyện</th>
                        <th>Thành phố</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($diachigiaohang as $dcgh)
                  <tr class="odd gradeX" align="center">
                      <td>{{$dcgh->dcgh_id}}</td>
                      <td>{{\App\KhachHang::find($dcgh->dcgh_kh_id)->kh_ten}}</td>
                      <td>{{$dcgh->dcgh_dia_chi}}</td>
                      <td>{{\App\PhuongXa::find($dcgh->dcgh_phuong_xa)->px_ten}}</td>
                      <td>{{\App\QuanHuyen::find($dcgh->dcgh_quan_huyen)->qh_ten}}</td>
                      <td>{{\App\ThanhPho::find($dcgh->dcgh_thanh_pho)->tp_ten}}</td>
                      <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/diachigiaohang/xoa/{{$dcgh->dcgh_id}}"> Delete</a></td>
                      <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/diachigiaohang/sua/{{$dcgh->dcgh_id}}">Edit</a></td>
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
