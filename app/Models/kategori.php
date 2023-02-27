<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    protected $table = "kategori";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function from_menu_makanan(){
        return $this->hasMany(menu_makanan::class);
    }
}
