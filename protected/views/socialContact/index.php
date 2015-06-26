<?php
/* @var $this SocialContactController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Social Contacts',
);

$this->menu=array(
	array('label'=>'Create SocialContact', 'url'=>array('create')),
	array('label'=>'Manage SocialContact', 'url'=>array('admin')),
);
?>

<h1>Social Contacts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
