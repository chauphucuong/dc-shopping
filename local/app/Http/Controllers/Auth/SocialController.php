<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\KhachHang;
use App\LoaiNguoiDung;
use App\NguoiDung;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function callback($social)
    {
        if (!isset($_GET['error'])) {
            $user                       = Socialite::driver($social)->stateless()->user();
            $nguoi_dung                 = NguoiDung::where('email', $user->email)->first();
            $loai_nguoi_dung            = LoaiNguoiDung::where('lnd_ten', $social)->first();

            if(!$nguoi_dung){
                $nguoi_dung             = new NguoiDung();
                $nguoi_dung->nd_lnd_id  = $loai_nguoi_dung->lnd_id;
                $nguoi_dung->name       = $user->name;
                $nguoi_dung->email      = $user->email;
                $nguoi_dung->password   = bcrypt("");
                $nguoi_dung->created_at = Carbon::now();
                $nguoi_dung->updated_at = Carbon::now();
                $nguoi_dung->save();

                $item                   = new KhachHang();
                $item->kh_ten           = $user->name;
                $item->kh_email         = $user->email;
                $item->kh_ngay_sinh     = "";
                $item->kh_gioi_tinh     = "";
                $item->kh_sdt           = "";
                $item->created_at       = Carbon::now();
                $item->updated_at       = Carbon::now();
                $item->save();

                Auth::login($nguoi_dung);
            }else{
                Auth::login($nguoi_dung);
            }

            return redirect('/');
        }
        return redirect('user/login');
    }
}
