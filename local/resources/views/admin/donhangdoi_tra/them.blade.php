@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đơn Hàng Đổi/Trả
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
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/donhangdoi_tra/them" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                  <div class="form-group">
                      <label>Khách hàng  :</label>
                      <select class="form-control" name="dhdt_kh_id" id="dhdt_kh_id">
                          <option disabled selected>Chọn khách hàng</option>
                        @foreach($khachhang as $kh)
                          <option value="{{$kh->kh_id}}">{{$kh->kh_ten}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Đơn hàng của ngày :</label>
                      <select class="form-control" name="dhdt_dh_id" id="dhdt_dh_id" disabled></select>
                  </div>
                  <div class="form-group">
                      <label>Ngày đổi trả  :</label>
                      <input class="form-control" type="date" name="dhdt_ngay_doi_tra" placeholder="Nhập ngày đổi tra" />
                  </div>
                  <div class="form-group">
                      <label>Thao tác :</label>
                      <select class="form-control" name="dhdt_thao_tac">
                          <option value="Đổi hàng">Đổi hàng</option>
                          <option value="Trả hàng">Trả hàng</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Lý do :</label>
                      <input class="form-control" name="dhdt_ly_do" placeholder="Nhập lý do" />
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

@section('script')
    <script>
        $(document).ready(function () {
            $('#dhdt_kh_id').change(function () {
                var id_KH = $('#dhdt_kh_id').val();
                $('#dhdt_dh_id').prop('disabled', false);
                $.get('ajax/don-hang/' + id_KH, function (data) {
                    $('#dhdt_dh_id').html(data);
                });
            });
        });
    </script>
@endsection
