<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'listUser']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function listUser() {
        $users = User::orderBy('id', 'desc')->paginate(40);
        return view('user.index')->withUsers($users);
    }
    public function showUser($id) {
        $user = User::find($id);
        return view('user.show')->withUser($user);
    }

    public function profile() {
      return view ('home', array('user' => Auth::user()));
    }

    public function update_avatar(Request $request) {
        if ($request->hasFile('avatar')) {
          $avatar = $request -> file ('avatar');
          $filename = time().'.'.$avatar->getClientOriginalExtension();
          Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/'.$filename));

          $user=Auth::user();
          $user->avatar = $filename;
          $user ->save();
        }
        return view('home', array('user'=>Auth::user()));
    }

}
