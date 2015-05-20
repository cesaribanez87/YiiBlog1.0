<?php
$deleteJS = <<<DEL
$('.commentsControl .delete').on('click', function() {
	var th=$(this),
	    header=th.parent().parent().prev(),
		container=th.closest('div.accordion-content'),
		id=th.attr('id');
		console.log(header);
	if(confirm('¿Esta seguro que desea borrar el comentario #'+id+'?')) {
		$.ajax({
			url:th.attr('href'),
			type:'POST'
		}).done(function(){header.slideUp(); container.slideUp()});
	}
	return false;
});
DEL;
Yii::app()->getClientScript()->registerScript('delete', $deleteJS);
setlocale(LC_ALL, 'es_ES');
?>
<?php //echo $index; ?>

<h2 class="adminMenu-header ">
    <?php echo CHtml::link("#{$data->id}", $data->url, array(
        'class'=>'cid',
        'title'=>'Enlace a este comentario',
    )); ?>

    <?php echo $data->user==null ? $data->author : $data->user->username; ?> dice en
    <?php echo $data->post->title; ?>
</h2>

<div id="c<?php echo $data->id; ?>" class="accordion-content <?php if($data->status==Comment::STATUS_PENDING): ?> pendingDiv <?php endif; ?>" style=" display: block;">
    <?php if($data->status==Comment::STATUS_PENDING): ?>
        <span class="pending">Esperando aprobaci&oacute;n</span>

    <?php endif; ?>
    <div class="commentsControl">
        <?php if($data->status==Comment::STATUS_PENDING): ?>
            <?php echo CHtml::linkButton('<i class="icon-ok"></i>', array('submit'=>array('comment/approve','id'=>$data->id), 'title'=>'Aprobar')); ?> |
        <?php endif; ?>
        <?php echo CHtml::link('<i class="icon-edit"></i>',array('comment/update','id'=>$data->id), array('title'=>'Editar')); ?> |
        <?php echo CHtml::link('<i class="icon-remove-circle"></i>',array('comment/delete','id'=>$data->id),array('class'=>'delete', 'id'=>$data->id, 'title'=>'Eliminar')); ?>
    </div>
    <br>
    <span class="commentDate"><?php echo strftime('%d de %B de %G a las %H:%M:%S',$data->create_time); ?></span>
    <br>
    <p><?php echo nl2br(CHtml::encode($data->content)); ?></p>
    <span class="seeComment"><a target="_blank" href="<?php echo $data->post->url; ?>">Ver entrada</a></span>
    <br>
</div>
