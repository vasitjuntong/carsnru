<?php

class Repair extends RepairBase {

    public function rules() {
        return array(
            array('car_id, personnel_id, amount, file, create_at, update_at', 'required'),
            array('car_id, personnel_id', 'numerical', 'integerOnly' => true),
            array('amount', 'length', 'max' => 11),
            array('file', 'length', 'max' => 255),
            array('repair_id, car_id, personnel_id, amount, file, creata_at, update_at', 'safe', 'on' => 'search'),
        );
    }
    public function relations() {
        return array(
            'personnel' => array(self::BELONGS_TO, 'Personnel', 'personnel_id'),
            'car' => array(self::BELONGS_TO, 'Car', 'car_id'),
        );
    }
    public function attributeLabels() {
        return array(
            'repair_id' => 'Repair',
            'car_id' => 'หมายเลขทะเบียน',
            'personnel_id' => 'ผู้เขียนส่ง',
            'amount' => 'ราคา',
            'file' => 'ไฟล์แนบ',
            'create_at' => 'ส่งซ่อม',
            'update_at' => 'แก้ไข',
        );
    }
    public function search() {
        $criteria = new CDbCriteria;
        $criteria->scopes = array(
            'personnel',
            'car',
        );

        $criteria->compare('repair_id', $this->repair_id);
        $criteria->compare('car.license_no', $this->car_id);
        $criteria->compare('personnel.name', $this->personnel_id);
        $criteria->compare('amount', $this->amount, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
