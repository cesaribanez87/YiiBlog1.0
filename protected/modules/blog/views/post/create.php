<?php
$this->breadcrumbs=array(
	'Create Post',
);
?>
<h1>Nueva entrada de blog</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>