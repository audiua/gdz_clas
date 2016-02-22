<?php

/**
 * This is the model class for table "subject".
 *
 * The followings are the available columns in table 'subject':
 * @property string $id
 * @property string $title
 * @property string $class
 */
class Subject extends CActiveRecord
{

	private $_url = null;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'subject';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, slug, description', 'required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, slug, create_time_, update_time, description', 'safe', 'on'=>'search'),
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
			'book' => array(self::HAS_MANY, 'Book', 'subject_id'),
			'clas'=>array(self::BELONGS_TO, 'Clas', 'class_id'),
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
			'title' => 'Title',
			'slug' => 'Slug',
			'description' => 'description',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('description',$this->description,true);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
		        'pageSize'=>50,
		    ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Subject the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getAll(){

		return CHtml::listData(self::model()->findAll(), 'id', 'title');

	}

	public function getUrl($clas){
	   if ($this->_url === null){
	   		$url = $clas.'/'.$this->slug;
	        $this->_url = Yii::app()->createUrl( '/' . $url );
	        $this->_url .= '/';
	   }
	   return $this->_url;
	}
}
