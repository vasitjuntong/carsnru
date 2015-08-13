<?php

class Personnel extends PersonnelBase {

    public function rules() {
        return array(
            array('username, password, name, position_id, tel, create_at, status', 'required'),
            array('position_id, status', 'numerical', 'integerOnly' => true),
            array('username', 'length', 'max' => 12),
            array('password, name, pic', 'length', 'max' => 255),
            array('tel', 'length', 'max' => 11),
            array('personnel_id, username, password, name, position_id, tel, pic, create_at, status', 'safe', 'on' => 'search'),
            // เพิ่มเติม
            array('username, name', 'unique', 'message' => '{value} มีอยู่ในระบบแล้ว กรุณาตรวจสอบ'),
            array('tel', 'length', 'max' => 10),
            array('username, password', 'length', 'min' => 4),
        );
    }

    public function getPositionANDname() {
        return "({$this->position->name})  {$this->name}";
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
            'pic' => 'รูปภาพ',
            'create_at' => 'บันทึกเมื่อ',
        );
    }

    public function beforeSave() {
        if (!$this->isNewRecord) {
            $user = Personnel::model()->findByPk($this->personnel_id);
            if (!$this->isValidMd5($this->password)) {
                $this->password = md5($this->password);
            }
        } else {
            $this->password = md5($this->password);
        }

        return parent::beforeSave();
    }

    public function scopes() {
        return array(
            'desc' => array(
                'order' => 't.personnel_id desc'
            ),
            'admin' => array(
                'condition' => 't.position_id = 6',
            ),
            'manager' => array(
                'condition' => 't.status = 1',
            ),
            'driver' => array(
                'condition' => 't.position_id <= 3',
            ),
            'bossCar' => array(
                'condition' => 't.position_id = 1',
            ),
            'rector' => array(
                'condition' => 't.position_id = 4',
            ),
            'vice_rector' => array(
                'condition' => 't.position_id = 5',
            ),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;
        $criteria->scopes = array('desc');

        $criteria->compare('personnel_id', $this->personnel_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('position_id', $this->position_id);
        $criteria->compare('tel', $this->tel);
        $criteria->compare('create_at', $this->create_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
        ));
    }

    function isValidMd5($md5 = '') {
        return preg_match('/^[a-f0-9]{32}$/', $md5);
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
