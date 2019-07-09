@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại Thuế
                    <small>{{$loaithue->loai_thue_ten}}</small>
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
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/loaithue/sua/{{$loaithue->loai_thue_id}}" method="POST">
                  <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                  <div class="form-group">
                      <label>Tên loại thuế  :</label>
                      <input class="form-control" name="loai_thue_ten" value="{{$loaithue->loai_thue_ten}}" placeholder="Nhập tên loại thuế" />
                  </div>
                  <div class="form-group">
                      <label>Chú thích :</label>
                      <input class="form-control" name="chu_thich" value="{{$loaithue->chu_thich}}" placeholder="Nhập chú thích" />
                  </div>
                    <div class="form-group">
                        <label>Trạng thái :</label>
                        <label class="radio-inline">
                            <input name="trang_thai" value="ON" checked="" type="radio">ON
                        </label>
                        <label class="radio-inline">
                            <input name="trang_thai" value="OFF" type="radio">OFF
                        </label>
                    </div>

                    <button type="submit" class="btn btn-default">Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
