<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        return view('homepage', ["blogs" => Blog::latest()->get()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|max:100',
            'description'   => 'required',
            'image'         => 'required',
        ]);

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/', $filename);
        }

        Blog::create([
            'title'         => $request->input('title'),
            'description'   => $request->input('description'),
            'image'         => $filename
        ]);

        return back()->with('success', 'success');
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'         => 'required|max:100',
            'description'   => 'required',
            'image'         => 'required',
        ]);

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/', $filename);
        }

        $blog = Blog::find($id);
        $blog->title        = $request->input('title');
        $blog->description  = $request->input('description');
        $blog->image        = $filename;
        $blog->save();
        return back()->with('success', 'Blog updated successfully');
    }

    public function delete($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return back()->with('success', 'Blog deleted successfully');
    }
}
