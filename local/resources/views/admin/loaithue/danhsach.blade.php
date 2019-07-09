@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Loại thuế
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
                        <th>Mã loại thuế</th>
                        <th>Tên loại thuế</th>
                        <th>Chú thích</th>
                        <th>Trạng thái</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($loaithue as $lt)
                  <tr class="odd gradeX" align="center">
                      <td>{{$lt->loai_thue_id}}</td>
                      <td>{{$lt->loai_thue_ten}}</td>
                      <td>{{$lt->chu_thich}}</td>
                      <td>{{$lt->trang_thai}}</td>
                      <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/loaithue/xoa/{{$lt->loai_thue_id}}"> Delete</a></td>
                      <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/loaithue/sua/{{$lt->loai_thue_id}}">Edit</a></td>
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
