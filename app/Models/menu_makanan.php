<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu_makanan extends Model
{
    use HasFactory;
    protected $table = "makanan";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function to_kategori(){
        return $this->belongsTo(kategori::class, 'kategori_id', 'id');
    }
}
