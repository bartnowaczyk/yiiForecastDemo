<?php
/* @var $this TblMainController */
/* @var $model TblMain */

$this->breadcrumbs=array(
	'Tbl Mains'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblMain', 'url'=>array('index')),
	array('label'=>'Manage TblMain', 'url'=>array('admin')),
);
?>

<h1> Add new!</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'cities'=>$cities, 'weather'=>$weather)); ?>