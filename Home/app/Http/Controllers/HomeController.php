<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Nette\MemberAccessException;

class HomeController extends Controller
{
    public function index(){
       
        return view('welcome',['members'=>Home::all()]);
    }

    public function store(Request $request){

       
        $request->validate([

            'name'  => 'required|max:100',
            'number'=> 'required|numeric',
            'image' => 'required',
        
        ]);

        if($request->hasFile('image'))
        {
            $file           = $request->file('image');
            $extention      = $file->getClientOriginalExtension();
            $filename       = time().'.'.$extention;
            $file->move('uploads/', $filename);

        }

        Home::create([
            'name'         => $request->input('name'),
            'number'       => $request->input('number'),
            'image'        => $filename,
            'gender'       => $request->input('gender'),
        ]);

        return back()->with('success', 'success');

    }

    public function edit($id){

        $member = Home::find($id);
        return view('edit', compact('member'));
    }

    public function update(Request $request, $id){
        

        $request->validate([

            'name'  => 'required|max:100',
            'number'=> 'required|numeric',
            'image' => 'required',
        
        ]);

        if($request->hasFile('image'))
        {
            $file           = $request->file('image');
            $extention   = $file->getClientOriginalExtension();
            $filename       = time().'.'.$extention;
            $file->move('uploads/', $filename);

        }

        $member = Home::find($id);
        $member->name   = $request->input('name');
        $member->number = $request->input('number');
        $member->gender = $request->input('gender');
        $member->image  = $filename;
        $member->save();

        return back()->with('success');

        

    }

    public function delete($id){

        $member = Home::find($id);
        $filename = $member->image;
        $image_path = "uploads/$filename";
        if (file_exists($image_path)) {

            @unlink($image_path);
     
        }

        $member->delete();

        return back()->with('success', 'Blog deleted successfully');
        
    }

    public function search(Request $request){

        $search = $request->input('search');

        $results = Home::where('name','LIKE','%'.$search.'%')->orWhere('number','LIKE','%'.$search.'%')->orWhere('gender','LIKE','%'.$search.'%')->get();


    return view('welcome',['members'=>$results]);


        
    }
}
