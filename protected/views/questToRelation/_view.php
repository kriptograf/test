<?php
/* @var $this QuestToRelationController */
/* @var $data QuestToRelation */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_question')); ?>:</b>
	<?php echo CHtml::encode($data->id_question); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_rel')); ?>:</b>
	<?php echo CHtml::encode($data->id_rel); ?>
	<br />


</div>