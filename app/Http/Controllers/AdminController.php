<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;

class AdminController extends Controller {

    private $user;

    public function __construct() {
        $this->user = \Auth::user();
        if (empty($this->user) || !$this->user->hasRole('admin')) {
            header("Location: " . env('APP_HOST'));
            die;
        }
    }

    public function index() {
        
    }

    public function createAccount() {
        $message = '';
        if (request()->isMethod('post')) {
            $data = request()->all();
            $validator = Validator::make($data, [
                        'name' => 'required|max:255',
                        'email' => 'required|email|max:255|unique:users',
                        'password' => 'required|confirmed|min:6',
            ]);
            if (!$validator->fails()) {
                \App\User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                ]);
                return redirect('dadmyn/manage-account');
            } else {
                $message = implode('<br>', $validator->errors()->all());
            }
        }
        return view('dadmyn.create_account', compact('message'));
    }

    public function manageAccount() {
        $accounts = \DB::table('users')->get();
        $grid = \DataGrid::source($accounts);
        $grid->add('name', 'Tên');
        $grid->add('email', 'Email');
        $grid->add('coind', 'Tiền');
        $grid->add('history', 'Lịch sử cược');
        $grid->orderBy('id', 'desc'); //default orderby
        $grid->paginate(10); //pagination
        return view('dadmyn.manage_account', compact('grid'));
    }
}
