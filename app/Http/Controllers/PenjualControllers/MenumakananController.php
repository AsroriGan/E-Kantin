<?php

namespace App\Http\Controllers\PenjualControllers;
use App\Http\Controllers\Controller;

use App\Models\kategori;
use App\Models\menu_makanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class MenumakananController extends Controller
{
    public function index()
    {
        $data = menu_makanan::with('to_kategori')->get();
        $kategori = kategori::get();
        return view("adminpenjual.menumakanan.index", compact('data','kategori'));
    }
    public function post(request $request)
    {
        $imgname = "";
        if ($request->hasFile("foto_makanan")) {
            $imgname = $request->foto_makanan->getClientOriginalName();
            $request->foto_makanan->move(public_path('images/foodimg'), $imgname);
        }
        menu_makanan::create([
            "foto_makanan" => $imgname,
            "nama_makanan" => $request->nama_makanan,
            "harga" => str_replace('.', '', $request->harga),
            "kategori_id" => $request->kategori_id,
            "stock" => $request->stock,
            "status" => "Tersedia",
        ]);
        return redirect("/menu-makanan")->with("success", "Menu makanan berhasil ditambahkan");
    }
    public function edit(request $request, $id)
    {
        // dd($id);
        $data = menu_makanan::findorfail($id);
        $imgname = $data->foto_makanan;
        if ($request->hasFile("foto_makanan")) {
            // Storage::delete('public/images/foodimg'.$imgname);
            if (File::exists(public_path('images/foodimg/' . $imgname))) {
                File::delete(public_path('images/foodimg/' . $imgname));
            }
            $imgname = $request->foto_makanan->getClientOriginalName();
            $request->foto_makanan->move(public_path('images/foodimg'), $imgname);
        }
        $data->update([
            "foto_makanan" => $imgname,
            "nama_makanan" => $request->nama_makanan,
            "harga" => str_replace('.', '', $request->harga),
            "kategori_id" => $request->kategori_id,
            "status" => "Tersedia",
            "stock" => $request->stock,
        ]);
        return redirect("/menu-makanan")->with("success", "Menu makanan berhasil diedit");
    }
    public function destroy($id)
    {
        $data = menu_makanan::findorfail($id);
        if (File::exists(public_path('images/foodimg/' . $data->foto_makanan))) {
            File::delete(public_path('images/foodimg/' . $data->foto_makanan));
        }
        $data->delete();
        return redirect("/menu-makanan")->with("success", "Data berhasil dihapus");
    }
}
