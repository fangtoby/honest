
<?php
//
//03/15/2013  13:36
//Author:Honest_lies
//For Add Point Log
//
//
class AddLog
{
	public  $tablePreName = 'pointLog_';
	public  $templeTableName = 'pointLog_201301';
	
	public function add($param = array()){
		$tableFullName = $this->getFullTableName();
		if($this->tableExistTure($tableFullName)){
				$sql ='insert into `'.$tableFullName.'` (userId,daytime,status,point,detail,createTime) values(:userId,:daytime,:status,:point,:detail,:createTime)';
				$command = Yii::app()->db->createCommand($sql);
				$command->bindParam(':userId', $param['userId']);
				$command->bindParam(':daytime', $param['daytime']);
				$command->bindParam(':status', $param['status']);
				$command->bindParam(':point', $param['point']);
				$command->bindParam(':detail', $param['detail']);
				$command->bindParam(':createTime', $param['createTime']);
				return $command->execute();
		}
	}
	
	public function tableExistTure($tableFullName)
	{
		$DBUtil = new DBUtil();
		if($DBUtil->ifTableExitAndCreate($tableFullName,$this->templeTableName)){
			return true;
		}
	}
	
	public  function getFullTableName()
	{
		
		return $this->tablePreName.$this->getTodayMouth();
		
	}
	
	public  function getTodayMouth($Timestamp=null)
	{
		if($Timestamp == null){
			$now = time();
		}else{
			$now = $Timestamp;
		}
		$rightMouth = Util::getYearAndMouth($now);
		return $rightMouth;
	}
}