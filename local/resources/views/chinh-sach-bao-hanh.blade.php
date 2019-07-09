@extends('layouts.master-layout')

@section('title')
    <title>Chính sách bảo hành</title>
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
                <li class="active">Chính sách bảo hành</li>
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
                <h1 style="color: #D50000">Chính sách bảo hành</h1>
            </legend>
            <p>
                Bảo hành sản phẩm là: khắc phục những lỗi hỏng hóc, sự cố kỹ thuật xảy ra do lỗi của nhà sản xuất.
            </p>
            <b>1. QUY ĐỊNH VỀ BẢO HÀNH</b>
            <p>
                - Sản phẩm được bảo hành miễn phí nếu sản phẩm đó còn thời hạn bảo hành được tính kể từ ngày giao hàng,
                sản phẩm được bảo hành trong thời hạn bảo hành ghi trên Sổ bảo hành, Tem bảo hành và theo quy định
                của từng hãng sản xuất liên quan đến tất cả các sự cố về mặt kỹ thuật.
            </p>
            <P>
                - Có Phiếu bảo hành và Tem bảo hành của công ty hoặc nhà phân phối, hãng trên sản phẩm.
                Trường hợp sản phẩm không có số serial ghi trên Phiếu bảo hành thì phải có Tem bảo hành của Công ty.
            </P>
            <b>2. NHỮNG TRƯỜNG HỢP KHÔNG ĐƯỢC BẢO HÀNH</b>
            <p>
                - Sản phẩm đã hết thời hạn bảo hành hoặc mất Phiếu bảo hành.
            </p>
            <p>
                - Số mã vạch, số serial trên sản phẩm không xác định được hoặc sai so với Phiếu bảo hành.
            </p>
            <p>
                - Các loại thiết bị như pin Cmos, cable, nắn dòng, công tắc nguồn, đèn tín hiệu, tai nghe theo thiết bị,
                điều khiển từ xa, quạt trên thiết bị hoặc thiết bị do quạt bị hỏng gây ra cháy nổ.
            </p>
            <p>
                - Các dữ liệu, tài liệu, văn bản và phần mềm cung cấp miễn phí, lưu trữ kèm theo sản phẩm
                (kể cả trong thời gian gửi bảo hành).
            </p>
            <p>
                - Tự ý tháo dỡ, sửa chữa bởi các cá nhân hoặc kỹ thuật viên không phải là nhân viên Công ty.
            </p>
            <p>
                - Sản phẩm bị cháy nổ hay hỏng hóc do tác động cơ học, biến dạng, rơi, vỡ, va đập, bị xước,
                bị hỏng do ẩm ướt, hoen rỉ, chảy nước, động vật xâm nhập vào, thiên tai, hỏa hoạn, sử dụng sai điện áp quy định.
            </p>
            <p>
                - Hư hỏng đối các trường hợp riêng như CPU cong hoặc gãy chân, ổ cứng nứt, vỡ IDE, cháy nổ, rơi móp méo,
                mờ chữ trên lưng ổ, bong tem bạc, mạch hoen rỉ, oxy hóa.
            </p>
            <p>
                - Phiếu bảo hành, Tem bảo hành bị rách, không còn Tem bảo hành, Tem bảo hành dán đè,
                hoặc Tem bảo hành bị sửa đổi (kể cả Tem bảo hành gốc).
            </p>
            <p>
                - Bảo hành không bao gồm vận chuyển hàng và giao hàng.
            </p>

            <p>
                - Một số trường hợp đặc biệt của từng nhà sản xuất như các loại máy in kim, in phun,
                in laser của các hãng Epson, HP, Canon... không bảo hành: băng mực, hộp mực, lô sấy, đầu kim...
                và không bảo hành khi có dấu hiệu côn trùng vào trong máy. Đối với các loại máy tính nguyên chiếc của
                các hãng IBM, HP..., theo quy định được bảo hành 36 tháng thì trong 12 tháng bảo hành đầu tiên,
                Quý khách hàng sẽ được bảo hành hoàn toàn miễn phí, năm tiếp theo mỗi lần bảo hành thiết bị khi phải
                thay thế Quý khách vui lòng chịu chi phí trong những lần thay thế (tại thời điểm hiện nay,
                chi phí quy định là 200.000 đồng/01 linh kiện/thiết bị thay thế bất kể là thiết bị nào).
                Tất cả các trường hợp trên đều theo quy chuẩn chung của hãng, nhà sản xuất.

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
