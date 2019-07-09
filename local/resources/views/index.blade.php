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
    @include('layouts.home')
@endsection

@section('content')
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            @if(isset($UserLogin))
            <!-- row -->
            <div class="row">
                <!-- section-title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Sản phẩm gợi ý số lượt xem </h2>
                        <div class="pull-right">
                            <div class="product-slick-dots-1 custom-dots"></div>
                        </div>
                    </div>
                </div>
                <!-- /section-title -->
                <?php
                    //Gợi ý cho khách hàng những sản phẩm tương tự của những sản phẩm mà khách hàng xem nhiều
                    $khachhang = \App\KhachHang::where('kh_email','=',Auth::user()->email)->first();
                    //Lấy 5 hành vi có số lượt xem nhiều lần cho một sản phẩm
                    $hanhviluotxem = \App\HanhVi::where('hv_kh_id','=',$khachhang->kh_id)->orderBy('hv_so_lan_xem','desc')->take(5)->get();
                    //Tạo mảng để xóa giá trị trùng danh mục sản phẩm
                    $list = array();
                    foreach($hanhviluotxem as $hvlx){
                        $list[] = \App\SanPham::select('sp_danh_muc_id')->where('sp_id','=',$hvlx->hv_sp_id)->first();
                    }
                    $listdanhmuc=array_unique($list,0);       // xóa bỏ các danh mục sản phẩm giống nhau
                ?>
                <!-- Product Slick -->
                <div class="col-md-12 col-sm-6 col-xs-6">
                    <div class="row">
                        <div id="product-slick-1" class="product-slick">
                        @foreach($listdanhmuc as $ldm)
                            <!-- Product Single -->
                                <?php
                                $sanpham = \App\SanPham::where('sp_danh_muc_id','=',$ldm->sp_danh_muc_id)->first();
                                //chỉ lấy 5 sản phẩm tương tự
                                $sanphamtuongtu = \App\SanPham::where('sp_danh_muc_id',$sanpham->sp_danh_muc_id)
                                ->where('sp_id','<>',$sanpham->sp_id)->take(5)->get()->toArray();
                                ?>
                                
                                @foreach($sanphamtuongtu as $sp)
                                <?php

                                    //Lấy hình ảnh đầu tiên trong list hình ảnh của sản phẩm
                                    $image = \App\HinhAnhSanPham::where('hasp_sp_id', $sp['sp_id'])->first();

                                    //Lấy ngày hiện tại
                                    $now = \Carbon\Carbon::now('Asia/Ho_Chi_Minh');

                                    //So sánh ngày hiện tại cách ngày bán sản phẩm là bao nhiêu ngày
                                    $checkDay = $now->diffInDays($sp['created_at']);

                                    //Lấy loại thuế của sản phẩm
                                    $mucthue = \App\MucThue::find($sp['sp_muc_thue_id']);

                                    //Tim xem sản phẩm này có nằm trong loại sản phẩm khuyến mãi hay không
                                    $khuyenmai = \App\LoaiKhuyenMai::find($sp['sp_khuyen_mai_id']);

                                    if ($khuyenmai->km_id != 2) {
                                        //Ngày bắt đầu và ngày kết thúc khuyến mãi
                                        $end = Carbon\Carbon::parse($khuyenmai['km_ngay_ket_thuc']);
                                        $start = \Carbon\Carbon::parse($khuyenmai['km_ngay_bat_dau']);

                                        $ngay = $now->diffInDays($end);
                                        $gio = $end->hour - $now->hour;
                                        $phut = $end->minute - $now->minute;
                                        $giay = $end->second - $now->second;

                                        //Biến checkKM để kiểm tra ngày hiện tại có nằm trong ngày bắt đầu và
                                        //ngày kết thúc khuyến mãi hay không
                                        $checkKM = $now->between($start, $end);
                                    }
                                ?>
                                <div class="product product-single" title="{{$sp['sp_ten']}}">
                                    <div class="product-thumb">
                                        <div class="product-label">
                                            <span>New</span>
                                            @if($khuyenmai->km_id != 2 && $checkKM == true)
                                                <span class="sale">-{{$khuyenmai->km_gia}}%</span>
                                        </div>
                                        <ul class="product-countdown">
                                            @if($ngay > 0)
                                                <li><span id="ngay">Còn {{$ngay}} ngày</span></li>
                                            @elseif($gio > 0)
                                                <li><span id="gio">Còn {{$gio}} tiếng</span></li>
                                            @elseif($phut > 0)
                                                <li><span id="phut">Còn {{$phut}} phút</span></li>
                                            @elseif($giay > 0)
                                                <li><span id="giay">Còn {{$giay}} giây</span></li>
                                            @endif
                                        </ul>
                                        @else
                                    </div>
                                    @endif
                                    <button class="main-btn quick-view"
                                            onclick="window.location = '{{url('chi-tiet-san-pham/'.$sp['sp_id'])}}'">
                                        <i class="fa fa-search-plus"></i> Chi tiết
                                    </button>
                                    <img src="{{asset('uploads/sanpham/'.$image->hasp_ten)}}" alt="">
                                </div>
                                <div class="product-body">
                                    {{--Giá sản phẩm--}}
                                    <h3 class="text-center product-price">
                                        @if($checkKM == true)
                                            {{--Nếu là sản phẩm khuyến mãi sẽ có giá gốc kèm theo--}}
                                            {{number_format($sp['sp_gia_ban'])}} <u>đ</u>
                                            <del class="product-old-price">
                                                {{-- Giá cũ = giá bán hiện tại / 1 - (giá khuyến mãi/100))--}}
                                                {{number_format($sp['sp_gia_ban'] / (1 - ($khuyenmai['km_gia']/100)))}}
                                                <u>đ</u>
                                            </del>
                                        @else
                                            {{-- Nếu ko phải là sản phẩm khuyến mãi: lấy giá bán hiện tại(đã tính thuế) --}}
                                            {{number_format($sp['sp_gia_ban'])}} <u>đ</u>
                                        @endif
                                    </h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o empty"></i>
                                    </div>
                                    <h2 class="product-name"
                                        style="overflow: hidden ;white-space: nowrap;text-overflow: ellipsis;">
                                        <a href="{{url('chi-tiet-san-pham/'.$sp['sp_id'])}}"
                                           style="font-family: 'Arial'">
                                            {{$sp['sp_ten']}}
                                        </a>
                                    </h2>
                                    <div class="product-btns text-center">
                                        {{--Nút yêu thích--}}
                                        @if(isset($UserLogin))  {{--Nếu khách hàng đã đăng nhập--}}
                                        <?php
                                        //Tìm xem sản phẩm này có được khách hàng đó yêu thích hay không
                                        $yeuthich = 0;
                                        if (isset($Customer)) {
                                            $yeuthich = \App\SanPhamYeuThich::where('spyt_sp_id', $sp['sp_id'])
                                                ->where('spyt_kh_id', $Customer['kh_id'])->count();
                                        }
                                        ?>
                                        <button class="main-btn icon-btn" name="btLove"
                                                @if($yeuthich > 0) {{--Nếu sản phẩm đã đc yêu thích--}}
                                                style="color: #D50000;"
                                                title="Bỏ yêu thích"
                                                @else
                                                style="color: #30323A;"
                                                title="Yêu thích"
                                                @endif
                                                onclick="
                                                        /*Biến vitri để lấy vị trí ban đầu trong trang html*/
                                                        var a = document.documentElement.scrollTop;
                                                        window.location = '{{url('love/'.$sp['sp_id'].'/'.$UserLogin->nd_id)}}' + '/' + a;">
                                            <i class="fa fa-heart"></i>
                                        </button>
                                        @endif

                                        {{--Nút mua hàng--}}
                                        <button class="btn primary-btn add-to-cart"
                                                onclick=" window.location = '{{url('chi-tiet-san-pham/'.$sp['sp_id'])}}'">
                                            Mua ngay
                                        </button>
                                    </div>
                                </div>
                        </div>
                        @endforeach
                        <!-- /Product Single -->
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- /Product Slick -->
            </div>
            @endif
            
        <!-- /row -->
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Sản phẩm khuyến mãi</h2>
                    <lable>
                        <a href="{{url('muc-san-pham/san-pham-khuyen-mai')}}">
                            (Xem tất cả {{count($sanphamkhuyenmai)}} sản phẩm)
                        </a>
                    </lable>
                    <div class="pull-right">
                        <div class="product-slick-dots-2 custom-dots">
                        </div>
                    </div>
                </div>
            </div>
            <!-- section title -->
            <!-- Product Slick -->
            <div class="col-md-12">
                <div class="row">
                    <div id="product-slick-2" class="product-slick">
                    @foreach($sanphamkhuyenmai as $spkm)
                        <!-- Product Single -->
                            <?php

                            //Lấy hình ảnh đầu tiên trong list hình ảnh của sản phẩm
                            $image = \App\HinhAnhSanPham::where('hasp_sp_id', $spkm['sp_id'])->first();

                            //Lấy ngày hiện tại
                            $now = \Carbon\Carbon::now('Asia/Ho_Chi_Minh');

                            //So sánh ngày hiện tại cách ngày bán sản phẩm là bao nhiêu ngày
                            $checkDay = $now->diffInDays($spkm['created_at']);

                            //Tim xem sản phẩm này có nằm trong loại sản phẩm khuyến mãi hay không
                            $khuyenmai = \App\LoaiKhuyenMai::find($spkm['sp_khuyen_mai_id']);

                            //Tìm xem sản phẩm này có được khách hàng đó yêu thích hay không
                            $yeuthich = 0;
                            if (isset($Customer)) {
                                $yeuthich = \App\SanPhamYeuThich::where('spyt_sp_id', $spkm['sp_id'])
                                    ->where('spyt_kh_id', $Customer['kh_id'])->count();
                            }

                            //Ngày bắt đầu và ngày kết thúc khuyến mãi
                            $end = Carbon\Carbon::parse($khuyenmai['km_ngay_ket_thuc']);
                            $start = \Carbon\Carbon::parse($khuyenmai['km_ngay_bat_dau']);

                            $ngay = $now->diffInDays($end);
                            $gio = $end->hour - $now->hour;
                            $phut = $end->minute - $now->minute;
                            $giay = $end->second - $now->second;

                            //Biến checkKM để kiểm tra ngày hiện tại có nằm trong ngày bắt đầu và
                            //ngày kết thúc khuyến mãi hay không
                            $checkKM = $now->between($start, $end);

                            ?>
                            @if($khuyenmai->km_id != 2 && $checkKM == true)
                                <div class="product product-single">
                                    <div class="product-thumb">
                                        <div class="product-label">
                                            @if($checkDay <= 30)
                                                <span>New</span>
                                            @endif
                                            <span class="sale">-{{$khuyenmai->km_gia}}%</span>
                                        </div>
                                        <ul class="product-countdown">
                                            @if($ngay > 0)
                                                <li><span id="ngay">Còn {{$ngay}} ngày</span></li>
                                            @elseif($gio > 0)
                                                <li><span id="gio">Còn {{$gio}} tiếng</span></li>
                                            @elseif($phut > 0)
                                                <li><span id="phut">Còn {{$phut}} phút</span></li>
                                            @elseif($giay > 0)
                                                <li><span id="giay">Còn {{$giay}} giây</span></li>
                                            @endif
                                        </ul>
                                        <button class="main-btn quick-view"
                                                onclick="window.location = '{{url('chi-tiet-san-pham/'.$spkm['sp_id'])}}'">
                                            <i class="fa fa-search-plus"></i> Chi tiết
                                        </button>
                                        <img src="{{asset('uploads/sanpham/'.$image->hasp_ten)}}" alt="">
                                    </div>
                                    <div class="product-body">
                                        <h3 class="text-center product-price">
                                            @if($checkKM == true)
                                                {{--Nếu là sản phẩm khuyến mãi sẽ có giá gốc kèm theo--}}
                                                {{number_format($spkm['sp_gia_ban'])}} <u>đ</u>
                                                <del class="product-old-price">
                                                    {{-- Giá cũ = giá bán hiện tại / 1 - (giá khuyến mãi/100))--}}
                                                    {{number_format($spkm['sp_gia_ban'] / (1 - ($khuyenmai['km_gia']/100)))}}
                                                    <u>đ</u>
                                                </del>
                                            @else
                                                {{-- Nếu ko phải là sản phẩm khuyến mãi: lấy giá bán hiện tại(đã tính thuế) --}}
                                                {{number_format($spkm['sp_gia_ban'])}} <u>đ</u>
                                            @endif
                                        </h3>
                                        <h2 class="product-name"
                                            style="overflow: hidden ;white-space: nowrap;text-overflow: ellipsis;">
                                            <a href="{{url('chi-tiet-san-pham/'.$spkm['sp_id'])}}"
                                               style="font-family: 'Arial'">
                                                {{$spkm['sp_ten']}}
                                            </a>
                                        </h2>
                                        <div class="product-btns text-center">
                                            {{--Nút yêu thích--}}
                                            @if(Auth::check())  {{--Nếu khách hàng đã đăng nhập--}}
                                            <button class="main-btn icon-btn" name="btLove"
                                                    @if($yeuthich > 0) {{--Nếu sản phẩm đã đc yêu thích--}}
                                                    style="color: #D50000;"
                                                    title="Bỏ yêu thích"
                                                    @else
                                                    style="color: #30323A;"
                                                    title="Yêu thích"
                                                    @endif
                                                    onclick="
                                                            /*Biến vitri để lấy vị trí ban đầu trong trang html*/
                                                            var vitri = document.documentElement.scrollTop;
                                                            window.location = '{{url('love/'.$spkm['sp_id'].'/'.$UserLogin->nd_id)}}' + '/' + vitri;">
                                                <i class="fa fa-heart"></i>
                                            </button>
                                            @endif

                                            {{--Nút mua hàng--}}
                                            <button class="btn primary-btn add-to-cart"
                                                    onclick=" window.location = '{{url('chi-tiet-san-pham/'.$spkm['sp_id'])}}'">
                                                Mua ngay
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        <!-- /Product Single -->
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- /Product Slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
    </div>
    
    <!-- /section -->
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Sản phẩm bán chạy</h2>
                    </div>
                </div>
                <!-- section title -->

                <!-- Product Single -->
            @foreach($sanphambanchay as $row)
                <?php
                //Đếm số lượt mua hàng của sản phẩm
                $buy = \App\ChiTietDonHang::where('ctdh_sp_id', $row['sp_id'])->count();

                //Lấy hình ảnh đầu tiên trong list hình ảnh của sản phẩm
                $image = \App\HinhAnhSanPham::where('hasp_sp_id', $row['sp_id'])->first();

                //Lấy ngày hiện tại
                $now = \Carbon\Carbon::now('Asia/Ho_Chi_Minh');

                //So sánh ngày hiện tại cách ngày bán sản phẩm là bao nhiêu ngày
                $checkDay = $now->diffInDays($row['created_at']);

                //Tim xem sản phẩm này có nằm trong loại sản phẩm khuyến mãi hay không
                $khuyenmai = \App\LoaiKhuyenMai::find($row['sp_khuyen_mai_id']);


                //Ngày bắt đầu và ngày kết thúc khuyến mãi
                $end = Carbon\Carbon::parse($khuyenmai['km_ngay_ket_thuc']);
                $start = \Carbon\Carbon::parse($khuyenmai['km_ngay_bat_dau']);

                $ngay = $now->diffInDays($end);
                $gio = $end->hour - $now->hour;
                $phut = $end->minute - $now->minute;
                $giay = $end->second - $now->second;

                //Biến checkKM để kiểm tra ngày hiện tại có nằm trong ngày bắt đầu và
                //ngày kết thúc khuyến mãi hay không
                $checkKM = $now->between($start, $end);

                ?>
                @if($buy > 0)
                    <!-- Product Single -->
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <div class="product product-single text-center" title="{{$row['sp_ten']}}">
                                <div class="product-thumb">
                                    {{--Phần sản phẩm mới / khuyến mãi--}}
                                    <div class="product-label">
                                        {{--Nếu ngày bắt đầu bán sản phẩm < 30 ngày thì được xem là sản phẩm mới--}}
                                        @if($checkDay <= 30)
                                            <span>New</span>
                                        @endif
                                        @if($khuyenmai->km_id != 2 && $checkKM == true)

                                            <span class="sale">-{{$khuyenmai->km_gia}}%</span>
                                    </div>
                                    <ul class="product-countdown">
                                        @if($ngay > 0)
                                            <li><span id="ngay">Còn {{$ngay}} ngày</span></li>
                                        @elseif($gio > 0)
                                            <li><span id="gio">Còn {{$gio}} tiếng</span></li>
                                        @elseif($phut > 0)
                                            <li><span id="phut">Còn {{$phut}} phút</span></li>
                                        @elseif($giay > 0)
                                            <li><span id="giay">Còn {{$giay}} giây</span></li>
                                        @endif
                                    </ul>
                                    @else
                                </div>

                                @endif
                                {{--/Phần sản phẩm mới / khuyến mãi--}}

                                <button class="main-btn quick-view"
                                        onclick="window.location = '{{url('chi-tiet-san-pham/'.$row['sp_id'])}}'">
                                    <i class="fa fa-search-plus"></i> Chi tiết
                                </button>
                                {{-- Hình ảnh sản phẩm --}}
                                <img src="{{asset('uploads/sanpham/'.$image->hasp_ten)}}" alt="">
                            </div>
                            <div class="product-body">
                                {{--Giá sản phẩm--}}
                                <h3 class="text-center product-price">
                                    @if($checkKM == true)
                                        {{--Nếu là sản phẩm khuyến mãi sẽ có giá gốc kèm theo--}}
                                        {{number_format($row['sp_gia_ban'])}} <u>đ</u>
                                        <del class="product-old-price">
                                            {{-- Giá cũ = giá bán hiện tại / 1 - (giá khuyến mãi/100))--}}
                                            {{number_format($row['sp_gia_ban'] / (1 - ($khuyenmai['km_gia']/100)))}} <u>đ</u>
                                        </del>
                                    @else
                                        {{-- Nếu ko phải là sản phẩm khuyến mãi: lấy giá bán hiện tại(đã tính thuế) --}}
                                        {{number_format($row['sp_gia_ban'])}} <u>đ</u>
                                    @endif
                                </h3>
                                <h2 class="product-name"
                                    style="overflow: hidden ;white-space: nowrap;text-overflow: ellipsis;">
                                    <a href="{{url('chi-tiet-san-pham/'.$row['sp_id'])}}" style="font-family: 'Arial'">
                                        {{$row['sp_ten']}}
                                    </a>
                                </h2>
                                <div class="product-btns text-center">
                                    {{--Nút yêu thích--}}
                                    @if(isset($UserLogin))  {{--Nếu khách hàng đã đăng nhập--}}
                                    <?php
                                    //Tìm xem sản phẩm này có được khách hàng đó yêu thích hay không
                                    if (isset($Customer)) {
                                        $yeuthich = \App\SanPhamYeuThich::where('spyt_sp_id', $row['sp_id'])
                                            ->where('spyt_kh_id', $Customer['kh_id'])->count();
                                    }
                                    ?>
                                    <button class="main-btn icon-btn" name="btLove"
                                            @if($yeuthich > 0) {{--Nếu sản phẩm đã đc yêu thích--}}
                                            style="color: #D50000;"
                                            title="Bỏ yêu thích"
                                            @else
                                            style="color: #30323A;"
                                            title="Yêu thích"
                                            @endif
                                            onclick="
                                                    /*Biến vitri để lấy vị trí ban đầu trong trang html*/
                                                    var a = document.documentElement.scrollTop;
                                                    window.location = '{{url('love/'.$row['sp_id'].'/'.$UserLogin->nd_id)}}' + '/' + a;">
                                        <i class="fa fa-heart"></i>
                                    </button>
                                    @endif

                                    {{--Nút mua hàng--}}
                                    <button class="btn primary-btn add-to-cart"
                                            onclick=" window.location = '{{url('chi-tiet-san-pham/'.$row['sp_id'])}}'">
                                        Mua ngay
                                    </button>
                                </div>
                            </div>
                        </div>
            </div>
            <!-- /Product Single -->
        @endif
        @endforeach
        <!-- /Product Single -->
        </div>
        <!-- /row -->
        <!-- row -->
        <div class="row">
            <!-- section-title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Thương hiệu</h2>
                    <lable>
                        (Có tất cả {{count($nhasanxuat)}} thương hiệu)
                    </lable>
                    <div class="pull-right">
                        <div class="product-slick-dots-3 custom-dots"></div>
                    </div>
                </div>
            </div>
            <!-- /section-title -->

            <!-- Product Slick -->
            <div class="col-md-12 col-sm-6 col-xs-6">
                <div class="row">
                    <div id="product-slick-3" class="product-slick">
                    @foreach($nhasanxuat as $nsx)
                        <!-- banner -->
                            <div class="banner text-center">
                                <img src="uploads/nhasanxuat/{{$nsx->nsx_hinh_anh}}" style="width: 100%; height: 200px">
                                <div class="banner-caption">
                                    <a href="{{url('nha-san-xuat/'.$nsx->nsx_id)}}" class="primary-btn">Xem</a>
                                </div>
                            </div>
                            <!-- /banner -->
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- /Product Slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
    </div>
    <!-- /section -->
@endsection

@section('script')
    <script type="text/javascript" src="{{asset('/js/dat1.js')}}"></script>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
