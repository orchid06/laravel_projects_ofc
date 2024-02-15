<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /*    public function index(){


       return view('student',["students"=> Student::latest()->get()->paginate(2)]);

    }

*/

    public function index()
    {
        $students = Student::latest()->paginate(4);
        return view('student', compact('students'));
    }

    public function store(Request $request)
    {



        $request->validate([

            'name'    => 'required|max:100',
            'standard' => 'required|numeric',
            'section' => 'required',
            'number'  => 'required|numeric',
            
        ]);

        if ($request->hasFile('image')) {
            $file           = $request->file('image');
            $extention      = $file->getClientOriginalExtension();
            $filename       = time() . '.' . $extention;
            $file->move('uploads/', $filename);
        }

        Student::create([

            'name'       => $request->input('name'),
            'standard'   => $request->input('standard'),
            'section'    => $request->input('section'),
            'number'     => $request->input('number'),
            'image'      => $filename,


        ]);

        return back()->with('success', 'success');
    }

   /* public function edit($id)
    {
        
        $student = Student::find($id);

        return view('student', compact('student'));
    }
*/
    public function update(Request $request, $id, $filename="empty")
    {



        $request->validate([

            'name'    => 'required|max:100',
            'standard' => 'required|numeric',
            'section' => 'required',
            'number'  => 'required|numeric',
            
        ]);

        if ($request->hasFile('image')) {
            $file           = $request->file('image');
            $extention      = $file->getClientOriginalExtension();
            $filename       = time() . '.' . $extention;
            $file->move('uploads/', $filename);
        }
        

        $student = Student::find($id);

        $student->name     = $request->input('name');
        $student->standard = $request->input('standard');
        $student->section  = $request->input('section');
        $student->number   = $request->input('number');
        $student->image    = $filename;
        $student->save();

        return back()->with('success');
    }

    public function delete($id)
    {

        $student = Student::find($id);

        $filename  = $student->image;
        $imagePath = "uploads/$filename";

        if (file_exists($imagePath)) {

            @unlink($imagePath);
        }

        $student->delete();

        return back()->with('Delete successful');
    }



    public function search(Request $request)
    {


        $search = $request->input('search');

        $results = Student::where('name', 'LIKE', '%' . $search . '%')->orWhere('number', 'LIKE', '%' . $search . '%')->orWhere('standard', 'LIKE', '%' . $search . '%')->paginate(4);

        return view('student', ['students' => $results]);
        
        
    }
}
