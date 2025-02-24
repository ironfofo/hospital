<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Booking extends Model
{
    public $timestamps=false;
    protected $table="booking";
    protected $primaryKey="id";
    protected $fillable=[
        "id",
        "userId",
        "doctorId",
        "dates",
        "timeId",
        "petName",
        "createTime",
    ];

    public function BookingList()
    {
        $list = DB::table('booking AS a')
        ->selectRaw('a.*,b.doctorName,c.userName,d.time_period')
        ->leftJoin('doctor AS b', 'b.doctorId', 'a.doctorId')
        ->leftJoin('member AS c', 'c.userId', 'a.userId')
        ->leftJoin('times AS d', 'd.timeId', 'a.timeId')
        ->paginate(10);

        return $list;
    }

    public function getList($search = null, $date = null)
    {
        $query = DB::table('booking AS a')
            ->selectRaw('a.*,b.doctorName,c.userName,d.time_period')
            ->leftJoin('doctor AS b', 'b.doctorId', 'a.doctorId')
            ->leftJoin('member AS c', 'c.userId', 'a.userId')
            ->leftJoin('times AS d', 'd.timeId', 'a.timeId');


            if ($search) {
                // 這樣寫法會變成兩個條件都要符合才會顯示
                // $query->where('b.doctorName', 'like', "%{$search}%")
                //       ->orWhere('c.userId', 'like', "%{$search}%");

                // 用這種寫法，只要有一個條件符合就會顯示  use ($search) 這個是把外面的變數帶進來       
                $query->where(function($q) use($search){
                        $q->where("b.doctorName", "like", "%{$search}%")
                          ->orwhere("c.userId","like","{$search}");
                });

            };

            if($date){
                $query->where("dates" ,$date);
            }

        return $query->paginate(15);
    }

    // 預約根據時間、日期、醫師編號後的預約數量
    public function bookingCount($timeId,$date ,$doctorId)
    {
            return self::where('dates', $date)
                ->where('timeId', $timeId)
                ->where('doctorId', $doctorId)
                ->count();
    }

    public function booked($timeId,$date ,$doctorId,$userId)
    {
            $booked= self::where('timeId', $timeId)
                ->where('dates', $date)
                ->where('doctorId', $doctorId)
                ->where('userId',$userId)
                ->first();

            return $booked;
    }
}

