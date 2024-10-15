<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Doctor;
use App\Models\DoctorRest;
use App\Models\TimeList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Counts;

class FrontScheduleController extends Controller
{

    

    public function list(Request $req)
{

        //從前端請求獲取日期。如果沒有傳遞日期，則使用當前日期。
        $currentDate = $req->input('date', Carbon::now()->format('Y-m-d'));
        $startDate = Carbon::parse($currentDate); //將取得的日期轉換為 Carbon 日期對象，便於後續進行日期操作。

        // 獲取今天的日期
        $today = Carbon::now()->startOfWeek();

        // 計算當前查看的週數 (今天是第 1 週)
        $weekDiff = $startDate->diffInWeeks($today);

        // 判斷是否顯示上一週按鈕 (週數大於 0 才顯示)
        $showPrevWeekButton = $weekDiff > 0;

        // 如果超過第三週，則不顯示下一週按鈕
        $showNextWeekButton = $weekDiff < 3;

        $dates = $this->generateWeekDates($startDate);
        $doctorrest = DoctorRest::all();
        $doctor = (new Doctor)->getList();
        $TimeList = TimeList::all()->keyBy('timeId');

        // 計算預約數量
        $counts =[];
        foreach($doctor as $doc){
            $counts[$doc->doctorId]=$this->getCountsForDates([1,2,3],$dates,$doc->doctorId);
        }
        return view("front.schedule.list", compact("dates", "doctorrest", "counts", "doctor", "startDate", "showPrevWeekButton", "showNextWeekButton","TimeList"));
    }

    private function generateWeekDates($startDate)
    {
        // 生成這一週的日期
        $dates = [];
        for ($i = 0; $i < 7; $i++) {
            $date = $startDate->copy()->startOfWeek()->addDays($i);
            $formattedDate = $date->format("Y-m-d");
            $dates[] = [
                'date' => $formattedDate,
                'weekday' => $date->locale("zh_TW")->dayName,
            ];
        }
        return $dates;
    }


    private function getCountsForDates($timeIds,$dates ,$doctorId)
    {
        $counts = [];
        foreach ($timeIds as $timeId) {
            foreach ($dates as $date) {
                $counts[$timeId][$date['date']] = (new Booking())->bookingCount( $timeId,$date['date'],$doctorId);
            }
        }
        return $counts;
    }

    public function doBooking(Request $req)
    {
        $booking = new Booking();        
      
        $booking->userId = session()->get("userId");
        $booking->dates = $req->dates;
        $booking->timeId = $req->timeId;
        $booking->doctorId = $req->doctorId;
        $booking->save();

        Session::flash("message", "預定成功");
        return redirect("/schedule/list");
    }
}
