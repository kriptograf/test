<?php
/* @var $this QuestToRelationController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Quest To Relations',
);

$this->menu=array(
	array('label'=>'Create QuestToRelation','url'=>array('create')),
	array('label'=>'Manage QuestToRelation','url'=>array('admin')),
);
?>

<h1>Quest To Relations</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>