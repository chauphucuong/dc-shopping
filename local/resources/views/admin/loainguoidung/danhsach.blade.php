@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">  Danh Sách loại người dùng
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
                        <th>Mã loại người dùng</th>
                        <th>Tên loại người dùng</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($loainguoidung as $lnd)
                  <tr class="odd gradeX" align="center">
                      <td>{{$lnd->lnd_id}}</td>
                      <td>{{$lnd->lnd_ten}}</td>
                      <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/loainguoidung/xoa/{{$lnd->lnd_id}}"> Delete</a></td>
                      <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/loainguoidung/sua/{{$lnd->lnd_id}}">Edit</a></td>
                  </tr>``
                  @endforeach
                </thead>
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
