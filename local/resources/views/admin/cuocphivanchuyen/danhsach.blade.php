@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">  Cước Phí Vận Chuyển
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
                        <th>Mã cước phí vận chuyển</th>
                        <th>Thành phố</th>
                        <th>Giá cước</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($cuocphivanchuyen as $cpvc)
                  <tr class="odd gradeX" align="center">
                      <td>{{$cpvc->cpvc_id}}</td>
                      <td>{{\App\ThanhPho::find($cpvc->cpvc_tp_id)->tp_ten}}</td>
                      <td>{{number_format($cpvc->cpvc_gia_cuoc)}} <u>đ</u></td>
                      <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/cuocphivanchuyen/xoa/{{$cpvc->cpvc_id}}"> Delete</a></td>
                      <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/cuocphivanchuyen/sua/{{$cpvc->cpvc_id}}">Edit</a></td>
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
