<?php

/**
 * This is the model class for table "{{reports}}".
 *
 * The followings are the available columns in table '{{reports}}':
 * @property integer $id
 * @property string $name
 * @property string $comment
 * @property integer $date_update
 * @property integer $status
 * @property integer $pay
 * @property integer $parent
 */
class Reports extends CActiveRecord
{

    public $file;
    public $type;
    public $entrepreneur_id;



	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{reports}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_update, status, parent', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('comment, pay', 'safe'),
            array('name,comment,status', 'required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, comment, date_update, status, pay, parent', 'safe', 'on'=>'search'),
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
            'files' => array(self::HAS_MANY, 'Files', 'parent')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Название документа',
			'comment' => 'Комментарий',
			'date_update' => 'Дата изменения',
			'status' => 'Состояние',
			'pay' => 'Оплачено',
            'parent' => 'Parent',
            'file' => 'Файл',
            'type' => 'Тип',
            'entrepreneur_id' => 'Предприниматель'
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
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('date_update',$this->update);
		$criteria->compare('status',$this->status);
		$criteria->compare('pay',$this->pay);
        $criteria->compare('parent', $this->parent);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Reports the static model class
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
        parent::afterSave();
        if(count($this->file)) {
            foreach($this->file as $file) {
                $modelFile = new Files();
                $modelFile->file = $file;
                $modelFile->type = $this->type;
                $modelFile->entrepreneur_id = $this->entrepreneur_id;
                $modelFile->parent = $this->id;
                $modelFile->save();
            }
        }
    }
}
