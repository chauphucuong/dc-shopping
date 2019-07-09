@extends('layouts.master-layout')

@section('title')
    <title>Chính sách đổi trả</title>
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
                <li class="active">Chính sách đổi trả</li>
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
                <h1 style="color: #D50000">Chính sách đổi trả</h1>
            </legend>
            <table border="1px" style="border-spacing: 10px">
                <tr>
                    <th class="text-center">Lý do</th>
                    <th class="text-center">Thời gian trả sản phẩm</th>
                    <th class="text-center">Chính sách đổi trả</th>
                </tr>
                <tr>
                    <th rowspan="3">Sản phẩm bị lỗi (do nhà sản xuất)</th>
                    <th rowspan="2">Tháng đầu tiên</th>
                    <td>Đổi sản phẩm tương đương (cùng model, cùng màu, cùng dung lượng,…) miễn phí.</td>
                </tr>
                <tr>
                    <td>
                        <p>Nếu khách hàng không còn nhu cầu sử dụng, Điện máy XANH sẽ mua lại sản phẩm này với g
                            iá mua có lợi nhất cho khách hàng, cụ thể là 1 trong 2 giá sau:
                        </p>
                        <p>a) 80% giá trên hóa đơn.</p>
                        <p>b) Theo giá bán hiện tại của sản phẩm đổi trả cùng model, có cùng thời gian bảo hành
                            được niêm yết trên website của <mark>DC-Shopping</mark> (nếu có).
                        </p>
                    </td>
                </tr>
                <tr>
                    <th>Tháng thứ 2 đến tháng 12</th>
                    <td>
                        <p>Gửi máy bảo hành theo đúng qui định của hãng hoặc được mua lại với giá bằng 80%
                            giá trên hóa đơn trừ thêm 5% mỗi tháng (tháng thứ 2 giá mua sẽ bằng 75% giá trên hóa đơn,
                            tháng thứ 3 giá mua sẽ bằng 70% giá trên hóa đơn,...).
                        </p>
                    </td>
                </tr>
                <tr>
                    <th rowspan="2">Sản phẩm không bị lỗi</th>
                    <th>Tháng đầu tiên</th>
                    <td>
                        <p>
                            Mua lại sản phẩm này với giá mua có lợi nhất cho khách hàng, cụ thể là 1 trong 2 giá sau:
                        </p>
                        <p>
                            a) 80% giá trên hóa đơn.
                        </p>
                        <p>
                            b) Theo giá bán hiện tại của sản phẩm đổi trả cùng model, có cùng thời gian bảo hành được
                            niêm yết trên website <mark>DC-Shopping</mark> (nếu có).
                        </p>
                    </td>
                </tr>
                <tr>
                    <th>Tháng thứ 2 đến tháng 12</th>
                    <td>
                        <p>
                            Mua lại với giá bằng 80% giá trên hóa đơn trừ thêm 5% mỗi tháng (tháng thứ 2 giá mua sẽ bằng
                            75% giá trên hóa đơn, tháng thứ 3 giá mua sẽ bằng 70% giá trên hóa đơn,...).
                        </p>
                    </td>
                </tr>
                <tr>
                    <th>Sản phẩm bị lỗi do người sử dụng (Không áp dụng bảo hành, đổi trả)</th>
                    <td colspan="2">
                        <p>
                            1. Sản phẩm không đủ điều kiện bảo hành theo quy định của hãng.
                        </p>
                        <p>
                            2. Sản phẩm không giữ nguyên 100% hình dạng ban đầu.
                        </p>
                        <p>
                            3. Điện thoại, máy tính bảng, laptop, smartwatch, tivi bị trầy xước màn hình.
                        </p>
                        <b>
                            => Khách hàng chịu phí sửa chữa.
                        </b>
                    </td>
                </tr>
            </table>
            <br>
            <b>ĐIỀU KIỆN ĐỔI TRẢ:</b>
            <p>
                - Còn đầy đủ hộp sản phẩm, phiếu bảo hành (nếu có), phụ kiện đi kèm
                (nếu có, còn sử dụng được), quà khuyến mãi (nếu có).
            </p>
            <p>
                - Trường hợp thiếu các điều kiện trên: thu phí theo qui định (mỗi món trừ tối đa 5% giá trị tổng hóa đơn).
                Ngoài ra, KHÔNG thu thêm bất kỳ phí nào khác.
            </p>
            <b>BẢO HÀNH:</b>
            <p>Theo đúng chính sách bảo hành của nhà sản xuất.</p>
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
