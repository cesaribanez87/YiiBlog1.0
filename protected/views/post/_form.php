<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'post_title'); ?>
		<?php echo $form->textField($model,'post_title',array('size'=>20,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'post_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_content'); ?>
		<?php echo $form->textArea($model,'post_content',array('rows'=>20, 'cols'=>50)); ?>
		<?php echo $form->error($model,'post_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->dropDownList($model,'category_id',Category::getCategoryOptions()); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>


    <div class="row">

        <label>
            Tags
        </label>
        <input type="text" style="width: 200%"  name="Post[tags]">
    </div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->