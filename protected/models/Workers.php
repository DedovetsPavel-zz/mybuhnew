<?php

/**
 * This is the model class for table "{{workers}}".
 *
 * The followings are the available columns in table '{{workers}}':
 * @property integer $id
 * @property string $fullname
 * @property string $post
 * @property integer $date_of_birth
 * @property integer $gender
 * @property string $inn
 * @property string $snils
 * @property integer $hire_date
 * @property integer $termination_date
 * @property integer $pay
 * @property integer $parent
 */
class Workers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{workers}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('fullname,date_of_birth,gender,hire_date,pay,post,gender,inn,snils', 'required'),
			array('gender, pay, parent', 'numerical', 'integerOnly'=>true),
			array('fullname, post, inn, snils', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fullname, post, date_of_birth, gender, inn, snils, hire_date, termination_date, pay, parent', 'safe', 'on'=>'search'),
            array('hire_date, termination_date', 'safe'),
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
			'fullname' => 'ФИО',
			'post' => 'Должность',
			'date_of_birth' => 'Дата рождения',
			'gender' => 'Пол',
			'inn' => 'ИНН',
			'snils' => 'СНИЛС',
			'hire_date' => 'Дата приема на работу',
			'termination_date' => 'Дата увольнения',
			'pay' => 'Заработная плата, руб',
			'parent' => 'Предприниматель',
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
		$criteria->compare('fullname',$this->fullname,true);
		$criteria->compare('post',$this->post,true);
		$criteria->compare('date_of_birth',$this->date_of_birth);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('inn',$this->inn,true);
		$criteria->compare('snils',$this->snils,true);
		$criteria->compare('hire_date',$this->hire_date);
		$criteria->compare('termination_date',$this->termination_date);
		$criteria->compare('pay',$this->pay);
		$criteria->compare('parent',$this->parent);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Workers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function beforeSave() {
        $this->date_of_birth = strtotime($this->date_of_birth);
        $this->hire_date = strtotime($this->hire_date);
        $this->termination_date = strtotime($this->termination_date);
        return parent::BeforeSave();
    }

}
