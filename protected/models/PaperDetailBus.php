<?php

class PaperDetailBus extends PaperDetailBusBase {

    public function rules() {
        return array(
            array('paper_id, member_id, remark, create_at', 'required'),
            array('paper_id, member_id', 'numerical', 'integerOnly' => true),
            array('remark', 'length', 'max' => 255),
            array('paper_detail_bus_id, paper_id, member_id, remark, create_at', 'safe', 'on' => 'search'),
        );
    }
    public function relations() {
        return array(
            'member' => array(self::BELONGS_TO, 'Member', 'member_id'),
            'paper' => array(self::BELONGS_TO, 'PaperApprovalBus', 'paper_id'),
        );
    }
    public function attributeLabels() {
        return array(
            'paper_detail_bus_id' => 'รหัส',
            'paper_id' => 'Paper',
            'member_id' => 'ผู้พิจารณา',
            'remark' => 'เหตุผล',
            'create_at' => 'วันที่พิจารณา',
        );
    }
    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('paper_detail_bus_id', $this->paper_detail_bus_id);
        $criteria->compare('paper_id', $this->paper_id);
        $criteria->compare('member_id', $this->member_id);
        $criteria->compare('remark', $this->remark, true);
        $criteria->compare('create_at', $this->create_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
