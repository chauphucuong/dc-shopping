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
                <li class="active">{{$danhmuc}}</li>

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
                                <h3 class="product-price">$32.50
                                    <del class="product-old-price">$45.00</del>
                                </h3>
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
                    <h1>Hiện không có sản phẩm nào được khuyến mãi.</h1>
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
                        @foreach($listKM as $title)
                            <?php
                            $start = \Carbon\Carbon::parse($title['km_ngay_bat_dau']);
                            $end = Carbon\Carbon::parse($title['km_ngay_ket_thuc']);
                            $now = Carbon\Carbon::now();

                            $checkExist = null;
                            if($now <= $end){
                                $checkExist = \App\SanPham::where('sp_khuyen_mai_id', $title['km_id'])->get()->toArray();
                            }
                            ?>
                            @if($checkExist != null)
                            <!-- row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="section-title">
                                        <h2 class="title"><i class="fa fa-tags"></i> {{$title['km_ten']}}</h2>
                                        <h4 style="color: #D50000">
                                            Chương trình áp dụng từ {{$start->hour}} giờ
                                            ngày {{date_format($start,'d-m-Y')}}
                                            đến {{$end->hour}} giờ ngày {{date_format($end,'d-m-Y')}}
                                        </h4>
                                    </div>
                                </div>
                                @foreach($listSP as $row)
                                @if($row['sp_khuyen_mai_id'] == $title['km_id'])
                                    <?php

                                    //Lấy hình ảnh đầu tiên trong list hình ảnh của sản phẩm
                                    $image = \App\HinhAnhSanPham::where('hasp_sp_id', $row['sp_id'])->first();

                                    //Lấy ngày hiện tại
                                    $now = \Carbon\Carbon::now('Asia/Ho_Chi_Minh');

                                    //So sánh ngày hiện tại cách ngày bán sản phẩm là bao nhiêu ngày
                                    $checkDay = $now->diffInDays($row['created_at']);

                                    //Lấy loại thuế của sản phẩm
                                    $mucthue = \App\MucThue::find($row['sp_muc_thue_id']);


                                    //Tìm xem sản phẩm này có được khách hàng đó yêu thích hay không
                                    if (isset($Customer)) {
                                        $yeuthich = \App\SanPhamYeuThich::where('spyt_sp_id', $row['sp_id'])
                                            ->where('spyt_kh_id', $Customer['kh_id'])->count();
                                    }

                                    $ngay = $now->diffInDays($end);
                                    $gio = $end->hour - $now->hour;
                                    $phut = $end->minute - $now->minute;
                                    $giay = $end->second - $now->second;

                                    //Biến checkKM để kiểm tra ngày hiện tại có nằm trong ngày bắt đầu và
                                    //ngày kết thúc khuyến mãi hay không
                                    $checkKM = $now->between($start, $end);
                                    ?>
                                    <!-- Product Single -->
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                        {{-- Product info --}}
                                        <div class="product product-single text-center"
                                             title="{{$row['sp_ten']}}">
                                            <div class="product-thumb">
                                                {{--Phần label sản phẩm mới / khuyến mãi--}}
                                                <div class="product-label">
                                                    {{--Nếu ngày bắt đầu bán sản phẩm < 30 ngày thì được xem là sản phẩm mới--}}
                                                    @if($checkDay <= 30)
                                                        <span>New</span>
                                                    @endif
                                                    @if($checkKM == true)
                                                        <span class="sale">-{{$title['km_gia']}}%</span>
                                                </div>
                                                <ul class="product-countdown">
                                                    @if($ngay > 0)
                                                        <li><span>Còn {{$ngay}} ngày</span></li>
                                                    @elseif($gio > 0)
                                                        <li><span>Còn {{$gio}} tiếng</span></li>
                                                    @elseif($phut > 0)
                                                        <li><span>Còn {{$phut}} phút</span></li>
                                                    @elseif($giay > 0)
                                                        <li><span>Còn {{$giay}} giây</span></li>
                                                    @else
                                                        <?php
                                                        //Nếu kết thúc thời gian khuyến mãi thì sản phẩm sẽ
                                                        // thuộc loại không khuyến mãi
                                                        $item = \App\SanPham::find($row['sp_id']);
                                                        $item->sp_khuyen_mai_id = 2;
                                                        $item->save();
                                                        ?>
                                                    @endif
                                                </ul>

                                                @endif
                                                {{--/Phần lable sản phẩm mới / khuyến mãi--}}

                                                <button class="main-btn quick-view"
                                                        onclick="window.location = '{{url('chi-tiet-san-pham/'.$row['sp_id'])}}'">
                                                    <i class="fa fa-search-plus"></i> Chi tiết
                                                </button>
                                                <img src="{{asset('uploads/sanpham/'.$image['hasp_ten'])}}"
                                                     alt="">
                                            </div>
                                            <div class="product-body">
                                                {{--Giá sản phẩm--}}
                                                <h3 class="text-center product-price">{{number_format($row['sp_gia_ban'])}}
                                                    <u>đ</u>
                                                    {{-- Giá cũ = giá bán hiện tại / 1 - (giá khuyến mãi/100))--}}
                                                    <del class="product-old-price">
                                                        {{number_format($row['sp_gia_ban'] / (1 - ($title['km_gia']/100)))}}
                                                        <u>đ</u>
                                                    </del>
                                                </h3>
                                                <h2 class="product-name"
                                                    style="overflow: hidden ;white-space: nowrap;text-overflow: ellipsis;">
                                                    <a href="{{url('chi-tiet-san-pham/'.$row['sp_id'])}}"
                                                       style="font-family: 'Arial'">
                                                        {{$row['sp_ten']}}
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
                                                                    window.location = '{{url('love/'.$row['sp_id'].'/'.$UserLogin->nd_id)}}' + '/' + vitri;">
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
                                        {{-- /Product info --}}
                                    </div>
                                    <!-- /Product Single -->
                                    @endif
                                @endforeach
                            </div>
                            {{-- /row --}}
                            @endif
                            @endforeach
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
        <?php echo ' <script>document.documentElement.scrollTop =' . session('position') . ';</script>;' ?>
    @endif
    <script>
      $(document).ready(function() {
        // Thiết lập thời gian đích mà ta sẽ đếm
        var countDownDate = new Date('2018-08-05 12:00:00').getTime();

        // cập nhập thời gian sau mỗi 1 giây
        var x = setInterval(function() {

          // Lấy thời gian hiện tại
          var now = new Date().getTime();

          // Lấy số thời gian chênh lệch
          var distance = countDownDate - now;

          // Tính toán số ngày, giờ, phút, giây từ thời gian chênh lệch
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);

          // HIển thị chuỗi thời gian trong thẻ span
          document.getElementById('ngay').innerHTML = 'Kết thúc trong ' + days + ' ngày : ';
          document.getElementById('gio').innerHTML = hours + ' giờ : ';
          document.getElementById('phut').innerHTML = minutes + ' phút : ';
          document.getElementById('giay').innerHTML = seconds + ' giây';

          // Nếu thời gian kết thúc, hiển thị chuỗi thông báo
          if (distance < 0) {
            clearInterval(x);
            document.getElementById('time').innerHTML = 'Thời gian đếm ngược đã kết thúc';
          }
        }, 1000);
      });
    </script>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection