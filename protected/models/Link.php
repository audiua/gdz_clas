<?php

/**
 * This is the model class for table "link".
 *
 * The followings are the available columns in table 'link':
 * @property string $id
 * @property string $from_url
 * @property string $on_url
 * @property string $keyword_id
 * @property string $create_time
 * @property string $update_time
 * @property string $check
 * @property string $ankor
 * @property string $links_on_donor
 *
 * The followings are the available model relations:
 * @property Keyword $keyword
 */
class Link extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'link';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('from_url, keyword_id, ankor', 'required'),
			array('from_url, on_url, ankor', 'length', 'max'=>255),
			array('keyword_id, create_time,check_time, update_time', 'length', 'max'=>10),
			array('check_link', 'length', 'max'=>1),
			array('links_on_donor', 'length', 'max'=>2),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, from_url, on_url, keyword_id, create_time,check_time, update_time, check_link, ankor, links_on_donor', 'safe', 'on'=>'search'),
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

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'from_url' => 'From Url',
			'on_url' => 'On Url',
			'keyword_id' => 'Keyword',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'check_link' => 'Check link',
			'check_time' => 'Check time',
			'ankor' => 'Ankor',
			'links_on_donor' => 'Links On Donor',
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
		$criteria->compare('from_url',$this->from_url,true);
		$criteria->compare('on_url',$this->on_url,true);
		$criteria->compare('keyword_id',$this->keyword_id,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('check_link',$this->check_link,true);
		$criteria->compare('check_time',$this->check_time,true);
		$criteria->compare('ankor',$this->ankor,true);
		$criteria->compare('links_on_donor',$this->links_on_donor,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Link the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave(){

		$page = file_get_contents( $this->from_url );
		$page = mb_strtolower($page,'utf8');
		if($page){
			if( mb_substr_count($page, mb_strtolower(Yii::app()->createAbsoluteUrl($this->keyword->url),'utf8')) ){
				$this->check_link = 1;
				$this->check_time = time();

			}
		}



		return parent::beforeSave();
	}
}
