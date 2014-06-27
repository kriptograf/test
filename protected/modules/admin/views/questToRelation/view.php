<?php
/* @var $this QuestToRelationController */
/* @var $model QuestToRelation */
?>

<?php
$this->breadcrumbs=array(
	'Quest To Relations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List QuestToRelation', 'url'=>array('index')),
	array('label'=>'Create QuestToRelation', 'url'=>array('create')),
	array('label'=>'Update QuestToRelation', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete QuestToRelation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage QuestToRelation', 'url'=>array('admin')),
);
?>

<h1>View QuestToRelation #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'id_question',
		'id_rel',
	),
)); ?>