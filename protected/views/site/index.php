<h1><?php echo $question->question;?></h1>
<div class="well">
    <?php echo $question->answer;?>
</div>
<hr>
<div>
    <h3>Связанные вопросы:</h3>
    <?php foreach ($question->quest as $rel):?>
    <?php echo CHtml::link($rel->idRel->question,'/questions/view/id/'.$rel->idRel->id);?>
    <br>
    <?php    endforeach;?>
</div>
