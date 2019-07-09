<?php
    $DMSP = \App\DanhMucSanPham::all()->toArray();
    $DMTT = \App\DanhMucTinTuc::all()->toArray();
?>
<!-- NAVIGATION -->
<div id="navigation">
    <!-- container -->
    <div class="container" id="nav-id">
        <div id="responsive-nav">
            <!-- category nav -->
            <div class="category-nav" id="cate-nav">
                <span class="category-header">Danh mục sản phẩm <i class="fa fa-list"></i></span>
                <ul class="category-list" id="cate-list">
                    @foreach($DMSP as $parent)
                        @if($parent["parent"] == 0 && $parent["trang_thai"] == "ON")
                        <li class="dropdown side-dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                {{$parent["dmsp_ten"]}} <i class="fa fa-angle-right"></i>
                            </a>
                            <div class="custom-menu" style="width: 50%">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="list-links">
                                            @foreach($DMSP as $child)
                                                @if($child["parent"] == $parent["dmsp_id"] && $child["trang_thai"] == "ON")
                                                    <li>
                                                        <a href="{{url('/muc-san-pham/'.$child["dmsp_id"])}}">{{$child["dmsp_ten"]}}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <!-- /category nav -->

            <!-- menu nav -->
            <div class="menu-nav">
                <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
                <ul class="menu-list">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('gioi-thieu')}}">Giới thiệu</a></li>
                    <li><a href="{{url('muc-san-pham/san-pham-khuyen-mai')}}">Khuyến mãi</a></li>
                    <li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Tin tức <i class="fa fa-caret-down"></i></a>
                        <ul class="custom-menu">
                            @foreach($DMTT as $item)
                                @if($item["trang_thai"] == "ON")
                                    <li>
                                        <a href="{{url('/tin-tuc/'.$item["dmtt_id"])}}">{{$item["dmtt_ten"]}}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{url('/')}}">Liên hệ</a></li>
                </ul>
            </div>
            <!-- menu nav -->
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /NAVIGATION -->