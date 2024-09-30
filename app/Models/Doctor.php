<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Doctor extends Model
{
    public $timestamps = false;
    protected $table = "doctor";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "doctorName",
        "doctorId",
        "position",
        "edu",
        "typeId",
        "photo",
        "content",
        "createTime",
    ];
}
