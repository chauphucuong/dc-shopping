@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">  Danh Sách Người Dùng
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
                        <th>Mã người dùng</th>
                        <th>Loại người dùng</th>
                        <th>Tên người dùng</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Ngày Tạo</th>
                        <th>Ngày Update</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($nguoidung as $nd)
                  <tr class="odd gradeX" align="center">
                      <td>{{$nd->nd_id}}</td>
                      <td>{{\App\LoaiNguoiDung::find($nd->nd_lnd_id)->lnd_ten}}</td>
                      <td>{{$nd->name}}</td>
                      <td>{{$nd->email}}</td>
                      <td>{{$nd->password}}</td>
                      <td>{{$nd->created_at}}</td>
                      <td>{{$nd->updated_at}}</td>
                      <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/nguoidung/xoa/{{$nd->nd_id}}"> Delete</a></td>
                      <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/nguoidung/sua/{{$nd->nd_id}}">Edit</a></td>
                  </tr>
                @endforeach
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection
