<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetType extends Model
{
    public $timestamps=false;
    protected $table="pettype";
    protected $primaryKey="id";
    protected $fillable=[
        "id",
        "petTypeName",
    ];
}
