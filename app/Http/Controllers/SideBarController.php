<?php

namespace App\Http\Controllers;

use App\Models\SideBar;
use Illuminate\Http\Request;

class SideBarController extends Controller
{
    public function create()
    {
        $sidebar = SideBar::latest()->first();
        return view('sidebar.create',compact("sidebar"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'email' => 'required|email|unique:side_bars',
            'whatsapp' => 'required',
            'instagram' => 'required',
            'telegram' => 'required',
            'X' => 'required',
            'snapchat' => 'required',
        ]);

        SideBar::create([
            'name' => $request->name,
            'description' => $request->description,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'instagram' => $request->instagram,
            'telegram' => $request->telegram,
            'X' => $request->X,
            'snapchat' => $request->snapchat,
        ]);


        return redirect()->route('home');

    }


}
