<?php
/* @var $this RepositoriesController */
/* @var $model Repositories */

$this->breadcrumbs=array(
	'Repositories'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Repositories', 'url'=>array('index')),
	array('label'=>'Create Repositories', 'url'=>array('create')),
	array('label'=>'View Repositories', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Repositories', 'url'=>array('admin')),
);
?>

<h1>Update Repositories <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>