<?php
    class UploadFile extends CComponent{
        public static function checkUploadFile($model, $file, $column){
            switch($file['error']){
                case 1:
                    $model->addError($column, Yii::t('AdminError', 'image is too max', array('{image}'=>$model->getAttributeLabel($column))));
                    break;
                case 2:
                    $model->addError($column, Yii::t('AdminError', 'image is too max', array('{image}'=>$model->getAttributeLabel($column))));
                    break;
                case 3:
                    $model->addError($column, Yii::t('AdminError', 'image is not enough', array('{image}'=>$model->getAttributeLabel($column))));
                    break;
                case 4:
                    $model->addError($column, Yii::t('AdminError', 'image is not exist', array('{image}'=>$model->getAttributeLabel($column))));
                    break;
                case 0:
                    $type = explode("/", $file['type']);
                    if($type[0] != 'image'){
                        $model->addError($column, Yii::t('AdminError', 'the type of file is error', array('{image}'=>$model->getAttributeLabel($column))));
                        break;
                    }
            }
       }    
       
       public static function saveTmpFile($file, $fileDir, $fileName=''){
           if($file['error'] == 0){
               if($fileName == ''){
                   $raFile = explode(".", $file['name']);
                   $t = $raFile[count($raFile)-1];
                   $fileName = time().mt_rand(1,10000).'.'."$t";
               }else{
                    $ra = explode('/', $fileName);
					$raFile = explode(".", $file['name']);
                    $t = $raFile[count($raFile)-1];
                    $fileName = $ra[count($ra)-1].'.'."$t";
               }
               $dir = UPLOAD_TEMP_IMAGE_DIR."/$fileDir"."/$fileName";
               move_uploaded_file($file['tmp_name'], UPLOAD_FILE_DIR."$dir");
           }else{
               $dir = $fileName;
           }
           return $dir;
       }
       
       public static function saveFile($tmpDir, $fileDir, $dbFileDir){
            if($tmpDir != $dbFileDir){
                $ra = explode('/', $tmpDir);
                $dir = UPLOAD_IMAGE_DIR."/$fileDir/".$ra[count($ra)-1];
                copy(UPLOAD_FILE_DIR.$tmpDir, UPLOAD_FILE_DIR.$dir);
				
				$img = new image(UPLOAD_FILE_DIR."uploadImages/$fileDir",'small');
				$newName = $img->thumb($ra[count($ra)-1],30,30);
				
				$smallDir = UPLOAD_IMAGE_DIR."/$fileDir/small/".$newName;
              //  self::deleteFile($tmpDir);
                return $smallDir;
            }else{
                return $dbFileDir;
            }
       }
            
      
      public static function deleteFile($fileName = ''){
          if($fileName == ''){
             return;
          }
          $name = UPLOAD_FILE_DIR.$fileName;
          if(file_exists($name)){
              unlink($name);
          }
      }
    
      public static function saveRaTmpFile($files, $fileDir, $ra){
          foreach($files['name'] as $key=>$value){
              if(isset($files['deleteFlag'][$key]) && $files['deleteFlag'][$key] != 0){
                  continue;
              }
              
              if($files['error'][$key] == 0){
                  if(!isset($ra[$key])){//�����ڵ�ʱ���²��¼��ʱ��
                      $raFile = explode(".", $value);//ȡ��׺��
                      $t = $raFile[count($raFile)-1];
                      $fileName = time().mt_rand(1,10000)."_"."$key".'.'."$t";
                  }else{
                      //self::deleteFile($ra[$key]);
                      //$raFileName = explode("&", $ra[$key]);
                      //$dir = $raFileName[0].'&t='.time();
                      $raFileName = explode('/', $ra[$key]);
                      $fileName = $raFileName[count($raFileName)-1];
                      //$ra[$key] = $dir;
                  }
                  $dir = UPLOAD_TEMP_IMAGE_DIR."/$fileDir"."/$fileName";
                  $ra[$key] = $dir;
                  move_uploaded_file($files['tmp_name'][$key], UPLOAD_FILE_DIR."$dir");
             }
          }
          return $ra;
      }
    
    
    
    
      public static function saveRaFile($raTmpFiles, $fileDir, $raFiles, $deleteImageList){
          foreach($raTmpFiles as $key=>$value){
              if(isset($deleteImageList[$key]) && $deleteImageList[$key]!=0){//Ϊϵͳɾ���ļ�ʱ
                  if(isset($raFiles[$key])){
                      self::deleteFile($raFiles[$key]);
                      unset($raFiles[$key]);
                  }
                  self::deleteFile($value);
                  continue;
              }
              
              if(isset($raFiles[$key]) && $value == $raFiles[$key]){
                  continue;
              }
              $ra = explode('/', $value);
              $dir = UPLOAD_IMAGE_DIR."/$fileDir/".$ra[count($ra)-1];
              copy(UPLOAD_FILE_DIR.$value, UPLOAD_FILE_DIR.$dir);
              self::deleteFile($value);
              $raFiles[$key] = $dir;
          }
          
          $screenList = array();
          foreach($raFiles as $value){
              $screenList[] = $value;
          }
          
          return $screenList;
      }
            
      public static function deleteRaFile($ra){
          if(is_array($ra)){
              foreach($ra as $fileName){
                  self::deleteFile($fileName);
              }
          }
      }
            
            
            
      public static function checkRaUploadFile($model, $files, $titles, $column){
          foreach($titles as $key=>$value){
              if($files['deleteFlag'][$key] == 0){
                  switch($files['error'][$key]){
                      case 1:
                          $model->addError($column, Yii::t('AdminError', 'image is too max', array('{image}'=>$model->getAttributeLabel($titles[$key]))));
                          break;
                      case 2:
                          $model->addError($column, Yii::t('AdminError', 'image is too max', array('{image}'=>$model->getAttributeLabel($titles[$key]))));
                          break;
                      case 3:
                          $model->addError($column, Yii::t('AdminError', 'image is not enough', array('{image}'=>$model->getAttributeLabel($titles[$key]))));
                          break;
                      case 4:
                 //       $model->addError($column, Yii::t('AdminError', 'image is not exist', array('{image}'=>$model->getAttributeLabel($titles[$key]))));
                          break;
                      case 0:
                          $type = explode("/", $files['type'][$key]);
                          if($type[0] != 'image'){
                              $model->addError($column, Yii::t('AdminError', 'the type of file is error', array('{image}'=>$model->getAttributeLabel($titles[$key]))));
                              break;
                          }
                  }
              }
          }
      }
    }
?>