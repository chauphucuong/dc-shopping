@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Địa Chỉ Giao Hàng
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
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
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/diachigiaohang/them" method="POST">
                  <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                  <select class="form-control" name="dcgh_kh_id">
                    @foreach($khachhang as $kh)
                      <option value="{{$kh->kh_id}}">{{$kh->kh_ten}}</option>
                    @endforeach
                  </select>
                  <div class="form-group">
                      <label>Địa chỉ  :</label>
                      <input class="form-control" name="dcgh_dia_chi" placeholder="Nhập vào địa chỉ giao hàng" />
                  </div>
                    {{--Select chọn Thành phố--}}
                    <div class="form-group">
                        <div><label>Thành Phố:</label></div>
                        <select class="input form-control" name="dcgh_thanh_pho" id="tp" style="width: 100%">
                            <option disabled selected>Chọn Thành phố...</option>
                            @foreach($thanhpho as $item)
                                <option value="{{$item['tp_id']}}">{{$item['tp_ten']}}
                                </option>
                            @endforeach
                        </select>
                        @if($errors->has('dcgh_thanh_pho'))
                            <span class="text-danger">{{$errors->first('dcgh_thanh_pho')}}</span>
                        @endif
                    </div>

                    {{--Select chọn Quận/Huyện--}}
                    <div class="form-group">
                        <div><label>Quận/Huyện:</label></div>
                        <select class="input form-control" name="dcgh_quan_huyen" id="qh" style="width: 100%;" disabled></select>
                        @if($errors->has('dcgh_quan_huyen'))
                            <span class="text-danger">{{$errors->first('dcgh_quan_huyen')}}</span>
                        @endif
                    </div>

                    {{--Select chọn Phường/Xã--}}
                    <div class="form-group">
                        <div><label>Phường/Xã:</label></div>
                        <select class="input form-control" name="dcgh_phuong_xa" id="px" style="width: 100%;" disabled></select>
                        @if($errors->has('dcgh_phuong_xa'))
                            <span class="text-danger">{{$errors->first('dcgh_phuong_xa')}}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-default"> Add</button>
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
        $(document).ready(function(){
            //Khi giá trị Thành phố thay đổi
            $('#tp').change(function(){
                //Mở select Quận/Huyện
                $('#qh').prop('disabled', false);
                $('#qh').css('background', '#fff');

                //Lấy id của thành phố
                var id_TP = $('#tp').val();
                $.get('ajax/quan-huyen/' + id_TP, function (data) {
                    $('#qh').html(data);
                });
            });

            //Khi giá trị Quận/Huyện thay đổi
            $('#qh').change(function () {
                //Mở select Phường/Xã
                $('#px').css('background', '#fff');
                $('#px').prop('disabled', false);

                //Lấy id của quận/huyện
                var id_QH = $('#qh').val();
                $.get('ajax/phuong-xa/' + id_QH, function (data) {
                    $('#px').html(data);
                });
            });
        });
    </script>
@endsection
