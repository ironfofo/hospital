<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Schedule extends Model
{
    public $timestamps = false;
    protected $table = "schedule";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "date",
        "timeId",
    ];

    public function getList()
    {
        $list = DB::table('schedule AS a')
            ->selectRaw('a.*, b.time_period')
            ->join('times AS b', 'b.time_id', 'a.time_id')
            ->get();
        return $list;
    }
}
