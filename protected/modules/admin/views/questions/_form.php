<?php
/* @var $this QuestionsController */
/* @var $model Questions */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'questions-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Поля со <span class="required">*</span> обязательны.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldControlGroup($model,'question',array('span'=>5,'maxlength'=>250)); ?>

    <?php echo $form->textAreaControlGroup($model,'answer',array('rows'=>6,'span'=>8)); ?>
    
    <?php echo $form->dropDownListControlGroup($model,'related',  CHtml::listData(Questions::model()->findAll(), 'id', 'question'), array('empty'=>'Выберите связанные вопросы','multiple'=>true,'class'=>'span8'));?>

    <?php echo $form->textFieldControlGroup($model,'priority',array('span'=>5)); ?>

    <?php echo $form->checkBoxControlGroup($model,'status',array('span'=>5)); ?>
    <p class="hint">опубликован/нет</p>

    <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
        <?php if(!$model->isNewRecord):?>
        <?php echo TbHtml::ajaxButton('Удалить','/admin/questions/delete/id/'.$model->id,
                array(
                    'type'=>'POST',
                    'success'=>'function(data){                                             
                         location.href="/admin/questions/admin";
                    }', 
                ),
                array(
		    'color'=>TbHtml::BUTTON_COLOR_DANGER,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
        <?php endif;?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->