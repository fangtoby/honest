<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
 <div class="clearfix"></div>
<div id="content" class="<?=$this->id.'-'.$this->action->id;?>">
	<?php echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>