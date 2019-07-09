@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Địa Chỉ Giao Hàng
                    <small>{{$diachigiaohang->dcgh_stt}}</small>
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
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/diachigiaohang/sua/{{$diachigiaohang->dcgh_id}}" method="POST">
                  <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                  <select class="form-control" name="dcgh_kh_id">
                    @foreach($khachhang as $kh)
                      <option value="{{$kh->kh_id}}">{{$kh->kh_ten}}</option>
                    @endforeach
                  </select>
                  <div class="form-group">
                      <label>Địa chỉ  :</label>
                      <input class="form-control" name="dcgh_dia_chi" value="{{$diachigiaohang->dcgh_dia_chi}}"placeholder="Nhập vào địa chỉ giao hàng" />
                  </div>
                    {{--Select chọn Thành phố--}}
                    <div class="form-group">
                        <div><label>Thành Phố:</label></div>
                        <select class="input form-control" name="dcgh_thanh_pho" id="tp" style="width: 100%">
                            <option disabled selected>Chọn Thành phố...</option>
                            @foreach($thanhpho as $item)
                                <option value="{{$item['tp_id']}}"
                                <?php if($item['tp_ten'] == $diachigiaohang->dcgh_thanh_pho){
                                    echo "selected";
                                } ?>
                                >{{$item['tp_ten']}}
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
                        <select class="input form-control" name="dcgh_quan_huyen" id="qh" style="width: 100%;">
                            @foreach($quanhuyen as $item)
                                <option value="{{$item['qh_id']}}"
                                <?php if($item['qh_ten'] == $diachigiaohang->dcgh_quan_huyen){
                                    echo "selected";
                                } ?>
                                >{{$item['qh_ten']}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('dcgh_quan_huyen'))
                            <span class="text-danger">{{$errors->first('dcgh_quan_huyen')}}</span>
                        @endif
                    </div>

                    {{--Select chọn Phường/Xã--}}
                    <div class="form-group">
                        <div><label>Phường/Xã:</label></div>
                        <select class="input form-control" name="dcgh_phuong_xa" id="px" style="width: 100%;">
                            @foreach($phuongxa as $item)
                                <option value="{{$item['px_id']}}"
                                <?php if($item['px_ten'] == $diachigiaohang->dcgh_phuong_xa){
                                    echo "selected";
                                } ?>
                                >{{$item['px_ten']}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('dcgh_phuong_xa'))
                            <span class="text-danger">{{$errors->first('dcgh_phuong_xa')}}</span>
                        @endif
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
        @section('script')
            <script>
                $(document).ready(function(){
                    //Khi giá trị Thành phố thay đổi
                    $('#tp').change(function(){
                        //Lấy id của thành phố
                        var id_TP = $('#tp').val();
                        $.get('ajax/quan-huyen/' + id_TP, function (data) {
                            $('#qh').html(data);
                        });
                    });

                    //Khi giá trị Quận/Huyện thay đổi
                    $('#qh').change(function () {

                        //Lấy id của quận/huyện
                        var id_QH = $('#qh').val();
                        $.get('ajax/phuong-xa/' + id_QH, function (data) {
                            $('#px').html(data);
                        });
                    });
                });
            </script>
@endsection