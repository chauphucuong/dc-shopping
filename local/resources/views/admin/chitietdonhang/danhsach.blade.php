@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">  Chi Tiết Đơn Hàng
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
                        <th>Mã chi tiết đơn hàng</th>
                        <th>Mã sản phẩm</th>
                        <th>Mã đơn hàng</th>
                        <th>Số lượng</th>
                        <th>Giá bán</th>
                        <th>Ghi chú</th>
                        <th>Ngày tạo</th>
                        <th>Ngày update</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($chitietdonhang as $ctdh)
                  <tr class="odd gradeX" align="center">
                      <td>{{$ctdh->ctdh_id}}</td>
                      <td>{{$ctdh->ctdh_sp_id}}</td>
                      <td>{{$ctdh->ctdh_dh_id}}</td>
                      <td>{{$ctdh->ctdh_so_luong}}</td>
                      <td>{{$ctdh->ctdh_gia_ban}}</td>
                      <td>{{$ctdh->ghi_chu}}</td>
                      <td>{{$ctdh->created_at}}</td>
                      <td>{{$ctdh->updated_at}}</td>
                      <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/chitietdonhang/xoa/{{$ctdh->ctdh_id}}"> Delete</a></td>
                      <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/chitietdonhang/sua/{{$ctdh->ctdh_id}}">Edit</a></td>
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
