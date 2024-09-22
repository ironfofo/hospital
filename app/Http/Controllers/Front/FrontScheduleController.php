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

        for ($i = 0; $i < 7; $i++) {
            $date = $startDate->copy()->addDays($i);
            $dates[] = [
                'date' => $date->format("Y-m-d"),
                'weekday' => $date->locale("zh_TW")->dayName, // 獲取星期幾的中文名稱
            ];
        };

        $rest=DoctorRest::get();
        $booking=new Booking();    
        
        return view("front.schedule.list", compact("dates","rest"));
        
    }

    // public function booking() 
    // {
    //     $doctor = Doctor::get();
    //     $booking = (new Booking())->getBooking();
    //     return view("front.booking.list", compact("doctor", "booking"));
    // }

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
