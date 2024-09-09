<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeList extends Model
{
    public $timestamps=false;
    protected $table="timelist";
    protected $primaryKey="id";
    protected $fillable=[
        "id",
        "times",
    ];
}
