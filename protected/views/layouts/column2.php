<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
	<div id="sidebar">
	<?php
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations clearfix'),
		));
	?>
	</div><!-- sidebar -->
    <div class="clearfix"></div>
<div id="content" class="clearfix">
		<?php echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>