<?php

/**
 * This is the model class for table "tbl_paper_approval_bus".
 *
 * The followings are the available columns in table 'tbl_paper_approval_bus':
 * @property integer $paper_approval_bus_id
 * @property integer $member_id
 * @property string $paper_no
 * @property string $from_place
 * @property string $to_place
 * @property string $manager
 * @property integer $place_id
 * @property integer $days
 * @property string $date_start
 * @property string $date_end
 * @property string $time_start
 * @property string $service_charge_in
 * @property string $service_charge_out
 * @property string $service_charge_cleaning
 * @property string $allowances_driver
 * @property string $allowances_employees
 * @property string $service_room
 * @property string $service_room_multi
 * @property string $create_at
 */
class PaperApprovalBusBase extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_paper_approval_bus';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('member_id, paper_no, from_place, to_place, manager, place_id, days, date_start, date_end, time_start, service_charge_in, service_charge_out, service_charge_cleaning, allowances_driver, allowances_employees, service_room, service_room_multi, create_at', 'required'),
			array('member_id, place_id, days', 'numerical', 'integerOnly'=>true),
			array('paper_no', 'length', 'max'=>10),
			array('from_place, to_place, manager', 'length', 'max'=>50),
			array('service_charge_in, service_charge_out, service_charge_cleaning, allowances_driver, allowances_employees, service_room', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('paper_approval_bus_id, member_id, paper_no, from_place, to_place, manager, place_id, days, date_start, date_end, time_start, service_charge_in, service_charge_out, service_charge_cleaning, allowances_driver, allowances_employees, service_room, service_room_multi, create_at', 'safe', 'on'=>'search'),
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
			'paper_approval_bus_id' => 'รหัสตาราง',
			'member_id' => 'ผู้ส่งคำร้อง',
			'paper_no' => 'เลขที่',
			'from_place' => 'จาก',
			'to_place' => 'ถึง',
			'manager' => 'ผู้ควบคุม',
			'place_id' => 'จุดขึ้นรถ',
			'days' => 'จำนวนวันที่ขอใช้บริการ',
			'date_start' => 'ตั้งแต่วันที่',
			'date_end' => 'ถึงวันที่',
			'time_start' => 'เวลาออกเดินทาง',
			'service_charge_in' => 'ค่าบริการภายใน',
			'service_charge_out' => 'ค่าบริการภายนอก',
			'service_charge_cleaning' => 'ค่าทำความสะอาด',
			'allowances_driver' => 'ค่าเบี้ยเลี้ยงคนขับรถ',
			'allowances_employees' => 'ค่าเบี้ยงเลี้ยงพนักงาน',
			'service_room' => 'ค่าโรงแรมเดี่ยว',
			'service_room_multi' => 'ค่าโรงแรมพักคู่',
			'create_at' => 'วันที่ยื่นคำร้อง',
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

		$criteria->compare('paper_approval_bus_id',$this->paper_approval_bus_id);
		$criteria->compare('member_id',$this->member_id);
		$criteria->compare('paper_no',$this->paper_no,true);
		$criteria->compare('from_place',$this->from_place,true);
		$criteria->compare('to_place',$this->to_place,true);
		$criteria->compare('manager',$this->manager,true);
		$criteria->compare('place_id',$this->place_id);
		$criteria->compare('days',$this->days);
		$criteria->compare('date_start',$this->date_start,true);
		$criteria->compare('date_end',$this->date_end,true);
		$criteria->compare('time_start',$this->time_start,true);
		$criteria->compare('service_charge_in',$this->service_charge_in,true);
		$criteria->compare('service_charge_out',$this->service_charge_out,true);
		$criteria->compare('service_charge_cleaning',$this->service_charge_cleaning,true);
		$criteria->compare('allowances_driver',$this->allowances_driver,true);
		$criteria->compare('allowances_employees',$this->allowances_employees,true);
		$criteria->compare('service_room',$this->service_room,true);
		$criteria->compare('service_room_multi',$this->service_room_multi,true);
		$criteria->compare('create_at',$this->create_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PaperApprovalBusBase the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
