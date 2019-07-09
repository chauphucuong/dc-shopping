@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">  Danh Mục Sản Phẩm
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
                        <th>Mã danh mục sản phẩm</th>
                        <th>Tên danh mục sản</th>
                        <th>Parent</th>
                        <th>Trạng thái</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($danhmucsanpham as $dmsp)
                <tr class="odd gradeX" align="center">
                    <td>{{$dmsp->dmsp_id}}</td>
                    <td>{{$dmsp->dmsp_ten}}</td>
                    <td>{{$dmsp->parent}}</td>
                    @if($dmsp->trang_thai == 'ON')
                    <td style="color: green">{{$dmsp->trang_thai}}</td>
                    @else
                    <td style="color: red">{{$dmsp->trang_thai}}</td>
                    @endif
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/danhmucsanpham/xoa/{{$dmsp->dmsp_id}}"> Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/danhmucsanpham/sua/{{$dmsp->dmsp_id}}">Edit</a></td>
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
