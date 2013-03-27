<div id="mwidget">
	<div class="widget-title">
    	<?php echo $this->widgetName; ?>
    </div>
	<?php
    	foreach($this->param as $param){
			echo CHtml::link($param['name'],$param['url']);
			if(next($this->param)){
				echo $this->delimiter;
			}	
		}
	?>
</div>