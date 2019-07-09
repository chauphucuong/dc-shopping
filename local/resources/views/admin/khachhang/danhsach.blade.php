@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">  Danh Sách Khách Hàng
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Mã khách hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Ngày tạo</th>
                        <th>Ngày update</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($khachhang as $row)
                    <tr class="odd gradeX" align="center">
                        <td>{{$row->kh_id}}</td>
                        <td>{{$row->kh_ten}}</td>
                        <td>{{$row->kh_ngay_sinh}}</td>
                        <td>{{$row->kh_gioi_tinh}}</td>
                        <td>{{$row->kh_sdt}}</td>
                        <td>{{$row->kh_email}}</td>
                        <td>{{$row->created_at}}</td>
                        <td>{{$row->updated_at}}</td>
                        <td class="center">
                            <i class="fa fa-trash-o  fa-fw"></i><a href="{{url('admin/khachhang/xoa'.$row->kh_id)}}"> Delete</a>
                        </td>
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
