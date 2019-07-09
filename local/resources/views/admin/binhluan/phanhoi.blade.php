@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Trả lời bình luận của khách hàng
                    </h1>
                </div>
                @if(count($errors) > 0)
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
            {!! admin.binhluan.phanhoi::open(array('route' => 'front.fb', 'class' => '')) !!}
            <div>
                <label  class="email">Your name</label>
                    {!! admin.binhluan.phanhoi::text('name', null, ['class' => 'input-text', 'placeholder'=>"Your name"]) !!}
            </div><div>
                <label  class="email">Your email</label>
                    {!! admin.binhluan.phanhoi::text('email', null, ['class' => 'input-text', 'placeholder'=>"Your email"]) !!}
            </div><div>
                <label class="email">Comments</label>
                    {!! admin.binhluan.phanhoi::textarea('comment', null, ['class' => 'tarea', 'rows'=>"5"]) !!}
            </div><div class="send">
                {!! admin.binhluan.phanhoi::submit('Send', ['class' => 'button']) !!}
            </div>
            {!! admin.binhluan.phanhoi::close() !!}
                           
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection
