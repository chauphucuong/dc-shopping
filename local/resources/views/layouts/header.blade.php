<?php
$SPYT = \App\SanPhamYeuThich::all();
if (isset($Customer)) {
    $all_cart = \Gloudemans\Shoppingcart\Facades\Cart::content()->toArray();
    $list_cart = array();
    $total = 0;
    foreach ($all_cart as $item) {
        if ($item['options']['id_KH'] == $Customer['kh_id']) {
            $list_cart[] = $item;
            $total += $item['subtotal'];
        }
    }
}

?>

<!-- HEADER -->
<header>
    <!-- top Header -->
    <div id="top-header">
        <div class="container">
            <div class="pull-left">
                <span><i class="fa fa-phone"></i> Hotline: 0123456789</span>
            </div>
            <div class="pull-right">
                <ul class="header-top-links">
                @if(isset($UserLogin))
                    {{--Nếu user thuộc loại người dùng 2(khách hàng) thì mới cho tiếp tục đăng nhập--}}
                    <!-- Account -->
                        <li class="header-account dropdown default-dropdown">
                            <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-user-o" style="color: #ffc107;"></i>
                                <strong class="text-uppercase" style="color: #ffc107;">{{$UserLogin->name}} <i
                                            class="fa fa-caret-down"></i></strong>
                            </div>
                            <ul class="custom-menu">
                                <li><a href="{{url('user/thong-tin-khach-hang')}}"><i class="fa fa-user-o"></i>Tài khoản</a>
                                </li>
                                <li>
                                    <a href="{{url('muc-san-pham/danh-sach-yeu-thich')}}">
                                        <i class="fa fa-heart-o"></i>Yêu thích <span
                                                class="lay">{{$SPYT->count()}}</span>
                                    </a>
                                </li>
                                <li><a href="{{url('user/change-password/'.$UserLogin->nd_id)}}"><i
                                                class="fa fa-pinterest-p"></i>Thay đổi mật khẩu</a></li>
                                <li><a href="{{url('user/thanh-toan')}}"><i class="fa fa-check"></i>Thanh toán</a></li>
                                <li><a href="{{url('user/logout')}}"><i class="fa fa-unlock-alt"></i>Đăng xuất</a></li>
                            </ul>
                        </li>
                        <!-- /Account -->
                    @else
                        <li><a href="{{url('user/login')}}">Đăng nhập</a></li>
                        <li><a href="{{url('user/register')}}">Đăng ký</a></li>
                    @endif
                    <li class="dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">ENG <i
                                    class="fa fa-caret-down"></i></a>
                        <ul class="custom-menu">
                            <li><a href="#">English (ENG)</a></li>
                            <li><a href="#">Russian (Ru)</a></li>
                            <li><a href="#">French (FR)</a></li>
                            <li><a href="#">Spanish (Es)</a></li>
                        </ul>
                    </li>
                    <li class="dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">USD <i
                                    class="fa fa-caret-down"></i></a>
                        <ul class="custom-menu">
                            <li><a href="#">USD ($)</a></li>
                            <li><a href="#">EUR (€)</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /top Header -->

    <!-- header -->
    <div>
        <div class="container" style="position: relative">
            <!-- Logo -->
            <div class="header-logo" style="width: 25%; ">
                <a class="logo" href="{{url('/')}}">
                    <img src="./img/logo-DC.png" alt="" style="max-height: 120px;">
                </a>
            </div>
            <!-- /Logo -->

            <!-- Search -->
            <div class="header-search">
                <form method="post" action="{{url('tim-kiem')}}" id="alert">
                    {{csrf_field()}}
                    <input class="input" name="txtSearch"  type="text" placeholder="Tìm kiếm trên DC-Shopping..">
                    @if($errors->has('txtSearch'))
                        <span class="text-danger">{{$errors->first('txtSearch')}}</span>
                    @endif
                    <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                </form>
                <div class="text-center" style="padding: 10px 0;">
                    <i>Địa chỉ: 371 Nguyễn Kiệm, phường 3, quận Gò Vấp, Tp.HCM</i>
                </div>
            </div>
            <!-- /Search -->
            @if(isset($UserLogin))
                <div class="pull-right" style="margin-top: 1.7%; width: 15%;">
                    <ul class="header-btns">
                        <!-- Cart -->
                        <li class="header-cart dropdown default-dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <div class="header-btns-icon">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="qty">{{count($list_cart)}}</span>
                                </div>
                                <strong>Giỏ hàng:</strong>
                                <br>
                                <span>{{number_format($total)}} <u>đ</u></span>
                            </a>
                            <div class="custom-menu" style="width: 185%">
                                <div id="shopping-cart">
                                    <label class="shopping-cart-list">
                                        <form method="post" action="{{url('user/gio-hang')}}">
                                            @foreach($list_cart as $row)
                                                <input type="hidden" name="row_id" value="{{$row['rowId']}}">
                                                <div class="product product-widget">
                                                    <div class="product-thumb">
                                                        <img src="uploads/sanpham/{{$row['options']['img']}}">
                                                    </div>
                                                    <div class="product-body">
                                                        <h3 class="product-price">{{$row['price']}} <span
                                                                    class="qty">x{{$row['qty']}}</span></h3>
                                                        <h2 class="product-name"><a
                                                                    href="{{url('chi-tiet-san-pham/'.$row['id'])}}">{{$row['name']}}</a>
                                                        </h2>
                                                    </div>
                                                    <button name="deleteCart" class="cancel-btn"><i
                                                                class="fa fa-trash"></i></button>
                                                </div>
                                            @endforeach
                                        </form>
                                        @if(count($list_cart) > 0)
                                            <div class="shopping-cart-btns">
                                                <a href="{{url('user/gio-hang')}}" class="main-btn">Xem giỏ hàng </a>
                                                <a href="{{url('user/thanh-toan')}}" class="primary-btn">Thanh toán <i
                                                            class="fa fa-arrow-circle-right"></i></a>
                                            </div>
                                        @else
                                            <label class="text-center">
                                                Chưa có sản phẩm nào được thêm vào giỏ hàng
                                            </label>
                                    @endif
                                </div>
                            </div>
                        </li>
                        <!-- /Cart -->

                        <!-- Mobile nav toggle-->
                        <li class="nav-toggle">
                            <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                        </li>
                        <!-- / Mobile nav toggle -->
                    </ul>
                </div>
            @endif
        </div>
        <!-- header -->
    </div>
   
    <!-- container -->
</header>
<!-- /HEADER -->
