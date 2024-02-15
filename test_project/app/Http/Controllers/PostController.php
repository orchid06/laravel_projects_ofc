<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('welcome',[
            "posts" => Post::latest()->get()
        ]);
    }

   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'body' => 'required',
          ]);
          Post::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),

          ]);

          return back()->with('success','Success');
    }


}
