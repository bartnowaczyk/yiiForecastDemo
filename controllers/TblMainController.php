<?php

class TblMainController extends Controller
{
	public $layout='//layouts/column2';

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'views' actions
				'actions'=>array('index','views'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionCreate()
	{
		$model=new TblMain;
        $cities = TblCity::model()->findAll();
        $weather = TblWeather::model()->findAll();

		if(isset($_POST['TblMain']))
		{
            $model->attributes=$_POST['TblMain'];
            $modelOld = TblMain::model()->find('cityId=:cityId', array('cityId'=>$_POST['TblMain']['cityId']));
            if($modelOld) {
                $modelOld->temperatureMorning = $model->temperatureMorning;
                $modelOld->weatherMorningId = $model->weatherMorningId;
                $modelOld->temperatureDay = $model->temperatureDay;
                $modelOld->weatherDayId = $model->weatherDayId;
                $modelOld->temperatureAfter = $model->temperatureAfter;
                $modelOld->weatherAfterId = $model->weatherAfterId;
                $modelOld->temperatureNight = $model->temperatureNight;
                $modelOld->weatherNightId = $model->weatherNightId;
                if ($modelOld->save())
                    $this->redirect(array('views', 'id' => $modelOld->id));
            }
            else{
                if ($model->save())
                    $this->redirect(array('views', 'id' => $model->id));
            }
		}

		$this->render('create',array(
			'model'=>$model,
            'cities'=>$cities,
            'weather'=>$weather
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		if(isset($_POST['TblMain']))
		{
			$model->attributes=$_POST['TblMain'];
			if($model->save())
				$this->redirect(array('views','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('TblMain');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function loadModel($id)
	{
		$model=TblMain::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-main-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
