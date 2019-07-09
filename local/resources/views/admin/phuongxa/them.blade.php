@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Phường/ Xã
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
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
                    <form action="admin/phuongxa/them" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                            <label>Tên Phường/Xã:</label>
                            <input class="form-control" type="text" name="px_ten" placeholder="Nhập tên Phường/Xã:" />
                        </div>
                        <div class="form-group">
                            <label>Thuộc Thành phố :</label>
                            <select class="form-control" id="tp_id" name="tp_id">
                                <option disabled selected>--Chọn Thành phố--</option>
                                @foreach($thanhpho as $tp)
                                    <option value="{{$tp->tp_id}}">{{$tp->tp_ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Thuộc Quận/Huyện :</label>
                            <select class="form-control" name="px_qh_id" id="px_qh_id" disabled>
                                <option disabled selected>--Chọn Quận/Huyện--</option>
                                @foreach($quanhuyen as $qh)
                                    <option value="{{$qh->qh_id}}">{{$qh->qh_ten}}</option>
                                @endforeach
                            </select>
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
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#tp_id').change(function () {
                var tp_id = $('#tp_id').val();
                $('#px_qh_id').prop('disabled', false);
                $.get('ajax/quan-huyen/' + tp_id, function (data) {
                    $('#px_qh_id').html(data);
                })
            });
        });
    </script>
@endsection
