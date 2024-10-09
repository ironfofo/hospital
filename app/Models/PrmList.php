<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrmList extends Model
{
    public $timestamps = false;
    protected $table = "prm_list";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "prm",
        "prmTitle",
        "createTime",
    ];
}
