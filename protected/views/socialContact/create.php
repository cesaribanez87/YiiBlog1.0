<?php
/* @var $this SocialContactController */
/* @var $model SocialContact */

$this->breadcrumbs=array(
	'Social Contacts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SocialContact', 'url'=>array('index')),
	array('label'=>'Manage SocialContact', 'url'=>array('admin')),
);
?>

<h1>Create SocialContact</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>