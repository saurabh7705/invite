<?php
$this->breadcrumbs=array(
	'Invitations'=>array('index'),
	'upload',
);

$this->menu=array(
	array('label'=>'List Invitation', 'url'=>array('index')),
	array('label'=>'Manage Invitation', 'url'=>array('admin')),
);
?>

<h1>Upload a File</h1>

<?php echo $this->renderPartial('_form1', array('model'=>$model)); ?>
