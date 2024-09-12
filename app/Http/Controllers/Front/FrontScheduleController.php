<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontScheduleController extends Controller
{
    public function list()
    {
        $startDate = Carbon::now(); // 當前日期
        $dates = [];

        for ($i = 0; $i < 7; $i++) {
            $date = $startDate->copy()->addDays($i);
            $dates[] = [
                'date' => $date->format('Y-m-d'),
                'weekday' => $date->locale('zh_TW')->dayName, // 獲取星期幾的中文名稱
            ];
        }

        $Sch=Schedule::get();
        
        return view("front.Schedule.list", compact("dates","Sch"));
    }
}
