<?php

/**
 * This is the model class for table "tbl_paper_detail_bus_accept".
 *
 * The followings are the available columns in table 'tbl_paper_detail_bus_accept':
 * @property integer $paper_detail_bus_accept_id
 * @property integer $paper_id
 * @property integer $member_id
 * @property integer $car_id
 * @property string $create_at
 *
 * The followings are the available model relations:
 * @property Car $car
 * @property PaperApprovalBus $paper
 * @property Member $member
 */
class PaperDetailBusAcceptBase extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_paper_detail_bus_accept';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('paper_id, member_id, car_id, create_at', 'required'),
			array('paper_id, member_id, car_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('paper_detail_bus_accept_id, paper_id, member_id, car_id, create_at', 'safe', 'on'=>'search'),
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
			'car' => array(self::BELONGS_TO, 'Car', 'car_id'),
			'paper' => array(self::BELONGS_TO, 'PaperApprovalBus', 'paper_id'),
			'member' => array(self::BELONGS_TO, 'Member', 'member_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'paper_detail_bus_accept_id' => 'รหัส',
			'paper_id' => 'เลขที่หนังสือ',
			'member_id' => 'ผู้พิจารณา',
			'car_id' => 'รถที่มอบหมาย',
			'create_at' => 'Create At',
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

		$criteria->compare('paper_detail_bus_accept_id',$this->paper_detail_bus_accept_id);
		$criteria->compare('paper_id',$this->paper_id);
		$criteria->compare('member_id',$this->member_id);
		$criteria->compare('car_id',$this->car_id);
		$criteria->compare('create_at',$this->create_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PaperDetailBusAcceptBase the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
