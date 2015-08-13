<?php

class PersonnelBase extends CActiveRecord {

    public function tableName() {
        return 'tbl_personnel';
    }

    public function rules() {
        return array(
            array('username, password, name, position_id, tel, create_at, status', 'required'),
            array('position_id, status', 'numerical', 'integerOnly' => true),
            array('username', 'length', 'max' => 12),
            array('password, name, pic', 'length', 'max' => 255),
            array('tel', 'length', 'max' => 11),
            array('personnel_id, username, password, name, position_id, tel, pic, create_at, status', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'cars' => array(self::HAS_MANY, 'Car', 'personnel_id'),
            'position' => array(self::BELONGS_TO, 'Position', 'position_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'personnel_id' => 'รหัส',
            'username' => 'รหัสผู้ใช้',
            'password' => 'รหัสผ่าน',
            'name' => 'ชื่อ - นามสกุล',
            'position_id' => 'ตำแหน่ง',
            'tel' => 'โทรศัทพ์',
            'pic' => 'Pic',
            'create_at' => 'บันทึกเมื่อ',
            'status' => 'สถานะ',
        );
    }

    public function scopes() {
        return array(
            'desc' => array(
                'order' => 't.personnel_id desc'
            ),
        );
    }

    public function search() {

        $criteria = new CDbCriteria;
        $criteria->scopes = array('desc');

        $criteria->compare('personnel_id', $this->personnel_id);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('position_id', $this->position_id);
        $criteria->compare('tel', $this->tel, true);
        $criteria->compare('pic', $this->pic, true);
        $criteria->compare('create_at', $this->create_at, true);
        $criteria->compare('status', $this->status);

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
