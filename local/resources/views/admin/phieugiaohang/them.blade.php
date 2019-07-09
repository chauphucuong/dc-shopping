@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Phiếu giao hàng
                        <small>Add</small>
                    </h1>
                </div>
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif
                @if(session('thongbao'))
                    <div class="alert alert-success">{{session('thongbao')}}</div>
            @endif
            <!-- /.col-lg-12 -->
                <div class="col-lg-9" style="padding-bottom:120px">
                    <form action="admin/phieugiaohang/them" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <!-- /.col-lg-12 -->
                        <div class="col-lg-7" style="padding-bottom:120px">
                            <div class="form-group">
                                <label>Đơn hàng của ngày  :</label>
                                <select class="form-control" name="pgh_dh_id">
                                    <option disabled selected>--Chọn đơn hàng--</option>
                                    @foreach($donhang as $dh)
                                        <option value="{{$dh->dh_id}}">{{$dh->dh_ngay_dat_hang}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nhân viên phụ trách đơn hàng  :</label>
                                <select class="form-control" name="pgh_nv_id">
                                    <option disabled selected>--Chọn nhân viên--</option>
                                    @foreach($nhanvien as $nv)
                                        <option value="{{$nv->nv_id}}">{{$nv->nv_ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ngày giao hàng :</label>
                                <input class="form-control" type="date" name="pgh_ngay_giao_hang" placeholder="Nhập ngày giao hàng" />
                            </div>
                            <div class="form-group">
                                <label>Tình trạng đơn hàng  :</label>
                                <select class="form-control" name="pgh_tinh_trang_id">
                                    <option disabled selected>--Chọn tình trạng cho đơn hàng--</option>
                                    @foreach($tinhtrang as $tt)
                                        <option value="{{$tt->tinh_trang_id}}">{{$tt->tinh_trang_ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-default">Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>

                        </div>
                    </form>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
