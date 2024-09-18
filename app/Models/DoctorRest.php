<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorRest extends Model
{
    public $timestamps=false;
    protected $table="doctor_rest";
    protected $primaryKey="id";
    protected $fillable=[
        "id",
        "doctorId",
        "dates",
        "timeId",
    ];


}
