@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">  Danh Sách Đơn Hàng
                </h1>
            </div>
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
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Mã hóa đơn đặt hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Địa chỉ giao hàng</th>
                        <th>Mã phiếu giảm giá</th>
                        <th>Loại thanh toán</th>
                        <th>Cước phí vận chuyển</th>
                        <th>Tổng tiền</th>
                        <th>Tình trạng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Ngày giao hàng</th>
                        <th>Ngày Tạo</th>
                        <th>Ngày Update</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($donhang as $dh)
                  <tr class="odd gradeX" align="center">
                      <td>{{$dh->dh_id}}</td>
                      <td>{{\App\KhachHang::find($dh->dh_kh_id)->kh_ten}}</td>
                      <?php
                       $diachi = \App\DiaChiGiaoHang::find($dh->dh_dia_chi_id);
                       $value  = $diachi->dcgh_dia_chi.', '.$diachi->dcgh_phuong_xa.', '.$diachi->dcgh_quan_huyen.', '.$diachi->dcgh_thanh_pho;
                      ?>
                      <td>{{$value }}</td>
                      <td>{{\App\PhieuGiamGia::find($dh->dh_pgg_id)->pgg_ten}}</td>
                      <td>{{\App\LoaiThanhToan::find($dh->dh_ltt_id)->ltt_ten}}</td>
                      <td>{{ number_format(\App\CuocPhiVanCHuyen::find($dh->dh_cpvc_id)->cpvc_gia_cuoc)}} <u>đ</u></td>
                      <td>{{number_format($dh->dh_tong_tien)}} <u>đ</u></td>
                      <td>{{\App\TinhTrangDonHang::find($dh->dh_tinh_trang_id)->tinh_trang_ten}}</td>
                      <td>{{$dh->dh_ngay_dat_hang}}</td>
                      <td>{{$dh->dh_ngay_giao_hang}}</td>
                      <td>{{$dh->created_at}}</td>
                      <td>{{$dh->updated_at}}</td>
                      <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/donhang/xoa/{{$dh->dh_id}}"> Delete</a></td>
                      <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/donhang/sua/{{$dh->dh_id}}">Edit</a></td>
                  </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection
