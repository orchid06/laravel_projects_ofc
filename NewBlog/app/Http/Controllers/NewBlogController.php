<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewBlog;

class NewBlogController extends Controller
{
    public function index()
    {
        return view('homepage' , ["new_blogs"=>NewBlog::latest()->get()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         =>'required|max:100',
            'description'   =>'required',
            'image'         =>'required',
         ]);

         if($request->hasfile('image'))
         {
            $file           = $request->file('image');
            $fileextention  = $file->getClientOriginalExtension();
            $filename       = time().".".$fileextention;
            $file           -> move('uploads/', $filename);

         }

         NewBlog::create([
         'title'        => $request->input('title'),
         'description'  => $request->input('description'),
         'image'        =>$filename]);

         return back();

    }

    public function edit($id)
    {
        $new_blog = NewBlog::find($id);
        return view('edit', compact('new_blog'));
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

        $new_blog = NewBlog::find($id);
        $new_blog->title        = $request->input('title');
        $new_blog->description  = $request->input('description');
        $new_blog->image        = $filename;
        $new_blog->save();
        return back()->with('success', 'Blog updated successfully');
    }

    public function delete($id)
    {
        $new_blog = NewBlog::find($id);
        $new_blog->delete();
        return back()->with('success', 'Blog deleted successfully');
    }
}
