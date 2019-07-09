@extends('layouts.master-layout')

@section('title')
    <title>Giới thiệu</title>
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
                <li class="active">Giới thiệu</li>
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
                    <h1 style="color: #D50000">Giới thiệu</h1>
                </legend>
                <p>
                    Hầu hết mỗi công ty đều có bài giới thiệu về doanh nghiệp mình, nhưng để có được một bài giới thiệu đầy đủ,
                    hiệu quả để chinh phục được khách hàng cũng như đối tác thì không phải doanh nghiệp nào cũng làm được.
                </p>

                <p>
                    Đặc biệt khi mà nền kinh tế vẫn còn khủng hoảng với rất nhiều khó khăn càng đẩy sự cạnh tranh lên cao,
                    thì một bài giới thiệu tốt sẽ là một yếu tố không nhỏ giúp Doanh nghiệp bạn chứng tỏ được khả năng
                    cũng như thế mạnh của mình. Ngoài ra với một bài giới thiệu được trình bày một cách chuyên nghiệp,
                    sẽ đem lại sự thiện cảm ban đầu cho người xem, đó là một lợi thế mà các doanh nghiệp nên nắm bắt.
                </p>

                <p>
                    Nếu như về phần giới thiệu sản phẩm thường có rất nhiều bài khác nhau, nhưng với bài giới thiệu doanh nghiệp
                    lại chỉ có một. Chính vì vậy cần một sự đầu tư kỹ lưỡng cả về nội dung lẫn hình thức, vì nó phần nào
                    thể hiện bộ mặt của toàn doanh nghiệp.
                </p>

                <b>Vậy làm sao để có bài giới thiệu doanh nghiệp hoàn thiện và thu hút người xem tối ưu nhất ?</b>
                <p>
                    Trước tiên, bài giới thiệu cần có phần tóm lược đầy đủ mọi thông tin về Doanh nghiệp gồm :
                    lịch sử hình thành và phát triển. Tên đầy đủ của doanh nghiệp.
                </p>
                <p>
                    Sau đó giới thiệu tổng quát về ngành nghề hoạt động, mạng lưới hoạt động. Và điều cuối cùng là
                    những mục tiêu hướng đến cùng những thành quả đã đạt được….
                </p>
                <p>
                    Bên cạnh bố cục thông thường thì bài giới thiệu cần được viết một cách ngắn gọn và súc tích nhất nhằm đưa đến
                    cho người đọc nhanh chóng nắm rỏ về công ty, doanh nghiệp. Do đó việc lựa chọn từ ngữ cũng hết sức quan trọng.
                    Các từ ngữ phải diễn đạt tốt và logic cũng như truyền tải được những mong muốn của ban điều hành doanh nghiệp đưa ra.
                </p>
                <p>
                    Song song với những bài giơi thiệu được đăng trên những trang web chính của doanh nghiệp, thì các bài viết
                    giới thiệu còn hết sức cần thiết và hữu hiệu hơn khi được đăng lên các website uy tín có sức tuyên truyền và
                    quảng bá rộng. Điều này giúp hình ảnh thương hiệu công ty bạn đến gần với các đối tác, khách hàng.
                </p>
                <p>
                    Cũng chính vì được nhiều người biết đến, do đó những bài viết như thế cần nhiều sự chăm chút hơn.
                    Ngoài mục đích giới thiệu đến mọi người thì bài viết này cần hướng người đọc đến hành vi mua hàng hoặc ít nhất
                    là ghé thăm website chính.
                </p>
                <p>
                    Đó chính là vấn đề cốt lõi mà một bài viết giới thiệu cần làm được, và để làm được điều đó thì người viết
                    phải là một người giỏi về khả năng diễn đạt, chuyên sâu về lĩnh vực viết lời giới thiệu, quảng cáo
                    cũng như sự tìm hiểu sâu sắc về doanh nghiệp ấy. Có như vậy thì bài viết giới thiệu mới phát huy
                    hết sức mạnh và đem lại nguồn khách hàng tiềm năng cho Doanh nghiệp.
                </p>
                <b> Doanh nghiệp bạn đã có những bài giới thiệu như thế chưa ?</b>
                <p>
                    Đừng bỏ qua một cơ hội nào vì khách hàng luôn tin tưởng, lựa chọn những doanh nghiệp có sự đầu tư
                    kỹ lưỡng, chuyên nghiệp về hình ảnh thương hiệu cũng như có sự quảng bá rộng rãi.
                    Ngoài ra, quảng bá trên website chính là sự quảng bá nhanh chóng và mang lại hiệu quả lâu dài.
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
