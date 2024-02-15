<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\House_members;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function index()
    {
        return view('house', [
            "house_members" => House_members::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_name'  => 'required|max:100',
            'email'        => 'required',
            'phone_number' => 'required',
            'address'      => 'required',
        ]);

        House_members::create([
            'member_name' => $request-> input('member_name'),
            'email'       => $request-> input('email'),
            'phone_number'=> $request-> input('phone_number'),
            'address'     => $request-> input('address'),

        ]);

    }
}
