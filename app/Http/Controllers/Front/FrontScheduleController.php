<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Doctor;
use App\Models\DoctorRest;
use App\Models\Member;
use App\Models\TimeList;
use Carbon\Carbon;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontScheduleController extends Controller
{



    public function list(Request $req)
    {

        $currentDate = $req->input('date', Carbon::now()->format('Y-m-d')); // 如果前端未傳遞日期(因為前端沒有name="date")，則使用當前日期

        $startDate = Carbon::parse($currentDate); //將取得的日期轉換為 Carbon 日期對象，便於後續進行日期操作。

        // 獲取今天的日期->日期對象的時間設置為這週的開始日(預設該週星期一)
        $weekfirst = Carbon::now()->startOfWeek();

        // $startDate與$weekfirst之間的週數差
        $weekDiff = $startDate->diffInWeeks($weekfirst);

        // 判斷是否顯示上一週按鈕 (週數大於 0 才顯示)
        $showPrevWeekButton = $weekDiff > 0;

        // 如果超過第三週，則不顯示下一週按鈕
        $showNextWeekButton = $weekDiff < 3;

        $dates = $this->generateWeekDates($startDate);//取得一周時間 generateWeekDates是自建方法
        $doctorrest = DoctorRest::all();//醫生休息班表
        $doctor = (new Doctor())->getList();//醫師基本資料
        $doctorName = Doctor::all(); //sweatlart的doctorName
        $TimeList = TimeList::all();//時段設定
        $booking=Booking::all();//帳號預約查詢


        $nowTime=Carbon::now(); 
        // dd($nowTime);
        // 判斷哪些醫生在特定日期和時間段內休息，並標記出來
        $doctorSchedule = [];
        $booked=[];
        foreach ($doctor as $doc) {
            foreach ($TimeList as $time) {
                foreach ($dates as $date) {
                    $isRest = false; // 這裡將 isRest 每次重置為 false
                    $isbooked=false; //userId已預約日期
                    foreach ($doctorrest as $rests) {
                        if ($rests->doctorId == $doc->doctorId && $rests->timeId == $time->timeId && $rests->dates == $date['date']) {
                            $isRest = true;
                            break;
                        }
                    }
                    
                    $startTime = Carbon::createFromFormat('Y-m-d H:i:s', $date['date'].' '.$time->time_start);
        
                    if ($nowTime->greaterThan($startTime) || $isRest ) {
                        $isRest = true;
                    }

                    foreach($booking as $book){
                        if($book->doctorId == $doc->doctorId && $book->timeId == $time->timeId && $book->dates == $date['date'] && $book->userId == (Session()->get('userId'))){
                            $isbooked=true;
                            break;
                        }
                    }


                    $doctorSchedule[$doc->doctorId][$time->timeId][$date['date']] = $isRest;
                    $booked[$doc->doctorId][$time->timeId][$date['date']][session()->get('userId')]=$isbooked;
                }
            }
        }

        // 計算預約數量
        $counts = [];
        global $userId;
        foreach ($doctor as $doc) {
            $counts[$doc->doctorId] = $this->getCountsForDates([1, 2, 3, 4, 5], $dates, $doc->doctorId);
        }

        return view("front.Schedule.list", compact("dates", "doctorSchedule", "counts","booked", "doctor", "doctorName", "startDate", "showPrevWeekButton", "showNextWeekButton", "TimeList"));
    }

    // 生成這一週的日期
    private function generateWeekDates($startDate)
    {
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

    //根據時間、日期、醫師編號紀錄
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
    private function getBooked($timeIds,$dates,$doctorId,$userId)
    {
        $booked = [];
        foreach ($timeIds as $timeId) {
            foreach ($dates as $date) {
                if(Session::has("userId")){
                    $userId=Session::get("userId");
                    $booked[$timeId][$date['date']][$userId] = (new Booking())->booked($timeId, $date['date'], $doctorId, $userId);
                }
            }            
        }
        return $booked;
  
    }


    public function doBooking(Request $req)
    {
        $userId = session()->get("userId");
        $dates = $req->dates;
        $timeId = $req->timeId;
        $doctorId = $req->doctorId;

        // 檢查是否已經預約
        $existingBooking = Booking::where('userId', $userId)
            ->where('dates', $dates)
            ->where('timeId', $timeId)
            ->where('doctorId', $doctorId)
            ->first();

        if ($existingBooking) {
            
            // 如果已經預約，返回錯誤信息
            return redirect()->back()->with('error', '您已經在該時段預約了該醫生。');

        }

        // 如果沒有預約，則進行預約
        $booking = new Booking();
        $booking->userId = $userId;
        $booking->dates = $dates;
        $booking->timeId = $timeId;
        $booking->doctorId = $doctorId;
        $booking->save();

        return redirect("/schedule/list")->with('message', '預約成功');
    }
    //根據userId紀錄
    // public function doBooking(Request $req)
    // {
    //     $booking = new Booking();
    //     $booking->userId = session()->get("userId");
    //     $booking->dates = $req->dates;
    //     $booking->timeId = $req->timeId;
    //     $booking->doctorId = $req->doctorId;
    //     $booking->save();

    //     // Session::flash("message", "預定成功");
    //     return redirect("/schedule/list");
    // }
}