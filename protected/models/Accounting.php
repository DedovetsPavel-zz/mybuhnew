<?php

/**
 * This is the model class for table "{{accounting}}".
 *
 * The followings are the available columns in table '{{accounting}}':
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property integer $date_update
 * @property string $comment
 * @property integer $parent
 * @property integer $ready
 */
class Accounting extends CActiveRecord
{

    public $file;
    public $type_file;
    public $entrepreneur_id;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{accounting}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, date_update, parent', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('comment,ready', 'safe'),
            array('name,type', 'required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, type, date_update, comment, parent', 'safe', 'on'=>'search'),
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
            'files' => array(self::HAS_MANY, 'Files', 'parent'),
            'comments' => array(self::HAS_MANY, 'AccountComments', 'account_id')
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Наименование документа',
			'type' => 'Тип',
			'date_update' => 'Дата изменения',
			'comment' => 'Комментарий',
			'parent' => 'Parent',
            'file' => 'Файл',
            'type_file' => 'Тип файла',
            'entrepreneur_id' => 'Предприниматель',
            'ready' => 'Готово'
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('date_update',$this->date_update);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('parent',$this->parent);
        $criteria->compare('ready',$this->ready);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Accounting the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function beforeSave() {
        $this->date_update = time();
        return parent::BeforeSave();
    }


    protected function afterSave() {
        $user_id = Yii::app()->user->id;
        $user_role = Yii::app()->user->role;
        parent::afterSave();
        if(count($this->file)) {
            foreach($this->file as $file) {
                //var_dump($file);
                $modelFile = new Files();
                $modelFile->file = $file;
                $modelFile->type = $this->type_file;
                $modelFile->entrepreneur_id = $this->entrepreneur_id;
                $modelFile->parent = $this->id;
                $modelFile->save();
            }
        }

        if($this->comment) {
            $modelComment = new AccountComments();
            $modelComment->comment = $this->comment;
            $modelComment->user_id = $user_id;
            $modelComment->account_id = $this->id;
            $modelComment->createdon = time();
            $modelComment->author = $user_role;
            $modelComment->save();
        }
    }
}
