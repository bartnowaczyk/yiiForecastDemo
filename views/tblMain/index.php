<?php
/* @var $this TblMainController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Mains',
);

$this->menu=array(
	array('label'=>'Create TblMain', 'url'=>array('create')),
	array('label'=>'Manage TblMain', 'url'=>array('admin')),
);
?>

<h1></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
