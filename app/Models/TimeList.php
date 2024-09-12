<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeList extends Model
{
    public $timestamps=false;
    protected $table="times";
    protected $primaryKey="id";
    protected $fillable=[
        "time_id",
        "time_period",
    ];
}
