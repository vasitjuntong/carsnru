<?php

class CarChoosedBase extends CActiveRecord
{
	public function tableName()
	{
		return 'tbl_car_choosed';
	}
	public function rules()
	{
		return array(
			array('paper_approval_id, car_id', 'required'),
			array('paper_approval_id, car_id', 'numerical', 'integerOnly'=>true),
			array('car_choosed_id, paper_approval_id, car_id', 'safe', 'on'=>'search'),
		);
	}
	public function relations()
	{
		return array(
			'paperApproval' => array(self::BELONGS_TO, 'PaperApproval', 'paper_approval_id'),
			'car' => array(self::BELONGS_TO, 'Car', 'car_id'),
		);
	}
	public function attributeLabels()
	{
		return array(
			'car_choosed_id' => 'รหัส',
			'paper_approval_id' => 'ใบร้องขอใช้รถยนต์ส่วนกลาง',
			'car_id' => 'รถยนต์ส่วนกลาง',
		);
	}
        
        public function scopes(){
        return array(
            'desc' => array(
                'order' => 't.car_choosed_id desc'
            ),
        );
    }
        
	public function search()
	{

		$criteria=new CDbCriteria;
                $criteria->scopes = array('desc');

		$criteria->compare('car_choosed_id',$this->car_choosed_id);
		$criteria->compare('paper_approval_id',$this->paper_approval_id);
		$criteria->compare('car_id',$this->car_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination' => array(
                            'pageSize' => Yii::app()->params['pageSize'],
                        ),
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
