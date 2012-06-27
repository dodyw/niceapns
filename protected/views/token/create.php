<?php
$this->breadcrumbs=array(
	'Tokens'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Token', 'url'=>array('index')),
	array('label'=>'Manage Token', 'url'=>array('admin')),
);
?>

<h1>Create Token</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>