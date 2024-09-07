<?php

namespace App\Models\Admin\Photo;

//可用來縮放圖片  會一直重複利用程式可放在model
class Resize
{
	//圖片類型
	var $type;
	//實際寬度
	var $width;
	//實際高度
	var $height;
	//改變後的寬度
	var $resize_width;
	//改變後的高度
	var $resize_height;
	//是否裁圖
	var $cut;
	//是否放大圖像
	var $enlarge;
	//來源圖檔
	var $srcimg;
	//目標圖檔位址
	var $dstimg;
	//臨時建立的圖檔
	var $im;
	//回傳狀態
	var $status;

	/*參數說明：
		$imgout:輸出圖片的位址
		$imgsrc:源圖片位址
		$width:新圖的寬度
		$height:新圖的高度
		$cut:是否裁圖，1為是，0為否
		$enlarge:是否放大圖像，1為是，0為否
	*/

	public function __construct($img, $imgsrc, $width, $height, $cut, $enlarge, $type)
	{
		//目標圖檔位址
		$this->dstimg = $img;
		//來源圖檔
		$this->srcimg = $imgsrc;
		//改變後的寬度
		$this->resize_width = $width;
		//改變後的高度
		$this->resize_height = $height;
		//是否裁圖
		$this->cut = $cut;
		//是否放大圖像
		$this->enlarge = $enlarge;
		//初始化圖檔
		//$this->initi_img();
		if (strtolower($type) == "png")
		{
			$this->im = imagecreatefrompng($this->srcimg);
		}else{
			$this->im = imagecreatefromjpeg($this->srcimg);
		}
		
		//來源圖檔實際寬度
		$this->width = imagesx($this->im);
		//來源圖檔實際高度
		$this->height = imagesy($this->im);
		//生成新圖檔
		$this->newimg();
		//結束圖形
		ImageDestroy($this->im);
	}


	function newimg()
	{
		if (($this->cut) == "1")
		//裁圖
		{
			if ($this->enlarge == '0') //不放大圖像，只縮圖
			{
				//調整輸出的圖片大小，如不超過指定的大小則維持原大小
				if ($this->resize_width < $this->width) {
					$resize_width = $this->resize_width;
				} else {
					$resize_width = $this->width;
				}

				if ($this->resize_height < $this->height) {
					$resize_height = $this->resize_height;
				} else {
					$resize_height = $this->height;
				}
			} else //放大圖像
			{
				$resize_width = $this->resize_width;
				$resize_height = $this->resize_height;
			}

			//改變後的圖檔的比例
			$resize_ratio = ($this->resize_width) / ($this->resize_height);
			//實際圖檔的比例
			$ratio = ($this->width) / ($this->height);

			if ($ratio >= $resize_ratio)
			//高度優先
			{
				$newimg = imagecreatetruecolor($resize_width, $resize_height);

				if ($this->type == 'image/png') {
					$white = imagecolorallocatealpha($newimg, 0, 0, 0, 127); //拾取一個完全透明的顏色
					imagealphablending($newimg, false); //關閉混合模式，以便透明顏色能覆蓋原畫布
					imagefill($newimg, 0, 0, $white); //填充
					imagesavealpha($newimg, true); //設置保存PNG時保留透明通道信息
					imagefilledrectangle($newimg, 0, 0, $resize_width, $resize_height, $white);
					imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, $resize_width, $resize_height, (($this->height) * $resize_ratio), $this->height);
					$this->status = imagepng($newimg, $this->dstimg); //生成圖片
				} else {
					//生成白色背景
					$white = imagecolorallocate($newimg, 255, 255, 255);
					imagefilledrectangle($newimg, 0, 0, $resize_width, $resize_height, $white);
					imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, $resize_width, $resize_height, (($this->height) * $resize_ratio), $this->height);
					$this->status = imagejpeg($newimg, $this->dstimg, 80);
				}
			}

			if ($ratio < $resize_ratio)
			//寬度優先
			{
				$newimg = imagecreatetruecolor($resize_width, $resize_height);

				if ($this->type == 'image/png') {
					$white = imagecolorallocatealpha($newimg, 0, 0, 0, 127); //拾取一個完全透明的顏色
					imagealphablending($newimg, false); //關閉混合模式，以便透明顏色能覆蓋原畫布
					imagefill($newimg, 0, 0, $white); //填充
					imagesavealpha($newimg, true); //設置保存PNG時保留透明通道信息
					imagefilledrectangle($newimg, 0, 0, $resize_width, $resize_height, $white);
					imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, $resize_width, $resize_height, $this->width, (($this->width) / $resize_ratio));
					$this->status = imagepng($newimg, $this->dstimg); //生成圖片
				} else {
					//生成白色背景
					$white = imagecolorallocate($newimg, 255, 255, 255);
					imagefilledrectangle($newimg, 0, 0, $resize_width, $resize_height, $white);
					imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, $resize_width, $resize_height, $this->width, (($this->width) / $resize_ratio));
					$this->status = imagejpeg($newimg, $this->dstimg, 80);
				}
			}
		} else
		//不裁圖
		{
			if ($this->enlarge == '0') //不放大圖像，只縮圖
			{
				//調整輸出的圖片大小，如不超過指定的大小則維持原大小
				if ($this->resize_width < $this->width)
					$resize_width = $this->resize_width;
				else
					$resize_width = $this->width;

				if ($this->resize_height < $this->height)
					$resize_height = $this->resize_height;
				else
					$resize_height = $this->height;
			} else //放大圖像
			{
				$resize_width = $this->resize_width;
				$resize_height = $this->resize_height;
			}

			//改變後的圖檔的比例
			$resize_ratio = ($this->resize_width) / ($this->resize_height);
			//實際圖檔的比例
			$ratio = ($this->width) / ($this->height);


			if ($this->width >= $this->height) //圖片較寬
			{

				//$newimg = imagecreatetruecolor($resize_width,($resize_height)/$ratio); //修改--圖片上傳寬度會很其怪
				$newimg = imagecreatetruecolor($resize_width, $resize_height);

				if ($this->type == 'image/png') {
					$white = imagecolorallocatealpha($newimg, 0, 0, 0, 127); //拾取一個完全透明的顏色
					imagealphablending($newimg, false); //關閉混合模式，以便透明顏色能覆蓋原畫布
					imagefill($newimg, 0, 0, $white); //填充
					imagesavealpha($newimg, true); //設置保存PNG時保留透明通道信息
					imagefilledrectangle($newimg, 0, 0, $resize_width, ($resize_width) / $ratio, $white);
					imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, $resize_width, ($resize_width) / $ratio, $this->width, $this->height);
					$this->status = imagepng($newimg, $this->dstimg); //生成圖片
				} else {
					//生成白色背景
					$white = imagecolorallocate($newimg, 255, 255, 255);
					imagefilledrectangle($newimg, 0, 0, $resize_width, ($resize_width) / $ratio, $white);
					imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, $resize_width, ($resize_width) / $ratio, $this->width, $this->height);
					$this->status = imagejpeg($newimg, $this->dstimg, 100);
				}
			}

			if ($this->width < $this->height) //圖片較高
			{
				$newimg = imagecreatetruecolor(($resize_height) * $ratio, $resize_height);

				if ($this->type == 'image/png') {
					$white = imagecolorallocatealpha($newimg, 0, 0, 0, 127); //拾取一個完全透明的顏色
					imagealphablending($newimg, false); //關閉混合模式，以便透明顏色能覆蓋原畫布
					imagefill($newimg, 0, 0, $white); //填充
					imagesavealpha($newimg, true); //設置保存PNG時保留透明通道信息
					imagefilledrectangle($newimg, 0, 0, ($resize_height) * $ratio, $resize_height, $white);
					imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, ($resize_height) * $ratio, $resize_height, $this->width, $this->height);
					$this->status = imagepng($newimg, $this->dstimg); //生成圖片
				} else {
					//生成白色背景
					$white = imagecolorallocate($newimg, 255, 255, 255);
					imagefilledrectangle($newimg, 0, 0, ($resize_height) * $ratio, $resize_height, $white);
					imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, ($resize_height) * $ratio, $resize_height, $this->width, $this->height);
					$this->status = imagejpeg($newimg, $this->dstimg, 80);
				}
			}
		}
	}
}
