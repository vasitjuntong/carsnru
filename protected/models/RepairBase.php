<?php

/**
 * This is the model class for table "tbl_repair".
 *
 * The followings are the available columns in table 'tbl_repair':
 * @property integer $repair_id
 * @property integer $car_id
 * @property integer $persennel_id
 * @property string $amount
 * @property string $file
 * @property string $creata_at
 * @property string $update_at
 *
 * The followings are the available model relations:
 * @property Personnel $persennel
 * @property Car $car
 */
class RepairBase extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_repair';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('car_id, persennel_id, amount, file, creata_at, update_at', 'required'),
			array('car_id, persennel_id', 'numerical', 'integerOnly'=>true),
			array('amount', 'length', 'max'=>11),
			array('file', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('repair_id, car_id, persennel_id, amount, file, creata_at, update_at', 'safe', 'on'=>'search'),
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
			'persennel' => array(self::BELONGS_TO, 'Personnel', 'persennel_id'),
			'car' => array(self::BELONGS_TO, 'Car', 'car_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'repair_id' => 'Repair',
			'car_id' => 'หมายเลขทะเบียน',
			'persennel_id' => 'ผู้เขียนส่ง',
			'amount' => 'ราคา',
			'file' => 'ไฟล์แนบ',
			'creata_at' => 'ส่งซ่อม',
			'update_at' => 'แก้ไข',
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

		$criteria->compare('repair_id',$this->repair_id);
		$criteria->compare('car_id',$this->car_id);
		$criteria->compare('persennel_id',$this->persennel_id);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('file',$this->file,true);
		$criteria->compare('creata_at',$this->creata_at,true);
		$criteria->compare('update_at',$this->update_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RepairBase the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
