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

@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li class="active">Đăng nhập</li>
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
                <form method="post" action="{{url('user/login')}}" class="form-control" style="height: 100%">
                    {{csrf_field()}}
                    <div class="col-md-12">
                        <legend class="text-center">
                            <h3  style="color: #D50000; margin: 10px;">Chào mừng bạn đến với DC-Shopping</h3>
                        </legend>
                        @if($errors->has('errorLoginUser'))
                            <span class="text-danger">{{$errors->first('errorLoginUser')}}</span>
                        @endif
                    </div>
                    {{--Email người dùng--}}
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <label>Địa chỉ email:</label>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-1" style="padding: 1px; border: 1px solid #ccc">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            </div>
                            <div class="col-md-10" style="padding: 0">
                                <input class="form-control" type="text" name="txtUserEmail" placeholder="Vui lòng nhập email người dùng..">
                                @if($errors->has('txtUserEmail'))
                                    <span class="text-danger">{{$errors->first('txtUserEmail')}}</span>
                                @endif
                            </div>

                        </div>
                    </div>
                    {{--Mật khẩu người dùng--}}
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <label style="margin-top: 5px">Mật khẩu:</label>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-1" style="padding: 1px; border: 1px solid #ccc">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            </div>
                            <div class="col-md-10" style="padding: 0">
                                <input class="form-control" type="password" name="txtUserPass" placeholder="Vui lòng nhập mật khẩu.." >
                                @if($errors->has('txtUserPass'))
                                    <span class="text-danger">{{$errors->first('txtUserPass')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{--Quên mật khẩu--}}
                    <div class="col-md-12" style="margin-top: 10px">
                        <div class="col-md-10">
                           <label><a href="{{url('user/forgot-password')}}" class="text-info">Quên mật khẩu?</a></label>
                        </div>
                        <div class="col-md-6">
                            <input type="checkbox" name="cbRemember">
                            <label>Duy trì đăng nhập</label>
                        </div>
                    </div>
                    {{--Nút đăng nhập--}}
                    <div class="text-center">
                        <div class="col-md-12">
                            <input id="but" class="btn" type="submit" value="Đăng nhập" style="width: 30%">
                        </div>
                    </div>
                    {{--Nút đăng ký--}}
                    <div class="text-center">
                        <label style="margin-top: 10px">
                            Chưa có tài khoản?
                            <a href="{{url('user/register')}}" class="text-info">Đăng ký</a>
                        </label>
                    </div>
                    {{--Đăng nhập bằng Facebook và Gmail: về sau làm--}}
                    <div class="text-center">
                        <label style="margin-top: 10px">
                            Hoặc đăng nhập với..<br>
                            <a href="{{url('redirect/facebook')}}" class="btn" style="background: #4267b2; color: white">
                                <i class="fa fa-facebook-square" style="margin-right: 10px"></i><b>Đăng nhập với Facebook</b>
                            </a>
                            hay
                            <a href="{{url('redirect/google')}}" class="btn" style="background: #db4437; color: white">
                                <i class="fa fa-google" style="margin-right: 10px"></i><b>Đăng nhập với Google</b>
                            </a>
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
