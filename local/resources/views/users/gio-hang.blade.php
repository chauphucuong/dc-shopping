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
    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li class="active">Giỏ hàng</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                {{--Danh sách giỏ hàng--}}
                <div class="col-md-12">
                    <div class="order-summary clearfix">
                        <div class="section-title">
                            <h3 class="title"><i class="fa fa-shopping-cart"></i> Giỏ hàng</h3>
                        </div>
                        @if($data != null)
                        <table class="shopping-cart-table table">
                            <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th></th>
                                <th class="text-center">Đơn giá</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-center">Tổng tiền</th>
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
                                <td class="price text-center"><strong>{{$row['price']}}</strong></td>
                                <td class="qty text-center">
                                    <form method="post" action="{{url('user/gio-hang')}}">
                                        {{csrf_field()}}
                                        <input type="hidden" name="row_id" value="{{$row['rowId']}}">
                                        <button name="down" class="fa fa-minus soluong btn"></button>
                                        <input name="soluong" class="input spin-off btn" type="number" value="{{$row['qty']}}" min="1">
                                        <button name="up" class="fa fa-plus soluong btn "></button>
                                    <form>
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
                                <th colspan="2" class="total">{{number_format($total)}} <u>đ</u><br>
                                    <h5> Đã bao gồm VAT (Nếu có)</h5>
                                </th>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="pull-right">
                                <button class="primary-btn" onclick="window.location = '{{url('user/thanh-toan')}}'">
                                    Thanh toán <i class="fa fa-arrow-right"></i>
                                </button>
                        </div>
                        @else
                        <div class="text-center" style="height: 500px">
                            <h1><i class="fa fa-shopping-cart"></i></h1>
                            <h1>Chưa có sản phẩm nào được thêm vào giỏ hàng.</h1>
                            <button class="btn" onclick="window.location = '{{url('/')}}' " style="background: #D50000; color: white;">
                               <i class="fa fa-arrow-left"></i> TIẾP TỤC MUA SẮM
                            </button>
                        </div>
                        @endif
                    </div>
                </div>
                {{--/Danh sách giỏ hàng--}}
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