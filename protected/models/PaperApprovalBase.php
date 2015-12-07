<?php

/**
 * This is the model class for table "tbl_paper_approval".
 *
 * The followings are the available columns in table 'tbl_paper_approval':
 * @property integer $paper_approval_id
 * @property string $paper_no
 * @property integer $member_id
 * @property string $tel
 * @property string $go
 * @property string $request
 * @property string $length_go
 * @property string $num_person
 * @property string $responsible
 * @property integer $place_id
 * @property string $departure_time
 * @property string $back_time
 * @property string $time_start
 * @property integer $status
 * @property string $file
 * @property string $create_at
 *
 * The followings are the available model relations:
 * @property CarChoosed[] $carChooseds
 * @property Member $member
 * @property Place $place
 * @property PaperDetail[] $paperDetails
 * @property PaperDetailAccept[] $paperDetailAccepts
 */
class PaperApprovalBase extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_paper_approval';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('paper_no, member_id, tel, go, request, length_go, num_person, responsible, place_id, departure_time, back_time, time_start, status, create_at', 'required'),
			array('member_id, place_id, status', 'numerical', 'integerOnly'=>true),
			array('paper_no', 'length', 'max'=>100),
			array('tel, go, request, length_go, responsible, file', 'length', 'max'=>255),
			array('num_person', 'length', 'max'=>10),
			array('paper_approval_id, paper_no, member_id, tel, go, request, length_go, num_person, responsible, place_id, departure_time, back_time, time_start, status, file, create_at', 'safe', 'on'=>'search'),
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
			'carChooseds' => array(self::HAS_MANY, 'CarChoosed', 'paper_approval_id'),
			'member' => array(self::BELONGS_TO, 'Member', 'member_id'),
			'place' => array(self::BELONGS_TO, 'Place', 'place_id'),
			'paperDetails' => array(self::HAS_MANY, 'PaperDetail', 'paper_id'),
			'paperDetailAccepts' => array(self::HAS_MANY, 'PaperDetailAccept', 'paper_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'paper_approval_id' => 'Paper Approval',
			'paper_no' => 'เลขที่หนังสือ',
			'member_id' => 'ผู้ยื่นคำร้อง',
			'tel' => 'เบอร์โทรศัพท์',
			'go' => 'ไปราชการที่',
			'request' => 'ความจำเป็นเพื่อ',
			'length_go' => 'ระยะทางรวมไป-กลับ',
			'num_person' => 'จำนวนผู้รวมเดินทาง',
			'responsible' => 'ผู้รับผิดชอบ',
			'place_id' => 'จุดที่ให้ไปรับ',
			'departure_time' => 'อกเดินทาง เวลา',
			'back_time' => 'กลับ เวลา',
			'time_start' => 'เวลาออกเดินทาง',
			'status' => 'สถานะ',
			'file' => 'File',
			'create_at' => 'วันที่ร้องขอ',
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

		$criteria->compare('paper_approval_id',$this->paper_approval_id);
		$criteria->compare('paper_no',$this->paper_no,true);
		$criteria->compare('member_id',$this->member_id);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('go',$this->go,true);
		$criteria->compare('request',$this->request,true);
		$criteria->compare('length_go',$this->length_go,true);
		$criteria->compare('num_person',$this->num_person,true);
		$criteria->compare('responsible',$this->responsible,true);
		$criteria->compare('place_id',$this->place_id);
		$criteria->compare('departure_time',$this->departure_time,true);
		$criteria->compare('back_time',$this->back_time,true);
		$criteria->compare('time_start',$this->time_start,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('file',$this->file,true);
		$criteria->compare('create_at',$this->create_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PaperApprovalBase the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
