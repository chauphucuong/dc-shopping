@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                    <small>Add</small>
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
            @if(session('loi'))
            <div class="alert alert-success">{{session('loi')}}</div>
            @endif
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/tintuc/them" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                  <div class="form-group">
                      <label>Loại tin tức  :</label>
                      <select class="form-control" name="tt_ltt_id">
                        @foreach($loaitintuc as $ltt)
                          <option value="{{$ltt->dmtt_id}}">{{$ltt->dmtt_ten}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Hình ảnh tin tức  :</label>
                      <input type="file" class="form-control" name="tt_hinh_anh" />
                  </div>
                  <div class="form-group">
                      <label>Tiêu đề :</label>
                      <input class="form-control" name="tt_tieu_de" placeholder="Nhập tiêu đề tin tức" />
                  </div>
                  <div class="form-group">
                      <label>Mô tả :</label>
                      <textarea id="demo" name="tt_mo_ta" class="form-control ckeditor" row="3" ></textarea>
                  </div>
                  <div class="form-group">
                      <label>Nội dung :</label>
                      <textarea id="demo" name="tt_noi_dung" class="form-control ckeditor" row="3" ></textarea>
                  </div>
                  <div class="form-group">
                      <label>Trạng thái:</label>
                      <label class="radio-inline">
                          <input name="trang_thai" value="ON" checked="" type="radio">ON
                      </label>
                      <label class="radio-inline">
                          <input name="trang_thai" value="OFF" type="radio">OFF
                      </label>
                  </div>
                    <button type="submit" class="btn btn-default">Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
