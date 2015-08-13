<?php

class Accept extends AcceptBase {

    public function rules() {
        return array(
            array('paper_id, type_paper_id, status, personnel_id, create_at', 'required'),
            array('paper_id, type_paper_id, status, personnel_id', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('accept_id, paper_id, type_paper_id, status, personnel_id, create_at', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'carAccep' => array(self::BELONGS_TO, 'PaperApproval', 'paper_id'),
            'busAccep' => array(self::BELONGS_TO, 'PaperApprovalBus', 'paper_id'),
            'personnel' => array(self::BELONGS_TO, 'Personnel', 'personnel_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'accept_id' => 'รหัส',
            'paper_id' => 'เลขที่คำร้อง',
            'type_paper_id' => 'ประเภทคำร้อง',
            'status' => 'อยู่ในขั้นตอน',
            'personnel_id' => 'ผู้ตรวจสอบ',
            'create_at' => 'ตรวจสอบเมื่อ',
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('accept_id', $this->accept_id);
        $criteria->compare('paper_id', $this->paper_id);
        $criteria->compare('type_paper_id', $this->type_paper_id);
        $criteria->compare('status', $this->status);
        $criteria->compare('personnel_id', $this->personnel_id);
        $criteria->compare('create_at', $this->create_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function scopes() {
        return array(
            'desc' => array(
                'order' => 't.create_at desc',
            ),
            'BossCar' => array(
                'condition' => 't.status = 0 and `use` = 1',
            ),
            'BossCarAccept' => array(
                'condition' => 't.status = 1 and  `use` = 1',
            ),
            'rector_vicerector' => array(
                'condition' => 't.status = 2 and  `use` = 1',
            ),
            'doing1' => array(
                'condition' => '(status = 3 and type_paper_id = 2 and `use` = 1) or (status = 2 and type_paper_id = 1 and `use` = 1)',
            ),
        );
    }

    public function beforeSave() {
        $this->create_at = date('Y-m-d H:i:s');
        return parent::beforeSave();
    }

}
