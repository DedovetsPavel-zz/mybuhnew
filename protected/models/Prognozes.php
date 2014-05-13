<?php

/**
 * This is the model class for table "{{prognozes}}".
 *
 * The followings are the available columns in table '{{prognozes}}':
 * @property integer $id
 * @property string $event
 * @property integer $deadline
 * @property integer $consumption
 * @property string $comment
 * @property integer $parent
 */
class Prognozes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{prognozes}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('deadline, consumption, parent', 'numerical', 'integerOnly'=>true),
			array('event', 'length', 'max'=>255),
			array('comment', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, event, deadline, consumption, comment, parent', 'safe', 'on'=>'search'),
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
			'event' => 'Событие',
			'deadline' => 'Срок',
			'consumption' => 'Расход',
			'comment' => 'Комментарий',
			'parent' => 'Parent',
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
		$criteria->compare('event',$this->event,true);
		$criteria->compare('deadline',$this->deadline);
		$criteria->compare('consumption',$this->consumption);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('parent',$this->parent);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Prognozes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
