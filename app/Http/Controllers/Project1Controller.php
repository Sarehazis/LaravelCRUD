<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Project1Controller extends Controller
{
    public function index(){
        return view('home');
    }
    public function nama(){
        return 'Sareh Azis Panegar';
    }
    public function jurusan(){
        return '2312010001';
    }
}