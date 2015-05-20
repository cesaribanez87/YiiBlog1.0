<?php
    Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/tinymce/tinymce.min.js', CClientScript::POS_END);

    $css=Yii::app()->request->baseUrl.'/css/style.css';
    $tinyScript='$(function(){
    var ed=tinymce.init({
        selector: ".tinyMCE",
        theme: "modern",
        hidden_input: false,
        language: "es",
        content_css: "'.$css.'",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor",
            "searchreplace wordcount code fullscreen",
            "insertdatetime media nonbreaking table contextmenu",
            "paste textcolor"
        ],
         setup : function(ed) {
            ed.on("keyup", function(ed) {
                this.save();
            });
        },
        invalid_elements: "input",
        toolbar1: "insertfile undo redo | styleselect | forecolor bold italic | alignleft aligncenter alignright alignjustify | blockquote bullist numlist outdent indent | link image | print preview media",
        image_advtab: true,
        templates: [
            {title: \'Test template 1\', content: \'Test 1\'},
            {title: \'Test template 2\', content: \'Test 2\'}
        ]
    });

    });';
    Yii::app()->clientScript->registerScript('tinyScript', $tinyScript, CClientScript::POS_END);

    $form=$this->beginWidget('CActiveForm', array(
        //'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
            )
        )
    ); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo CHtml::errorSummary($model); ?>

	<div>
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

    <div>
        <?php echo $form->labelEx($model,'subtitle'); ?>
        <?php echo $form->textField($model,'subtitle',array('size'=>80,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'subtitle'); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model,'image_link'); ?>
        <?php echo $form->textField($model,'image_link',array('maxlength'=>255)); ?>
        <?php echo $form->error($model,'image_link'); ?>
    </div>

	<div>
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo CHtml::activeTextArea($model,'content',array('rows'=>10, 'cols'=>70, 'class'=>'tinyMCE')); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'tags'); ?>
		<?php $this->widget('CAutoComplete', array(
			'model'=>$model,
			'attribute'=>'tags',
            'cssFile'=>false,
			'url'=>array('suggestTags'),
			'multiple'=>true,
			'htmlOptions'=>array('size'=>50),
		)); ?>
		<p class="hint">Separe cada etiqueta con una coma.</p>
		<?php echo $form->error($model,'tags'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',Lookup::items('PostStatus')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>