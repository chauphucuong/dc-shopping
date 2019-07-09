<?php

namespace App\Http\Controllers;
use App\KhachHang;
use App\DonHang;
use App\TinhTrangDonHang;
use App\DonHangDoi_Tra;
use Carbon\Carbon;
use Illuminate\Http\Request;

class donhangdoi_traController extends Controller
{
  public function getDanhSach(){
    $donhangdoi_tra     = DonHangDoi_Tra::all();
    return view('admin.donhangdoi_tra.danhsach',['donhangdoi_tra'=>$donhangdoi_tra]);
  }
  public function getThem(){
    $khachhang          = KhachHang::all();

    return view('admin.donhangdoi_tra.them',['khachhang'=>$khachhang]);
  }
  public function postThem(Request $request){
        $this->validate($request,[
          'dhdt_kh_id'                  => 'required',
          'dhdt_dh_id'                  => 'required',
          'dhdt_ngay_doi_tra'           => 'required',
          'dhdt_ly_do'                  => 'required'
        ],
        [
          'dhdt_kh_id.required'         => 'Bạn không được để trống mã khách hàng',
          'dhdt_dh_id.required'         => 'Bạn không được để trống mã đơn hàng',
          'dhdt_ngay_doi_tra.required'  => 'Bạn chưa nhập ngày đổi trả',
          'dhdt_ly_do.required'         => 'Bạn chưa nhập lý do',
        ]);
        $donhangdoi_tra=new DonHangDoi_Tra;
        $donhangdoi_tra->dhdt_kh_id         = $request->dhdt_kh_id;
        $donhangdoi_tra->dhdt_dh_id         = $request->dhdt_dh_id;
        $donhangdoi_tra->dhdt_ngay_doi_tra  = $request->dhdt_ngay_doi_tra;
        $donhangdoi_tra->dhdt_thao_tac      = $request->dhdt_thao_tac;
        $donhangdoi_tra->dhdt_ly_do         = $request->dhdt_ly_do;
        $donhangdoi_tra->dhdt_tinh_trang_id = 1; //Đang xử lý
        $donhangdoi_tra->created_at         = Carbon::now('Asia/Ho_Chi_Minh');
        $donhangdoi_tra->updated_at         = Carbon::now('Asia/Ho_Chi_Minh');
        $donhangdoi_tra->save();
        return redirect('admin/donhangdoi_tra/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id){

      $tinhtrangdonhang =   TinhTrangDonHang::all();
      $donhangdoi_tra   =   DonHangDoi_Tra::find($id);
      $khachhang        =   KhachHang::find($donhangdoi_tra->dhdt_kh_id);
      $donhang          =   DonHang::where('dh_kh_id', $khachhang->kh_id)->get();
      return view('admin.donhangdoi_tra.sua',['khachhang'=>$khachhang,'tinhtrangdonhang'=>$tinhtrangdonhang,'donhang'=>$donhang,'donhangdoi_tra'=>$donhangdoi_tra]);
    }

    public function postSua(Request $request,$id){
          $this->validate($request,[
            'dhdt_ngay_doi_tra'              => 'required',
            'dhdt_ly_do'                     => 'required|min:10|max:100'
          ],
          [
            'dhdt_ngay_doi_tra.required'     => 'Bạn chưa nhập ngày đổi trả',
            'dhdt_ly_do.required'            => 'Bạn chưa nhập lý do',
          ]);

          $donhangdoi_tra                    =  DonHangDoi_Tra::find($id);
          $donhangdoi_tra->dhdt_dh_id        =  $request->dhdt_dh_id;
          $donhangdoi_tra->dhdt_ngay_doi_tra =  $request->dhdt_ngay_doi_tra;
          $donhangdoi_tra->dhdt_thao_tac     =  $request->dhdt_thao_tac;
          $donhangdoi_tra->dhdt_ly_do        =  $request->dhdt_ly_do;
          $donhangdoi_tra->dhdt_tinh_trang_id=  $request->dhdt_tinh_trang_id;
          $donhangdoi_tra->updated_at        =  Carbon::now('Asia/Ho_Chi_Minh');
          $donhangdoi_tra->save();

          return redirect('admin/donhangdoi_tra/sua/'.$id)->with('thongbao','Sửa thành công');
      }
      public function getXoa($id){
        $donhangdoi_tra=DonHangDoi_Tra::find($id);
        $donhangdoi_tra->delete();
        return redirect('admin/donhangdoi_tra/danhsach')->with('thongbao','Xóa thành công');
      }
}
