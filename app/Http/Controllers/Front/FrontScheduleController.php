<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Doctor;
use App\Models\DoctorRest;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontScheduleController extends Controller
{

    

    public function list(Request $req)
{

        // 獲取當前日期或從請求中獲取的日期
        $currentDate = $req->input('date', Carbon::now()->format('Y-m-d'));
        $startDate = Carbon::parse($currentDate);

        // 獲取今天的日期
        $today = Carbon::now()->startOfWeek();

        // 計算當前查看的週數 (今天是第 1 週)
        $weekDiff = $startDate->diffInWeeks($today);

        // 判斷是否顯示上一週按鈕 (週數大於 0 才顯示)
        $showPrevWeekButton = $weekDiff > 0;

        // 如果超過第三週，則不顯示下一週按鈕
        $showNextWeekButton = $weekDiff < 3;

        // 初始化變數
        $dates = [];
        $rest = DoctorRest::get();
        $doctor = (new Doctor)->getList();
        $count1 = [];
        $count2 = [];
        $count3 = [];

        // 生成這一週的日期
        for ($i = 0; $i < 7; $i++) {
            $date = $startDate->copy()->startOfWeek()->addDays($i);
            $formattedDate = $date->format("Y-m-d");

            $dates[] = [
                'date' => $formattedDate,
                'weekday' => $date->locale("zh_TW")->dayName,
            ];

            // 計算每個日期的預約數量
            $count1[$formattedDate] = $this->getCount($formattedDate, 1);
            $count2[$formattedDate] = $this->getCount($formattedDate, 2);
            $count3[$formattedDate] = $this->getCount($formattedDate, 3);
        }

    return view("front.schedule.list", compact("dates", "rest", "count1", "count2", "count3", "doctor", "startDate","showPrevWeekButton","showNextWeekButton"));
}


    private function getCount($date,$timeId) 
    {
        $count=(new Booking())->bookingCount($date,$timeId);     

        return $count;
    }

    public function doBooking(Request $req)
    {
        $booking = new Booking();

        // $times = explode(" ", microtime());
        // $bookingId = $times[1];
        // $booking->bookingId = $bookingId;

        
      
        $booking->userId = session()->get("userId");
        $booking->dates = $req->dates;
        $booking->timeId = $req->timeId;
        $booking->doctorId = $req->doctorId;
        $booking->save();

        Session::flash("message", "預定成功");
        return redirect("/schedule/list");
    }
}
