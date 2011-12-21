<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'invitation-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo CHtml::form('', 'post', array('enctype'=>'multipart/form-data')); ?>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sent'); ?>
		<?php echo $form->textField($model,'sent'); ?>
		<?php echo $form->error($model,'sent'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabel($model,'files'); ?>
		<?php echo CHtml::activeFileField($model, 'files'); ?>
		</div>
 

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->