@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">  Danh Sách các Quận/Huyện sẽ giao hàng
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
                        <th>ID</th>
                        <th>Tên Quận/Huyện</th>
                        <th>Thuộc thành phố</th>
                        <th>Trạng thái</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($quanhuyen as $qh)
                        <tr class="odd gradeX" align="center">
                            <td>{{$qh->qh_id}}</td>
                            <td>{{$qh->qh_ten}}</td>
                            <td>{{\App\ThanhPho::find($qh->qh_tp_id)->tp_ten}}</td>
                            <td>{{$qh->trang_thai}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/quanhuyen/xoa/{{$qh->qh_id}}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/quanhuyen/sua/{{$qh->qh_id}}">Edit</a></td>
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
