<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('homepage.home');
    }

    public function createRole() {
        $owner = new \App\Role();
        $owner->name = 'owner';
        $owner->display_name = 'Owner'; // optional
        $owner->description = 'User is the owner of a given project'; // optional
        $owner->save();
        $admin = new \App\Role();
        $admin->name = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description = 'User is allowed to manage and edit other users'; // optional
        $admin->save();
        $user = \App\User::where('id', '=', '1')->first();

        $user->attachRole($admin); // parameter can be an Role object, array, or id
        dd("done");
    }

}
