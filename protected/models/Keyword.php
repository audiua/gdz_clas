<?php

/**
 * This is the model class for table "keyword".
 *
 * The followings are the available columns in table 'keyword':
 * @property string $id
 * @property string $keyword
 * @property string $create_time
 * @property string $update_time
 * @property string $g_view
 * @property string $y_view
 */
class Keyword extends CActiveRecord
{

	public $google_position = 0;
	public $yandex_position = 0;
	public $links_count = 0;


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'keyword';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('keyword, url', 'required'),
			array('keyword, url', 'length', 'max'=>255),
			array('create_time, update_time, google_view, yandex_view', 'length', 'max'=>10),
			array('check_keyword', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, keyword, create_time, update_time, url, google_view, yandex_view, check_keyword', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'position' => array(self::HAS_MANY, 'KeywordPosition', 'keyword_id'),
			'link' => array(self::HAS_MANY, 'Link', 'keyword_id'),
			'last' => array(self::HAS_MANY, 'KeywordPosition', 'keyword_id', 'scopes'=>'lastPosition'),
			'six' => array(self::HAS_MANY, 'KeywordPosition', 'keyword_id', 'scopes'=>'sixWeeks'),
		);
	}


	public function behaviors(){
		return array(
			'CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
				'createAttribute' => 'create_time',
				'updateAttribute' => 'update_time',
				'setUpdateOnCreate'=>true,
			)
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'keyword' => 'Keyword',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'url' => 'url',
			'check_keyword' => 'check keyword',
			'yandex_view' => 'Yandex View',
			'yandex_position' => 'Yandex Position',
			'google_view' => 'Gooble View',
			'google_position' => 'Gooble Position',
			'links_count' => 'links count',
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
		$criteria->compare('keyword',$this->keyword,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('google_view',$this->google_view,true);
		$criteria->compare('yandex_view',$this->yandex_view,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('check_keyword',$this->check_keyword,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize' => 100
			)
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Keyword the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave(){

		$page = $this->curl( Yii::app()->createAbsoluteUrl($this->url) );
		$page = mb_strtolower($page,'utf8');
		if($page){
			if( mb_substr_count($page, mb_strtolower($this->keyword,'utf8')) ){
				$this->check_keyword = 1;

			}
		}

		return parent::beforeSave();
	}

	public static function getAll(){

		return CHtml::listData(self::model()->findAll(), 'id', 'keyword');

	}

	private function curl($url){
		$curl = curl_init();
		curl_setopt($curl,CURLOPT_URL,$url);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
		// curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);
		curl_setopt($curl,CURLOPT_CONNECTTIMEOUT,30);
		return curl_exec($curl);
	}
}
