<?php
/* @var $this QuestionsController */
/* @var $model Questions */
?>

<?php
$this->breadcrumbs=array(
	'Questions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Questions', 'url'=>array('index')),
	array('label'=>'Manage Questions', 'url'=>array('admin')),
);
?>

<h1>Добавить вопрос</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>