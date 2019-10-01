@extends('home')
@section('title', 'Tạo khách hàng mới')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Thêm danh sách khách hàng</h1>
        </div>
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <legend></legend>

                        <div class="form-group">
                            <label for="">Thể loại:</label>
                            <input type="text" name="title" class="form-control" value="{{request('title')}}"
                                   required="required">
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung: </label>
                            <textarea type="text" name="content" class="form-control" value="{{request('content')}}"
                                      required="required"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Người viết: </label>
                            <input type="text" name="person" class="form-control" value="{{request('person')}}"
                                   required="required">
                        </div>
                        <div class="form-group">
                            <label for="">Ngày đăng: </label>
                            <input type="date" name="date" class="form-control" value="{{request('date')}}"
                                   required="required">
                        </div>
                        <div class="form-group">
                            <label for="">Ảnh:</label>
                            <input type="file" name="image" class="form-control" value="{{request('image')}}"
                                   required="required">
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

            </div>

        </div>
    </div>
@endsection
