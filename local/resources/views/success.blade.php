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
                {{--Danh sách giỏ hàng--}}
                <div class="col-md-12">
                    <div class="order-summary clearfix text-center">
                        <div>
                            <h1 style="color: #D50000;"><i class="fa fa-check-circle"></i> SUCCESS</h1>
                        </div>
                        <div class="section-title">
                            <h3 class="title"><i class="fa fa-shopping-cart"></i> Bạn vừa mua hàng thành công với danh sách sản phẩm</h3>
                        </div>
                        @if($data != null)
                            <table class="shopping-cart-table table">
                                <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th></th>
                                    <th class="text-center">Đơn giá</th>
                                    <th class="text-center">Số lượng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $row)
                                    <tr>
                                        <td class="thumb"><img src="uploads/sanpham/{{$row['options']['img']}}" alt=""></td>
                                        <td class="details text-left">
                                            <a href="{{url('chi-tiet-san-pham/'.$row['id'])}}">{{$row['name']}}</a>
                                            <ul>
                                                <li><span>Size: {{$row['options']['size']}}</span></li>
                                                <li><span>Màu: {{$row['options']['color']}}</span></li>
                                            </ul>
                                        </td>
                                        <td class="price text-center"><strong>{{$row['price']}}</strong></td>
                                        <td class="qty text-center">
                                            <input name="soluong" class="input spin-off btn" type="number" value="{{$row['qty']}}" min="1" readonly>
                                        </td>
                                    </tr>
                                    <?php Cart::remove($row['rowId']); ?>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th colspan="4" class="text-center">
                                        <h2>Với tổng số tiền là {{number_format($total)}} <u>đ</u><br></h2>
                                        <h5> Đã bao gồm phí vận chuyển và VAT (Nếu có)</h5>
                                    </th>
                                </tr>
                                </tfoot>
                            </table>
                            <div>
                                <button class="primary-btn" onclick="window.location = '{{url('/')}}'">
                                    Tiếp tục mua hàng <i class="fa fa-arrow-right"></i>
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
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Sản phẩm đánh giá 5 sao</h2>
                        <lable>
                            <a href="{{url('muc-san-pham/san-pham-khuyen-mai')}}">
                                {{-- (Xem tất cả {{  count($hanhvi)}} sản phẩm) --}}
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
                <?php 
                    $khachhang = \App\KhachHang::where('kh_email','=',Auth::user()->email)->first();
                    $hanhvirating = \App\HanhVi::where('hv_kh_id','=',$khachhang->kh_id)->where('hv_rating','>',4)->orderBy('hv_so_lan_xem','desc')->take(5)->get();
                        //Tạo mảng để xóa giá trị trùng danh mục sản phẩm
                    $list = array();
                    foreach($hanhvirating as $hvlx){
                        $list[] = \App\SanPham::select('sp_danh_muc_id')->where('sp_id','=',$hvlx->hv_sp_id)->first();
                    }
                    $listdanhmuc=array_unique($list,0);       // xóa bỏ các danh mục sản phẩm giống nhau
                ?>
                <div class="col-md-12">
                    <div class="row">
                        <div id="product-slick-2" class="product-slick">
                        @foreach($listdanhmuc as $ldm)
                        <!-- Product Single -->
                            <?php
                            $sanpham = \App\SanPham::where('sp_danh_muc_id','=',$ldm->sp_danh_muc_id)->take(5)->get()->toArray();
                            ?>
                            @foreach($sanpham as $sp)
                            <!-- Product Single -->
                                <?php
    
                                //Lấy hình ảnh đầu tiên trong list hình ảnh của sản phẩm
                                $image = \App\HinhAnhSanPham::where('hasp_sp_id', $sp['sp_id'])->first();
                                $rating = \App\HanhVi::where('hv_sp_id','=',$sp['sp_id'])->where('hv_rating','=',5)->first();
                                //Lấy ngày hiện tại
                                $now = \Carbon\Carbon::now('Asia/Ho_Chi_Minh');
    
                                //So sánh ngày hiện tại cách ngày bán sản phẩm là bao nhiêu ngày
                                $checkDay = $now->diffInDays($sp['created_at']);
    
                                //Tim xem sản phẩm này có nằm trong loại sản phẩm khuyến mãi hay không
                                $khuyenmai = \App\LoaiKhuyenMai::find($sp['sp_khuyen_mai_id']);
    
                                //Tìm xem sản phẩm này có được khách hàng đó yêu thích hay không
                                $yeuthich = 0;
                                if (isset($Customer)) {
                                    $yeuthich = \App\SanPhamYeuThich::where('spyt_sp_id', $sp['sp_id'])
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
                                @if($rating != null)
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
                                                        onclick="window.location = '{{url('chi-tiet-san-pham/'.$sp['sp_id'])}}'">
                                                    <i class="fa fa-search-plus"></i> Chi tiết
                                                </button>
                                                <img src="{{asset('uploads/sanpham/'.$image->hasp_ten)}}" alt="">
                                            </div>
                                            <div class="product-body">
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
                                                <h2 class="product-name"
                                                    style="overflow: hidden ;white-space: nowrap;text-overflow: ellipsis;">
                                                    <a href="{{url('chi-tiet-san-pham/'.$sp['sp_id'])}}"
                                                    style="font-family: 'Arial'">
                                                        {{$sp['sp_ten']}}
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
                                                                    window.location = '{{url('love/'.$sp['sp_id'].'/'.$UserLogin->nd_id)}}' + '/' + vitri;">
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
                                    @endif
                                @endif
                            <!-- /Product Single -->
                            @endforeach
                        @endforeach
                        </div>
                    </div>
                </div>
                <!-- /Product Slick -->
                
            </div>
            {{-- LÀm phần gợi ý theo đơn hàng --}}
            <div class="row">
                <!-- section-title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Sản phẩm gợi ý theo đơn hàng </h2>
                        <div class="pull-right">
                            <div class="product-slick-dots-1 custom-dots"></div>
                        </div>
                    </div>
                </div>
                <!-- /section-title -->
                <?php
                    //Gợi ý cho khách hàng những sản phẩm tương tự của những sản phẩm mà khách hàng xem nhiều
                    $khachhang = \App\KhachHang::where('kh_email','=',Auth::user()->email)->first();
                    $donhang = \App\DonHang::where('dh_kh_id','=',$khachhang->kh_id)->latest()->first();
                    $chitietdonhang = \App\ChiTietDonHang::where('ctdh_dh_id','=',$donhang->dh_id)->orderBy('ctdh_so_luong','desc')->take(5)->get();
                ?>
                <!-- Product Slick -->
                <div class="col-md-12 col-sm-6 col-xs-6">
                    <div class="row">
                        <div id="product-slick-1" class="product-slick">
                        @foreach($chitietdonhang as $ctdh)
                            <!-- Product Single -->
                                <?php
                                
                                $sanpham = \App\SanPham::where('sp_id','=',$ctdh->ctdh_sp_id)->first();
                                $sanphamtuongtu = \App\SanPham::where('sp_danh_muc_id',$sanpham->sp_danh_muc_id)
                                ->where('sp_id','<>',$sanpham->sp_id)->get()->toArray();
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