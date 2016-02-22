<?php

/**
 * This is the model class for table "textbook".
 *
 * The followings are the available columns in table 'textbook':
 * @property string $id
 * @property string $clas_id
 * @property string $subject_id
 * @property string $author
 * @property string $year
 * @property string $properties
 * @property string $lang
 * @property string $edition
 * @property string $isbn
 * @property string $format
 * @property string $slug
 * @property string $create_time
 * @property string $update_time
 * @property string $active
 * @property string $publish_date
 */
class Textbook extends CActiveRecord
{
	public $title;
	public $info;
	public $description;
	public $pagination;
	private $_url;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'textbook';
	}

	// именованое условие
	public function scopes(){
		$time=time();
        return array(
            'published'=>array(
                'condition'=>'t.publish_date < '.$time.' AND t.public=1',
            ),
        );
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('class_id, subject_id, author, slug', 'required'),
			array('class_id, subject_id, create_time, update_time, publish_date', 'length', 'max'=>11),
			array('author', 'length', 'max'=>500),
			array('year, edition, isbn, format, slug', 'length', 'max'=>255),
			array('lang', 'length', 'max'=>2),
			array('public', 'length', 'max'=>1),
			array('properties, issue_id, issue_embed, vk_img, vk_publish_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, class_id, subject_id, author, year, properties, lang, edition, isbn, format, slug, create_time, update_time, public, publish_date', 'safe', 'on'=>'search'),
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
			'subject' => array(self::BELONGS_TO, 'TextbookSubject', 'subject_id'),
			'clas' => array(self::BELONGS_TO, 'TextbookClas', 'class_id'),
		);
	}

	public function afterFind()
	{
		$this->title = ucfirst($this->subject->name);
		return parent::afterFind();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'class_id' => 'Clas',
			'subject_id' => 'Subject',
			'author' => 'Author',
			'year' => 'Year',
			'properties' => 'Properties',
			'lang' => 'Lang',
			'edition' => 'Edition',
			'isbn' => 'Isbn',
			'format' => 'Format',
			'slug' => 'Slug',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'public' => 'Active',
			'publish_date' => 'Publish Date',
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
		$criteria->compare('class_id',$this->clas_id,true);
		$criteria->compare('subject_id',$this->subject_id,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('year',$this->year,true);
		$criteria->compare('properties',$this->properties,true);
		$criteria->compare('lang',$this->lang,true);
		$criteria->compare('edition',$this->edition,true);
		$criteria->compare('isbn',$this->isbn,true);
		$criteria->compare('format',$this->format,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('public',$this->public,true);
		$criteria->compare('publish_date',$this->publish_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Textbook the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getImgDir($mkdir = true){
    	// $directory = Yii::app()->basePath . '/../img/gdz/thumbs/'.$this->uniqKnowallId();
    	$directory = Yii::app()->basePath . '/../images/textbook/' . $this->clas->slug . '/'. $this->subject->slug . '/'. $this->id.'/';
        if ($mkdir && file_exists($directory) == false) {
            mkdir($directory, 0777, true);
        }

        return $directory;
    }

    public function getThumb($width=null, $height=null, $mode='origin')
	{
		$dir = $this->getImgDir(false);
		$originFile = $dir . 'origin.jpg';
		// d($originFile);

		if (!is_file($originFile)) {
			return "http://www.placehold.it/{$width}x{$height}/EFEFEF/AAAAAA";
		}

		if ($mode == 'origin') {
			return $originFile;
		}

		$fileName = $width . 'x' . $height . '_origin.jpg';
		$filePath = $dir . $fileName;
		if (!is_file($filePath)) {
			if ($mode == 'resize') {
				Yii::app()->image->load($originFile)->resize($width, $height)->quality(40)->save($filePath);
			} else {
				Yii::app()->image->cropSave($originFile, $width, $height, $filePath);
			}
		}

		// return '/img/writing/thumbs/'.$this->uniqKnowallId(). '/'. $fileName;
		
		return '/images/textbook/' . $this->clas->slug . '/'. $this->subject->slug . '/'. $this->id .'/'.$fileName;
	}

	public function getPdfLink()
	{
		return '/images/textbook/' . $this->clas->slug . '/'. $this->subject->slug . '/'. $this->id .'/textbook.pdf';
	}

	public function getUrl(){
	   if ($this->_url === null){
        	$this->_url = Yii::app()->createUrl('/textbook/'.$this->clas->slug.'/'.$this->subject->slug.'/'.$this->slug);
	   		
	   }
	   return $this->_url;
	}
}
