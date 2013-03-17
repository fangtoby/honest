<?php
		try{
			 if(Yii::app()->db->active)
			 {
				 
			}
		}
        catch (Exception $e) {
        	print("DB connection open failed !");
			throw new CHttpException(500, 'Internal server error: '.$e->getMessage());
			return false;
		}

	if(Yii::app()->db){
		echo "DB Connection Right!"."<br />";	
		$connection = Yii::app()->db;
		$sql = "SHOW CREATE TABLE users";
		$sql = "SHOW COLUMNS FROM users";
		$sql = "SHOW INDEX FROM USERS";
		$sql = "SHOW STATUS";		
		$sql = "show databases";
		echo "<pre >";
		$command = $connection->createCommand($sql);
		$result = $command->queryAll();
		print_r($result);
		echo "</pre>";
	}else{
		echo "DB Error! Please Connection Admin!";	
	}
	