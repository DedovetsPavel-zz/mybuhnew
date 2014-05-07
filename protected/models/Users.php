<?php

/**
 * This is the model class for table "{{users}}".
 *
 * The followings are the available columns in table '{{users}}':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property integer $createdon
 * @property integer $blocked
 * @property integer $role
 */
class Users extends CActiveRecord
{
    const ROLE_ADMIN = 'admin';
    const ROLE_MODER = 'booker';
    const ROLE_USER = 'user';
    const ROLE_BANNED = 'entrepreneur';

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{users}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email, role', 'required'),
			array('createdon, blocked, role', 'numerical', 'integerOnly'=>true),
			array('username, password, email', 'length', 'max'=>255),
            array('email', 'email'),
            array('username,email', 'unique'),
            array('username', 'length', 'min' => 4),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, email, createdon, blocked, role', 'safe', 'on'=>'search'),
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
			'username' => 'Имя пользователя',
			'password' => 'Пароль',
			'email' => 'E-mail',
			'createdon' => 'Дата регистрации',
			'blocked' => 'Заблокирован',
			'role' => 'Роль',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('createdon',$this->createdon);
		$criteria->compare('blocked',$this->blocked);
		$criteria->compare('role',$this->role);
        $criteria->addCondition('role != 0');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function beforeSave() {
        if($this->isNewRecord) {
            $this->blocked = 0;
            $this->createdon = time();
        }

        $this->password = md5($this->password);

        return parent::BeforeSave();

    }


}
