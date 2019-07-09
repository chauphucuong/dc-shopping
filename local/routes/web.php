<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Auth;
/*--------------------------------------------------------PHẦN USER----------------------------------------------------*/
Route::group(['middleware' => 'userLogin'], function (){
    //Trang chủ
    Route::get('/', 'Controller@getHome');

    //Tìm kiếm sản phẩm
    Route::post('tim-kiem', 'ProductController@postSearch');

    Route::get('redirect/{social}', 'Auth\SocialController@redirect');
    Route::get('callback/{social}', 'Auth\SocialController@callback');

    /*----------------------------------------------------------------------------------------------------------------------*/
    //Trang sản phẩm
    Route::get('muc-san-pham/{id}', 'ProductController@getPage');
    //Trang sản theo nhà sản xuất
    Route::get('nha-san-xuat/{id}', 'ProductController@getNSX');

    /*----------------------------------------------------------------------------------------------------------------------*/
    //Trang sản phẩm yêu thích
    Route::get('love/{product_id}/{customer_id}/{position}', 'ProductController@getLove');

    /*----------------------------------------------------------------------------------------------------------------------*/
    //Trang chi tiết sản phẩm
    Route::get('chi-tiet-san-pham/{id}', 'ProductController@getDetail');
    Route::post('chi-tiet-san-pham/{id}', 'ProductController@postDetail');

    /*----------------------------------------------------------------------------------------------------------------------*/
    //Trang tin tức
    Route::get('tin-tuc/{id}', 'Controller@getNew');

    /*----------------------------------------------------------------------------------------------------------------------*/
    //Các trang thông tin về cửa hàng
    Route::get('/gioi-thieu', 'Controller@getGioiThieu');
    Route::get('/chinh-sach-van-chuyen', 'Controller@getChinhSachVanChuyen');
    Route::get('/quy-dinh-ve-chinh-sach', 'Controller@getQuyDinhVaChinhSach');
    Route::get('/chinh-sach-doi-tra', 'Controller@getChinhSachDoiTra');
    Route::get('/chinh-sach-bao-mat', 'Controller@getChinhSachBaoMat');
    Route::get('/chinh-sach-bao-hanh', 'Controller@getChinhSachBaoHanh');

    /*----------------------------------------------------------------------------------------------------------------------*/
    //Các trang tương tác của khách hàng
    Route::group(['prefix' => 'user'], function () {
        //Khi vào các trang này phải qua đăng nhập của khách hàng
        Route::group(['middleware' => 'auth'], function () {

            //Thông tin khách hàng
            Route::get('thong-tin-khach-hang', 'UserController@getInfo');
            Route::post('thong-tin-khach-hang', 'UserController@postInfo');

            //Thêm địa chỉ của khách hàng
            Route::get('them-dia-chi', 'UserController@getThemDiaChi');
            Route::post('them-dia-chi', 'UserController@postThemDiaChi');

            //Khách hàng sửa địa chỉ
            Route::get('sua-dia-chi/{id_DC}', 'UserController@getSuaDiaChi');

            //Thanh toán
            Route::get('thanh-toan', 'UserController@getThanhToan');
            Route::post('thanh-toan', 'UserController@postThanhToan');

            //Đánh giá sản phẩm
            Route::get('hanh-vi', 'UserController@getHanhVi');
            Route::post('hanh-vi', 'UserController@postHanhVi');

            //Giỏ hàng
            Route::get('gio-hang', 'UserController@getGioHang');
            Route::post('gio-hang', 'UserController@postGioHang');
        });

        //Đăng nhập
        Route::get('login', ['as' => 'login', 'uses' => 'UserController@getLoginUser']);
        Route::post('login', 'UserController@postLoginUser');

        //Đăng xuất
        Route::get('logout', 'UserController@getLogoutUser');

        //Đăng ký tài khoản
        Route::get('register', 'UserController@getRegisterUser');
        Route::post('register', 'UserController@postRegisterUser');

        //Quên mật khẩu
        Route::get('forgot-password', 'UserController@getForgotPasswordUser');
        Route::post('forgot-password', 'UserController@postForgotPasswordUser');

        //Thay đổi mật khẩu
        Route::get('change-password/{nd_id}', 'UserController@getChangePasswordUser');
        Route::post('change-password/{nd_id}', 'UserController@postChangePasswordUser');
    });
});


/*-------------------------------------TRUYỀN DỮ LIỆU CHUNG------------------------------------------------------------*/
//Truyền thông tin khách hàng cho tất cả các view
View::composer(['*'], function ($yourView){
    if(Auth::check()) {
        $taikhoan = Auth::user();
        $khachhang = \App\KhachHang::where('kh_email', $taikhoan->email)->first();
        $yourView->with('UserLogin', $taikhoan)->with('Customer', $khachhang);
    }
});
/*------------------------------------------PHẦN ADMIN-----------------------------------------------------------------*/

Route::get('admin/dangnhap','UserController@getdangnhapAdmin');
Route::post('admin/dangnhap','UserController@postdangnhapAdmin');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
    Route::get('/',function(){
        return view('admin.layout.index');
    });

    Route::get('logout','UserController@getDangXuatAdmin');

    Route::group(['prefix'=>'phuongxa'],function(){
        Route::get('danhsach',['as'=>'phuongxa-list','uses'=>'phuongxaController@getDanhSach']);
        Route::get('them',['as'=>'phuongxa-add','uses'=>'phuongxaController@getThem']);
        Route::post('them',['as'=>'phuongxa-add','uses'=>'phuongxaController@postThem']);
        Route::get('sua/{qh_id}',['as'=>'phuongxa-edit','uses'=>'phuongxaController@getSua']);
        Route::post('sua/{qh_id}',['as'=>'phuongxa-edit','uses'=>'phuongxaController@postSua']);
        Route::get('xoa/{qh_id}',['as'=>'phuongxa-delete','uses'=>'phuongxaController@getXoa']);
    });

    Route::group(['prefix'=>'quanhuyen'],function(){
        Route::get('danhsach',['as'=>'quanhuyen-list','uses'=>'quanhuyenController@getDanhSach']);
        Route::get('them',['as'=>'quanhuyen-add','uses'=>'quanhuyenController@getThem']);
        Route::post('them',['as'=>'quanhuyen-add','uses'=>'quanhuyenController@postThem']);
        Route::get('sua/{qh_id}',['as'=>'quanhuyen-edit','uses'=>'quanhuyenController@getSua']);
        Route::post('sua/{qh_id}',['as'=>'quanhuyen-edit','uses'=>'quanhuyenController@postSua']);
        Route::get('xoa/{qh_id}',['as'=>'quanhuyen-delete','uses'=>'quanhuyenController@getXoa']);
    });

    Route::group(['prefix'=>'phieugiaohang'],function(){
        Route::get('danhsach',['as'=>'phieugiaohang-list','uses'=>'phieugiaohangController@getDanhSach']);
        Route::get('them',['as'=>'phieugiaohang-add','uses'=>'phieugiaohangController@getThem']);
        Route::post('them',['as'=>'phieugiaohang-add','uses'=>'phieugiaohangController@postThem']);
        Route::get('sua/{ctdh_sp_id}',['as'=>'phieugiaohang-edit','uses'=>'phieugiaohangController@getSua']);
        Route::post('sua/{ctdh_sp_id}',['as'=>'phieugiaohang-edit','uses'=>'phieugiaohangController@postSua']);
        Route::get('xoa/{ctdh_sp_id}',['as'=>'phieugiaohang-delete','uses'=>'phieugiaohangController@getXoa']);
    });

    Route::group(['prefix'=>'hanhvi'],function(){
        Route::get('danhsach',[ 'as' => 'hanhvi-list' ,'uses'=> 'hanhviController@getDanhSach']);
        Route::get('xoa/{hv_id}',[ 'as' => 'hanhvi-delete' ,'uses'=> 'hanhviController@getXoa']);
    });

    Route::group(['prefix'=>'emailnhantinkhuyenmai'],function(){
        Route::get('danhsach',[ 'as' => 'emailnhantinkhuyenmai-list' ,'uses'=> 'emailnhantinkhuyemaiController@getDanhSach']);
        Route::get('xoa/{email_id}',[ 'as' => 'emailnhantinkhuyenmai-delete' ,'uses'=> 'emailnhantinkhuyemaiController@getXoa']);
    });

    Route::group(['prefix'=>'binhluan'],function(){
        Route::get('danhsach',[ 'as' => 'binhluan-list' ,'uses'=> 'binhluanController@getDanhSach']);
        Route::get('phanhoi',[ 'as' => 'binhluan-phanhoi' ,'uses'=> 'binhluanController@getPhanhoi']);
        Route::get('xoa/{bl_id}',[ 'as' => 'binhluan-delete' ,'uses'=> 'binhluanController@getXoa']);
    });

    Route::group(['prefix'=>'chitietdonhang'],function(){
        Route::get('danhsach',['as'=>'chitietdonhang-list','uses'=>'chitietdonhangController@getDanhSach']);
        Route::get('sua/{ctdh_sp_id}',['as'=>'chitietdonhang-edit','uses'=>'chitietdonhangController@getSua']);
        Route::post('sua/{ctdh_sp_id}',['as'=>'chitietdonhang-edit','uses'=>'chitietdonhangController@postSua']);
        Route::get('xoa/{ctdh_sp_id}',['as'=>'chitietdonhang-delete','uses'=>'chitietdonhangController@getXoa']);
    });

    Route::group(['prefix'=>'cuocphivanchuyen'],function(){
        Route::get('danhsach',['as'=>'cuocphivanchuyen-list','uses'=>'cuocphivanchuyenController@getDanhSach']);
        Route::get('sua/{cpvc_id}',['as'=>'cuocphivanchuyen-edit','uses'=>'cuocphivanchuyenController@getSua']);
        Route::post('sua/{cpvc_id}',['as'=>'cuocphivanchuyen-edit','uses'=>'cuocphivanchuyenController@postSua']);
        Route::get('xoa/{cpvc_id}',['as'=>'cuocphivanchuyen-delete','uses'=>'cuocphivanchuyenController@getXoa']);
        Route::get('them',['as'=>'cuocphivanchuyen-add','uses'=>'cuocphivanchuyenController@getThem']);
        Route::post('them',['as'=>'cuocphivanchuyen-add','uses'=>'cuocphivanchuyenController@postThem']);
    });

    Route::group(['prefix'=>'danhmucsanpham'],function(){
        Route::get('danhsach',['as'=>'danhmucsanpham-list','uses'=>'danhmucsanphamController@getDanhSach']);
        Route::get('sua/{dmsp_id}',['as'=>'danhmucsanpham-edit','uses'=>'danhmucsanphamController@getSua']);
        Route::post('sua/{dmsp_id}',['as'=>'danhmucsanpham-edit','uses'=>'danhmucsanphamController@postSua']);
        Route::get('them',['as'=>'danhmucsanpham-add','uses'=>'danhmucsanphamController@getThem']);
        Route::post('them',['as'=>'danhmucsanpham-add','uses'=>'danhmucsanphamController@postThem']);
        Route::get('xoa/{dmsp_id}',['as'=>'danhmucsanpham-delete','uses'=>'danhmucsanphamController@getXoa']);
    });

    Route::group(['prefix'=>'danhmuctintuc'],function(){
        Route::get('danhsach',['as'=>'danhmuctintuc-list','uses'=>'danhmuctintucController@getDanhSach']);
        Route::get('sua/{dmtt_id}',['as'=>'danhmuctintuc-edit','uses'=>'danhmuctintucController@getSua']);
        Route::post('sua/{dmtt_id}',['as'=>'danhmuctintuc-edit','uses'=>'danhmuctintucController@postSua']);
        Route::get('xoa/{dmtt_id}',['as'=>'danhmuctintuc-delete','uses'=>'danhmuctintucController@getXoa']);
        Route::get('them',['as'=>'danhmuctintuc-add','uses'=>'danhmuctintucController@getThem']);
        Route::post('them',['as'=>'danhmuctintuc-add','uses'=>'danhmuctintucController@postThem']);
    });

    Route::group(['prefix'=>'diachigiaohang'],function(){
        Route::get('danhsach',['as'=>'diachigiaohang-list','uses'=>'diachigiaohangController@getDanhSach']);
        Route::get('sua/{dcgh_stt}',['as'=>'diachigiaohang-edit','uses'=>'diachigiaohangController@getSua']);
        Route::post('sua/{dcgh_stt}',['as'=>'diachigiaohang-edit','uses'=>'diachigiaohangController@postSua']);
        Route::get('xoa/{dcgh_stt}',['as'=>'diachigiaohang-delete','uses'=>'diachigiaohangController@getXoa']);
        Route::get('them',['as'=>'diachigiaohang-add','uses'=>'diachigiaohangController@getThem']);
        Route::post('them',['as'=>'diachigiaohang-add','uses'=>'diachigiaohangController@postThem']);
    });

    Route::group(['prefix'=>'donhang'],function(){
        Route::get('danhsach',['as'=>'donhang-list','uses'=>'donhangController@getDanhSach']);
        Route::get('sua/{dh_id}',['as'=>'donhang-edit','uses'=>'donhangController@getSua']);
        Route::post('sua/{dh_id}',['as'=>'donhang-edit','uses'=>'donhangController@postSua']);
        Route::get('xoa/{dh_id}',['as'=>'donhang-edit','uses'=>'donhangController@getXoa']);
    });

    Route::group(['prefix'=>'donhangdoi_tra'],function(){
        Route::get('danhsach',['as'=>'donhangdoi_tra-list','uses'=>'donhangdoi_traController@getDanhSach']);
        Route::get('sua/{dhdt_id}',['as'=>'donhangdoi_tra-edit','uses'=>'donhangdoi_traController@getSua']);
        Route::post('sua/{dhdt_id}',['as'=>'donhangdoi_tra-edit','uses'=>'donhangdoi_traController@postSua']);
        Route::get('xoa/{dhdt_id}',['as'=>'donhangdoi_tra-delete','uses'=>'donhangdoi_traController@getXoa']);
        Route::get('them',['as'=>'donhangdoi_tra-add','uses'=>'donhangdoi_traController@getThem']);
        Route::post('them',['as'=>'donhangdoi_tra-add','uses'=>'donhangdoi_traController@postThem']);
    });

    Route::group(['prefix'=>'donvitinh'],function(){
        Route::get('danhsach',['as'=>'donvitinh-list','uses'=>'donvitinhController@getDanhSach']);
        Route::get('sua/{donvitinh_id}',['as'=>'donvitinh-edit','uses'=>'donvitinhController@getSua']);
        Route::post('sua/{donvitinh_id}',['as'=>'donvitinh-edit','uses'=>'donvitinhController@postSua']);
        Route::get('xoa/{donvitinh_id}',['as'=>'donvitinh-delete','uses'=>'donvitinhController@getXoa']);
        Route::get('them',['as'=>'donvitinh-add','uses'=>'donvitinhController@getThem']);
        Route::post('them',['as'=>'donvitinh-add','uses'=>'donvitinhController@postThem']);
    });

    Route::group(['prefix'=>'khachhang'],function(){
        Route::get('danhsach',['as'=>'khachhang-list','uses'=>'khachhangController@getDanhSach']);
        Route::get('xoa/{kh_id}',['as'=>'khachhang-delete','uses'=>'khachhangController@getXoa']);
    });
    Route::group(['prefix'=>'khohang'],function(){
        Route::get('danhsach',['as'=>'khohang-list','uses'=>'khohangController@getDanhSach']);
        Route::get('sua/{khohang_id}',['as'=>'khohang-edit','uses'=>'khohangController@getSua']);
        Route::post('sua/{khohang_id}',['as'=>'khohang-edit','uses'=>'khohangController@postSua']);
        Route::get('xoa/{khohang_id}',['as'=>'khohang-delete','uses'=>'khohangController@getXoa']);
        Route::get('them',['as'=>'khohang-add','uses'=>'khohangController@getThem']);
        Route::post('them',['as'=>'khohang-add','uses'=>'khohangController@postThem']);
    });
    Route::group(['prefix'=>'loaikhuyenmai'],function(){
        Route::get('danhsach',['as'=>'loaikhuyenmai-list','uses'=>'loaikhuyenmaiController@getDanhSach']);
        Route::get('sua/{km_id}',['as'=>'loaikhuyenmai-edit','uses'=>'loaikhuyenmaiController@getSua']);
        Route::post('sua/{km_id}',['as'=>'loaikhuyenmai-edit','uses'=>'loaikhuyenmaiController@postSua']);
        Route::get('xoa/{km_id}',['as'=>'loaikhuyenmai-delete','uses'=>'loaikhuyenmaiController@getXoa']);
        Route::get('them',['as'=>'loaikhuyenmai-add','uses'=>'loaikhuyenmaiController@getThem']);
        Route::post('them',['as'=>'loaikhuyenmai-add','uses'=>'loaikhuyenmaiController@postThem']);
    });
    Route::group(['prefix'=>'loainguoidung'],function(){
        Route::get('danhsach',['as'=>'loainguoidung-list','uses'=>'loainguoidungController@getDanhSach']);
        Route::get('sua/{lnd_id}',['as'=>'loainguoidung-edit','uses'=>'loainguoidungController@getSua']);
        Route::post('sua/{lnd_id}',['as'=>'loainguoidung-edit','uses'=>'loainguoidungController@postSua']);
        Route::get('xoa/{lnd_id}',['as'=>'loainguoidung-delete','uses'=>'loainguoidungController@getXoa']);
        Route::get('them',['as'=>'loainguoidung-add','uses'=>'loainguoidungController@getThem']);
        Route::post('them',['as'=>'loainguoidung-add','uses'=>'loainguoidungController@postThem']);
    });
    Route::group(['prefix'=>'loainhanvien'],function(){
        Route::get('danhsach',['as'=>'loainhanvien-list','uses'=>'loainhanvienController@getDanhSach']);
        Route::get('sua/{lnv_id}',['as'=>'loainhanvien-edit','uses'=>'loainhanvienController@getSua']);
        Route::post('sua/{lvd_id}',['as'=>'loainhanvien-edit','uses'=>'loainhanvienController@postSua']);
        Route::get('xoa/{lnv_id}',['as'=>'loainhanvien-delete','uses'=>'loainhanvienController@getXoa']);
        Route::get('them',['as'=>'loainhanvien-add','uses'=>'loainhanvienController@getThem']);
        Route::post('them',['as'=>'loainhanvien-add','uses'=>'loainhanvienController@postThem']);
    });
    Route::group(['prefix'=>'loaithanhtoan'],function(){
        Route::get('danhsach',['as'=>'loaithanhtoan-list','uses'=>'loaithanhtoanController@getDanhSach']);
        Route::get('sua/{ltt_id}',['as'=>'loaithanhtoan-edit','uses'=>'loaithanhtoanController@getSua']);
        Route::post('sua/{ltt_id}',['as'=>'loaithanhtoan-edit','uses'=>'loaithanhtoanController@postSua']);
        Route::get('xoa/{ltt_id}',['as'=>'loaithanhtoan-delete','uses'=>'loaithanhtoanController@getXoa']);
        Route::get('them',['as'=>'loaithanhtoan-add','uses'=>'loaithanhtoanController@getThem']);
        Route::post('them',['as'=>'loaithanhtoan-add','uses'=>'loaithanhtoanController@postThem']);
    });
    Route::group(['prefix'=>'loaithue'],function(){
        Route::get('danhsach',['as'=>'loaithue-list','uses'=>'loaithueController@getDanhSach']);
        Route::get('sua/{loai_thue_id}',['as'=>'loaithue-edit','uses'=>'loaithueController@getSua']);
        Route::post('sua/{loai_thue_id}',['as'=>'loaithue-edit','uses'=>'loaithueController@postSua']);
        Route::get('xoa/{loai_thue_id}',['as'=>'loaithue-delete','uses'=>'loaithueController@getXoa']);
        Route::get('them',['as'=>'loaithue-add','uses'=>'loaithueController@getThem']);
        Route::post('them',['as'=>'loaithue-add','uses'=>'loaithueController@postThem']);
    });
    Route::group(['prefix'=>'mucthue'],function(){
        Route::get('danhsach',['as'=>'mucthue-list','uses'=>'mucthueController@getDanhSach']);
        Route::get('sua/{mt_id}',['as'=>'mucthue-edit','uses'=>'mucthueController@getSua']);
        Route::post('sua/{mt_id}',['as'=>'mucthue-edit','uses'=>'mucthueController@postSua']);
        Route::get('xoa/{mt_id}',['as'=>'mucthue-delete','uses'=>'mucthueController@getXoa']);
        Route::get('them',['as'=>'mucthue-add','uses'=>'mucthueController@getThem']);
        Route::post('them',['as'=>'mucthue-add','uses'=>'mucthueController@postThem']);
    });
    Route::group(['prefix'=>'nguoidung'],function(){
        Route::get('danhsach',['as'=>'nguoidung-list','uses'=>'nguoidungController@getDanhSach']);
        Route::get('sua/{nd_id}',['as'=>'nguoidung-edit','uses'=>'nguoidungController@getSua']);
        Route::post('sua/{nd_id}',['as'=>'nguoidung-edit','uses'=>'nguoidungController@postSua']);
        Route::get('xoa/{nd_id}',['as'=>'nguoidung-delete','uses'=>'nguoidungController@getXoa']);
        Route::get('them',['as'=>'nguoidung-add','uses'=>'nguoidungController@getThem']);
        Route::post('them',['as'=>'nguoidung-add','uses'=>'nguoidungController@postThem']);
    });
    Route::group(['prefix'=>'nhanvien'],function(){
        Route::get('danhsach',['as'=>'nhanvien-list','uses'=>'nhanvienController@getDanhSach']);
        Route::get('sua/{nv_id}',['as'=>'nhanvien-edit','uses'=>'nhanvienController@getSua']);
        Route::post('sua/{nv_id}',['as'=>'nhanvien-edit','uses'=>'nhanvienController@postSua']);
        Route::get('xoa/{nv_id}',['as'=>'nhanvien-delete','uses'=>'nhanvienController@getXoa']);
        Route::get('them',['as'=>'nhanvien-add','uses'=>'nhanvienController@getThem']);
        Route::post('them',['as'=>'nhanvien-add','uses'=>'nhanvienController@postThem']);
    });
    Route::group(['prefix'=>'nhasanxuat'],function(){
        Route::get('danhsach',['as'=>'nhasanxuat-list','uses'=>'nhasanxuatController@getDanhSach']);
        Route::get('sua/{nsx_id}',['as'=>'nhasanxuat-edit','uses'=>'nhasanxuatController@getSua']);
        Route::post('sua/{nsx_id}',['as'=>'nhasanxuat-edit','uses'=>'nhasanxuatController@postSua']);
        Route::get('xoa/{nsx_id}',['as'=>'nhasanxuat-delete','uses'=>'nhasanxuatController@getXoa']);
        Route::get('them',['as'=>'nhasanxuat-add','uses'=>'nhasanxuatController@getThem']);
        Route::post('them',['as'=>'nhasanxuat-add','uses'=>'nhasanxuatController@postThem']);
    });
    Route::group(['prefix'=>'phieugiamgia'],function(){
        Route::get('danhsach',['as'=>'phieugiamgia-list','uses'=>'phieugiamgiaController@getDanhSach']);
        Route::get('sua/{pgg_id}',['as'=>'phieugiamgia-edit','uses'=>'phieugiamgiaController@getSua']);
        Route::post('sua/{pgg_id}',['as'=>'phieugiamgia-edit','uses'=>'phieugiamgiaController@postSua']);
        Route::get('xoa/{pgg_id}',['as'=>'phieugiamgia-delete','uses'=>'phieugiamgiaController@getXoa']);
        Route::get('them',['as'=>'phieugiamgia-add','uses'=>'phieugiamgiaController@getThem']);
        Route::post('them',['as'=>'phieugiamgia-add','uses'=>'phieugiamgiaController@postThem']);
    });
    Route::group(['prefix'=>'sanpham'],function(){
        //Danh sách sản phẩm
        Route::get('danhsach',['as'=>'sanpham-list','uses'=>'sanphamController@getDanhSach']);

        //Sửa sản phẩm
        Route::get('sua/{sp_id}',['as'=>'sanpham-edit','uses'=>'sanphamController@getSua']);
        Route::post('sua/{sp_id}',['as'=>'sanpham-edit','uses'=>'sanphamController@postSua']);

        //Xóa sản phẩm
        Route::get('xoa/{sp_id}',['as'=>'sanpham-delete','uses'=>'sanphamController@getXoa']);

        //Thêm sản phẩm
        Route::get('them',['as'=>'sanpham-add','uses'=>'sanphamController@getThem']);
        Route::post('them',['as'=>'sanpham-add','uses'=>'sanphamController@postThem']);

        //Thêm hình ảnh sản phẩm
        Route::get('them-hinh-anh/{sp_id}','sanphamController@getThemHinhAnh');
        Route::post('them-hinh-anh/{sp_id}','sanphamController@postThemHinhAnh');

        //Sửa hình ảnh sản phẩm
        Route::get('sua-hinh-anh/{ha_id}/{mau_id}/{sp_id}','sanphamController@getSuaHinhAnh');
        Route::post('sua-hinh-anh/{ha_id}/{mau_id}/{sp_id}','sanphamController@postSuaHinhAnh');

        //Xóa hình ảnh sản phẩm
        Route::get('xoa-hinh-anh/{ha_id}/{mau_id}/{sp_id}','sanphamController@getXoaHinhAnh');

        //Thêm kích thước sản phẩm
        Route::get('them-kich-thuoc/{sp_id}','sanphamController@getThemKichThuoc');
        Route::post('them-kich-thuoc/{sp_id}','sanphamController@postThemKichThuoc');

        //Sửa kích thước sản phẩm
        Route::get('sua-kich-thuoc/{kt_id}/{sp_id}','sanphamController@getSuaKichThuoc');
        Route::post('sua-kich-thuoc/{kt_id}/{sp_id}','sanphamController@postSuaKichThuoc');

        //Xóa kích thước sản phẩm
        Route::get('xoa-kich-thuoc/{kt_id}/{sp_id}','sanphamController@getXoaKichThuoc');
    });
    Route::group(['prefix'=>'thanhpho'],function(){
        Route::get('danhsach',['as'=>'thanhpho-list','uses'=>'thanhphoController@getDanhSach']);
        Route::get('sua/{tp_id}',['as'=>'thanhpho-edit','uses'=>'thanhphoController@getSua']);
        Route::post('sua/{tp_id}',['as'=>'thanhpho-edit','uses'=>'thanhphoController@postSua']);
        Route::get('xoa/{tp_id}',['as'=>'thanhpho-delete','uses'=>'thanhphoController@getXoa']);
        Route::get('them',['as'=>'thanhpho-add','uses'=>'thanhphoController@getThem']);
        Route::post('them',['as'=>'thanhpho-add','uses'=>'thanhphoController@postThem']);
    });
    Route::group(['prefix'=>'tinhtrangdonhang'],function(){
        Route::get('danhsach',['as'=>'tinhtrangdonhang-list','uses'=>'tinhtrangdonhangController@getDanhSach']);
        Route::get('sua/{tinh_trang_id}',['as'=>'tinhtrangdonhang-edit','uses'=>'tinhtrangdonhangController@getSua']);
        Route::post('sua/{tinh_trang_id}',['as'=>'tinhtrangdonhang-edit','uses'=>'tinhtrangdonhangController@postSua']);
        Route::get('them',['as'=>'tinhtrangdonhang-add','uses'=>'tinhtrangdonhangController@getThem']);
        Route::post('them',['as'=>'tinhtrangdonhang-add','uses'=>'tinhtrangdonhangController@postThem']);
        Route::get('xoa/{tinh_trang_id}',['as'=>'tinhtrangdonhang-delete','uses'=>'tinhtrangdonhangController@getXoa']);
    });
    Route::group(['prefix'=>'tintuc'],function(){
        Route::get('danhsach',['as'=>'tintuc-list','uses'=>'tintucController@getDanhSach']);
        Route::get('sua/{tt_id}',['as'=>'tintuc-edit','uses'=>'tintucController@getSua']);
        Route::post('sua/{tt_id}',['as'=>'tintuc-edit','uses'=>'tintucController@postSua']);
        Route::get('xoa/{tt_id}',['as'=>'tintuc-delete','uses'=>'tintucController@getXoa']);
        Route::get('them',['as'=>'tintuc-add','uses'=>'tintucController@getThem']);
        Route::post('them',['as'=>'tintuc-add','uses'=>'tintucController@postThem']);
    });
});
/*----------------------------------------------XỬ LÝ AJAX-------------------------------------------------------------*/
Route::group(['prefix' => 'ajax'], function (){
    Route::get('quan-huyen/{id_tp}', 'AjaxController@getQuanHuyen');
    Route::get('phuong-xa/{id_qh}', 'AjaxController@getPhuongXa');
    Route::get('dia-chi/{id_kh}', 'AjaxController@getDiaChi');
    Route::get('total-pgg/{id_dh}/{id_pgg}', 'AjaxController@getTotalPGG');
    Route::get('total-cpvc/{id_dh}/{id_cpvc}', 'AjaxController@getTotalCPVC');
    Route::get('don-hang/{id_kh}', 'AjaxController@getDonHang');
    Route::get('muc-san-pham/{dmsp_id}', 'AjaxController@getMucSanPham');
    Route::get('gia-ban/{thue_id}/{km_id}/{gia_ban}', 'AjaxController@getGiaBan');
    Route::get('gia-ban-thue/{thue_id}/{km_id}/{gia_ban}', 'AjaxController@getGiaBanThue');
    Route::get('gia-ban-khuyen-mai/{thue_id}/{km_id}/{gia_ban}', 'AjaxController@getGiaBanKhuyenMai');
    Route::get('cuoc-phi/{dcgh_id}/{total}', 'AjaxController@getCuocPhi');
    Route::get('binh-luan/{position}', 'AjaxController@getBinhLuan');

});
