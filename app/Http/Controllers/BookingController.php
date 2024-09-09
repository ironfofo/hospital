<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Doctor;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    public function list() 
    {
        $doctor = Doctor::get();
        $sch = (new Schedule())->getList();
        return view("front.booking.list", compact("doctor", "sch"));
    }

    public function booking(Request $req)
    {
        $booking = new Booking();


        $times = explode(" ", microtime());
        $bookingId = $times[1];
        $booking->bookingId = $bookingId;

        // $booking->userId=Auth::user()->id;
        // $booking->userId=$req->userId;
        $booking->doctorId = $req->doctorId;
        $booking->dates = $req->dates;
        $booking->timeId = $req->timeId;
        $booking->petName = $req->petName;
        $booking->save();

        Session::flash("message", "預定成功");
        return redirect("booking/list");
    }
}
