<?php
/* @var $this SocialContactController */
/* @var $model SocialContact */

$this->breadcrumbs=array(
	'Social Contacts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SocialContact', 'url'=>array('index')),
	array('label'=>'Create SocialContact', 'url'=>array('create')),
	array('label'=>'Update SocialContact', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SocialContact', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SocialContact', 'url'=>array('admin')),
);
?>

<h1>View SocialContact #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'social',
		'url',
		'comments',
		'creation_time',
	),
)); ?>
