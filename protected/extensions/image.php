<?php 
    class Image { 
        private $path; 
		private $new_path; // min size images path
        //构造方法用来对图片所在位置进行初使化  
        function __construct($path="./",$new_path="min"){ 
            $this->path=rtrim($path, "/")."/"; 
			$this->new_path = $new_path;
        } 
        /* 对图片进行缩放
         *
         * 参数$name: 是需要处理的图片名称
         * 参数$width:是缩放后的宽度
         * 参数$height:是缩放后的高度
         * 参数$qz: 是新图片的名称前缀
         * 返回值:就是缩放后的图片名称，失败则返回false
         *
         */ 
        function thumb($name, $width, $height, $qz="th_"){ 
            //获取图片信息  
            $imgInfo=$this->getInfo($name); //图片的宽度，高度，类型  
            //获取图片资源, 各种类型的图片都可以创建资源 jpg, gif, png  
            $srcImg=$this->getImg($name, $imgInfo); 
            //获取计算图片等比例之后的大小, $size["width"], $size["height"]  
            $size=$this->getNewSize($name, $width, $height, $imgInfo); 
            //获取新的图片资源, 处理一下gif透明背景  
            $newImg=$this->kidOfImage($srcImg, $size, $imgInfo); 
            //另存为一个新的图片，返回新的缩放后的图片名称      
            return $this->createNewImage($newImg, $qz.$name, $imgInfo);   
        } 
 		public function createNewField(){
			$field = $this->path.$this->new_path;
			if(file_exists($field)){
				return true;
			}else{
				 if(mkdir($field)){
				 	return true;
				}
			}	
		}
        private function createNewImage($newImg, $newName, $imgInfo){ 
			if($this->createNewField()){
				switch($imgInfo["type"]){ 
					case 1://gif  
						$result=imageGif($newImg, $this->path.$this->new_path."/".$newName); 
						break; 
					case 2://jpg  
						$result=imageJPEG($newImg, $this->path.$this->new_path."/".$newName); 
						break; 
					case 3://png  
						$return=imagepng($newImg, $this->path.$this->new_path."/".$newName); 
						break; 
				} 
				imagedestroy($newImg); 
				return $newName;	
			}             
        } 
 
        private function kidOfImage($srcImg, $size, $imgInfo){ 
            $newImg=imagecreatetruecolor($size["width"], $size["height"]); 
             
            $otsc=imagecolortransparent($srcImg); 
 
            if($otsc >=0 && $otsc <= imagecolorstotal($srcImg)){ 
                $tran=imagecolorsforindex($srcImg, $otsc); 
 
                $newt=imagecolorallocate($newImg, $tran["red"], $tran["green"], $tran["blue"]); 
 
                imagefill($newImg, 0, 0, $newt); 
 
                imagecolortransparent($newImg, $newt); 
            } 
 
            imagecopyresized($newImg, $srcImg, 0, 0, 0, 0, $size["width"], $size["height"], $imgInfo["width"], $imgInfo["height"]); 
 
            imagedestroy($srcImg); 
 
            return $newImg; 
        } 
 
        private function getNewSize($name, $width, $height, $imgInfo){ 
            $size["width"]=$imgInfo["width"]; 
            $size["height"]=$imgInfo["height"]; 
 
            //缩放的宽度如果比原图小才重新设置宽度  
            if($width < $imgInfo["width"]){ 
                $size["width"]=$width; 
            } 
            //缩放的高度如果比原图小才重新设置高度  
            if($height < $imgInfo["height"]){ 
                $size["height"]=$height; 
            } 
 
            //图片等比例缩放的算法  
            if($imgInfo["width"]*$size["width"] > $imgInfo["height"] * $size["height"]){ 
                $size["height"]=round($imgInfo["height"]*$size["width"]/$imgInfo["width"]); 
            }else{ 
                $size["width"]=round($imgInfo["width"]*$size["height"]/$imgInfo["height"]); 
            } 
 
 
            return $size; 
 
        } 
 
        private function getInfo($name){ 
            $data=getImageSize($this->path.$name); 
 
            $imageInfo["width"]=$data[0]; 
            $imageInfo["height"]=$data[1]; 
            $imageInfo["type"]=$data[2]; 
 
            return $imageInfo; 
        } 
 
        private function getImg($name, $imgInfo){ 
            $srcPic=$this->path.$name; 
 
            switch($imgInfo["type"]){ 
                case 1: //gif  
                    $img=imagecreatefromgif($srcPic); 
                    break; 
                case 2: //jpg  
                    $img=imageCreatefromjpeg($srcPic); 
                    break; 
                case 3: //png  
                    $img=imageCreatefrompng($srcPic); 
                    break; 
                default: 
                    return false; 
                 
            } 
 
            return $img; 
        } 
        /* 功能：为图片加水印图片
         * 参数$groundName: 背景图片，即需要加水印的图片
         * 参数$waterName: 水钱图片
         * 参数#aterPost：水印位置， 10种状态， 
         *  0为随机位置
         *
         *  1. 为顶端居左  2. 为顶端居中  3 为顶端居右
         *  4  为中部居左  5. 为中部居中  6 为中部居右
         *  7 . 为底端居左 8. 为底端居中， 9. 为底端居右
         *
         * 参数$qz : 是加水印后的图片名称前缀
         * 返回值：就是处理后图片的名称
         *
         */ 
        function waterMark($groundName, $waterName, $waterPos=0, $qz="wa_"){ 
         
            if(file_exists($this->path.$groundName) && file_exists($this->path.$waterName)){ 
                $groundInfo=$this->getInfo($groundName); 
                $waterInfo=$this->getInfo($waterName); 
                //水印的位置  
                if(!$pos=$this->position($groundInfo, $waterInfo, $waterPos)){ 
                    echo "水印不应该比背景图片小！"; 
                    return; 
                } 
 
                $groundImg=$this->getImg($groundName, $groundInfo); 
                $waterImg=$this->getImg($waterName, $waterInfo); 
 
                $groundImg=$this->copyImage($groundImg, $waterImg, $pos, $waterInfo); 
 
                return $this->createNewImage($groundImg, $qz.$groundName, $groundInfo); 
            }else{ 
                echo "图片或水印图片不存在"; 
                return false; 
            } 
        } 
 
        private function copyImage($groundImg, $waterImg, $pos, $waterInfo){ 
            imagecopy($groundImg, $waterImg, $pos["posX"], $pos["posY"], 0, 0, $waterInfo["width"], $waterInfo["height"]); 
            imagedestroy($waterImg); 
 
            return $groundImg; 
        } 
         
        private function position($groundInfo, $waterInfo, $waterPos){ 
            //需要背景比水印图片大  
            if(($groundInfo["width"]< $waterInfo["width"]) ||($groundInfo["height"] < $waterInfo["height"])){ 
                return false; 
            } 
 
            switch($waterPos){ 
                case 1: 
                    $posX=0; 
                    $posY=0; 
                    break; 
                case 2: 
                    $posX=($groundInfo["width"]-$waterInfo["width"])/2; 
                    $posY=0; 
                    break; 
                case 3: 
                    $posX=$groundInfo["width"]-$waterInfo["width"]; 
                    $posY=0; 
                    break; 
                case 4: 
                    $posX=0; 
                    $posY=($groundInfo["height"]-$waterInfo["height"]) /2; 
                    break; 
                case 5: 
                    $posX=($groundInfo["width"]-$waterInfo["width"])/2; 
                    $posY=($groundInfo["height"]-$waterInfo["height"]) /2; 
                    break; 
                case 6: 
                    $posX=$groundInfo["width"]-$waterInfo["width"]; 
                    $posY=($groundInfo["height"]-$waterInfo["height"]) /2; 
                    break; 
                case 7: 
                    $posX=0; 
                    $posY=$groundInfo["height"]-$waterInfo["height"]; 
                    break; 
                case 8: 
                    $posX=($groundInfo["width"]-$waterInfo["width"])/2; 
                    $posY=$groundInfo["height"]-$waterInfo["height"]; 
                    break; 
                case 9: 
                    $posX=$groundInfo["width"]-$waterInfo["width"]; 
                    $posY=$groundInfo["height"]-$waterInfo["height"]; 
                    break; 
                case 0: 
                default: 
                    $posX=rand(0, ($groundInfo["width"]-$waterInfo["width"])); 
                    $posY=rand(0, ($groundInfo["height"]-$waterInfo["height"])); 
                    break; 
            } 
 
            return array("posX"=>$posX, "posY"=>$posY); 
        } 
 
    } 
