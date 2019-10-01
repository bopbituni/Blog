@extends('home')
@section('title', 'Chỉnh sửa khách hàng')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12"><h1>Chỉnh sửa khách hàng</h1></div>
            <div class="col-12">
                <form method="post" action="{{ route('blog.update', $blog->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Tên thể loại:</label>
                        <input type="text" class="form-control" name="title" value="{{ $blog->title }}" required>
                    </div>
                    <div class="form-group">
                        <label>Nội dung thay đổi:</label>
                        <input type="text" class="form-control" name="content" value="{{ $blog->content }}" required>
                    </div>
                    <div class="form-group">
                        <label>Người đăng:</label>
                        <input type="text" class="form-control" name="person" value="{{ $blog->person }}" required>
                    </div>
                    <div class="form-group">
                        <label>Ngày đăng:</label>
                        <input type="date" class="form-control" name="date" value="{{ $blog->date }}" required>
                    </div>
                    <img width="100px" src="{{asset('storage/'.$blog->image)}}" alt="">
                    <div class="form-group">
                        <label>Ảnh đăng:</label>
                        <input type="file" class="form-control-file"  name="image" required>
                    </div>
                    <button type="submit" class="btn btn-success">Chỉnh sửa</button>
                    <button class="btn btn-success" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
@endsection