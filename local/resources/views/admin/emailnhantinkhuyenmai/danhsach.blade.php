@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Danh sách các email nhận tin khuyến mãi của cửa hàng
                    </h1>
                </div>
                @if(count($errors) > 0)
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
                        <th>Địa chỉ email</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($email as $e)
                        <tr class="odd gradeX" align="center">
                            <td>{{$e->id}}</td>
                            <td>{{$e->email}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/binhluan/xoa/{{$e->id}}"> Delete</a></td>
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
