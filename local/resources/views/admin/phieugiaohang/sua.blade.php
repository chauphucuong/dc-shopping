@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Phiếu giao hàng Edit
                        <small>{{$phieugiaohang->pgh_id}}</small>
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
                    <form action="admin/phieugiaohang/sua/{{$phieugiaohang->pgh_id}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <!-- /.col-lg-12 -->
                        <div class="col-lg-7" style="padding-bottom:120px">
                            <div class="form-group">
                                <label>Đơn hàng của ngày  :</label>
                                <select class="form-control" name="pgh_dh_id">
                                    @foreach($donhang as $dh)
                                        <option value="{{$dh->dh_id}}"
                                        <?php if($dh->dh_id == $phieugiaohang->pgh_dh_id){echo 'selected';} ?>
                                        >{{$dh->dh_ngay_dat_hang}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nhân viên phụ trách đơn hàng  :</label>
                                <select class="form-control" name="pgh_nv_id">
                                    @foreach($nhanvien as $nv)
                                        <option value="{{$nv->nv_id}}"
                                        <?php if($nv->nv_id == $phieugiaohang->pgh_nv_id){echo 'selected';} ?>
                                        >{{$nv->nv_ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ngày giao hàng :</label>
                                <input class="form-control" type="date" name="pgh_ngay_giao_hang" placeholder="Nhập ngày giao hàng"
                                value="{{date('Y-m-d', strtotime($phieugiaohang->pgh_ngay_giao_hang))}}"/>
                            </div>
                            <div class="form-group">
                                <label>Tình trạng đơn hàng  :</label>
                                <select class="form-control" name="pgh_tinh_trang_id">
                                    @foreach($tinhtrang as $tt)
                                        <option value="{{$tt->tinh_trang_id}}"
                                        <?php if($tt->tinh_trang_id == $phieugiaohang->pgh_tinh_trang_id){echo 'selected';} ?>
                                        >{{$tt->tinh_trang_ten}}</option>
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
