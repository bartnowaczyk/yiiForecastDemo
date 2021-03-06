<?php
/* @var $this TblMainController */
/* @var $data TblMain */
?>

<div class="view">


	<b><?php echo CHtml::encode($data->getAttributeLabel('cityId')); ?>:</b>
	<?php echo CHtml::encode($data->city->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('temperatureMorning')); ?>:</b>
	<?php echo CHtml::encode($data->temperatureMorning); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weatherMorningId')); ?>:</b>
    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/' . $data->weatherMorning->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('temperatureDay')); ?>:</b>
	<?php echo CHtml::encode($data->temperatureDay); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weatherDayId')); ?>:</b>
    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/' . $data->weatherDay->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('temperatureAfter')); ?>:</b>
	<?php echo CHtml::encode($data->temperatureAfter); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('weatherAfterId')); ?>:</b>
    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/' . $data->weatherAfter->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('temperatureNight')); ?>:</b>
	<?php echo CHtml::encode($data->temperatureNight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weatherNightId')); ?>:</b>
    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/' . $data->weatherNight->url); ?>
	<br />


</div>