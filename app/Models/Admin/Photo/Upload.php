<?php

namespace App\Models\Admin\Photo;


use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    /*
     photo:上傳圖片
     path:要儲存路徑
     middle:是否要另存中圖
     small:是否要另存小圖 
     */
    public function uploadPhoto($photo, $path, $middle, $mw, $mh, $small, $sw, $sh)
    {

        $mwidth = 490;
        $mheight = 490;
        $swidth = 80;
        $sheight = 80;

        if (isset($mw)) {
            $mwidth = $mw;
        }
        if (isset($mh)) {
            $mheight = $mh;
        }
        if (isset($sw)) {
            $swidth = $sw;
        }
        if (isset($sh)) {
            $sheight = $sh;
        }

        //如果有儲存資料夾不存在
        if (!file_exists($path)) {
            //建立資料夾，設定權限為可讀寫
            mkdir($path, 0777);
        }

        //取副檔名
        $ext = $photo->extension();
        //將現有時間的微秒分割成陣列
        $times = explode(" ", microtime());
        //將檔案名以年_月_日_時_分_秒_微秒的格式重新命名:例2024_07_31_10_00_00_123.jpg
        $fileName = strftime("%Y_%m_%d_%H_%M_%S_", $times[1]) . substr($times[0], 2, 3) . "." . $ext;
        //將上傳圖檔主暫存區移至要儲存的資料夾，並重新命名
        $photo->move($path, $fileName);

        if ($middle) {
            //如果有儲存資料夾不存在M這個資料夾
            if (!file_exists($path . "/M")) {
                //在要儲存資料夾下建立M資料夾
                mkdir($path . "/M", 0777);
            }

            //將原始圖檔做尺寸變更，令存在M資料夾下
            //490,490為寬及高,可自行設定大小
            //第一個0:是否裁截圖
            //第二個0:是否放大圖像
            //ext:檔案類型，列如jpg,png
            //$path."/M".$fileName:要儲存的資料夾及檔案
            //$path."/".$fileName:原始圖檔資料夾及名稱
            new Resize($path . "/M/" . $fileName, $path . "/" . $fileName, $mwidth, $mheight, "1", "0", $ext);
        }

        if ($small) {
            //如果有儲存資料夾不存在M這個資料夾
            if (!file_exists($path . "/S")) {
                //在要儲存資料夾下建立M資料夾
                mkdir($path . "/S", 0777);
            }
            new Resize($path . "/S/" . $fileName, $path . "/" . $fileName, $swidth, $sheight, "1", "0", $ext);
        }
        //回傳檔案名稱
        return $fileName;
    }
}
