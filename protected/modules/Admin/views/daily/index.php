<div class="div-item">
    <h2 class="items-title">PHP Read & Write XML File</h2>
    <div id="json" class="item-block add-transition">
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
    </div>
</div>

<div class="div-item">
    <h2 class="items-title">PHP里的pack和unpack函数详解</h2>
    <div class="item-block add-transition">
    <p>
     	pack</p>
   <p>     压缩资料到位字符串之中。</p>
   <p>     语法: string pack(string format, mixed [args]...);</p>
   <p>     返回值: 字符串</p>
   <p>     函数种类: 资料处理</p>
    <p>    
        内容说明</p>
    <p>    本函数用来将资料压缩打包到位的字符串之中。本函数和 Perl 的同名函数功能用法完全相同。参数 format 为压缩的格式，见下表a 将字符串空白以 NULL 字符填满 A 将字符串空白以 SPACE 字符 (空格) 填满 h 十六进位字符串，低位在前 H 十六进位字符串，高位在前 c 有号字符 C 无号字符 s 有号短整数 (十六位，依计算机的位顺序) S 无号短整数 (十六位，依计算机的位顺序) n 无号短整数 (十六位, 高位在后的顺序) v 无号短整数 (十六位, 低位在后的顺序) i 有号整数 (依计算机的顺序及范围) I 无号整数 (依计算机的顺序及范围) l 有号长整数 (卅二位，依计算机的位顺序) L 无号长整数 (卅二位，依计算机的位顺序) N 无号短整数 (卅二位, 高位在后的顺序) V 无号短整数 (卅二位, 低位在后的顺序) f 单精确浮点数 (依计算机的范围) d 倍精确浮点数 (依计算机的范围) x 空位 X 倒回一位 @ 填入 NULL 字符到绝对位置
            
            </p>
    </div>
</div>