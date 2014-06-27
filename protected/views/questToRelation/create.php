<?php
/* @var $this QuestToRelationController */
/* @var $model QuestToRelation */
?>

<?php
$this->breadcrumbs=array(
	'Quest To Relations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List QuestToRelation', 'url'=>array('index')),
	array('label'=>'Manage QuestToRelation', 'url'=>array('admin')),
);
?>

<h1>Create QuestToRelation</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>