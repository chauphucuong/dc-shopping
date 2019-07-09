@extends('layouts.master-layout')

@section('title')
    <title>DC-Shopping</title>
@endsection

@section('header')
    @include('layouts.header')
@endsection

@section('navigation')
    @include('layouts.nav')
@endsection

@section('home')

@endsection

@section('content')
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside widget -->
                    <div class="aside">
                        <h3 class="aside-title" style="text-transform: none">Xin chào, {{$Customer['kh_ten']}}</h3>
                        <ul class="list-links">
                            <li><a href="{{url('user/thong-tin-khach-hang')}}">Thông tin tài khoản</a></li>
                            <li><a href="{{url('muc-san-pham/danh-sach-yeu-thich')}}">Sản phẩm đã yêu thích</a></li>
                            <li><a href="{{url('user/thanh-toan')}}">Thanh toán</a></li>
                            <li><a href="{{url('user/logout')}}"></i>Đăng xuất</a></li>
                        </ul>
                    </div>
                    <!-- /aside widget -->
                </div>
                <!-- /ASIDE -->
                <div class="col-md-9">
                    @if(!isset($diachi))
                    <form method="post" action="{{url('user/them-dia-chi')}}" id="checkout-form" class="clearfix">
                        {{csrf_field()}}
                    <input type="hidden" name="id_KH" value="{{$Customer['kh_id']}}">
                    {{--Trang THÊM địa chỉ người nhận hàng--}}
                    <div class="col-md-6">
                        <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">Thêm địa chỉ nhận hàng</h3>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ:</label>
                                <input class="input" type="text" name="txtDiaChiKH" placeholder="Địa chỉ - tên đường...">
                                @if($errors->has('txtDiaChiKH'))
                                    <span class="text-danger">{{$errors->first('txtDiaChiKH')}}</span>
                                @endif
                            </div>

                            {{--Select chọn Thành phố--}}
                            <div class="form-group">
                                <div><label>Thành Phố:</label></div>
                                <select class="input" name="txtThanhPhoKH" id="tp" style="width: 100%">
                                    <option style="color: #B8B8B8" disabled selected >Chọn thành phố</option>
                                    @foreach($thanhpho as $item)
                                       <option value="{{$item['tp_id']}}">{{$item['tp_ten']}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('txtThanhPhoKH'))
                                    <span class="text-danger">{{$errors->first('txtThanhPhoKH')}}</span>
                                @endif
                            </div>

                            {{--Select chọn Quận/Huyện--}}
                            <div class="form-group">
                                <div><label>Quận/Huyện:</label></div>
                                <select class="input" name="txtQuanHuyenKH" id="qh" style="width: 100%; background: #c8cbcf" disabled>
                                    <option disabled selected style='color: #B8B8B8'>Chọn quận/huyện</option>
                                </select>
                                @if($errors->has('txtQuanHuyenKH'))
                                    <span class="text-danger">{{$errors->first('txtQuanHuyenKH')}}</span>
                                @endif
                            </div>

                            {{--Select chọn Phường/Xã--}}
                            <div class="form-group">
                                <div><label>Phường/Xã:</label></div>
                                <select class="input" name="txtPhuongXaKH" id="px" style="width: 100%; background: #c8cbcf" disabled>
                                    <option disabled selected style='color: #B8B8B8'>Chọn phường/xã</option>
                                </select>
                                @if($errors->has('txtPhuongXaKH'))
                                    <span class="text-danger">{{$errors->first('txtPhuongXaKH')}}</span>
                                @endif
                            </div>
                        </div>

                        {{--Nút lưu thông tin--}}
                        <button class="btn" name="btThemDiaChi" style="background: #D50000; color: white;">
                            <i class="fa fa-plus"></i> THÊM
                        </button>
                    </div>
                    </form>
                    @else
                    <form method="post" action="{{url('user/them-dia-chi')}}" id="checkout-form" class="clearfix">
                        {{csrf_field()}}
                        <input type="hidden" name="id_KH" value="{{$Customer['kh_id']}}">
                        {{--Lấy id của địa chỉ cần sửa--}}
                        <input type="hidden" name="id_DC" value="{{$diachi['dcgh_id']}}">
                        {{--Trang SỬA địa chỉ người nhận hàng--}}
                        <div class="col-md-6">
                            <div class="billing-details">
                                <div class="section-title">
                                    <h3 class="title">Sửa địa chỉ nhận hàng</h3>
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ:</label>
                                    <input class="input" type="text" name="txtDiaChiKH" placeholder="Địa chỉ - tên đường..."
                                           value="{{$diachi['dcgh_dia_chi']}}">
                                    @if($errors->has('txtDiaChiKH'))
                                        <span class="text-danger">{{$errors->first('txtDiaChiKH')}}</span>
                                    @endif
                                </div>

                                {{--Select chọn Thành phố--}}
                                <div class="form-group">
                                    <div><label>Thành Phố:</label></div>
                                    <select class="input" name="txtThanhPhoKH" id="tp" style="width: 100%">
                                        @foreach($thanhpho as $item)
                                            <option value="{{$item['tp_id']}}"
                                            <?php if($item['tp_id'] == $diachi['dcgh_thanh_pho']){
                                                echo "selected";
                                            } ?>
                                            >{{$item['tp_ten']}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('txtThanhPhoKH'))
                                        <span class="text-danger">{{$errors->first('txtThanhPhoKH')}}</span>
                                    @endif
                                </div>

                                {{--Select chọn Quận/Huyện--}}
                                <div class="form-group">
                                    <div><label>Quận/Huyện:</label></div>
                                    <select class="input" name="txtQuanHuyenKH" id="qh" style="width: 100%;" >
                                        @foreach($quanhuyen as $item)
                                            <option value="{{$item['qh_id']}}"
                                            <?php if($item['qh_id'] == $diachi['dcgh_quan_huyen']){
                                                echo "selected";
                                            } ?>
                                            >{{$item['qh_ten']}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('txtQuanHuyenKH'))
                                        <span class="text-danger">{{$errors->first('txtQuanHuyenKH')}}</span>
                                    @endif
                                </div>

                                {{--Select chọn Phường/Xã--}}
                                <div class="form-group">
                                    <div><label>Phường/Xã:</label></div>
                                    <select class="input" name="txtPhuongXaKH" id="px" style="width: 100%;" >
                                        @foreach($phuongxa as $item)
                                            <option value="{{$item['px_id']}}"
                                            <?php if($item['px_id'] == $diachi['dcgh_phuong_xa']){
                                                echo "selected";
                                            } ?>
                                            >{{$item['px_ten']}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('txtPhuongXaKH'))
                                        <span class="text-danger">{{$errors->first('txtPhuongXaKH')}}</span>
                                    @endif
                                </div>
                            </div>

                            {{--Nút lưu thông tin--}}
                            <button class="btn" name="btSuaDiaChi" style="background: #D50000; color: white;">
                                <i class="fa fa-save"></i> LƯU
                            </button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection

@section('script')
    <script type="text/javascript" src="{{asset('/js/dat2.js')}}"></script>
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

@section('footer')
    @include('layouts.footer')
@endsection