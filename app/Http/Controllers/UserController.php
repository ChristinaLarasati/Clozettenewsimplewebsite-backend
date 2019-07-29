<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {
  public function index() {
    $pegawai = DB::table('username')->paginate(10);
    return view('user.index',['username' => $username]);
  }

}
