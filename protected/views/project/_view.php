<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('app_id')); ?>:</b>
	<?php echo CHtml::encode($data->app_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('secret_key')); ?>:</b>
	<?php echo CHtml::encode($data->secret_key); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cert_sandbox')); ?>:</b>
	<?php echo CHtml::encode($data->cert_sandbox); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cert_production')); ?>:</b>
	<?php echo CHtml::encode($data->cert_production); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mode')); ?>:</b>
	<?php echo CHtml::encode($data->mode); ?>
	<br />


</div>