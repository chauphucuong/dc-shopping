@extends('layouts.master-layout')

@section('title')
    <title>OU-Computer</title>
@endsection

@section('header')
    @include('layouts.header')
@endsection

@section('navigation')
    @include('layouts.nav')
@endsection

@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Đăng ký</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->

    <!-- section -->
    <div class="section" style="background-color: #E0E0E0">
        <!-- container -->
        <div class="container" style="width: 50%">
            <!-- row -->
            <div class="row">
                <form method="post" action="{{url('user/register')}}" class="form-control" style="height: 100%">
                    {{csrf_field()}}
                    <div class="col-md-12" style="margin-top: 10px;">
                        <legend class="text-center">
                            <h3  style="color: #D50000; margin: 10px;">Đăng ký tài khoản với DC-Shopping</h3>
                        </legend>
                    </div>
                    {{--Tên người dùng--}}
                    <div class="col-md-12" style="margin-top: 10px;">
                        <div class="col-md-6">
                            <label>Tên người dùng:</label>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-10" style="padding: 0">
                                <input class="form-control" type="text" name="txtUserNameRG" placeholder="Vui lòng nhập tên..">
                                @if($errors->has('txtUserNameRG'))
                                    <span class="text-danger">{{$errors->first('txtUserNameRG')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{--Số điện thoại--}}
                    <div class="col-md-12" style="margin-top: 10px;">
                        <div class="col-md-6">
                            <label>Số điện thoại:</label>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-10" style="padding: 0">
                                <input class="form-control" type="text" name="txtUserPhoneRG" placeholder="Vui lòng nhập số điện thoại..">
                                @if($errors->has('txtUserPhoneRG'))
                                    <span class="text-danger">{{$errors->first('txtUserPhoneRG')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{--Ngày tháng năm sinh--}}
                    <div class="col-md-12" style="margin-top: 10px;">
                        <div class="col-md-6">
                            <label>Ngày sinh:</label>
                        </div>
                        <div class="col-md-12">
                            {{--Ngày--}}
                            <div class="col-md-2" style="padding: 0">
                                <select name="dayRG">
                                    <option style="color: #999;" selected value="null">Ngày</option>
                                    @for($i = 1; $i <= 31; $i++)
                                        <option>{{$i}}</option>
                                    @endfor
                                </select>
                                <i style="padding-left: 15%">/</i>
                            </div>
                            {{--Tháng--}}
                            <div class="col-md-2" style="padding: 0">
                                <select name="monthRG">
                                    <option style="color: #999;" selected value="null">Tháng</option>
                                    @for($i = 1; $i <= 12; $i++)
                                        <option>{{$i}}</option>
                                    @endfor
                                </select>
                                <i style="padding-left: 10%">/</i>
                            </div>
                            {{--Năm--}}
                            <div class="col-md-3" style="padding: 0">
                                <select name="yearRG">
                                    <option style="color: #999;" selected value="null">Năm</option>
                                    @for($i = 1900; $i <= date('Y'); $i++)
                                        <option>{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                            {{--Giới tính--}}
                            <div class="col-md-3 text-right" style="padding: 0">
                                <i class="fa fa-male"></i>
                                <i class="fa fa-female"></i>
                                <select name="sexRG">
                                    <option style="color: #999;" selected value="null">Giới tính</option>
                                    <option>Nam</option>
                                    <option>Nữ</option>
                                </select>
                                @if($errors->has('sexRG'))
                                   <div><span class="text-danger">{{$errors->first('sexRG')}}</span></div>
                            @endif
                            </div>
                        </div>
                    </div>
                    {{--Địa chỉ email--}}
                    <div class="col-md-12" style="margin-top: 10px;">
                        <div class="col-md-6">
                            <label>Địa chỉ email:</label>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-10" style="padding: 0">
                                <input class="form-control" type="text" name="txtUserAccountRG" placeholder="Vui lòng nhập email..">
                                @if($errors->has('txtUserAccountRG'))
                                    <span class="text-danger">{{$errors->first('txtUserAccountRG')}}</span>
                                @elseif(session('existEmail'))
                                    <span class="text-danger">{{session('existEmail')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{--Mật khẩu--}}
                    <div class="col-md-12" style="margin-top: 10px;">
                        <div class="col-md-6">
                            <label style="margin-top: 5px">Mật khẩu:</label>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-10" style="padding: 0">
                                <input class="form-control" type="password" name="txtUserPassRG" placeholder="Vui lòng nhập mật khẩu.." >
                                @if($errors->has('txtUserPassRG'))
                                    <span class="text-danger">{{$errors->first('txtUserPassRG')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{--Xác nhận mật khẩu--}}
                    <div class="col-md-12" style="margin-top: 10px;">
                        <div class="col-md-6">
                            <label style="margin-top: 5px">Nhập lại mật khẩu:</label>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-10" style="padding: 0">
                                <input class="form-control" type="password" name="txtUserPassConfirmRG" placeholder="Vui lòng nhập mật khẩu.." >
                                @if($errors->has('txtUserPassConfirmRG'))
                                    <span class="text-danger">{{$errors->first('txtUserPassConfirmRG')}}</span>
                                @elseif(session('wrongPass'))
                                    <span class="text-danger">{{session('wrongPass')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{--Checkbox nhận tin khuyến mãi--}}
                    <div class="col-md-12" style="margin-top: 10px">
                        <div class="col-md-6">
                            <input type="checkbox" name="cbAccept">
                            <label>Nhận tin khuyến mãi từ DC-Shopping</label>
                        </div>
                    </div>
                    {{--Nút đăng ký--}}
                    <div class="text-center">
                        <div class="col-md-10">
                            <input id="but" class="btn" type="submit" value="Đăng ký" style="width: 30%">
                        </div>
                    </div>
                    {{--Nút đăng nhập--}}
                    <div class="col-md-10 text-center">
                        <label style="margin-top: 10px">
                            Đã có tài khoản?
                            <a href="{{url('/user-login')}}" class="text-info">Đăng nhập</a>
                        </label>
                    </div>
                    {{--Đăng nhập bằng Facebook và Gmail: về sau làm--}}
                    <div class="text-center">
                        <label style="margin: 10px 16% 10px 0">
                            Hoặc đăng nhập với..
                        </label>
                    </div>
                </form>
            </div>
            <!-- /row -->
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
