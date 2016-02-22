<?php

/**
 * This is the model class for table "gdz_book".
 *
 * The followings are the available columns in table 'gdz_book':
 * @property string $id
 * @property string $title
 * @property string $author
 * @property string $clas_id
 * @property string $subject_id
 * @property string $slug
 * @property string $img
 * @property string $description
 * @property string $year
 * @property string $properties
 * @property string $pagination
 * @property string $create_time
 * @property string $update_time
 * @property string $public_time
 * @property string $lang
 *
 * The followings are the available model relations:
 * @property GdzSubject $subject
 * @property GdzClas $clas
 */
class GdzBook extends CActiveRecord
{
	private $_url;

	public $subject_id;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gdz_book';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, author, gdz_clas_id, gdz_subject_id', 'required'),
			array('public_time', 'unique'),
			array('title, edition, info, author, slug, year, properties, pagination', 'length', 'max'=>255),
			array('gdz_clas_id, create_time, update_time, public_time, gdz_subject_id', 'length', 'max'=>10),
			array('slug', 'ext.yiiext.components.translit.ETranslitFilter', 'translitAttribute' => 'slug', 'setOnEmpty' => false),
			array('img, lang, public, description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, edition, info, author, gdz_clas_id, slug, img, description, gdz_subject_id, year, properties, pagination, create_time, update_time, public_time, lang', 'safe', 'on'=>'search'),
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
			'gdz_subject' => array(self::BELONGS_TO, 'GdzSubject', 'gdz_subject_id'),
			'gdz_clas' => array(self::BELONGS_TO, 'GdzClas', 'gdz_clas_id'),
		);
	}

	public function scopes()
    {
		$scopes = parent::scopes();

		$scopes['public'] = array(
			'condition' => 't.public = 1 AND t.public_time<'.time(),
		);

		return $scopes;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'author' => 'Автор',
			'gdz_clas_id' => 'Клас',
			'gdz_subject_id' => 'Предмет',
			'slug' => 'Slug',
			'img' => 'Img',
			'description' => 'Description',
			'year' => 'Year',
			'properties' => 'Properties',
			'pagination' => 'Pagination',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'public_time' => 'Public Time',
			'lang' => 'Lang',
			'public'=>'Public',
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
		$criteria->compare('author',$this->author,true);
		$criteria->compare('gdz_clas_id',$this->gdz_clas_id,true);
		$criteria->compare('gdz_subject_id',$this->gdz_subject_id,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('year',$this->year,true);
		$criteria->compare('properties',$this->properties,true);
		$criteria->compare('pagination',$this->pagination,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('public_time',$this->public_time,true);
		$criteria->compare('lang',$this->lang,true);


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
	 * @return GdzBook the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeValidate(){

		$this->public_time = strtotime($this->public_time);


		return parent::beforeValidate();
	}

	protected function afterFind() {

		$this->public_time = date('d.m.Y H:i', $this->public_time);

        return parent::afterFind();
    }

    public function lastPublicTime(){
    	$criteria=new CDbCriteria;
    	$criteria->order = 'public_time DESC';
    	$criteria->limit = 1;
    	$last = self::model()->public()->find( $criteria );

    	if( $last->update_time > $last->public_time ){
    		return $last->update_time;
    	}

    	return $last->public_time;
    }

    public function getUrl(){
	   if ($this->_url === null){
	        $this->_url = Yii::app()->createUrl( '/gdz/' . $this->gdz_clas->clas->slug . '/'. $this->gdz_subject->subject->slug . '/'. $this->slug );
	   }
	   return $this->_url;
	}
}
