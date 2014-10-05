<?php
/* @var $this TblMainController */
/* @var $model TblMain */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cityId'); ?>
		<?php echo $form->textField($model,'cityId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'temperatureMorning'); ?>
		<?php echo $form->textField($model,'temperatureMorning'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'weatherMorningId'); ?>
		<?php echo $form->textField($model,'weatherMorningId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'temperatureDay'); ?>
		<?php echo $form->textField($model,'temperatureDay'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'weatherDayId'); ?>
		<?php echo $form->textField($model,'weatherDayId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'temperatureAfter'); ?>
		<?php echo $form->textField($model,'temperatureAfter'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'weatherAfterId'); ?>
		<?php echo $form->textField($model,'weatherAfterId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'temperatureNight'); ?>
		<?php echo $form->textField($model,'temperatureNight'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'weatherNightId'); ?>
		<?php echo $form->textField($model,'weatherNightId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->