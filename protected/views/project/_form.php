<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'app_id'); ?>
		<?php //echo $form->textField($model,'app_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php //echo $form->error($model,'app_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'secret_key'); ?>
		<?php //echo $form->textField($model,'secret_key',array('size'=>10,'maxlength'=>10)); ?>
		<?php //echo $form->error($model,'secret_key'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cert_sandbox'); ?>
		<?php echo $form->fileField($model, 'cert_sandbox'); ?>
		<?php //echo $form->textField($model,'cert_sandbox',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'cert_sandbox'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cert_production'); ?>
		<?php echo $form->fileField($model, 'cert_production'); ?>
		<?php //echo $form->textField($model,'cert_production',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'cert_production'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mode'); ?>
		<?php echo $form->dropDownList($model, 'mode', Project::model()->getModeOptions(), array ( )); ?>
		<?php echo $form->error($model,'mode'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->