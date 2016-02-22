<?php

/**
 * This is the model class for table "keyword_position".
 *
 * The followings are the available columns in table 'keyword_position':
 * @property string $id
 * @property string $google_position
 * @property string $yandex_position
 * @property string $create_time
 */
class KeywordPosition extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'keyword_position';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('google_position, keyword_id, yandex_position, create_time', 'required'),
			array('google_position, yandex_position', 'length', 'max'=>3),
			array('create_time', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, google_position, yandex_position, create_time, keyword_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'keyword' => array(self::BELONGS_TO, 'Keyword', 'keyword_id'),
		);
	}



	public function lastPosition()
	{
		$this->getDbCriteria()->order = 'last.create_time DESC';
		$this->getDbCriteria()->limit = 2;
		return $this;
	}
	
	public function sixWeeks()
	{
		$this->getDbCriteria()->order = 'six.create_time DESC';
		$this->getDbCriteria()->limit = 6;
		return $this;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'google_position' => 'Google Position',
			'yandex_position' => 'Yandex Position',
			'create_time' => 'Create Time',
			'keyword_id' => 'keyword id',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('google_position',$this->google_position,true);
		$criteria->compare('yandex_position',$this->yandex_position,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('keyword_id',$this->keyword_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return KeywordPosition the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
