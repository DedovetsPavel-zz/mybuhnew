<?php

/**
 * This is the model class for table "{{entrepreneurs}}".
 *
 * The followings are the available columns in table '{{entrepreneurs}}':
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $organization_name
 * @property string $short_name_organization
 * @property string $inn
 * @property string $kpp
 * @property string $ogrn
 * @property integer $registration_date
 * @property string $organization_address
 * @property string $okved
 * @property string $okato
 * @property string $okpo
 * @property string $okfs
 * @property string $oktmo
 * @property string $okogu
 * @property string $okopf
 * @property string $ifns
 * @property string $prf
 * @property string $registration_number_in_prf
 * @property string $fss
 * @property string $registration_number_in_fss
 * @property string $code_subordination
 * @property string $insurance_tariv_fss
 * @property integer $date_avance
 * @property integer $date_pay
 */
class Entrepreneurs extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{entrepreneurs}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, registration_date, date_avance, date_pay', 'numerical', 'integerOnly'=>true),
			array('name, organization_name, short_name_organization, inn, kpp, ogrn, organization_address, okved, okato, okpo, okfs, oktmo, okogu, okopf, ifns, prf, registration_number_in_prf, fss, registration_number_in_fss, code_subordination, insurance_tariv_fss', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, name, organization_name, short_name_organization, inn, kpp, ogrn, registration_date, organization_address, okved, okato, okpo, okfs, oktmo, okogu, okopf, ifns, prf, registration_number_in_prf, fss, registration_number_in_fss, code_subordination, insurance_tariv_fss, date_avance, date_pay', 'safe', 'on'=>'search'),
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
            'user_id' => 'ID пользователя',
            'name' => 'Имя',
            'organization_name' => 'Полное наименование организации',
            'short_name_organization' => 'Краткое наименование организации',
            'inn' => 'ИНН',
            'kpp' => 'КПП',
            'ogrn' => 'ОГРН',
            'registration_date' => 'Дата регистрации юр. лица',
            'organization_address' => 'Адрес, по которому зарегистрирована организация',
            'okved' => 'ОКВЭД',
            'okato' => 'ОКАТО',
            'okpo' => 'ОКПО',
            'okfs' => 'ОКФС',
            'oktmo' => 'ОКТМО',
            'okogu' => 'ОКОГУ',
            'okopf' => 'ОКОПФ',
            'ifns' => 'ИФНС по месту постановки на учет (добавить ИФНС по месту ведения деятельности ЕНВД)',
            'prf' => 'ПФР',
            'registration_number_in_prf' => 'Регистрационный номер в ПФР',
            'fss' => 'ФСС',
            'registration_number_in_fss' => 'Регистрационный номер в ФСС',
            'code_subordination' => 'Код подчиненности',
            'insurance_tariv_fss' => 'Страховой тарив в ФСС',
            'date_avance' => 'Дата выдачи аванса',
            'date_pay' => 'Дата выдачи з/п',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('organization_name',$this->organization_name,true);
		$criteria->compare('short_name_organization',$this->short_name_organization,true);
		$criteria->compare('inn',$this->inn,true);
		$criteria->compare('kpp',$this->kpp,true);
		$criteria->compare('ogrn',$this->ogrn,true);
		$criteria->compare('registration_date',$this->registration_date);
		$criteria->compare('organization_address',$this->organization_address,true);
		$criteria->compare('okved',$this->okved,true);
		$criteria->compare('okato',$this->okato,true);
		$criteria->compare('okpo',$this->okpo,true);
		$criteria->compare('okfs',$this->okfs,true);
		$criteria->compare('oktmo',$this->oktmo,true);
		$criteria->compare('okogu',$this->okogu,true);
		$criteria->compare('okopf',$this->okopf,true);
		$criteria->compare('ifns',$this->ifns,true);
		$criteria->compare('prf',$this->prf,true);
		$criteria->compare('registration_number_in_prf',$this->registration_number_in_prf,true);
		$criteria->compare('fss',$this->fss,true);
		$criteria->compare('registration_number_in_fss',$this->registration_number_in_fss,true);
		$criteria->compare('code_subordination',$this->code_subordination,true);
		$criteria->compare('insurance_tariv_fss',$this->insurance_tariv_fss,true);
		$criteria->compare('date_avance',$this->date_avance);
		$criteria->compare('date_pay',$this->date_pay);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Entrepreneurs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
