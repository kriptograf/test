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


    <h1><?php echo $model->question; ?></h1>

    <div class="well">
    <strong>Ответ:</strong>
    <br>
    <?php echo $model->answer;?>
</div>

<div class="relQuest">
    <strong>Связанные вопросы:</strong>
    <br>
    <br>
    <?php foreach ($model->quest as $rel):?>
    <?php echo CHtml::link($rel->idRel->question,'/questions/view/id/'.$rel->idRel->id);?>
    <br>
    <?php endforeach;?>
    
    
</div>

<div>
    <input id="inptQuest" type="text" name="Questions[question]" onfocus="showButton();return false;" placeholder="Другой..." />
    <br>
    <button id="btnSbmt" class="btn btn-info" onclick="sendForm();" style="display: none;">Отправить</button>
</div>
<script>
    function showButton(){
        $('#btnSbmt').show();
    }
    function sendForm(){
        var quest = $('#inptQuest').val();
        $.post('/questions/create',{question:quest,id:<?php echo $model->id;?>},function(data){
            if(data){
                $('.relQuest').append(data);
                $('#btnSbmt').hide();
                $('#inptQuest').val('');
            }
        });
    }
</script>