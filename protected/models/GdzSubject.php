<?php

/**
 * This is the model class for table "gdz_subject".
 *
 * The followings are the available columns in table 'gdz_subject':
 * @property string $id
 * @property string $description
 * @property string $create_time
 * @property string $update_time
 * @property string $clas_id
 * @property string $subject_id
 *
 * The followings are the available model relations:
 * @property GdzSubject $subject
 * @property GdzSubject[] $gdzSubjects
 * @property Clas $clas
 */
class GdzSubject extends CActiveRecord
{
	private $_url;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gdz_subject';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gdz_clas_id, subject_id', 'required'),
			array('create_time, update_time, gdz_clas_id, subject_id', 'length', 'max'=>10),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, description, create_time, update_time, gdz_clas_id, subject_id', 'safe', 'on'=>'search'),
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
			'subject' => array(self::BELONGS_TO, 'Subject', 'subject_id'),
			'gdz_clas' => array(self::BELONGS_TO, 'GdzClas', 'gdz_clas_id'),
			'gdz_book' => array(self::HAS_MANY, 'GdzBook', 'gdz_subject_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'description' => 'Description',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'gdz_clas_id' => 'GdzClas',
			'subject_id' => 'Subject',
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		// $criteria->compare('gdz_clas_id',$this->clas_id,true);
		// $criteria->compare('subject_id',$this->subject_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize' => 60
			)
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GdzSubject the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getAll($clas=null){
		$result = array();
		$criteria = new CDbCriteria;
		if($clas){
			$criteria->condition = 'gdz_clas_id='.$clas;
		}

		$all = self::model()->findAll($criteria);

		if($all){
			foreach($all as $one){
				$result[$one->id]=$one->subject->title;
			}
		}
		return $result;
	}

	public function getUrl($clas=null){
	   if ($this->_url === null){
	   		$url = !empty($clas) ? $clas . '/'.$this->subject->slug : $this->subject->slug;
	        $this->_url = Yii::app()->createUrl( '/gdz/' . $url );
	        $this->_url .= '/';
	   }
	   return $this->_url;
	}

	// модели для карты сайта
	public function forSitemap(){
		$result = array();
		$time = time();

		$criteria = new CDbCriteria;
		$criteria->group = 'subject_id'; 
		$all = self::model()->findAll($criteria);
		
		foreach($all as $one){
			$flag = false;
			if($one->gdz_book){

				foreach($one->gdz_book as $book){

					// isset published book
					if($book->public && $book->public_time < $time){
						$flag = true;
						break;
					}
				}

				if($flag){
					$result[] = $one;
				}

			}
		}

		return $result;
	}
}
