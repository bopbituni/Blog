<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::all();
        return view('blog.list', compact('blog'));
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->date = $request->date;
        $blog->person = $request->person;
        if ($request->hasFile('image')) {
            $image = $request->image;
            $path = $image->store('images', 'public');
            $blog->image = $path;
        }
        $blog->save();

        Session::flash('success', 'Thêm thành công');

        return redirect()->route('blog.index');

    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog.show', compact('blog'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog.edit', compact('blog'));

    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->date = $request->date;
        $blog->person = $request->person;


        if ($request->hasFile('image')) {

            $currentImg = $blog->image;


            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }

            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $blog->image = $path;
        }
        $blog->save();


        Session::flash('success', "Update thành công");

        return redirect()->route('blog.index');
    }

    public
    function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $image = $blog->image;

        if ($image) {
            Storage::delete('/public/' . $image);
        }
        $blog->delete();

        return redirect()->route('blog.index');
    }
}
