<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'comment-form',
    //'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true
    )
)); ?>
    <div id="respond">
        <h4 class="textuppercase">Escribir Comentario</h4>
        <span class="cancel-comment-reply"><small><a rel="nofollow" id="cancel-comment-reply-link" href="/lautus/this-is-another-standard-post/#respond" style="display:none;">Cancel reply</a></small></span>
        <p>Los campos con <strong>*</strong> son requeridos.</p>
        <form action="#" method="post" id="commentform">
            <div class="comment-form">
                <?php if(Yii::app()->user->isGuest): ?>
                    <div class="row-fluid">
                        <div class="span4">
                            <div class="control-wrap">
                 <span class="icon">
                 <i class="icon-blandes-user"></i></span>

                                <?php echo $form->textField($model,'author',array('maxlength'=>128, 'size'=>'22', 'tabindex'=>'1','value'=>'Nombre*', 'aria-required'=>'true')); ?>
                                <?php echo $form->error($model,'author'); ?>
                            </div></div>
                        <div class="span4">
                            <div class="control-wrap">
                        <span class="icon">
                 <i class="icon-blandes-mail"></i></span>

                                <?php echo $form->textField($model,'email',array('maxlength'=>128, 'size'=>'22', 'tabindex'=>'2','value'=>'Email*', 'aria-required'=>'true')); ?>
                                <?php echo $form->error($model,'email'); ?>

                            </div>
                        </div>
                        <div class="span4">
                            <div class="control-wrap">
                         <span class="icon">
                 <i class="icon-blandes-world"></i></span>

                                <?php echo $form->textField($model,'url',array('maxlength'=>128, 'size'=>'22', 'tabindex'=>'3','value'=>'Website', 'aria-required'=>'true')); ?>
                                <?php echo $form->error($model,'url'); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <!--/row-->

            <div class="comment-form">
                <div class="row-fluid">
                    <div class="span12">
                        <?php echo $form->labelEx($model,'content'); ?>
                        <?php echo $form->textArea($model,'content',array('rows'=>10, 'cols'=>58)); ?>
                        <?php echo $form->error($model,'content'); ?>
                    </div>
                </div>
            </div>
            <?php if($model->isNewRecord && Yii::app()->user->isGuest && CCaptcha::checkRequirements()): ?>
                <div class="row">
                    <div class="span5">
                        <?php $this->widget('CCaptcha', array('buttonLabel'=>'Generar nuevo c&oacute;digo')); ?>
                        <br />
                        Escriba el c&oacute;digo que se muestra en la imagen.
                    </div>
                </div>
                <div  class="row">
                    <div class="span3">
                        <div class="form-group">
                            <?php echo $form->labelEx($model,'verifyCode'); ?>
                            <?php echo $form->textField($model,'verifyCode', array('class'=>'form-control')); ?>
                            <?php echo $form->error($model,'verifyCode'); ?>
                        </div>

                    </div>
                </div>
            <?php endif; ?>
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Enviar' : 'Guardar',array('class'=>'button alignright', 'tabindex'=>'5')); ?>
        </form>
    </div>
<?php $this->endWidget(); ?>