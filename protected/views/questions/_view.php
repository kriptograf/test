<?php
/* @var $this QuestionsController */
/* @var $data Questions */
?>

<div class="view well">

	<b><?php echo CHtml::encode($data->getAttributeLabel('question')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->question),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answer')); ?>:</b>
	<?php echo CHtml::encode($data->answer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('views')); ?>:</b>
	<?php echo CHtml::encode($data->views); ?>
	<br />


</div>