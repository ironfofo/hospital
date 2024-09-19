<?php

namespace App\Models\Professional;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional_layer1 extends Model
{
    public $timestamps=false;
    protected $table="professional_layer1";
    protected $primaryKey="id";
    protected $fillable=[
        "id",
        "p_typeId",
        "layer1_name",
        "createTime",
    ];
}