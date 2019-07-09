@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đơn Hàng Edit
                    <small> {{$donhang->dh_id}}</small>
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
                <form action="admin/donhang/sua/{{$donhang->dh_id}}" method="POST">

                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <input type="hidden" id="id_DH" value="{{$donhang->dh_id}}"/>

                    <div class="form-group">
                        <label>Khách hàng  :</label>
                        <input class="form-control" name="dh_kh_id" value="{{$khachhang->kh_ten}}" readonly/>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ giao hàng  :</label>
                        <select class="form-control" name="dh_kh_dia_chi" id="dh_kh_dia_chi">
                            @foreach($diachigiaohang as $dc)
                                <option value="{{$dc->dcgh_id}}"
                                <?php
                                    if($dc->dcgh_id == $donhang->dh_dia_chi_id){
                                        echo "selected";
                                    }
                                    ?>
                                >
                                    {{$dc->dcgh_dia_chi.', '.$dc->dcgh_phuong_xa.', '.$dc->dcgh_quan_huyen.', '.$dc->dcgh_thanh_pho}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mã phiếu giảm giá  :</label>
                        <select class="form-control" name="dh_pgg_id" id="dh_pgg_id">
                          @foreach($phieugiamgia as $pgg)
                            <option value="{{$pgg->pgg_id}}"
                            <?php
                                if($pgg->pgg_id == $donhang->dh_pgg_id){
                                    echo "selected";
                                }
                                ?>
                            >
                                {{$pgg->pgg_ten}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại thanh toán  :</label>
                        <select class="form-control" name="dh_ltt_id">
                          @foreach($loaithanhtoan as $ltt)
                            <option value="{{$ltt->ltt_id}}"
                            <?php
                                if($ltt->ltt_id == $donhang->dh_ltt_id){
                                    echo "selected";
                                }
                                ?>
                            >{{$ltt->ltt_ten}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tình trạng  :</label>
                        <select class="form-control" name="dh_tinh_trang_id">
                          @foreach($tinhtrangdonhang as $ttdh)
                            <option value="{{$ttdh->tinh_trang_id}}">{{$ttdh->tinh_trang_ten}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nơi vận chuyển  :</label>
                        <select class="form-control" name="dh_cpvc_id" id="dh_cpvc_id">
                          @foreach($cuocphivanchuyen as $cpvc)
                            <option value="{{$cpvc->cpvc_id}}"
                            <?php
                                if($cpvc->cpvc_id == $donhang->dh_cpvc_id){
                                    echo "selected";
                                }
                                ?>
                            >
                                {{\App\ThanhPho::find($cpvc->cpvc_tp_id)->tp_ten}} - {{number_format($cpvc->cpvc_gia_cuoc)}}<u>đ</u>
                            </option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tổng tiền đơn hàng  :</label>
                        <input class="form-control" name="dh_tong_tien" id="dh_tong_tien"
                               value="{{$donhang->dh_tong_tien}}"
                               placeholder="Nhập tổng tiền đơn hàng" readonly/>
                    </div>
                    <div class="form-group">
                        <label>Ngày đặt hàng :</label>
                        <input type="date"class="form-control" name="dh_ngay_dat_hang" value="{{$donhang->dh_ngay_dat_hang}}" placeholder="Nhập ngày đặt hàng" readonly/>
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
        $(document).ready(function () {


            var id_dh = $('#id_DH').val();

            $('#dh_pgg_id').change(function () {
                var id_pgg = $('#dh_pgg_id').val();
                $.get('ajax/total-pgg/' + id_dh + '/' + id_pgg, function (data) {
                    $('#dh_tong_tien').val(data);
                });
            });

            $('#dh_cpvc_id').change(function () {
                var id_cpvc = $('#dh_cpvc_id').val();
                var total = $('#dh_tong_tien').val();
                $.get('ajax/total-cpvc/' + id_dh + '/' + id_cpvc, function (data) {
                    $('#dh_tong_tien').val(data);
                });
            });
        });
    </script>
@endsection
