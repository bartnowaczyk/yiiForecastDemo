<?php

class TblMain extends CActiveRecord
{
	public function tableName()
	{
		return 'tbl_main';
	}

	public function rules()
	{
		return array(
			array('cityId, temperatureMorning, weatherMorningId, temperatureDay, weatherDayId, temperatureAfter,
			    weatherAfterId, temperatureNight, weatherNightId', 'required'),
			array('cityId, temperatureMorning, weatherMorningId, temperatureDay, weatherDayId, temperatureAfter,
			    weatherAfterId, temperatureNight, weatherNightId', 'numerical', 'integerOnly'=>true),
			array('id, cityId, temperatureMorning, weatherMorningId, temperatureDay, weatherDayId, temperatureAfter,
			    weatherAfterId, temperatureNight, weatherNightId', 'safe', 'on'=>'search'),
		);
	}
	public function relations()
	{
		return array(
			'city' => array(self::BELONGS_TO, 'TblCity', 'cityId'),
			'weatherMorning' => array(self::BELONGS_TO, 'TblWeather', 'weatherMorningId'),
			'weatherDay' => array(self::BELONGS_TO, 'TblWeather', 'weatherDayId'),
			'weatherAfter' => array(self::BELONGS_TO, 'TblWeather', 'weatherAfterId'),
			'weatherNight' => array(self::BELONGS_TO, 'TblWeather', 'weatherNightId'),

		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cityId' => 'City',
			'temperatureMorning' => 'Temperature Morning',
			'weatherMorningId' => 'Weather Morning',
			'temperatureDay' => 'Temperature Day',
			'weatherDayId' => 'Weather Day',
			'temperatureAfter' => 'Temperature After',
			'weatherAfterId' => 'Weather After',
			'temperatureNight' => 'Temperature Night',
			'weatherNightId' => 'Weather Night',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('cityId',$this->cityId);
		$criteria->compare('temperatureMorning',$this->temperatureMorning);
		$criteria->compare('weatherMorningId',$this->weatherMorningId);
		$criteria->compare('temperatureDay',$this->temperatureDay);
		$criteria->compare('weatherDayId',$this->weatherDayId);
		$criteria->compare('temperatureAfter',$this->temperatureAfter);
		$criteria->compare('weatherAfterId',$this->weatherAfterId);
		$criteria->compare('temperatureNight',$this->temperatureNight);
		$criteria->compare('weatherNightId',$this->weatherNightId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
