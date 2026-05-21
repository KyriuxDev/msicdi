<?php
	$this->pageTitle=Yii::app()->name . ' - Acceso';
?>

<h1 class='acceso'>Acceso Al Sistema</h1>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
    'htmlOptions'=>array(
        'role'=>'form',
        'class'=>"acceso",
    ),
    'focus'=>array($modelo,'matricula'),
)); ?>

	<p class="note"><span class="required">*</span> Campos Requeridos.</p>

	<div class="form-group">
		<?php echo $form->labelEx($modelo,'matricula'); ?>
		<?php echo $form->textField($modelo,'matricula',array('class'=>'form-control',)); ?>
		<?php echo $form->error($modelo,'matricula'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($modelo,'clave'); ?>
		<?php echo $form->passwordField($modelo,'clave',array('class'=>'form-control')); ?>
		<?php echo $form->error($modelo,'clave'); ?>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($modelo,'recordarme'); ?>
		<?php echo $form->label($modelo,'recordarme'); ?>
		<?php echo $form->error($modelo,'recordarme'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Acceder'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
