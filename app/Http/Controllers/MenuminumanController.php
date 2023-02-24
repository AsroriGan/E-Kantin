<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuminumanController extends Controller
{
    public function index(){
        return view("adminpenjual.menuminuman.index");
    }
}
