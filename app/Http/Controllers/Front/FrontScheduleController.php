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


class FrontScheduleController extends Controller
{



    public function list(Request $req)
    {

        $currentDate = $req->input('date', Carbon::now()->format('Y-m-d')); // 如果前端未傳遞日期，則使用當前日期

        $startDate = Carbon::parse($currentDate); //將取得的日期轉換為 Carbon 日期對象，便於後續進行日期操作。

        // 獲取今天的日期->日期對象的時間設置為這週的開始日(預設該週星期一)
        $weekfirst = Carbon::now()->startOfWeek();

        // $startDate與$weekfirst之間的週數差
        $weekDiff = $startDate->diffInWeeks($weekfirst);

        // 判斷是否顯示上一週按鈕 (週數大於 0 才顯示)
        $showPrevWeekButton = $weekDiff > 0;

        // 如果超過第三週，則不顯示下一週按鈕
        $showNextWeekButton = $weekDiff < 3;

        $dates = $this->generateWeekDates($startDate);//取得一周時間
        $doctorrest = DoctorRest::all();//醫生休息班表
        $doctor = (new Doctor)->getList();//醫師基本資料
        $doctorName = Doctor::all(); //sweatlart的doctorName
        $TimeList = TimeList::all();//時段設定


        $nowTime=Carbon::now();
        // dd($nowTime);
        // 判斷哪些醫生在特定日期和時間段內休息，並標記出來
        $doctorSchedule = [];
        foreach ($doctor as $doc) {
            foreach ($TimeList as $time) {
                foreach ($dates as $date) {
                    $isRest = false; // 這裡將 isRest 每次重置為 false
        
                    foreach ($doctorrest as $rests) {
                        if ($rests->doctorId == $doc->doctorId && $rests->timeId == $time->timeId && $rests->dates == $date['date']) {
                            $isRest = true;
                            break;
                        }
                    }
        
                    $endTime = Carbon::createFromFormat('Y-m-d H:i:s', $date['date'].' '.$time->time_end);
        
                    if ($nowTime->greaterThan($endTime) || $isRest ) {
                        $isRest = true;
                    }
                    $doctorSchedule[$doc->doctorId][$time->timeId][$date['date']] = $isRest;
                }
            }
        }
        


        // 計算預約數量
        $counts = [];
        foreach ($doctor as $doc) {
            $counts[$doc->doctorId] = $this->getCountsForDates([1, 2, 3], $dates, $doc->doctorId);
        }

        return view("front.schedule.list", compact("dates", "doctorSchedule", "counts", "doctor", "doctorName", "startDate", "showPrevWeekButton", "showNextWeekButton", "TimeList"));
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


    private function getCountsForDates($timeIds, $dates, $doctorId)
    {
        $counts = [];
        foreach ($timeIds as $timeId) {
            foreach ($dates as $date) {
                $counts[$timeId][$date['date']] = (new Booking())->bookingCount($timeId, $date['date'], $doctorId);
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

        // Session::flash("message", "預定成功");
        return redirect("/schedule/list");
    }
}