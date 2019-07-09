@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Danh sách các phiếu giao hàng của cửa hàng
                    </h1>
                </div>
                @if(count($errors) > 0)
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
                        <th>ID</th>
                        <th>Đơn hàng của ngày</th>
                        <th>Nhân viên phụ trách</th>
                        <th>Ngày giao hàng</th>
                        <th>Tình trạng</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($phieugiaohang as $pgh)
                        <tr class="odd gradeX" align="center">
                            <td>{{$pgh->pgh_id}}</td>
                            <td>{{\App\DonHang::find($pgh->pgh_dh_id)->dh_ngay_dat_hang}}</td>
                            <td>{{\App\NhanVien::find($pgh->pgh_nv_id)->nv_ten}}</td>
                            <td>{{date('d-m-Y', strtotime($pgh->pgh_ngay_giao_hang))}}</td>
                            <td>{{\App\TinhTrangDonHang::find($pgh->pgh_tinh_trang_id)->tinh_trang_ten}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/phieugiaohang/xoa/{{$pgh->pgh_id}}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/phieugiaohang/sua/{{$pgh->pgh_id}}">Edit</a></td>
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
