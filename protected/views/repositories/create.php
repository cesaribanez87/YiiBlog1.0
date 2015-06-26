<?php
/* @var $this RepositoriesController */
/* @var $model Repositories */

$this->breadcrumbs=array(
	'Repositories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Repositories', 'url'=>array('index')),
	array('label'=>'Manage Repositories', 'url'=>array('admin')),
);
?>

<h1>Create Repositories</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>