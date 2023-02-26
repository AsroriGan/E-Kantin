<?php

namespace App\Http\Controllers\PenjualControllers;
use App\Http\Controllers\Controller;

use App\Models\menu_minuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MenuminumanController extends Controller
{
    public function index(){
        $data = menu_minuman::all();
        return view("adminpenjual.menuminuman.index",compact("data"));
    }
    public function post(request $request){
        // dd($request->all());
        $imgname = "";
        if($request->hasFile("foto_minuman")){
            $imgname = $request->foto_minuman->getClientOriginalName();
            $request->foto_minuman->move(public_path('images\drinkimg'), $imgname);
        }
        menu_minuman::create([
            "foto_minuman" => $imgname,
            "nama_minuman" => $request->nama_minuman,
            "harga" => str_replace('.','',$request->harga),
            "stock" => $request->stock,
            "status" => "Tersedia",
        ]);
        return redirect("/menu-minuman")->with("success","Menu minuman berhasil ditambahkan");
    }

    public function edit(request $request,$id){
        $data = menu_minuman::findorfail($id);
        $imgname = $data->foto_minuman;
        if($request->hasFile("foto_minuman")){
            // Storage::delete('public/images/foodimg'.$imgname);
            if (File::exists(public_path('images/drinkimg/'.$imgname))) {
                File::delete(public_path('images/drinkimg/'.$imgname));
            }
            $imgname = $request->foto_minuman->getClientOriginalName();
            $request->foto_minuman->move(public_path('images/drinkimg/'), $imgname);
        }
        $data->update([
            "foto_minuman" => $imgname,
            "nama_minuman" => $request->nama_minuman,
            "harga" => str_replace('.','',$request->harga),
            "stock" => $request->stock,
            "status" => "Tersedia",
        ]);
        return redirect("/menu-minuman")->with("success","Menu Minuman berhasil diedit");
    }

    public function destroy($id){
        $data = menu_minuman::findorfail($id);
        if (File::exists(public_path('images/drinkimg/'.$data->foto_minuman))) {
            File::delete(public_path('images/drinkimg/'.$data->foto_minuman));
        }
        $data->delete();
        return redirect("/menu-minuman")->with("success","Minuman berhasil dihapus");
    }
}
