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
        $startDate = Carbon::now(); // 當前日期
        $dates = [];
        $rest = DoctorRest::get();
    
        $count1 = [];
        $count2 = [];
        $count3 = [];
    
        for ($i = 0; $i < 7; $i++) {
            $date = $startDate->copy()->addDays($i);
            $formattedDate = $date->format("Y-m-d"); // 取得日期格式
    
            // 建立日期和星期幾的陣列
            $dates[] = [
                'date' => $formattedDate,
                'weekday' => $date->locale("zh_TW")->dayName, // 獲取星期幾的中文名稱
            ];
    
            // 根據每個日期來計算 count1, count2, count3
            $count1[$formattedDate] = $this->getCount($formattedDate, 1);
            $count2[$formattedDate] = $this->getCount($formattedDate, 2);
            $count3[$formattedDate] = $this->getCount($formattedDate, 3);
        }

        // dd($count1); // 這樣會輸出並停止程式
        

        return view("front.schedule.list", compact("dates", "rest", "count1", "count2", "count3"));
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
