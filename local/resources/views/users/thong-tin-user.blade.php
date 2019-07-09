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
                        <h3 class="aside-title" style="text-transform: none">Xin chào, {{$khachhang['kh_ten']}}</h3>
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
                <form method="post" action="{{url('user/thong-tin-khach-hang')}}" id="checkout-form" class="clearfix col-md-6">
                    {{--Thông tin người nhận hàng--}}
                    {{csrf_field()}}
                    <input type="hidden" name="id_KH" value="{{$khachhang['kh_id']}}">
                    <div class="col-md-12">
                        <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">Thông tin tài khoản</h3>
                            </div>
                            <div class="form-group">
                                <label>Họ và tên:</label>
                                <input class="input" type="text" name="txtHoTenTT" value="{{$khachhang['kh_ten']}}" placeholder="Họ và tên...">
                                @if($errors->has('txtHoTenTT'))
                                    <span class="text-danger">{{$errors->first('txtHoTenTT')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input class="input" type="email" name="txtEmailTT" value="{{$khachhang['kh_email']}}" placeholder="Email...">
                                @if($errors->has('txtEmailTT'))
                                    <span class="text-danger">{{$errors->first('txtEmailTT')}}</span>
                                @endif
                                @if($errors->has('existEmail'))
                                    <span class="text-danger">{{$errors->first('existEmail')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại:</label>
                                <input class="input" type="tel" name="txtPhoneTT" value="{{$khachhang['kh_sdt']}}" placeholder="Telephone...">
                                @if($errors->has('txtPhoneTT'))
                                    <span class="text-danger">{{$errors->first('txtPhoneTT')}}</span>
                                @endif
                            </div>
                        </div>
                        <button class="btn" name="btUpdate" style="background: #D50000; color: white;">
                            <i class="fa fa-edit"></i> CẬP NHẬT
                        </button>
                    </div>
                </form>
                    <div class="col-md-6 pull-right">
                        <div class="shiping-methods">
                            <div class="section-title">
                                <h4 class="title">Danh sách địa chỉ nhận hàng</h4>
                            </div>
                            @if($diachi != null)
                            <table class="table table-hover">
                                <tr>
                                    <th>STT</th>
                                    <th >Địa chỉ</th>
                                    <th></th>
                                </tr>
                                <?php $i = 1; ?>
                                @foreach($diachi as $row)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>
                                        {{$row['dcgh_dia_chi'].', '.\App\PhuongXa::find($row['dcgh_phuong_xa'])->px_ten.' - '.\App\QuanHuyen::find($row['dcgh_quan_huyen'])->qh_ten.' - '.\App\ThanhPho::find($row['dcgh_thanh_pho'])->tp_ten}}
                                    </td>
                                    <td title="Chỉnh sửa">
                                        {{--Nút sửa địa chỉ--}}
                                        <button class="main-btn icon-btn" onclick="window.location = '{{url('/user/sua-dia-chi/'.$row['dcgh_id'])}}' ">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                    </td>
                                    <td title="Chỉnh sửa">
                                        <form method="post" action="{{url('user/thong-tin-khach-hang')}}" id="checkout-form" class="clearfix col-md-6">
                                            {{csrf_field()}}
                                        {{--Nút xóa địa chỉ--}}
                                        <input type="hidden" name="id_DCGH" value="{{$row['dcgh_id']}}">
                                        <button class="main-btn icon-btn" name="xoaDiaChi">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                @endforeach
                            </table>
                            @else
                            <div>
                                <label class="text-danger">Tài khoản này chưa nhập địa chỉ nhận hàng</label>
                            </div>
                            @endif
                            <button class="btn" onclick="window.location = '{{url('/user/them-dia-chi')}}' " style="background: #D50000; color: white;">
                                <i class="fa fa-plus"></i> THÊM MỚI
                            </button>
                        </div>
                    </div>
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
        $(document).ready(function () {
            //Xử lý lỗi khi chọn số lượng < 0
            $('input[name="soluong"]').change(function () {
                if($(this).val() <= 0){
                    $('#error').html('Vui lòng nhập đúng số lượng cần mua');
                }else {
                    $('#error').html('');
                }
            });
        });
    </script>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection