@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản Phẩm
                        <small> Add</small>
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
                    <form action="{{url('admin/sanpham/them')}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                        <div class="form-group">
                            <label>Tên sản phẩm:</label>
                            <input class="form-control" name="sp_ten" placeholder="Nhập tên sản phẩm" />
                        </div>
                        <div class="form-group">
                            <label>Số lượng tồn kho :</label>
                            <input class="form-control" type="number" name="sp_so_luong_ton_kho" min="0"
                                   placeholder="Nhập số lượng tồn kho sản phẩm" />
                        </div>
                        <div class="form-group">
                            <label>Giá niêm yết :</label>
                            <input class="form-control" type="number" name="sp_gia_niem_yet" min="1000"
                                   placeholder="Nhập giá niêm yết" />
                        </div>
                        <div class="form-group">
                            <label>Giá bán (sẽ tự động tính với loại thuế và loại khuyến mãi hiện tại):</label>
                            <input class="form-control" type="number" name="sp_gia_ban" id="sp_gia_ban" min="1000"
                                   placeholder="Nhập giá bán sản phẩm" />
                        </div>
                        <div class="form-group">
                            <label>Đơn vị tính   :</label>
                            <select class="form-control" name="sp_don_vi_tinh_id">
                                @foreach($donvitinh as $dvt)
                                    <option value="{{$dvt->donvitinh_id}}">{{$dvt->donvitinh_ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mục sản phẩm  :</label>
                            <select class="form-control" id="sp_danh_muc_id_cha">
                                <option disabled selected> --Chọn mục sản phẩm-- </option>
                                @foreach($danhmucsanpham as $cha)
                                    <option value="{{$cha->dmsp_id}}">{{$cha->dmsp_ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Thuộc loại sản phẩm  :</label>
                            <select class="form-control" name="sp_danh_muc_id" id="sp_danh_muc_id_con" disabled>
                                <option disabled selected> --Chọn loại sản phẩm-- </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Thuộc nhà sản xuất  :</label>
                            <select class="form-control" name="sp_nsx_id">
                                <option disabled selected> --Chọn nhà sản xuất-- </option>
                                @foreach($nhasanxuat as $nsx)
                                    <option value="{{$nsx->nsx_id}}">{{$nsx->nsx_ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Thuộc kho hàng  :</label>
                            <select class="form-control" name="sp_kho_hang_id">
                                <option disabled selected> --Chọn kho hàng-- </option>
                                @foreach($khohang as $kh)
                                    <option value="{{$kh->khohang_id}}">{{$kh->khohang_ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Thuộc mức thuế (sẽ làm thay đổi giá bán):</label>
                            <select class="form-control" name="sp_muc_thue_id" id="sp_muc_thue_id">
                                <option disabled selected> --Chọn mức thuế-- </option>
                                @foreach($mucthue as $mt)
                                    <option value="{{$mt->mt_id}}">{{$mt->mt_ten}} - {{$mt->mt_muc_thue}}%</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Thuộc loại khuyến mãi (sẽ làm thay đổi giá bán):</label>
                            <select class="form-control" name="sp_khuyen_mai_id" id="sp_khuyen_mai_id">
                                <option disabled selected> --Chọn loại khuyến mãi-- </option>
                                @foreach($khuyenmai as $km)
                                    <option value="{{$km->km_id}}">{{$km->km_ten}} - {{$km->km_gia}}%</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mô tả :</label>
                            <textarea class="form-control ckeditor" name="sp_mo_ta" placeholder="Điền thông tin mô tả sản phẩm" >
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
                        <button type="submit" class="btn btn-default">Add</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    <form>
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
                $('#sp_danh_muc_id_con').prop('disabled', false);
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

                $.get('ajax/gia-ban-thue/' + thue_id + '/' + gia_ban , function (data) {
                    $('#sp_gia_ban').val(data);
                });
            });

            //Loại khuyến mãi thay đổi
            $('#sp_khuyen_mai_id').change(function () {

                var km_id = $('#sp_khuyen_mai_id').val();

                $.get('ajax/gia-ban-khuyen-mai/' + km_id + '/' + gia_ban, function (data) {
                    $('#sp_gia_ban').val(data);
                });
            });
        });
    </script>
@endsection
