<?php

namespace App\Http\Controllers;

use App\Models\menu_makanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenumakananController extends Controller
{
    public function index(){
        $data = menu_makanan::get();
        return view("adminpenjual.menumakanan.index",compact('data'));
    }
    public function post(request $request){
        $imgname = "";
        if($request->hasFile("foto_makanan")){
            $imgname = $request->foto_makanan->getClientOriginalName();
            $request->foto_makanan->move(public_path('images\foodimg'), $imgname);
        }
        menu_makanan::create([
            "foto_makanan" => $imgname,
            "nama_makanan" => $request->nama_makanan,
            "harga" => str_replace('.','',$request->harga),
            "kategori_id" => $request->kategori_id,
            "status" => "Tersedia",
            "stock" => $request->stock,
        ]);
        return redirect("/menu-makanan")->with("success","Menu makanan berhasil ditambahkan");
    }
    public function edit(request $request,$id){
        // dd($id);
        $data = menu_makanan::findorfail($id);
        $imgname = $data->foto_makanan;
        if($request->hasFile("foto_makanan")){
            Storage::delete('public/images/foodimg'.$imgname);
            $imgname = $request->foto_makanan->getClientOriginalName();
            $request->foto_makanan->move(public_path('images/foodimg'), $imgname);
        }
        $data->update([
            "foto_makanan" => $imgname,
            "nama_makanan" => $request->nama_makanan,
            "harga" => str_replace('.','',$request->harga),
            "kategori_id" => $request->kategori_id,
            "status" => "Tersedia",
            "stock" => $request->stock,
        ]);
        return redirect("/menu-makanan")->with("success","Menu makanan berhasil diedit");
    }
    public function destroy($id){
    $data = menu_makanan::find($id);
    $data->delete();
    return redirect("/menu-makanan")->with("success","Data berhasil dihapus");
    }
}
