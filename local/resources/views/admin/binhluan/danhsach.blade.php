@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Danh sách bình luận của khách hàng
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
                        <th>Khách hàng</th>
                        <th>Sản phẩm</th>
                        <th>Nội dung</th>
                        <th>Ngày nhập</th>
                        <th>Ngày chỉnh sửa</th>
                        <th>Phản hồi</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($binhluan as $bl)
                        <tr class="odd gradeX" align="center">
                            <td>{{$bl->bl_id}}</td>
                            <td>{{\App\KhachHang::find($bl->bl_kh_id)->kh_ten}}</td>
                            <td>{{\App\SanPham::find($bl->bl_sp_id)->sp_ten}}</td>
                            <td>{{$bl->bl_noi_dung}}</td>
                            <td>{{$bl->created_at}}</td>
                            <td>{{$bl->updated_at}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/binhluan/phanhoi"> Reply</a></td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/binhluan/xoa/{{$bl->bl_id}}"> Delete</a></td>
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
