<?php
/* @var $this QuestionsController */
/* @var $model Questions */
?>

<?php
$this->breadcrumbs=array(
	'Вопросы'=>array('index'),
	$model->question=>array('view','id'=>$model->id),
);
?>
<div class="span12 well-large">
    <h1><?php echo $model->question; ?></h1>

<div>
    <strong>Ответ:</strong>
    <br>
    <?php echo $model->answer;?>
</div>

<div>
    <strong>Связанные вопросы:</strong>  
    <br>
    <?php foreach ($model->quest as $rel):?>
    <?php echo CHtml::link($rel->idRel->question,'/admin/questions/view/id/'.$rel->idRel->id);?>
    <br>
    <?php    endforeach;?>
</div>
</div>

