@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">  Danh Sách Kho Hàng
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
                        <th>Mã kho hàng</th>
                        <th>Tên kho hàng</th>
                        <th>Trạng thái</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                @foreach($khohang as $kh)
              <tr class="odd gradeX" align="center">
                  <td>{{$kh->khohang_id}}</td>
                  <td>{{$kh->khohang_ten}}</td>
                  <td>{{$kh->trang_thai}}</td>
                  <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/khohang/xoa/{{$kh->khohang_id}}"> Delete</a></td>
                  <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/khohang/sua/{{$kh->khohang_id}}">Edit</a></td>
              </tr>
              @endforeach
                <tbody>

                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection
