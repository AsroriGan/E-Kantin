<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenumakananController extends Controller
{
    public function index(){
        return view("adminpenjual.menumakanan.index");
    }
    public function post(request $request){
        dd($request->all());
        return redirect("/menu-makanan")->with("success","Menu makanan berhasil ditambahkan");
    }
}
