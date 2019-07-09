@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">  Danh Sách Loại khuyến mãi
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
                        <th>Mã khuyến mãi</th>
                        <th>Tên khuyến mãi</th>
                        <th>Giảm giá</th>
                        <th>Ngày khuyến mãi bắt đầu</th>
                        <th>Ngày khuyến mãi kết thúc</th>
                        <th>Trạng thái</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($loaikhuyenmai as $km)
                      <tr class="odd gradeX" align="center">
                          <td>{{$km->km_id}}</td>
                          <td>{{$km->km_ten}}</td>
                          <td>{{$km->km_gia}}%</td>
                          <td>{{$km->km_ngay_bat_dau}}</td>
                          <td>{{$km->km_ngay_ket_thuc}}</td>
                          <td>{{$km->trang_thai}}</td>
                          <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/loaikhuyenmai/xoa/{{$km->km_id}}"> Delete</a></td>
                          <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/loaikhuyenmai/sua/{{$km->km_id}}">Edit</a></td>
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
