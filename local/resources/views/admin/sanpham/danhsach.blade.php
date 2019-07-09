@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">  Danh Sách Sản Phẩm
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
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng tồn kho</th>
                        <th>Giá niêm yết</th>
                        <th>Giá bán</th>
                        <th>Mô tả</th>
                        <th>Đơn vị tính</th>
                        <th>Thuộc loại sản phẩm</th>
                        <th>Thuộc nhà sản xuất</th>
                        <th>Thuộc kho hàng</th>
                        <th>Thuộc loại thuế</th>
                        <th>Thuộc loại khuyến mãi</th>
                        <th>Trạng thái</th>
                        <th>Ngày bán</th>
                        <th>Ngày update</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                  @foreach($sanpham as $sp)
                  <tr class="odd gradeX" align="center">
                      <td>{{$sp->sp_id}}</td>
                      <td>{{$sp->sp_ten}}</td>
                      <td>{{$sp->sp_so_luong_ton_kho}}</td>
                      <td>{{number_format($sp->sp_gia_niem_yet)}} <u>đ</u></td>
                      <td>{{number_format($sp->sp_gia_ban)}} <u>đ</u></td>
                      <td>{!! $sp->sp_mo_ta !!}</td>
                      <td>{{\App\DonViTinh::find($sp->sp_don_vi_tinh_id)->donvitinh_ten}}</td>
                      <td>{{\App\DanhMucSanPham::find($sp->sp_danh_muc_id)->dmsp_ten}}</td>
                      <td>{{\App\NhaSanXuat::find($sp->sp_nsx_id)->nsx_ten}}</td>
                      <td>{{\App\KhoHang::find($sp->sp_kho_hang_id)->khohang_ten}}</td>
                      <td>{{\App\MucThue::find($sp->sp_muc_thue_id)->mt_ten}}</td>
                      <td>{{\App\LoaiKhuyenMai::find($sp->sp_khuyen_mai_id)->km_ten}}</td>
                      <td>{{$sp->trang_thai}}</td>
                      <td>{{$sp->created_at}}</td>
                      <td>{{$sp->updated_at}}</td>
                      <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/sanpham/xoa/{{$sp->sp_id}}"> Delete</a></td>
                      <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/sanpham/sua/{{$sp->sp_id}}">Edit</a></td>
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
