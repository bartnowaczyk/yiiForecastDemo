

<?php
/* @var $this SiteController */

Yii::app()->clientScript->registerScript('items_update', "$('#cityId').change(function(){
       console.log($(this).serialize());
        $.fn.yiiListView.update('items_list', {
                data: $(this).serialize(),
            }
        );
    });
    return false;",
    CClientScript::POS_READY);

$this->pageTitle=Yii::app()->name;
?>



<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'menu-dropdown-form',
        'enableAjaxValidation'=>true,
    ));

    echo CHtml::dropDownList('cityId',
       $cityId,
       // $selected_category_id, // The selected category set on controller action
        $cities, // the dropdown options set on controller action
        array('prompt'=>'Select City',)
    );

    $this->endWidget();
    ?>
</div>


<div>
    <?php $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $dataProvider,
            'itemView'=>'_view',
            'id'=>'items_list'
        )
    );

//    $this->widget('application.components.weather', array(
//        'crumbs' => array(
//            array('name' => 'Home', 'url' => array('site/index')),
//            array('name' => 'Login'),
//        ),
//        'city_id'=>1,
//        'id' => 'items_list',
//    ));  ?><!--</div>-->

<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>
