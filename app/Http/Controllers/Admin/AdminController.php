<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function main()
    {
        return view('admin.main');
    }

    public function index()
    {
        return view('admin.index');
    }
}
