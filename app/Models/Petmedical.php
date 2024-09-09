<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petmedical extends Model
{
    public $timestamps = false;
    protected $table = "petmedical";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "item",
        "cost",
    ];
}
