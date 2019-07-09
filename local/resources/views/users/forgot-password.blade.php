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
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif
                <form method="post" action="{{url('user/forgot-password')}}" class="form-control" style="height: 100%">
                    {{csrf_field()}}
                    <div class="col-md-12">
                        <legend class="text-center">
                            <h3  style="color: #D50000; margin: 10px;">Quên mật khẩu?</h3>
                        </legend>
                    </div>
                    {{--Email người dùng--}}
                    <div class="col-md-12">
                        <p>Nhập địa chỉ email của bạn dưới đây và chúng tôi sẽ gửi cho bạn một liên kết để đặt lại mật khẩu của bạn.</p>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <label>Địa chỉ email:</label>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-1" style="padding: 1px; border: 1px solid #ccc">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            </div>
                            <div class="col-md-10" style="padding: 0">
                                <input class="form-control" type="text" name="txtUserEmailFP" placeholder="Vui lòng nhập email của bạn..">
                            </div>

                        </div>
                    </div>
                    {{--Nút gửi--}}
                    <div class="text-center">
                        <div class="col-md-12" style="margin-top: 10px">
                            <input id="but" class="btn" type="submit" value="Gửi" style="width: 30%">
                        </div>
                    </div>
                    <div>
                        <a href="{{url('user-login')}}"><i class="fa fa-arrow-left"></i> Quay lại</a>
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
    @if(session('status'))
        <script> alert("{{session('status')}}");</script>
    @endif
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
