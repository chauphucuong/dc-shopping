<?php

namespace App\Http\Controllers;
use App\Tintuc;
use App\DanhMucTinTuc;
use Carbon\Carbon;
use Illuminate\Http\Request;
class tintucController extends Controller
{
  public function getDanhSach(){
    $tintuc     =   Tintuc::all();
    return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
  }
  public function getThem(){
    $loaitintuc =   DanhMucTinTuc::all();
    return view('admin.tintuc.them',['loaitintuc'=>$loaitintuc]);
  }
  public function postThem(Request $request){
        $this->validate($request,[
          'tt_ltt_id'               =>'required',
          'tt_tieu_de'              =>'required|unique:tintuc,tt_tieu_de',
          'tt_mo_ta'                =>'required',
          'tt_noi_dung'             =>'required'
        ],
        [
          'tt_ltt_id.required'      =>'Bạn không được để trống danh mục tin tức',
          'tt_tieu_de.required'     =>'Bạn chưa nhập tiêu đề',
          'tt_tieu_de.unique'       =>"Tiêu đề đã tồn tại",
          'tt_mo_ta.required'       =>'Bạn chưa nhập mô tả tin tức',
          'tt_noi_dung.required'    =>'Bạn chưa nhập nội dung tin tức',
        ]);
        $tintuc = new Tintuc;
        $tintuc->tt_ltt_id = $request->tt_ltt_id;
        if($request->hasFile('tt_hinh_anh'))
        {
          $file=$request->file('tt_hinh_anh');
          $duoi=$file->getClientOriginalExtension();
          if($duoi != "jpg" && $duoi != "png" && $duoi != 'jpeg')
          {
            return redirect('admin/tintuc/them')->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
          }
          $name=$file->getClientOriginalName();
          $tt_hinh_anh=str_random(4)."_".$name;
          while(file_exists("uploads/tintuc/".$tt_hinh_anh))
          {
              $tt_hinh_anh=str_random(4)."_".$name;
          }
          $file->move("uploads/tintuc",$tt_hinh_anh);
          $tintuc->tt_hinh_anh  =   $tt_hinh_anh;
        }else{
            $tintuc->tt_hinh_anh= "";
        }
        $tintuc->tt_tieu_de     =   $request->tt_tieu_de;
        $tintuc->tt_mo_ta       =   $request->tt_mo_ta;
        $tintuc->tt_noi_dung    =   $request->tt_noi_dung;
        $tintuc->trang_thai     =   $request->trang_thai;
        $tintuc->created_at     =   Carbon::now();
        $tintuc->updated_at     =   Carbon::now();
        $tintuc->save();
        return redirect('admin/tintuc/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id){
      $loaitintuc=DanhMucTinTuc::all();
      $tintuc=Tintuc::find($id);
      return view('admin.tintuc.sua',['loaitintuc'=>$loaitintuc,'tintuc'=>$tintuc]);
    }
    public function postSua(Request $request,$id){
          $tintuc=Tintuc::find($id);
          $this->validate($request,[
            'tt_ltt_id'             =>  'required',
            'tt_tieu_de'            =>  'required|unique:tintuc,tt_tieu_de',
            'tt_mo_ta'              =>  'required',
            'tt_noi_dung'           =>  'required'
          ],
          [
            'tt_ltt_id.required'    =>  'Bạn không được để trống danh mục tin tức',
            'tt_tieu_de.required'   =>  'Bạn chưa nhập tiêu đề',
            'tt_tieu_de.unique'     =>  "Tiêu đề đã tồn tại",
            'tt_mo_ta.required'     =>  'Bạn chưa nhập mô tả tin tức',
            'tt_mo_ta.min'          =>  'Mô tả tin tức lớn hơn 10 kí tự',
            'tt_noi_dung.required'  =>  'Bạn chưa nhập nội dung tin tức',

          ]);
        if($request->hasFile('tt_hinh_anh'))
        {
            $file       = $request->file('tt_hinh_anh');
            $duoi       = $file->getClientOriginalExtension();
            if($duoi != "jpg" && $duoi != "png" && $duoi != 'jpeg')
            {
                return redirect()->back()->withErrors('Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name        = $file->getClientOriginalName();
            $tt_hinh_anh = str_random(4)."_".$name;
            while(file_exists("uploads/tintuc/".$tt_hinh_anh))
            {
                $tt_hinh_anh=str_random(4)."_".$name;
            }
            $file->move("uploads/tintuc",$tt_hinh_anh);
            $tintuc->tt_hinh_anh  =   $tt_hinh_anh;
        }else{
            $tintuc->tt_hinh_anh  = "";
        }
          $tintuc->tt_ltt_id      =   $request->tt_ltt_id;
          $tintuc->tt_tieu_de     =   $request->tt_tieu_de;
          $tintuc->tt_mo_ta       =   $request->tt_mo_ta;
          $tintuc->tt_noi_dung    =   $request->tt_noi_dung;
          $tintuc->trang_thai     =   $request->trang_thai;
          $tintuc->updated_at     =   Carbon::now();
          $tintuc->save();
          return redirect('admin/tintuc/sua/'.$id)->with('thongbao','Sửa thành công');
      }
      public function getXoa($id){
        $tintuc=tintuc::find($id);
        $tintuc->delete();
        return redirect('admin/tintuc/danhsach')->with('thongbao','Xóa thành công');
      }
}
