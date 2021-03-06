<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }

    public function index()
    {
        $users = \App\User::orderBy('name','DESC')->paginate(10);
        $title = 'Users';
        // dd($users);
        return view('profiles.index',compact('users','title'));
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
        $user = \App\User::find(Auth::id());
        return view('profiles.show',['title'=>"Profile",'user'=>$user]);
    }

    public function edit()
    {
        return view('profiles.edit', ['title'=> "Edit Profile"]);
    }

    public function update(Request $request)
    {
        $file = $request->file('profile');
        $fileName = Auth::id().'.'.$file->extension();

        $request->file('profile')->move(storage_path().'/images',$fileName);

        \App\User::find(Auth::id())->update(array('profile' => $fileName));
        return redirect('/profile');
    }

    public function destroy($id)
    {

    }
}