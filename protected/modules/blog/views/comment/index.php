<?php
$this->breadcrumbs=array(
	'Comments',
);
?>

<h1>Comentarios</h1>
<br>

<div id="accordion-container">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    'summaryText'=>'Mostrando {start}-{end} de {count}'
)); ?>



</div>

