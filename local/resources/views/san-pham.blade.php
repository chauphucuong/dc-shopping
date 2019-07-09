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
                {{--Nếu có biến danhmuc nghĩa là đây là trang sản phẩm--}}
                @if($danhmuc != 'Sản phẩm yêu thích' || $danhmuc != 'Sản phẩm khuyến mãi')
                <li class="active">{{$danhmuc}}</li>
                @else
                    {{--Ngược lại đây là trang danh sách sản phẩm yêu thích của khách hàng đã đăng nhập--}}
                    <li class="active">{{$UserLogin->name}}</li>
                    <li class="active">{{$danhmuc}}</li>
                @endif
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
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside widget -->
                    <div class="aside">
                        <h3 class="aside-title">Shop by:</h3>
                        <ul class="filter-list">
                            <li><span class="text-uppercase">color:</span></li>
                            <li><a href="#" style="color:#FFF; background-color:#8A2454;">Camelot</a></li>
                            <li><a href="#" style="color:#FFF; background-color:#475984;">East Bay</a></li>
                            <li><a href="#" style="color:#FFF; background-color:#BF6989;">Tapestry</a></li>
                            <li><a href="#" style="color:#FFF; background-color:#9A54D8;">Medium Purple</a></li>
                        </ul>

                        <ul class="filter-list">
                            <li><span class="text-uppercase">Size:</span></li>
                            <li><a href="#">X</a></li>
                            <li><a href="#">XL</a></li>
                        </ul>

                        <ul class="filter-list">
                            <li><span class="text-uppercase">Price:</span></li>
                            <li><a href="#">MIN: $20.00</a></li>
                            <li><a href="#">MAX: $120.00</a></li>
                        </ul>

                        <ul class="filter-list">
                            <li><span class="text-uppercase">Gender:</span></li>
                            <li><a href="#">Men</a></li>
                        </ul>

                        <button class="primary-btn">Clear All</button>
                    </div>
                    <!-- /aside widget -->

                    <!-- aside widget -->
                    <div class="aside">
                        <h3 class="aside-title">Filter by Price</h3>
                        <div id="price-slider"></div>
                    </div>
                    <!-- aside widget -->

                    <!-- aside widget -->
                    <div class="aside">
                        <h3 class="aside-title">Filter By Color:</h3>
                        <ul class="color-option">
                            <li><a href="#" style="background-color:#475984;"></a></li>
                            <li><a href="#" style="background-color:#8A2454;"></a></li>
                            <li class="active"><a href="#" style="background-color:#BF6989;"></a></li>
                            <li><a href="#" style="background-color:#9A54D8;"></a></li>
                            <li><a href="#" style="background-color:#675F52;"></a></li>
                            <li><a href="#" style="background-color:#050505;"></a></li>
                            <li><a href="#" style="background-color:#D5B47B;"></a></li>
                        </ul>
                    </div>
                    <!-- /aside widget -->

                    <!-- aside widget -->
                    <div class="aside">
                        <h3 class="aside-title">Filter By Size:</h3>
                        <ul class="size-option">
                            <li class="active"><a href="#">S</a></li>
                            <li class="active"><a href="#">XL</a></li>
                            <li><a href="#">SL</a></li>
                        </ul>
                    </div>
                    <!-- /aside widget -->

                    <!-- aside widget -->
                    <div class="aside">
                        <h3 class="aside-title">Filter by Brand</h3>
                        <ul class="list-links">
                            <li><a href="#">Nike</a></li>
                            <li><a href="#">Adidas</a></li>
                            <li><a href="#">Polo</a></li>
                            <li><a href="#">Lacost</a></li>
                        </ul>
                    </div>
                    <!-- /aside widget -->

                    <!-- aside widget -->
                    <div class="aside">
                        <h3 class="aside-title">Filter by Gender</h3>
                        <ul class="list-links">
                            <li class="active"><a href="#">Men</a></li>
                            <li><a href="#">Women</a></li>
                        </ul>
                    </div>
                    <!-- /aside widget -->

                    <!-- aside widget -->
                    <div class="aside">
                        <h3 class="aside-title">Top Rated Product</h3>
                        <!-- widget product -->
                        <div class="product product-widget">
                            <div class="product-thumb">
                                <img src="./img/thumb-product01.jpg" alt="">
                            </div>
                            <div class="product-body">
                                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                                <h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o empty"></i>
                                </div>
                            </div>
                        </div>
                        <!-- /widget product -->

                        <!-- widget product -->
                        <div class="product product-widget">
                            <div class="product-thumb">
                                <img src="./img/thumb-product01.jpg" alt="">
                            </div>
                            <div class="product-body">
                                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                                <h3 class="product-price">$32.50</h3>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o empty"></i>
                                </div>
                            </div>
                        </div>
                        <!-- /widget product -->
                    </div>
                    <!-- /aside widget -->
                </div>
                <!-- /ASIDE -->

                @if($listSP == null)
                    <h1>Hiện không có sản phẩm nào được tìm thấy.</h1>
                @else
                <!-- MAIN -->
                <div id="main" class="col-md-9">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="pull-left">
                            <div class="row-filter">
                                <a href="#"><i class="fa fa-th-large"></i></a>
                                <a href="#" class="active"><i class="fa fa-bars"></i></a>
                            </div>
                            <div class="sort-filter">
                                <span class="text-uppercase">Sort By:</span>
                                <select class="input">
                                    <option value="0">Position</option>
                                    <option value="0">Price</option>
                                    <option value="0">Rating</option>
                                </select>
                                <a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
                            </div>
                        </div>
                        <div class="pull-right">
                            <div class="page-filter">
                                <span class="text-uppercase">Show:</span>
                                <select class="input">
                                    <option value="0">10</option>
                                    <option value="1">20</option>
                                    <option value="2">30</option>
                                </select>
                            </div>
                            <ul class="store-pages">
                                <li><span class="text-uppercase">Page:</span></li>
                                <li class="active">1</li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /store top filter -->

                    <!-- STORE -->
                    <div id="store">
                        <!-- row -->
                        <div class="row">
                        @foreach($listSP as $row)
                            <?php
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
                            $gio =  $end->hour - $now->hour;
                            $phut = $end->minute - $now->minute;
                            $giay = $end->second - $now->second;

                            //Biến checkKM để kiểm tra ngày hiện tại có nằm trong ngày bắt đầu và
                            //ngày kết thúc khuyến mãi hay không
                            $checkKM = $now->between($start, $end);
                            ?>
                            <!-- Product Single -->
                            <div class="col-md-4 col-sm-6 col-xs-6">
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

                                        <button class="main-btn quick-view" onclick="window.location = '{{url('chi-tiet-san-pham/'.$row['sp_id'])}}'">
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
                                        <h2 class="product-name"  style="overflow: hidden ;white-space: nowrap;text-overflow: ellipsis;">
                                            <a href="{{url('chi-tiet-san-pham/'.$row['sp_id'])}}" style="font-family: 'Arial'">
                                                {{$row['sp_ten']}}
                                            </a>
                                        </h2>
                                        <div class="product-btns text-center">
                                            {{--Nút yêu thích--}}
                                            @if(isset($UserLogin))  {{--Nếu khách hàng đã đăng nhập--}}
                                            <?php
                                                //Tìm xem sản phẩm này có được khách hàng đó yêu thích hay không
                                                if(isset($Customer)){
                                                    $yeuthich = \App\SanPhamYeuThich::where('spyt_sp_id',$row['sp_id'])
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
                                            <button class="btn primary-btn add-to-cart" onclick=" window.location = '{{url('chi-tiet-san-pham/'.$row['sp_id'])}}'">
                                                Mua ngay
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- /Product Single -->
                        @endforeach
                        </div>
                    </div>
                    <!-- /STORE -->

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        <div class="pull-left">
                            <div class="row-filter">
                                <a href="#"><i class="fa fa-th-large"></i></a>
                                <a href="#" class="active"><i class="fa fa-bars"></i></a>
                            </div>
                            <div class="sort-filter">
                                <span class="text-uppercase">Sort By:</span>
                                <select class="input">
                                    <option value="0">Position</option>
                                    <option value="0">Price</option>
                                    <option value="0">Rating</option>
                                </select>
                                <a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
                            </div>
                        </div>
                        <div class="pull-right">
                            <div class="page-filter">
                                <span class="text-uppercase">Show:</span>
                                <select class="input">
                                    <option value="0">10</option>
                                    <option value="1">20</option>
                                    <option value="2">30</option>
                                </select>
                            </div>
                            <ul class="store-pages">
                                <li><span class="text-uppercase">Page:</span></li>
                                <li class="active">1</li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /store bottom filter -->
                </div>
                <!-- /MAIN -->
                @endif
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection

@section('script')
    <script type="text/javascript" src="{{asset('/js/dat2.js')}}"></script>

    {{--Trả về vị trí ban đầu khi nhấn nút thích--}}
    @if(session('position'))
        <?php echo ' <script>document.documentElement.scrollTop ='.session('position').';</script>;' ?>
    @endif
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
