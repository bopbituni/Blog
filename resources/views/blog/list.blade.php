@extends('home')
@section('title', "Danh sách blog")
@section("content")
    <div class="row">
        <div class="col-md-12">
            <h1 align="center">Danh sách khách hàng</h1>
        </div>
        <div class="col-md-12">
            <table class="table table-striped table-hover table-dark">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">PersonName</th>
                    <th scope="col">Date</th>
                    <th scope="col">Image</th>
                </tr>
                </thead>
                <tbody>
                @if(count($blog) == 0)
                    <h1 style="color:red;size: 23px">Đang ăn cơm</h1>
                @else
                    @foreach($blog as $key => $item)
                        <tr>
                            <th scope="col">{{++$key}}</th>
                            <td><a href="{{route('blog.show', $item->id)}}">{{$item->title}}</a></td>
                            <td>{{$item->content}}</td>
                            <td>{{$item->person}}</td>
                            <td>{{$item->date}}</td>
                            <td>
                                <img style="width: 80px; height: 80px" src="{{ asset('storage/'.$item->image) }}">
                            </td>
                            <td>
                                <button class="btn btn-danger"><a href="{{route('blog.destroy', $item->id)}}"
                                                                  onclick="return confirm('Are you sure?')">Delete</a>
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-warning"><a href="{{route('blog.edit', $item->id)}}">Edit</a>
                                </button>
                            </td>

                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <button class="btn btn-success"><a href="{{route('blog.create')}}">Create</a></button>
        </div>
    </div>

@endsection