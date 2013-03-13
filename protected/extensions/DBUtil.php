<?php
class DBUtil{
	public function ifTableExit($tableName = '', $db = null){
		if($tableName == '') return false;
		if($db === null)
			$db = Yii::app()->db;
		$cmd = $db->createCommand("SHOW TABLES LIKE '$tableName'");
        $is_exists = $cmd->query();
        if( $is_exists->getRowCount() ){
        	return true;
        }
        return false;
	}
		
	public function ifTableExitAndCreate($tableName = '', $likeTableName = ''){
		if($tableName == '') return false;
		if($this->ifTableExit($tableName)){
			return true;
		}
		if($likeTableName == '')return false;
		try{
			$db = Yii::app()->db;
			$cmd = $db->createCommand("CREATE TABLE IF NOT EXISTS `$tableName` like `$likeTableName`");
	        $cmd->query();
        }catch (Exception $e) {
        	return false;
        }
        return false;
	}
}
?>