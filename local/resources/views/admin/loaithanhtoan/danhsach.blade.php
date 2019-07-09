@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">  Danh sách loại thanh toán
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
                        <th>Mã loại thanh toán</th>
                        <th>Tên loại thanh toán</th>
                        <th>Hình ảnh</th>
                        <th>Trạng thái</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($loaithanhtoan as $ltt)
                  <tr class="odd gradeX" align="center">
                      <td>{{$ltt->ltt_id}}</td>
                      <td>{{$ltt->ltt_ten}}</td>
                      <td><img width="50px" height="50px" src="uploads/loaithanhtoan/{{$ltt->ltt_hinh_anh}}"/></td>
                      <td>{{$ltt->trang_thai}}</td>
                      <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/loaithanhtoan/xoa/{{$ltt->ltt_id}}"> Delete</a></td>
                      <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/loaithanhtoan/sua/{{$ltt->ltt_id}}">Edit</a></td>
                  </tr>
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
