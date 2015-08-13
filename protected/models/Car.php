<?php

class Car extends CarBase {

    public function rules() {
        return array(
            array('type_car_id, license_no, date_registration, brand_id, car_no, engine_no, personnel_id, pic, create_at', 'required'),
            array('brand_id, personnel_id', 'numerical', 'integerOnly' => true),
            array('license_no, car_no, engine_no', 'length', 'max' => 100),
            array('pic', 'length', 'max' => 255),
            array('car_id, type_car_id, license_no, date_registration, brand_id, car_no, engine_no, personnel_id, pic, create_at', 'safe', 'on' => 'search'),
            // เพิ่มเติม
            array('car_no, license_no, engine_no', 'unique', 'message' => '{value} มีอยู่ในระบบแล้ว กรุณาตรวจสอบ'),
        );
    }

    public function scopes() {
        return array(
            'desc' => array(
                'order' => 't.car_id desc'
            ),
            'notWorking' => array(
                'condition' => 't.status = 0',
            ),
            'car' => array(
                'condition' => 't.type_car_id = 1'
            ),
            'car_bus' => array(
                'condition' => 't.type_car_id = 2'
            )
        );
    }

    public function relations() {
        return array(
            'personnel' => array(self::BELONGS_TO, 'Personnel', 'personnel_id'),
            'brand' => array(self::BELONGS_TO, 'Brand', 'brand_id'),
            'personnels' => array(self::HAS_MANY, 'Personnel', 'car_id'),
            'typeCar' => array(self::BELONGS_TO, 'TypeCar', 'type_car_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'car_id' => 'รหัส',
            'type_car_id' => 'ประเภทรถยนต์',
            'license_no' => 'หมายเลขทะเบียน',
            'date_registration' => 'วันจดทะเบียน',
            'brand_id' => 'ยี่ห้อ',
            'car_no' => 'เลขตัวรถ',
            'engine_no' => 'เลขเเครื่องยนต์',
            'personnel_id' => 'พนักงานขับรถ',
            'create_at' => 'วันที่บันทึก',
            'pic' => 'รูปภาพ',
        );
    }

    public function search() {
        $criteria = new CDbCriteria;
        
        $criteria->with = array('typeCar');

        $criteria->compare('car_id', $this->car_id);
        $criteria->compare('typeCar.name', $this->type_car_id, true);
        $criteria->compare('license_no', $this->license_no, true);
        $criteria->compare('date_registration', $this->date_registration, true);
        $criteria->compare('brand_id', $this->brand_id);
        $criteria->compare('car_no', $this->car_no, true);
        $criteria->compare('engine_no', $this->engine_no, true);
        $criteria->compare('personnel_id', $this->personnel_id);
        $criteria->compare('create_at', $this->create_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
        ));
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
