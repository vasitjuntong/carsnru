<?php

/**
 * This is the model class for table "tbl_paper_detail_bus".
 *
 * The followings are the available columns in table 'tbl_paper_detail_bus':
 * @property integer $paper_detail_bus_id
 * @property integer $paper_id
 * @property integer $member_id
 * @property string $remark
 * @property string $create_at
 *
 * The followings are the available model relations:
 * @property Member $member
 * @property PaperApprovalBus $paper
 */
class PaperDetailBusBase extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_paper_detail_bus';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('paper_id, member_id, remark, create_at', 'required'),
			array('paper_id, member_id', 'numerical', 'integerOnly'=>true),
			array('remark', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('paper_detail_bus_id, paper_id, member_id, remark, create_at', 'safe', 'on'=>'search'),
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
			'member' => array(self::BELONGS_TO, 'Member', 'member_id'),
			'paper' => array(self::BELONGS_TO, 'PaperApprovalBus', 'paper_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'paper_detail_bus_id' => 'รหัส',
			'paper_id' => 'Paper',
			'member_id' => 'ผู้พิจารณา',
			'remark' => 'เหตุผล',
			'create_at' => 'วันที่พิจารณา',
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

		$criteria->compare('paper_detail_bus_id',$this->paper_detail_bus_id);
		$criteria->compare('paper_id',$this->paper_id);
		$criteria->compare('member_id',$this->member_id);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('create_at',$this->create_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PaperDetailBusBase the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
