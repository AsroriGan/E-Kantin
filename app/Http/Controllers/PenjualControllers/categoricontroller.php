<?php

namespace App\Http\Controllers\PenjualControllers;
use App\Http\Controllers\Controller;

use App\Models\kategori;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class categoricontroller extends Controller
{
    public function index()
    {
        $data = kategori::all();
        return view('adminpenjual.kategori.index',compact('data'));
    }

    public function post(request $request)
    {
        // dd($request->all());
        $data = kategori::create($request->all());
        return redirect("/kategori")->with("success","Kategori berhasil Ditambahkan");
    }

    public function edit(request $request,$id)
    {
        // dd($request->all());
        $data = kategori::findorfail($id);
        $data->update($request->all());
        return redirect("/kategori")->with("success","Kategori berhasil Diedit");
    }

    public function destroy($id){
        $data = kategori::findorfail($id);
        $data->delete();
        return redirect ("/kategori")->with("success","Kategori berhasil dihapus");
    }

}
