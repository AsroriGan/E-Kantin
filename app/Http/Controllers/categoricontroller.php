<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class categoricontroller extends Controller
{
    public function index()
    {
        return view('adminpenjual.kategori.index');
    }

}
