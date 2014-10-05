<?php

class SiteController extends Controller
{

	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function actionIndex()
	{

        $criteria  = (isset($_GET['cityId'])) ?
            array(
                'condition'=>'cityId='.$_GET['cityId'],
                'order'=>'cityId ASC',
            ):
            array(
                'order'=>'cityId ASC',
            );

        $options = array(
            'criteria'=> $criteria,
            'pagination'=>array(
                'pageSize'=>1,
            ),
        );


        $dataProvider=new CActiveDataProvider('TblMain', $options);
        $cities = TblCity::model()->findAll(array('order' => 'name'));
        $selectedCity = (isset($_GET['cityId'])) ? $_GET['cityId'] : "";
        $list = CHtml::listData($cities,  'id', 'name');

        $this->render('index', array(
            'dataProvider'=> $dataProvider,
            'cities'=>$list,
            'cityId'=>$selectedCity
            )
        );
	}

	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	public function actionLogin()
	{
		$model=new LoginForm;

		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		$this->render('login',array('model'=>$model));
	}

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

    public function actionWeather() {
        $this->renderPartial('_weather',array(
            'model'=>$this->loadModel(1),
        ));
    }

}