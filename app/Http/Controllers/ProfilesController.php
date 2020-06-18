<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        return view('profiles.show',['title'=>"Profile"]);
    }

    public function edit()
    {
        return view('profiles.edit', ['title'=> "Edit Profile"]);
    }

    public function update(Request $request)
    {
        $file = $request->file('profilePicture');

        $request->file('profilePicture')->move(storage_path().'/images',Auth::id().'.'.$file->extension());
    }

    public function destroy($id)
    {
        //
    }
}
