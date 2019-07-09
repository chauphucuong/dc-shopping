@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">  Tin Tức
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
                        <th>Mã tin tức</th>
                        <th>Thuộc danh mục tin tức</th>
                        <th>Hình ảnh</th>
                        <th>Tiêu đề</th>
                        <th>Mô tả</th>
                        <th>Nội dung</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                        <th>Ngày update</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($tintuc as $tt)
                    <tr class="odd gradeX" align="center">
                        <td>{{$tt->tt_id}}</td>
                        <td>{{$tt->tt_ltt_id}}</td>
                        <td><img width="50px" height="50px" src="uploads/tintuc/{{$tt->tt_hinh_anh}}"/></td>
                        <td>{{$tt->tt_tieu_de}}</td>
                        <td>{!! $tt->tt_mo_ta !!}</td>
                        <td>{!! $tt->tt_noi_dung !!}</td>
                        <td>{{$tt->trang_thai}}</td>
                        <td>{{$tt->created_at}}</td>
                        <td>{{$tt->updated_at}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tintuc/xoa/{{$tt->tt_id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tintuc/sua/{{$tt->tt_id}}">Edit</a></td>
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
