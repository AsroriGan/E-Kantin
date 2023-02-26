<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu_minuman extends Model
{
    use HasFactory;
    protected $table = "minuman";
    protected $guarded = [];
    protected $primaryKey = "id";
}
