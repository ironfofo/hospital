<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminBookingController extends Controller
{
    public function list()
    {
        $list=(new Booking)->BookingList();
        return view("admin.booking.list",compact("list"));
    }

    public function add()
    {
        $list=Booking::get();
        return view("admin.book.add",compact("list"));
    }

    //Request接收資料 定義為$req
    public function insert(Request $req)
    {
        $booking=new Booking();
        $booking->id=$req->id;
        $booking->userId=session()->get("userId");
        $booking->userName=$req->userName;
        $booking->doctorName=$req->doctorName;
        $booking->dates=$req->dates;
        $booking->timeId=$req->timeId;

        $booking->save();
        
        //.ajax是邊打邊存
        //google的cookie是將資料留在個人電腦
        //暫存網頁伺服器一段時間，時間一到歸0 ，congfig/seension有設定時間
        //flash快閃儲存一次
        Session::flash("message","已新增");
        //redirect轉址
        return redirect("/booking/list");
        
    }

    public function edit(Request $req)
    {   
        //$req->id的id自己輸入的值
        //如果路由參數為ABC 就要更改$req->ABC
        //find:尋找
        $booking=Booking::find($req->id);

        return view("admin.booking.edit",compact("booking"));
    }

    public function update(Request $req)
    {
        //find找尋相對應資料
        $booking=Booking::find($req->id);
        $booking->userName=$req->userName;
        $booking->email=$req->email;
        $booking->phone=$req->phone;
        $booking->adr=$req->adr;
        $booking->bir=$req->bir;
        $booking->userId=$req->userId;
        $booking->pwd=$req->pwd;

        //也可以用$booking->update
        $booking->save();

        Session::flash("message","已修改");
        //redirect轉址
        return redirect("/booking/list");   
    }
    public function delete(Request $req)
    {
        Booking::find($req->id)->delete();
        echo("ok");

    }
}
