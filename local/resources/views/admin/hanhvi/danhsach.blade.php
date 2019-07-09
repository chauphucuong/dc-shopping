@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Danh sách các hành vi của khách hàng
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
                        <th>Khách hàng</th>
                        <th>Sản phẩm</th>
                        <th>Loại sản phẩm</th>
                        <th>Số lần xem</th>
                        <th>Đánh giá</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày cập nhật</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($hanhvi as $hv)
                        <tr class="odd gradeX" align="center">
                            <td>{{$hv->hv_kh_id}}</td>
                            <td>{{$hv->hv_sp_id}}</td>
                            <?php $sanpham = \App\SanPham::find($hv->hv_sp_id); ?>
                            <td>{{\App\DanhMucSanPham::find($sanpham->parent)->dmsp_ten}}</td>
                            <td>{{$hv->hv_so_lan_xem}}</td>
                            <td>{{$hv->hv_rating}}</td>
                            <td>{{$hv->created_at}}</td>
                            <td>{{$hv->updated_at}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/binhluan/xoa/{{$hv->hv_id}}"> Delete</a></td>
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
