<h2>PHP __DIR__</h2>
<?php
	echo __DIR__.'<br />';
	echo __LINE__.'<br />';
interface Myface{
	const TYPE = 'Interface';	
	public function start();
	public function stop();
}
class Selfface implements Myface{
	private $param = "Test set and get mogic method";
	public function __construct(){
		echo "default run __construct.".'<br />';
	}
	public function __set($param,$value){
		$this->$param = $value;
	}
	public function __get($param){
		if(isset($this->$param)){
			return $this->$param;
		}
	}
	public function __toString(){
		echo "This is selfFace class .<br/>";	
	}
	public function __call($methodName,$methodParam){
		echo $methodName." Error!<br />";
		echo $methodParam." Error!<br />";
	}
	public function start(){
		echo "start".'<br />';
		echo __CLASS__.'<br />';
		echo __METHOD__.'<br />';
	}
	public function stop(){
		echo "Stop".'<br />';
	}
	public function echoInterfaceConst(){
		echo self::TYPE.'<br />';
	}
}
class Extendface extends Selfface{
	public function echoInterfaceConst(){
		parent::echoInterfaceConst();
		echo "It extend face class".'<br />';
	}
	public function echoConst(){
		echo self::TYPE.'<br />';
	}
}
$face = new Selfface();
$face->start();
$face->stop();
echo $face->param.'<br />';
$face->param = "2013-3-28".'<br />';
echo $face->param."<br />";
$face->echoInterfaceConst();
$face->myface(1,2);
$eface = new Extendface;
$eface->echoInterfaceConst();
$eface->echoConst();

$arr = array('1'=>3);
echo is_array($arr).'<br />';
$str = "";
echo is_string($str).'<br />';
$obj = new Selfface;
echo is_object($obj).'<br />';
echo empty($arr).'<br />';
echo isset($arr).'<br />';
unset($arr);
echo isset($arr).'<br />';
if(isset($_GET['username'])){
	echo $_GET['username'].'<br />';
}

echo time().'<br />';
$tamp = date('Y-m-d h:i:s');
echo $tamp.'<br />';
echo strtotime($tamp).'<br />';

$initData = 1234;
echo $initData.'<br />';
echo md5($initData).'<br />';
echo md5(12345).'<br />';
echo md5(123456).'<br />';
echo md5(1234567).'<br />';
echo md5(12345678).'<br />';
echo hash('sha256',$initData).'<br />';
echo hash('sha256',12345).'<br />';
echo hash('sha256',123456).'<br />';
echo hash('sha256',1234567).'<br />';
echo hash('sha256',12345678).'<br />';
?>
<h2>PHP exel csv</h2>
