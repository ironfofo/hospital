<?php

namespace App\Models\Professional;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Professional extends Model
{
    public $timestamps=false;
    protected $table="professional";
    protected $primaryKey="typeId";
    protected $fillable=[
        "typeId",
        "department",
        "lan",
        "createTime",
    ];

}