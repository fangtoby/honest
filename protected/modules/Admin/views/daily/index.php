<h2>PHP 读写XML文件</h2>
<?php
	//echo Yii::getPathOfAlias('webroot').'/protected/data/songs.xml';
	$xmlPath = Yii::getPathOfAlias('webroot').'/protected/data/songs.xml';
	/*
	$mysongs = simplexml_load_file($xmlPath);
	foreach($mysongs as $key=>$values)
	{	
		echo $values->title."<br />";
		echo $values->artist."<br />"."<br />"."<br />";
	}
	*/
	$doc = new DOMDocument();
	$doc->load($xmlPath);
	$node_liest = $doc->getElementsByTagName('song');
	for($i=0;$i<$node_liest->length;$i++){
		$node = $node_liest->item($i);
		echo $node->getAttribute('dateplayed')."<br />";
		echo '<b>title:</b>'.$node->getElementsByTagName('title')->item(0)->nodeValue."<br />";
		echo '<b>artist:</b>'.$node->getElementsByTagName('artist')->item(0)->nodeValue."<br />";
		if(!($node->getElementsByTagName('detail')->length)){
			$detail = $doc->createElement('detail');
			$detail->nodeValue = date('Y-m-d h:i:s',time());
			$node->appendChild($detail);
		}else{
			echo '<b>detail:</b>'.$node->getElementsByTagName('detail')->item(0)->nodeValue."<br /><br /><br />";
		}
	}
	$doc->save($xmlPath);
	
?>