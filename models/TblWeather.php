<?php

class TblWeather extends CActiveRecord
{
	public function tableName()
	{
		return 'tbl_weather';
	}

	public function rules()
	{
		return array(
			array('name, url', 'required'),
			array('name', 'length', 'max'=>50),
			array('url', 'length', 'max'=>100),
			array('id, name, url', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array();
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'url' => 'Url',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
