<?php
/* @var $this QuestionsController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Questions',
);

$this->menu=array(
	array('label'=>'Create Questions','url'=>array('create')),
	array('label'=>'Manage Questions','url'=>array('admin')),
);
?>

<h1>Вопросы</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'pager'=>array('class' => 'bootstrap.widgets.TbPager'),
)); ?>