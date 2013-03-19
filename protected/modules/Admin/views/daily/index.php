<?=$this->action->id;?>
<pre>
<?php
	//echo Yii::getPathOfAlias('webroot').'/protected/data/songs.xml';
	$mysongs = simplexml_load_file(Yii::getPathOfAlias('webroot').'/protected/data/songs.xml');
	foreach($mysongs as $key=>$values)
	{	
		echo $values->title."<br />";
		echo $values->artist."<br />"."<br />"."<br />";
	}
?>
</pre>