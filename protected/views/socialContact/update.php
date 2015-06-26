<?php
/* @var $this SocialContactController */
/* @var $model SocialContact */

$this->breadcrumbs=array(
	'Social Contacts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SocialContact', 'url'=>array('index')),
	array('label'=>'Create SocialContact', 'url'=>array('create')),
	array('label'=>'View SocialContact', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SocialContact', 'url'=>array('admin')),
);
?>

<h1>Update SocialContact <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>