<?php
/* @var $this TblMainController */
/* @var $model TblMain */

$this->breadcrumbs=array(
	'Tbl Mains'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TblMain', 'url'=>array('index')),
	array('label'=>'Create TblMain', 'url'=>array('create')),
	array('label'=>'Update TblMain', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblMain', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblMain', 'url'=>array('admin')),
);
?>

<h1>View TblMain #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cityId',
		'temperatureMorning',
		'weatherMorningId',
		'temperatureDay',
		'weatherDayId',
		'temperatureAfter',
		'weatherAfterId',
		'temperatureNight',
		'weatherNightId',
	),
)); ?>
