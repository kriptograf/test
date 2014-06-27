<?php
/* @var $this QuestToRelationController */
/* @var $model QuestToRelation */
?>

<?php
$this->breadcrumbs=array(
	'Quest To Relations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List QuestToRelation', 'url'=>array('index')),
	array('label'=>'Create QuestToRelation', 'url'=>array('create')),
	array('label'=>'View QuestToRelation', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage QuestToRelation', 'url'=>array('admin')),
);
?>

    <h1>Update QuestToRelation <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>