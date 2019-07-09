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
                @if($data != null)
                <form method="post" action="{{url('user/thanh-toan')}}" id="checkout-form" class="clearfix">
                    {{csrf_field()}}
                    <input type="hidden" name="id_KH" value="{{$Customer['kh_id']}}">
                    {{--Thông tin người nhận hàng--}}
                    <div class="col-md-6">
                        <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">Thông tin người nhận hàng</h3>
                            </div>
                            <div class="form-group">
                                <label>Họ và tên:</label>
                                <input class="input" type="text" name="kh_ten" value="{{$khachhang['kh_ten']}}" placeholder="Họ và tên...">
                                @if($errors->has('kh_ten'))
                                    <span class="text-danger" >
                                        <label style="margin: 0">{{$errors->first('payments')}}</label>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input class="input" type="email" name="kh_email" value="{{$khachhang['kh_email']}}" placeholder="Email...">
                                @if($errors->has('kh_email'))
                                    <span class="text-danger" >
                                        <label style="margin: 0">{{$errors->first('kh_email')}}</label>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại:</label>
                                <input class="input" type="tel" minlength="9" maxlength="11" name="kh_sdt" value="{{$khachhang['kh_sdt']}}" placeholder="Chưa có...">
                                @if($errors->has('kh_sdt'))
                                    <span class="text-danger" >
                                        <label style="margin: 0">{{$errors->first('kh_sdt')}}</label>
                                    </span>
                                @endif
                            </div>
                            @if($diachi != null)
                                {{--Danh sách địa chỉ giao hàng khách đã nhập--}}
                                <div class="form-group">
                                    <label>Địa chỉ:</label>
                                    <select name="dcgh_id" id="dcgh_id" class="form-control">
                                        @foreach($diachi as $item)
                                        <option value="{{$item['dcgh_id']}}">
                                            {{$item['dcgh_dia_chi'].', '.\App\PhuongXa::find($item['dcgh_phuong_xa'])->px_ten
                                            .', '.\App\QuanHuyen::find($item['dcgh_quan_huyen'])->qh_ten.', '.
                                            \App\ThanhPho::find($item['dcgh_thanh_pho'])->tp_ten}}
                                        </option>
                                        @endforeach
                                    </select>
                                    <div class="pull-right" style="margin-top: 10px">
                                        <button name="btChinhSua" class="btn btn-success">
                                            <i class="fa fa-edit"></i> CẬP NHẬT
                                        </button>
                                    </div>
                                </div>

                                {{--Dành cho khách hàng muốn thêm địa chỉ giao hàng mới--}}
                                <div class="form-group">
                                    <div class="input-checkbox">
                                        <input type="checkbox" name="checkbox" id="register" @if($errors->has('dcgh_dia_chi')) checked @endif>
                                        <label class="font-weak" for="register">Thêm địa chỉ mới?</label>
                                        <div class="caption">
                                            <div style="margin-bottom: 10px">
                                                <label>Địa chỉ:</label>
                                                <input class="input form-control" type="text" name="dcgh_dia_chi" placeholder="Địa chỉ - tên đường...">
                                                @if($errors->has('dcgh_dia_chi'))
                                                    <span class="text-danger" >
                                                        <label style="margin: 0">{{$errors->first('dcgh_dia_chi')}}</label>
                                                    </span>
                                                @endif
                                            </div>
                                            <div style="margin-bottom: 10px">
                                                <label>Thành Phố:</label>
                                                <select class="form-control input" name="dcgh_thanh_pho" id="tp">
                                                    <option disabled selected>--Chọn thành phố--</option>
                                                    @foreach($thanhpho as $tp)
                                                    <option value="{{$tp->tp_id}}">{{$tp->tp_ten}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('dcgh_thanh_pho'))
                                                    <span class="text-danger" >
                                                        <label style="margin: 0">{{$errors->first('dcgh_thanh_pho')}}</label>
                                                    </span>
                                                @endif
                                            </div>
                                            <div style="margin-bottom: 10px">
                                                <label>Quận/Huyện:</label>
                                                <select class="form-control input" name="dcgh_quan_huyen" id="qh" disabled>
                                                    <option disabled selected>--Chọn thành phố--</option>
                                                </select>
                                                @if($errors->has('dcgh_quan_huyen'))
                                                    <span class="text-danger" >
                                                        <label style="margin: 0">{{$errors->first('dcgh_quan_huyen')}}</label>
                                                    </span>
                                                @endif
                                            </div>
                                            <div style="margin-bottom: 10px">
                                                <label>Phường/Xã:</label>
                                                <select class="form-control input" name="dcgh_phuong_xa" id="px" disabled>
                                                    <option disabled selected>--Chọn phường/xã--</option>
                                                </select>
                                                @if($errors->has('dcgh_phuong_xa'))
                                                    <span class="text-danger" >
                                                        <label style="margin: 0">{{$errors->first('dcgh_phuong_xa')}}</label>
                                                    </span>
                                                @endif
                                            </div>
                                            <div style="margin-bottom: 10px">
                                                <button class="btn btn-info" name="btThemDiaChi">
                                                    <i class="fa fa-save"> Lưu</i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="form-group">
                                    <label>Địa chỉ:</label>
                                    <input class="input" type="text" name="dcgh_dia_chi" placeholder="Địa chỉ - tên đường...">
                                    @if($errors->has('dcgh_dia_chi'))
                                        <span class="text-danger" >
                                            <label style="margin: 0">{{$errors->first('dcgh_dia_chi')}}</label>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Thành Phố:</label>
                                    <select class="form-control input" name="dcgh_thanh_pho" id="tp">
                                        <option disabled selected>--Chọn thành phố--</option>
                                        @foreach($thanhpho as $tp)
                                            <option value="{{$tp->tp_id}}">{{$tp->tp_ten}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('dcgh_thanh_pho'))
                                        <span class="text-danger" >
                                            <label style="margin: 0">{{$errors->first('dcgh_thanh_pho')}}</label>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div style="margin-bottom: 10px">
                                        <label>Quận/Huyện:</label>
                                        <select class="form-control input" name="dcgh_quan_huyen" id="qh" disabled>
                                            <option disabled selected>--Chọn thành phố--</option>
                                        </select>
                                        @if($errors->has('dcgh_quan_huyen'))
                                            <span class="text-danger" >
                                                <label style="margin: 0">{{$errors->first('dcgh_quan_huyen')}}</label>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Phường/Xã:</label>
                                    <select class="form-control input" name="dcgh_phuong_xa" id="px" disabled>
                                        <option disabled selected>--Chọn thành phố--</option>
                                    </select>
                                    @if($errors->has('dcgh_phuong_xa'))
                                        <span class="text-danger" >
                                            <label style="margin: 0">{{$errors->first('dcgh_phuong_xa')}}</label>
                                        </span>
                                    @endif
                                </div>
                                <div class="pull-right" style="margin-top: 10px">
                                    <button name="btChinhSua" class="btn btn-success">
                                        <i class="fa fa-edit"></i> CẬP NHẬT
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{--Phí vận chuyển--}}
                    <div class="col-md-6">
                        <div class="shiping-methods">
                            <div class="section-title">
                                <h4 class="title">Mức phí vận chuyển</h4>
                            </div>
                            @if($diachi != null)
                            <div class="input-checkbox">
                                {{--<select class="form-control" disabled style="border: none">
                                    <option value="{{$diachi[0]['dcgh_thanh_pho']}}">
                                        <label style="color: #D50000" for="shipping-1">{{\App\ThanhPho::find($diachi[0]['dcgh_thanh_pho'])->tp_ten}} - {{number_format(\App\CuocPhiVanCHuyen::find($diachi[0]['dcgh_thanh_pho'])->cpvc_gia_cuoc)}} <u>đ</u></label>
                                    </option>
                                </select>--}}
                                <input type="hidden" name="shipping" id="shipping" value="{{$diachi[0]['dcgh_thanh_pho']}}" readonly>
                                <label for="shipping-1" id="cuocphi">
                                    {{\App\ThanhPho::find($diachi[0]['dcgh_thanh_pho'])->tp_ten}} - {{number_format(\App\CuocPhiVanCHuyen::find($diachi[0]['dcgh_thanh_pho'])->cpvc_gia_cuoc)}} <u>đ</u>
                                </label>
                                <div >
                                    <p>Ngày giao hàng dự kiến từ 5-7 ngày (có thể sớm hơn).</p>
                                </div>
                            </div>
                            @else
                                <label for="shipping-1" id="cuocphi">
                                    Chưa biết
                                </label>
                            {{--<div class="input-checkbox">
                                <input type="radio" name="shipping" id="shipping-2">
                                <label for="shipping-2">Standard - $4.00</label>
                                <div class="caption">
                                    <p>Từ 3-5 ngày</p>
                                </div>
                            </div>--}}
                            @endif
                        </div>
                        {{-- Phương thức thanh toán --}}
                        <div class="payments-methods">
                            <div class="section-title">
                                <h4 class="title">Phương thức thanh toán</h4>
                            </div>
                            @if($errors->has('payments'))
                                <div class="alert alert-danger" >
                                    <label style="margin: 0">{{$errors->first('payments')}}</label>
                                </div>
                            @endif
                            @for($i = 0; $i < $thanhtoan->count(); $i++)
                            <input type="hidden" name="ltt_id" value="{{$thanhtoan[$i]['ltt_id']}}">
                            <div class="input-checkbox">
                                <input type="radio" name="payments" id="payments-{{$i}}">
                                <label for="payments-{{$i}}">{{$thanhtoan[$i]['ltt_ten']}}</label>
                                <div class="caption">
                                    <p> HỊN</p>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>

                    {{--Thông tin đơn hàng--}}
                    <div class="col-md-12">
                        <div class="order-summary clearfix">
                            <div class="section-title">
                                <h3 class="title">Thông tin đơn hàng</h3>
                            </div>
                                <table class="shopping-cart-table table">
                                    <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th></th>
                                        <th class="text-center">Đơn giá</th>
                                        <th class="text-center">Số lượng</th>
                                        <th class="text-center">Tổng</th>
                                        <th class="text-right"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $row)
                                        <tr>
                                            <td class="thumb"><img src="uploads/sanpham/{{$row['options']['img']}}" alt=""></td>
                                            <td class="details">
                                                <a href="{{url('chi-tiet-san-pham/'.$row['id'])}}">{{$row['name']}}</a>
                                                <ul>
                                                    <li><span>Size: {{$row['options']['size']}}</span></li>
                                                    <li><span>Màu: {{$row['options']['color']}}</span></li>
                                                </ul>
                                            </td>
                                            <td class="price text-center"><strong>{{number_format($row['price'])}} <u>đ</u></strong></td>
                                            <td class="qty text-center">
                                                    <input type="hidden" name="row_id" value="{{$row['rowId']}}">
                                                    <button name="down" class="fa fa-minus soluong btn"></button>
                                                    <input name="soluong" class="input spin-off btn" type="number" value="{{$row['qty']}}" min="1">
                                                    <button name="up" class="fa fa-plus soluong btn "></button>
                                                    <div class="text-danger" id="error"></div>
                                            </td>
                                            <td class="total text-center">
                                                <strong class="primary-color">{{number_format($row['subtotal'])}} <u>đ</u></strong>
                                            </td>
                                            <td class="text-right">
                                                <form method="post" action="{{url('user/gio-hang')}}">
                                                    <input type="hidden" name="row_id" value="{{$row['rowId']}}">
                                                    {{csrf_field()}}
                                                    <button class="main-btn icon-btn" name="deleteCart"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th class="empty" colspan="3"></th>
                                        <th>Tổng cộng</th>
                                        <th colspan="2" class="total" style="font-size: 18px">{{number_format($total)}} <u>đ</u><br></th>
                                    </tr>
                                    <tr>
                                        <th class="empty" colspan="3"></th>
                                        <th>Phí vận chuyển</th>
                                        <th colspan="2" class="total" style="font-size: 18px">
                                            @if($diachi != null)
                                            <span id="cpvc">
                                                <input type="hidden" id="gia_cpvc" value="{{\App\CuocPhiVanCHuyen::find($diachi[0]['dcgh_thanh_pho'])->cpvc_gia_cuoc}}">
                                                {{number_format(\App\CuocPhiVanCHuyen::find($diachi[0]['dcgh_thanh_pho'])->cpvc_gia_cuoc)}}
                                            </span> <u>đ</u>
                                            @else
                                            Chưa biết
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="empty" colspan="3"></th>
                                        <th>Mã phiếu giảm giá</th>
                                        <th colspan="2" class="total" style="font-size: 18px">
                                            <input type="text" name="pgg_ten" class="input" style="background-color: white">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="empty" colspan="3"></th>
                                        <th><h3>Tổng tiền</h3></th>
                                        <th colspan="2" class="total">
                                            @if($diachi != null)
                                            {{--Lấy tổng tiền ban đầu ban đầu (Chưa phí vận chuyển)--}}
                                            <input type="hidden" id="gia_TongTien" value="{{$total}}">
                                            {{--Lấy tổng giá sau khi tính phí vận chuyển--}}
                                            <input type="hidden" name="gia_final" id="gia_final" value="{{$total}}">
                                            <span id="TongTien">
                                            {{number_format($total + \App\CuocPhiVanCHuyen::find($diachi[0]['dcgh_thanh_pho'])->cpvc_gia_cuoc)}}
                                            </span> <u>đ</u><br>
                                            <h5>Đã bao gồm VAT (Nếu có)</h5>
                                            @else
                                            {{number_format($total)}} <u>đ</u><br>
                                            @endif
                                        </th>
                                    </tr>
                                    </tfoot>
                                </table>
                            <div class="pull-right">
                                <button class="primary-btn" name="btDatHang">
                                    Đặt hàng <i class="fa fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /row -->
            @else
                <div class="text-center" style="height: 500px">
                    <h1><i class="fa fa-warning"></i></h1>
                    <h1>Chưa có sản phẩm nào cần được thanh toán.</h1>
                    <button class="btn" onclick="window.location = '{{url('/')}}' " style="background: #D50000; color: white;">
                        <i class="fa fa-arrow-left"></i> TIẾP TỤC MUA SẮM
                    </button>
                </div>
            @endif
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection

@section('script')
    <script type="text/javascript" src="{{asset('/js/dat2.js')}}"></script>
    @if(session('status'))
        <script> alert("{{session('status')}}");</script>
    @endif
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
            //Thành phố thay đổi thì quận huyện đc mở
            $('#tp').change(function () {
                $('#qh').prop('disabled', false);
                var tp_id = $('#tp').val();
                $.get('ajax/quan-huyen/' + tp_id, function (data) {
                    $('#qh').html(data);
                });
            });
            //quận huyện thay đổi thì phường xã đc mở
            $('#qh').change(function () {
                $('#px').prop('disabled', false);
                var qh_id = $('#qh').val();
                $.get('ajax/phuong-xa/' + qh_id, function (data) {
                    $('#px').html(data);
                });
            });

            //Địa chỉ giao hàng bị thay đổi
            $('#dcgh_id').change(function () {
                var a = $(this).val();
                $('#shipping').val(a);
                var dcgh_id = $('#shipping').val();
                var total = parseInt($('#gia_TongTien').val());
                $.get('ajax/cuoc-phi/' + dcgh_id + '/' + total, function (data) {

                    //Thay đổi nội dung mức phí vận chuyển
                    $('#cuocphi').html(data['tp'] + ' - ' + data['strCuocPhi']);

                    //Thay đổi nội dung (phí vận chuyển) ở thông tin đơn hàng
                    $('#cpvc').html(data['strCuocPhi']);

                    $('#gia_cpvc').val(data['numberCuocPhi'])

                    //Thay đổi nội dung (tổng tiền) ở thông tin đơn hàng
                    $('#TongTien').html(data['strTotal']);
                    $('#gia_final').val(data['numberTotal']);
                });
            });
        });
    </script>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection