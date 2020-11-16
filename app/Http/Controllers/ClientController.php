<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index () {
        return view('clients.index');
    }

    public function add () {
        return view('clients.add');
    }

    public function invoice () {
        return view('invoice');
    }

    public function contract () {
        return view('agreement');
    }
}
