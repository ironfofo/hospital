<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    public $timestamps=false;
    protected $table="meeting";
    protected $primaryKey="id";
    protected $fillable=[
        "id",
        "meetingId",
        "petId",
        "itemId",
        "hsp",
        "content",
        "createTime",
    ];

}
