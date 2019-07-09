@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Đơn Vị Tính
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
                        <th>Mã đơn vị</th>
                        <th>Tên đơn vị</th>
                        <th>Chú thích</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($donvitinh as $dvt)
                      <tr class="odd gradeX" align="center">
                          <td>{{$dvt->donvitinh_id}}</td>
                          <td>{{$dvt->donvitinh_ten}}</td>
                          <td>{{$dvt->chu_thich}}</td>
                          <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/donvitinh/xoa/{{$dvt->donvitinh_id}}"> Delete</a></td>
                          <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/donvitinh/sua/{{$dvt->donvitinh_id}}">Edit</a></td>
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
