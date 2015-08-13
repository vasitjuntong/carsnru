<?php

/**
 * This is the model class for table "tbl_accept".
 *
 * The followings are the available columns in table 'tbl_accept':
 * @property integer $accept_id
 * @property integer $paper_id
 * @property integer $type_paper_id
 * @property integer $status
 * @property integer $personnel_id
 * @property string $create_at
 *
 * The followings are the available model relations:
 * @property Personnel $personnel
 * @property PaperApproval $paper
 */
class AcceptBase extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_accept';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('paper_id, type_paper_id, status, personnel_id, create_at', 'required'),
			array('paper_id, type_paper_id, status, personnel_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('accept_id, paper_id, type_paper_id, status, personnel_id, create_at', 'safe', 'on'=>'search'),
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
			'personnel' => array(self::BELONGS_TO, 'Personnel', 'personnel_id'),
			'paper' => array(self::BELONGS_TO, 'PaperApproval', 'paper_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'accept_id' => 'รหัส',
			'paper_id' => 'เลขที่คำร้อง',
			'type_paper_id' => 'ประเภทคำร้อง',
			'status' => 'อยู่ในขั้นตอน',
			'personnel_id' => 'ผู้ตรวจสอบ',
			'create_at' => 'ตรวจสอบเมื่อ',
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

		$criteria->compare('accept_id',$this->accept_id);
		$criteria->compare('paper_id',$this->paper_id);
		$criteria->compare('type_paper_id',$this->type_paper_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('personnel_id',$this->personnel_id);
		$criteria->compare('create_at',$this->create_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AcceptBase the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
