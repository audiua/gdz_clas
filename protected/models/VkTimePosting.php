<?php

/**
 * This is the model class for table "vk_time_posting".
 *
 * The followings are the available columns in table 'vk_time_posting':
 * @property string $id
 * @property string $gdz_last_public_time
 * @property integer $textbook_last_public_time
 * @property integer $writing_last_public_time
 * @property integer $library_last_public_time
 * @property integer $author_last_public_time
 * @property integer $knowall_last_public_time
 */
class VkTimePosting extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vk_time_posting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('textbook_last_public_time, writing_last_public_time, library_last_public_time, author_last_public_time, knowall_last_public_time', 'numerical', 'integerOnly'=>true),
			array('gdz_last_public_time', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, gdz_last_public_time, textbook_last_public_time, writing_last_public_time, library_last_public_time, author_last_public_time, knowall_last_public_time', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'gdz_last_public_time' => 'Gdz Last Public Time',
			'textbook_last_public_time' => 'Textbook Last Public Time',
			'writing_last_public_time' => 'Writing Last Public Time',
			'library_last_public_time' => 'Library Last Public Time',
			'author_last_public_time' => 'Author Last Public Time',
			'knowall_last_public_time' => 'Knowall Last Public Time',
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
		$criteria->compare('gdz_last_public_time',$this->gdz_last_public_time,true);
		$criteria->compare('textbook_last_public_time',$this->textbook_last_public_time);
		$criteria->compare('writing_last_public_time',$this->writing_last_public_time);
		$criteria->compare('library_last_public_time',$this->library_last_public_time);
		$criteria->compare('author_last_public_time',$this->author_last_public_time);
		$criteria->compare('knowall_last_public_time',$this->knowall_last_public_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VkTimePosting the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
