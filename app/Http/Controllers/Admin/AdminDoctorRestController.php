<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\DoctorRest;
use App\Models\TimeList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminDoctorRestController extends Controller
{
    public function list(Request $req)
    {

        $currentDate = $req->input('date', Carbon::now()->format('Y-m-d')); // 如果前端未傳遞日期，則使用當前日期

        $startDate = Carbon::parse($currentDate); //將取得的日期轉換為 Carbon 日期對象，便於後續進行日期操作。

        $dates = $this->generateMonthDates($startDate);//取得一周時間
        $doctorrest = DoctorRest::all();//醫生休息班表
        $doctor = (new Doctor)->getList();//醫師基本資料
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
    
                    $startTime = Carbon::createFromFormat('Y-m-d H:i:s', $date['date'].' '.$time->time_start);

                    $doctorSchedule[$doc->doctorId][$time->timeId][$date['date']] = $isRest;
                }
            }
        }


        return view("admin.doctor.doctorrest.list", compact("dates", "doctorSchedule",  "doctor", "startDate", "TimeList"));
    }

    private function generateMonthDates($startDate)
    {
        // 生成這一週的日期
        $dates = [];
        $daysInMonth = $startDate->daysInMonth; // 當前月份的天數
        for ($i = 0; $i < $daysInMonth; $i++) {
            $date = $startDate->copy()->startOfMonth()->addDays($i);
            $formattedDate = $date->format("Y-m-d");
            $dates[] = [
                'date' => $formattedDate,
                'weekday' => $date->locale("zh_TW")->dayName,
            ];
        }
        return $dates;
    }


    public function edit(Request $req)
    {
        $currentDate = $req->input('date', Carbon::now()->format('Y-m-d')); // 如果前端未傳遞日期，則使用當前日期
        $startDate = Carbon::parse($currentDate); //將取得的日期轉換為 Carbon 日期對象，便於後續進行日期操作。

        $dates = $this->generateMonthDates($startDate);//取得一周時間
        $doctorrest = DoctorRest::all();//醫生休息班表
        $doctor = (new Doctor)->getList();//醫師基本資料
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
    
                    $startTime = Carbon::createFromFormat('Y-m-d H:i:s', $date['date'].' '.$time->time_start);

                    $doctorSchedule[$doc->doctorId][$time->timeId][$date['date']] = $isRest;
                }
            }
        }
        return view("admin.doctor.doctorrest.edit",compact("doctorrest","dates", "doctorSchedule",  "doctor", "startDate", "TimeList"));
    }

    public function update(Request $req)
    {
        $input = $req->input('schedule', []);
    
        foreach ($input as $doctorId => $dates) {
            foreach ($dates as $date => $timeSlots) {
                foreach ($timeSlots as $timeId => $scheduleData) {
                    if (isset($scheduleData['checked'])) {
                        // 使用 updateOrCreate 避免重複插入相同資料
                        DoctorRest::updateOrCreate(
                                // 用來查找現有記錄的條件
                            [
                                'doctorId' => $scheduleData['doctorId'],
                                'dates' => $scheduleData['dates'],
                                'timeId' => $scheduleData['timeId'],
                            ],
                                // 用來指定要更新或插入的欄位
                            [
                                'doctorId' => $scheduleData['doctorId'],
                                'dates' => $scheduleData['dates'],
                                'timeId' => $scheduleData['timeId'],
                            ]
                        );
                    } else {
                        // 如果沒有勾選，則檢查是否存在該資料並刪除（表示醫師不再休息）
                        DoctorRest::where('doctorId', $scheduleData['doctorId'])
                            ->where('dates', $scheduleData['dates'])
                            ->where('timeId', $scheduleData['timeId'])
                            ->delete();
                    }
                    dd($input);
                }
            }
        }

        Session::flash("message", "修改成功");
        return redirect("/admin/doctor/doctorrest/list");
    }
      
}
