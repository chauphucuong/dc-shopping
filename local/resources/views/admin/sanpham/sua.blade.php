@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản Phẩm Edit
                    <small> {{$sanpham->sp_id}}</small>
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
            <!-- /.col-lg-12 -->

            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/sanpham/sua/{{$sanpham->sp_id}}" method="POST">
                  <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                  <div class="form-group">
                      <label>Tên sản phẩm:</label>
                      <input class="form-control" name="sp_ten" value="{{$sanpham->sp_ten}}"placeholder="Nhập tên sản phẩm" />
                  </div>
                  <div class="form-group">
                      <label>Số lượng tồn kho :</label>
                      <input class="form-control" type="number" name="sp_so_luong_ton_kho" min="0"
                             value="{{$sanpham->sp_so_luong_ton_kho}}"placeholder="Nhập số lượng tồn kho sản phẩm" />
                  </div>
                  <div class="form-group">
                      <label>Giá niêm yết :</label>
                      <input class="form-control" type="number" name="sp_gia_niem_yet" min="1000"
                             value="{{$sanpham->sp_gia_niem_yet}}" placeholder="Nhập giá niêm yết" />
                  </div>
                  <div class="form-group">
                      <label>Giá bán (sẽ tự động tính với loại thuế và loại khuyến mãi hiện tại):</label>
                      <input class="form-control" type="number" name="sp_gia_ban" id="sp_gia_ban" min="1000"
                             value="{{$sanpham->sp_gia_ban}}"placeholder="Nhập giá bán sản phẩm" />
                  </div>
                  <div class="form-group">
                      <label>Đơn vị tính   :</label>
                      <select class="form-control" name="sp_don_vi_tinh_id">
                        @foreach($donvitinh as $dvt)
                          <option value="{{$dvt->donvitinh_id}}"
                          <?php if($sanpham->sp_don_vi_tinh_id == $dvt->donvitinh_id){echo 'selected';} ?>
                          >{{$dvt->donvitinh_ten}}</option>
                        @endforeach
                      </select>
                  </div>
                    <div class="form-group">
                        <label>Mục sản phẩm  :</label>
                        <select class="form-control" id="sp_danh_muc_id_cha">
                            @foreach($danhmucsanphamCha as $cha)
                                <option value="{{$cha->dmsp_id}}"
                                <?php if($oldDanhmuc->parent == $cha->dmsp_id){echo 'selected';}?>
                                >{{$cha->dmsp_ten}}</option>
                            @endforeach
                        </select>
                    </div>
                  <div class="form-group">
                      <label>Thuộc loại sản phẩm  :</label>
                      <select class="form-control" name="sp_danh_muc_id" id="sp_danh_muc_id_con">
                        @foreach($danhmucsanphamCon as $con)
                          <option value="{{$con->dmsp_id}}"
                          <?php if($sanpham->sp_danh_muc_id == $con->dmsp_id){echo 'selected';} ?>
                          >{{$con->dmsp_ten}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Thuộc nhà sản xuất  :</label>
                      <select class="form-control" name="sp_nsx_id">
                        @foreach($nhasanxuat as $nsx)
                          <option value="{{$nsx->nsx_id}}"
                          <?php if($sanpham->sp_nsx_id == $nsx->nsx_id){echo 'selected';} ?>
                          >{{$nsx->nsx_ten}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Thuộc kho hàng  :</label>
                      <select class="form-control" name="sp_kho_hang_id">
                        @foreach($khohang as $kh)
                          <option value="{{$kh->khohang_id}}"
                          <?php if($sanpham->sp_kho_hang_id == $kh->khohang_id){echo 'selected';} ?>
                          >{{$kh->khohang_ten}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Thuộc mức thuế (sẽ làm thay đổi giá bán):</label>
                      <select class="form-control" name="sp_muc_thue_id" id="sp_muc_thue_id">
                        @foreach($mucthue as $mt)
                          <option value="{{$mt->mt_id}}"
                          <?php if($sanpham->sp_muc_thue_id == $mt->mt_id){echo 'selected';} ?>
                          >{{$mt->mt_ten}} - {{$mt->mt_muc_thue}}%</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Thuộc loại khuyến mãi (sẽ làm thay đổi giá bán):</label>
                      <select class="form-control" name="sp_khuyen_mai_id" id="sp_khuyen_mai_id">
                        @foreach($khuyenmai as $km)
                          <option value="{{$km->km_id}}"
                          <?php if($sanpham->sp_khuyen_mai_id == $km->km_id){echo 'selected';} ?>
                          >{{$km->km_ten}} - {{$km->km_gia}}%</option>
                        @endforeach
                      </select>
                  </div>
                    <div class="form-group">
                        <label>Mô tả :</label>
                        <textarea class="form-control ckeditor" name="sp_mo_ta" placeholder="Điền thông tin mô tả sản phẩm" >
                          {{$sanpham->sp_mo_ta}}
                      </textarea>
                    </div>
                  <div class="form-group">
                      <label>Trạng thái :</label>
                      <label class="radio-inline">
                          <input name="trang_thai" value="ON" checked="" type="radio">ON
                      </label>
                      <label class="radio-inline">
                          <input name="trang_thai" value="OFF" type="radio">OFF
                      </label>
                  </div>
                    <button type="submit" class="btn btn-default">Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
            <div class="col-lg-5">
                <div>
                    <label>Danh sách hình ảnh và màu sắc sẽ bán:</label>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{url('admin/sanpham/them-hinh-anh/'.$sanpham->sp_id)}}">
                            <i class="fa fa-plus"> Thêm mới</i>
                        </a>
                    </div>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Hình ảnh</th>
                            <th>Màu sắc</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hinhanh as $ha)
                            <tr class="odd gradeX" align="center">
                                <td>{{$ha->id}}</td>
                                <td><img width="50px" height="50px" src="uploads/sanpham/{{$ha->hasp_ten}}"/></td>
                                <td>
                                    <?php
                                        $mau = \App\MauSac::where('mau_ha_id', $ha->id)->first();
                                    ?>
                                    @if($mau != null)
                                    <div>
                                        <div style="width: 30px; height: 30px; border: 1px solid #474747; background: {{$mau->mau_code}}"></div>
                                        ({{$mau->mau_ten}})
                                    </div>
                                    @else
                                    <div>Chưa có</div>
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                                    <a href="admin/sanpham/xoa-hinh-anh/{{$ha->id}}/{{$mau['mau_id']}}/{{$sanpham->sp_id}}"> Delete</a>
                                </td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i>
                                    <a href="admin/sanpham/sua-hinh-anh/{{$ha->id}}/{{$mau['mau_id']}}/{{$sanpham->sp_id}}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <legend></legend>
                <div>
                    <label>Danh sách kích thước sẽ bán:</label>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{url('admin/sanpham/them-kich-thuoc/'.$sanpham->sp_id)}}">
                            <i class="fa fa-plus"> Thêm mới</i>
                        </a>
                    </div>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Kích thước (Size)</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($kichthuoc as $size)
                            <tr class="odd gradeX" align="center">
                                <td>{{$size->size_id}}</td>
                                <td>{{$size->size_ten}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                                    <a href="admin/sanpham/xoa-kich-thuoc/{{$size->size_id}}/{{$sanpham->sp_id}}"> Delete</a>
                                </td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i>
                                    <a href="admin/sanpham/sua-kich-thuoc/{{$size->size_id}}/{{$sanpham->sp_id}}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection

@section('script')
    <script>
        $(document).ready(function () {

            //Danh mục sản phẩm cha thay đổi
            $('#sp_danh_muc_id_cha').change(function () {
                var dmsp_id = $('#sp_danh_muc_id_cha').val();
                $.get('ajax/muc-san-pham/' + dmsp_id, function (data) {
                    $('#sp_danh_muc_id_con').html(data);
                });
            });

            var gia_ban = $('#sp_gia_ban').val();
            //Giá bán thay đổi
            $('#sp_gia_ban').change(function () {

                var thue_id = $('#sp_muc_thue_id').val();
                var km_id   = $('#sp_khuyen_mai_id').val();
                gia_ban = $('#sp_gia_ban').val();

                $.get('ajax/gia-ban/' + thue_id + '/' + km_id + '/' + gia_ban, function (data) {
                    $('#sp_gia_ban').val(data);
                });
            });

            //Thuế thay đổi
            $('#sp_muc_thue_id').change(function () {

                var thue_id = $('#sp_muc_thue_id').val();
                var km_id   = $('#sp_khuyen_mai_id').val();

                $.get('ajax/gia-ban-thue/' + thue_id + '/' + km_id + '/' + gia_ban, function (data) {
                    $('#sp_gia_ban').val(data);
                });
            });

            //Loại khuyến mãi thay đổi
            $('#sp_khuyen_mai_id').change(function () {

                var thue_id = $('#sp_muc_thue_id').val();
                var km_id   = $('#sp_khuyen_mai_id').val();

                $.get('ajax/gia-ban-khuyen-mai/' + thue_id + '/' + km_id + '/' + gia_ban, function (data) {
                    $('#sp_gia_ban').val(data);
                });
            });
        });
    </script>
@endsection
