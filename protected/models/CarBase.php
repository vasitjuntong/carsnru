<?php

class CarBase extends CActiveRecord {

    public function tableName() {
        return 'tbl_car';
    }

    public function rules() {
        return array(
            array('license_no, date_registration, brand_id, car_no, engine_no, personnel_id, pic, create_at', 'required'),
            array('brand_id, personnel_id', 'numerical', 'integerOnly' => true),
            array('license_no, car_no, engine_no', 'length', 'max' => 100),
            array('pic', 'length', 'max' => 255),
            array('car_id, license_no, date_registration, brand_id, car_no, engine_no, personnel_id, pic, create_at', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'brand' => array(self::BELONGS_TO, 'Brand', 'brand_id'),
            'personnel' => array(self::BELONGS_TO, 'Personnel', 'personnel_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'car_id' => 'รหัส',
            'license_no' => 'หมายเลขทะเบียน',
            'date_registration' => 'วันจดทะเบียน',
            'brand_id' => 'ยี่ห้อ',
            'car_no' => 'เลขตัวรถ',
            'engine_no' => 'เลขเเครื่องยนต์',
            'personnel_id' => 'พนักงานขับรถ',
            'pic' => 'Pic',
            'create_at' => 'วันที่บันทึก',
        );
    }

    public function scopes() {
        return array(
            'desc' => array(
                'order' => 't.car_id desc'
            ),
        );
    }

    public function search() {

        $criteria = new CDbCriteria;
        $criteria->scopes = array('desc');

        $criteria->compare('car_id', $this->car_id);
        $criteria->compare('license_no', $this->license_no, true);
        $criteria->compare('date_registration', $this->date_registration, true);
        $criteria->compare('brand_id', $this->brand_id);
        $criteria->compare('car_no', $this->car_no, true);
        $criteria->compare('engine_no', $this->engine_no, true);
        $criteria->compare('personnel_id', $this->personnel_id);
        $criteria->compare('pic', $this->pic, true);
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
