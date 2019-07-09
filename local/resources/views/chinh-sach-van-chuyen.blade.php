@extends('layouts.master-layout')

@section('title')
    <title>Chính sách vận chuyển</title>
@endsection

@section('header')
    @include('layouts.header')
@endsection

@section('navigation')
    @include('layouts.nav')
@endsection

@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li class="active">Chính sách vận chuyển</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container" style="background-color: white; font-family: Arial; font-size: 18px">
            <!-- row -->
            <legend>
                <h1 style="color: #D50000">Chính sách vận chuyển</h1>
            </legend>
            <p>
                <mark>DC-Shopping</mark> cung cấp dịch vụ giao hàng cho khách hàng trong nội đô các tỉnh thành
                (Hà Nội, Đà Nẵng, Hải Phòng, Tp.Hồ Chí Minh) trung bình từ 1-4 ngày làm việc.
            </p>

            <b>THỜI GIAN GỬI HÀNG</b>
            <p>
                – Nhằm đảm bảo sự chính xác và an toàn cho tất cả hàng hóa khi gởi, <mark>DC-Shopping</mark> sẽ làm thủ tục gởi hàng
                cho tất cả đơn hàng vào buổi chiều của ngày làm việc.
            </p>
            <p>
                – Những khách hàng thanh toán trước 16:00 chiều sẽ được gửi hàng trong vòng 1-3 ngày làm việc.
            </p>
            <p>
                – Những khách hàng thanh toán sau 16:00 chiều sẽ được gửi hàng trong vòng 2-4 ngày.
            </p>
            <p>
                – Trong trường hợp khẩn cấp, khách hàng có thể liên hệ với phòng Chăm Sóc Khách Hàng để thay đổi thời gian gửi hàng.
            </p>
            <p>
                Điện Thoại: 0121987654 ( 8:30 A.m-10: 00P.m)
            </p>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection

@section('script')
    <script type="text/javascript" src="{{asset('/js/dat2.js')}}"></script>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
