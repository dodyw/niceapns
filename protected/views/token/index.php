<?php
$this->breadcrumbs=array(
	'Tokens',
);

$this->menu=array(
	array('label'=>'Create Token', 'url'=>array('create')),
	array('label'=>'Manage Token', 'url'=>array('admin')),
);
?>

<h1>Tokens</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
