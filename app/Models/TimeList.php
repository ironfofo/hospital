<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeList extends Model
{
    public $timestamps=false;
    protected $table="times";
    protected $primaryKey="timeId";
    protected $fillable=[
        "timeId",
        "time_period",
        "time_start",
        "time_end",
    ];
}