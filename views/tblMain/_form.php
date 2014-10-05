<?php
/* @var $this TblMainController */
/* @var $model TblMain */
/* @var $cities TblCity */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-main-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class=row>
		<?php echo $form->labelEx($model,'cityId'); ?>
        <?php echo $form->dropDownList($model,'cityId', CHtml::listData($cities, 'id', 'name')); ?>
        <?php echo $form->error($model,'cityId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'temperatureMorning'); ?>
		<?php echo $form->textField($model,'temperatureMorning'); ?>
		<?php echo $form->error($model,'temperatureMorning'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'weatherMorningId'); ?>
        <?php echo $form->dropDownList($model,'weatherMorningId', CHtml::listData($weather, 'id', 'name')); ?>
		<?php echo $form->error($model,'weatherMorningId'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'temparatureDay'); ?>
		<?php echo $form->textField($model,'temperatureDay'); ?>
		<?php echo $form->error($model,'temparatureDay'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'weatherDayId'); ?>
        <?php echo $form->dropDownList($model,'weatherDayId', CHtml::listData($weather, 'id', 'name')); ?>
		<?php echo $form->error($model,'weatherDayId'); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'temperatureAfter'); ?>
		<?php echo $form->textField($model,'temperatureAfter'); ?>
		<?php echo $form->error($model,'temperatureAfter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'weatherAfterId'); ?>
        <?php echo $form->dropDownList($model,'weatherAfterId', CHtml::listData($weather, 'id', 'name')); ?>
		<?php echo $form->error($model,'weatherAfterId'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'temperatureNight'); ?>
		<?php echo $form->textField($model,'temperatureNight'); ?>
		<?php echo $form->error($model,'temperatureNight'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'weatherNightId'); ?>
        <?php echo $form->dropDownList($model,'weatherNightId', CHtml::listData($weather, 'id', 'name')); ?>
		<?php echo $form->error($model,'weatherNightId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->