<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{url('admin')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>

            <li>
                <a href="{{route('danhmucsanpham-list')}}"><i class="fa fa-bar-chart-o fa-fw"></i> Danh mục sản phẩm<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('danhmucsanpham-list')}}">Danh sách danh mục sản phẩm</a>
                    </li>
                    <li>
                        <a href="{{route('danhmucsanpham-add')}}">Thêm danh mục sản phẩm</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="{{route('sanpham-list')}}"><i class="fa fa-cube fa-fw"></i>Sản phẩm<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('sanpham-list')}}">Danh sách sản phẩm</a>
                    </li>
                    <li>
                        <a href="{{route('sanpham-add')}}">Thêm sản phẩm</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="{{route('donvitinh-list')}}"><i class="fa fa-users fa-fw"></i>Đơn vị tính<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('donvitinh-list')}}">Danh sách đơn vị</a>
                    </li>
                    <li>
                        <a href="{{route('donvitinh-add')}}">Thêm đơn vị</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{route('nhasanxuat-list')}}"><i class="fa fa-users fa-fw"></i>Nhà sản xuất<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('nhasanxuat-list')}}">Danh sách nhà sản xuất</a>
                    </li>
                    <li>
                        <a href="{{route('nhasanxuat-add')}}">Thêm nhà sản xuất</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{route('loaikhuyenmai-list')}}"><i class="fa fa-bar-chart-o fa-fw"></i>Loại khuyến mãi<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('loaikhuyenmai-list')}}">Danh sách loại khuyến mãi</a>
                    </li>
                    <li>
                        <a href="{{route('loaikhuyenmai-add')}}">Thêm loại khuyến mãi</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{route('phieugiamgia-list')}}"><i class="fa fa-users fa-fw"></i>Phiếu giảm giá<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('phieugiamgia-list')}}">Danh sách phiếu giảm giá</a>
                    </li>
                    <li>
                        <a href="{{route('phieugiamgia-add')}}">Thêm phiếu giảm giá</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{route('khohang-list')}}"><i class="fa fa-users fa-fw"></i> Kho Hàng<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('khohang-list')}}">List Kho Hàng</a>
                    </li>
                    <li>
                        <a href="{{route('khohang-add')}}">Add Kho Hàng</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{route('loaithue-list')}}"><i class="fa fa-bar-chart-o fa-fw"></i> Loại thuế<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('loaithue-list')}}">Danh sách loại thuế</a>
                    </li>
                    <li>
                        <a href="{{route('loaithue-add')}}">Thêm loại thuế</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{route('mucthue-list')}}"><i class="fa fa-users fa-fw"></i> Mức Thuế<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('mucthue-list')}}">List Mức Thuế</a>
                    </li>
                    <li>
                        <a href="{{route('mucthue-add')}}">Add Mức Thuế</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{route('donhang-list')}}"><i class="fa fa-users fa-fw"></i>Đơn hàng<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('donhang-list')}}">Danh sách đơn hàng</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{route('donhangdoi_tra-list')}}"><i class="fa fa-users fa-fw"></i>Đơn hàng đổi trả<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('donhangdoi_tra-list')}}">Danh sách đơn hàng đổi tra</a>
                    </li>
                    <li>
                        <a href="{{route('donhangdoi_tra-add')}}">Thêm đơn hàng đổi trả</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{route('chitietdonhang-list')}}"><i class="fa fa-bar-chart-o fa-fw"></i>Chi tiết đơn hàng<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('chitietdonhang-list')}}">Danh sách chi tiết đơn hàng</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{route('phieugiaohang-list')}}"><i class="fa fa-bar-chart-o fa-fw"></i>Phiếu giao hàng<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('phieugiaohang-list')}}">Danh sách phiếu giao hàng</a>
                    </li>
                    <li>
                        <a href="{{route('phieugiaohang-add')}}">Thêm phiếu giao hàng</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{route('loaithanhtoan-list')}}"><i class="fa fa-bar-chart-o fa-fw"></i>Loại thanh toán<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('loaithanhtoan-list')}}">Danh sách loại thanh toán</a>
                    </li>
                    <li>
                        <a href="{{route('loaithanhtoan-add')}}">Thêm loại thanh toán</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{route('cuocphivanchuyen-list')}}"><i class="fa fa-bar-chart-o fa-fw"></i>Cước phí vận chuyển<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('cuocphivanchuyen-list')}}">Danh sách cước phí vận chuyển</a>
                    </li>
                    <li>
                        <a href="{{route('cuocphivanchuyen-add')}}">Thêm cước phí vận chuyển</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{route('tinhtrangdonhang-list')}}"><i class="fa fa-users fa-fw"></i> Tình trạng đơn hàng<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('tinhtrangdonhang-list')}}">Danh sách tình trạng</a>
                    </li>
                    <li>
                        <a href="{{route('tinhtrangdonhang-add')}}">Thêm tình trạng</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{route('khachhang-list')}}"><i class="fa fa-users fa-fw"></i>Khách Hàng<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('khachhang-list')}}">Danh sách khách hàng</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{route('diachigiaohang-list')}}"><i class="fa fa-bar-chart-o fa-fw"></i>Địa chỉ giao hàng<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('diachigiaohang-list')}}">Danh sách địa chỉ giao hàng</a>
                    </li>
                    <li>
                        <a href="{{route('diachigiaohang-add')}}">Thêm địa chỉ giao hàng</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{route('hanhvi-list')}}"><i class="fa fa-bar-chart-o fa-fw"></i>Hành vi<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('hanhvi-list')}}">Hành vi của khách hàng</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{route('binhluan-list')}}"><i class="fa fa-bar-chart-o fa-fw"></i>Bình luận<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('binhluan-list')}}">Danh sách bình luận sản phẩm</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{route('loainguoidung-list')}}"><i class="fa fa-bar-chart-o fa-fw"></i>Loại người dùng<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('loainguoidung-list')}}">Danh sách loại người dùng</a>
                    </li>
                    <li>
                        <a href="{{route('loainguoidung-add')}}">Thêm loại người dùng</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{route('nguoidung-list')}}"><i class="fa fa-users fa-fw"></i>Người dùng<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('nguoidung-list')}}">Danh sách người dùng</a>
                    </li>
                    <li>
                        <a href="{{route('nguoidung-add')}}">Thêm người dùng</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{route('loainhanvien-list')}}"><i class="fa fa-bar-chart-o fa-fw"></i>Loại nhân viên<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('loainhanvien-list')}}">Danh sách loại nhân viên</a>
                    </li>
                    <li>
                        <a href="{{route('loainhanvien-add')}}">Thêm loại nhân viên</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{route('nhanvien-list')}}"><i class="fa fa-users fa-fw"></i>Nhân viên<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('nhanvien-list')}}">Danh sách nhân viên</a>
                    </li>
                    <li>
                        <a href="{{route('nhanvien-add')}}">Thêm nhân viên</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{route('thanhpho-list')}}"><i class="fa fa-users fa-fw"></i>Thành Phố<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('thanhpho-list')}}">Danh sách thành phố</a>
                    </li>
                    <li>
                        <a href="{{route('thanhpho-add')}}">Thêm thành phố</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{route('quanhuyen-list')}}"><i class="fa fa-bar-chart-o fa-fw"></i>Quận/Huyện<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('quanhuyen-list')}}">Danh sách Quận/Huyện sẽ giao hàng</a>
                    </li>
                    <li>
                        <a href="{{route('quanhuyen-add')}}">Thêm Quận/Huyện</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{route('phuongxa-list')}}"><i class="fa fa-bar-chart-o fa-fw"></i>Phường/Xã<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('phuongxa-list')}}">Danh sách Phường/Xã sẽ giao hàng</a>
                    </li>
                    <li>
                        <a href="{{route('phuongxa-add')}}">Thêm Phường/Xã</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="{{route('emailnhantinkhuyenmai-list')}}"><i class="fa fa-bar-chart-o fa-fw"></i>Emai nhận tin khuyến mãi<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('emailnhantinkhuyenmai-list')}}">Danh sách emai nhận tin</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="{{route('danhmuctintuc-list')}}"><i class="fa fa-bar-chart-o fa-fw"></i>Danh mục tin tức<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('danhmuctintuc-list')}}">Danh sách danh mục tin tức</a>
                    </li>
                    <li>
                        <a href="{{route('danhmuctintuc-add')}}">Thêm danh mục tin tức</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="{{route('tintuc-list')}}"><i class="fa fa-users fa-fw"></i>Tin tức<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('tintuc-list')}}">Danh sách tin tức</a>
                    </li>
                    <li>
                        <a href="{{route('tintuc-add')}}">Thêm tin tức</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
