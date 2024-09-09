<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetList extends Model
{
    public $timestamps=false;
    protected $table="petlist";
    protected $primaryKey="id";
    protected $fillable=[
        "id",
        "petName",
        "petType",
        "vrtId",
        "bir",
        "vac",
        "prtId",
        "createTime",
    ];
}
