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
                <li class="active">Thay đổi mật khẩu</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->

    <!-- section -->
    <div class="section" style="background-color: #E0E0E0">
        <!-- container -->
        <div class="container" style="width: 50%">
            <!-- row -->
            @if(count($errors)>0)
                <div class="alert alert-danger">
                  @foreach($errors->all() as $err)
                      {{$err}}<br>
                  @endforeach
                  <div>
            @endif
            @if(session('thongbao'))
            <div class="alert alert-success">{{session('thongbao')}}</div>
            @endif
            <div class="row">
                <form method="post" action="user/change-password/{{$nguoidung->nd_id}}" class="form-control col-md-12" style="height: 100%">
                    <input type="hidden"name="_token" value="{{csrf_token()}}">
                    <div class="col-md-12 " style="margin-top: 10px;">
                        <legend class="text-center">
                            <h3  style="color: #D50000; margin: 10px;">Thay đổi mật khẩu</h3>
                        </legend>
                    </div>
                    {{--Tên người dùng--}}
                    <div class="col-md-12" style="margin-top: 10px;">
                        <div class="col-md-6">
                            <label>Tên người dùng:</label>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-10" style="padding: 0">
                                <input class="form-control" type="text" name="name"  value="{{$nguoidung->name}}" readonly>
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
                                <input class="form-control" type="text" name="email" value="{{$nguoidung->email}}" readonly>
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
                                <input class="form-control" type="password" name="password" placeholder="Vui lòng nhập mật khẩu..">
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
                                <input class="form-control" type="password" name="ConfirmPassword" placeholder="Vui lòng nhập mật khẩu.." >
                            </div>
                        </div>
                    </div>
                    {{--Nút đồng ý--}}
                    <div class="text-center">
                        <div class="col-md-10" style="margin-top: 10px;">
                            <input id="but" class="btn" type="submit" value="Đồng ý" style="width: 30%">
                        </div>
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
