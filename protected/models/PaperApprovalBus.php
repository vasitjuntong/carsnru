<?php

class PaperApprovalBus extends PaperApprovalBusBase {

    public function rules() {
        return array(
            array('member_id, paper_no, code_no, from_place, to_place, manager, place_id, days, date_start, date_end, time_start, service_charge_in, service_charge_out, service_charge_cleaning, allowances_driver, allowances_employees, service_room, service_room_multi, create_at, tel', 'required'),
            array('member_id, place_id, days, tel', 'numerical', 'integerOnly' => true),
            array('tel', 'length', 'max' => 10),
            array('paper_no, code_no', 'length', 'max' => 20),
            array('from_place, to_place, manager', 'length', 'max' => 50),
            array('service_charge_in, service_charge_out, service_charge_cleaning, allowances_driver, allowances_employees, service_room', 'length', 'max' => 11),
            array('paper_approval_bus_id, member_id, paper_no, code_no, from_place, to_place, manager, place_id, days, date_start, date_end, time_start, service_charge_in, service_charge_out, service_charge_cleaning, allowances_driver, allowances_employees, service_room, service_room_multi, create_at, tel, file, status', 'safe', 'on' => 'search'),
            array('service_charge_cleaning', 'limidCharge'),
            // แก้ไข
            array('paper_no, code_no', 'unique', 'message' => '{attribute} มีอยู่ในระบบแล้ว กรุณาตรวจสอบ'),
            array('tel', 'length', 'max' => 10),
            array('tel', 'numerical', 'integerOnly' => true)
        );
    }

    public function limidCharge() {
        if ($this->allowances_driver > 240) {
            $this->addError('allowances_driver', 'ต้องไม่เกิน 240 บาท');
        }
        if($this->allowances_driver < 0){
            $this->addError('allowances_driver', 'กรอกราคาผิด');
        }

        if ($this->allowances_employees > 210) {
            $this->addError('allowances_employees', 'ต้องไม่เกิน 210 บาท');
        }
        if($this->allowances_employees < 0){
            $this->addError('allowances_employees', 'กรอกราคาผิด');
        }

        if ($this->service_charge_cleaning > 500) {
            $this->addError('service_charge_cleaning', 'ต้องไม่เกิน 500 บาท');
        }
        if($this->service_charge_cleaning < 0){
            $this->addError('service_charge_cleaning', 'กรอกราคาผิด');
        }
        
        if ($this->service_charge_in > 4000) {
            $this->addError('service_charge_in', 'ต้องไม่เกิน 4,000 บาท');
        }
        if ($this->service_charge_in < 0) {
            $this->addError('service_charge_in', 'กรอกราคาผิด');
        }
        
        if ($this->service_charge_out > 7000) {
            $this->addError('service_charge_out', 'ต้องไม่เกิน 7,000 บาท');
        }
        if ($this->service_charge_out < 0) {
            $this->addError('service_charge_out', 'กรอกราคาผิด');
        }
        
        if ($this->service_room > 1200) {
            $this->addError('service_room', 'ต้องไม่เกิน 1200 บาท / คน / คืน');
        }
        if ($this->service_room < 0) {
            $this->addError('service_room', 'กรอกราคาผิด');
        }
        
        if ($this->service_room_multi > 800) {
            $this->addError('service_room_multi', 'ต้องไม่เกิน 800 บาท / คืน');
        }
        if ($this->service_room_multi < 0) {
            $this->addError('service_room_multi', 'กรอกราคาผิด');
        }
    }

    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'member' => array(self::BELONGS_TO, 'Member', 'member_id'),
            'place' => array(self::BELONGS_TO, 'Place', 'place_id'),
            'paperDetail' => array(self::HAS_ONE, 'PaperDetailBus', 'paper_id'),
            'paperDetailBusAccept' => array(self::HAS_ONE, 'PaperDetailBusAccept', 'paper_id'),
            'accept' => array(self::HAS_ONE, 'Accept', 'paper_id',
                'condition' => 'type_paper_id = 2 and `use` = 1',
                'order' => 'accept.accept_id desc',
            ),
            'acceptForPrint' => array(self::HAS_ONE, 'Accept', 'paper_id',
                'condition' => 'type_paper_id = 2 and acceptForPrint.status = 1',
                'order' => 'acceptForPrint.accept_id desc',
            ),
            'accept2' => array(self::HAS_ONE, 'Accept', 'paper_id',
                'condition' => 'type_paper_id = 2 and accept2.status = 2',
                'order' => 'accept2.accept_id desc',
            ),
            'accept3' => array(self::HAS_ONE, 'Accept', 'paper_id',
                'condition' => 'type_paper_id = 2 and accept3.status = 3',
                'order' => 'accept3.accept_id desc',
            ),
        );
    }

    public function scopes() {
        return array(
            'get_desc' => array(
                'order' => 'paper_approval_bus_id desc',
            ),
            'get_wait' => array(
                'condition' => 't.status = 0',
            ),
            'get_consider' => array(
                'condition' => 'accept.status = 1 and accept.`use` = 1',
            ),
            'doing1' => array(
                'condition' => 'accept.status = 3 and accept.type_paper_id = 2 and accept.`use` = 1',
            ),
            'doing' => array(
                'condition' => 'accept.status = 2 and accept.type_paper_id = 2 and accept.`use` = 1',
            ),
            'acceptPaper' => array(
                'condition' => 't.status = 4',
            ),
            'notAcceptPaper' => array(
                'condition' => 't.status = 5',
            ),
        );
    }

    public function attributeLabels() {
        return array(
            'paper_approval_bus_id' => 'รหัสตาราง',
            'member_id' => 'ผู้ส่งคำร้อง',
            'paper_no' => 'เลขที่',
            'code_no' => 'เลขที่หนังสือราชการ',
            'from_place' => 'จาก',
            'to_place' => 'ถึง',
            'manager' => 'ผู้ควบคุม',
            'place_id' => 'จุดขึ้นรถ',
            'days' => 'จำนวนวัน',
            'date_start' => 'วันที่',
            'date_end' => 'ถึง',
            'time_start' => 'เวลาออกเดินทาง',
            'service_charge_in' => 'ค่าบริการภายใน',
            'service_charge_out' => 'ค่าบริการภายนอก',
            'service_charge_cleaning' => 'ค่าทำความสะอาด',
            'allowances_driver' => 'ค่าเบี้ยเลี้ยงคนขับรถ',
            'allowances_employees' => 'ค่าเบี้ยงเลี้ยงพนักงาน',
            'service_room' => 'ค่าโรงแรมเดี่ยว',
            'service_room_multi' => 'ค่าโรงแรมพักคู่',
            'create_at' => 'วันที่ยื่นคำร้อง',
            'tel' => 'โทรศัพท์',
            'file' => 'ไฟล์แนบ',
            'status' => 'ขั้นตอน',
        );
    }

    public function search() {
        $criteria = new CDbCriteria;
        $criteria->scopes = array(
            'get_desc',
        );

//        $criteria->compare('paper_approval_bus_id', $this->paper_approval_bus_id);
        $criteria->compare('member_id', $this->member_id);
        $criteria->compare('paper_no', $this->paper_no, true);
        $criteria->compare('from_place', $this->from_place, true);
        $criteria->compare('to_place', $this->to_place, true);
        $criteria->compare('manager', $this->manager, true);
        $criteria->compare('place_id', $this->place_id);
        $criteria->compare('days', $this->days);
        $criteria->compare('date_start', $this->date_start, true);
        $criteria->compare('date_end', $this->date_end, true);
        $criteria->compare('time_start', $this->time_start, true);
        $criteria->compare('service_charge_in', $this->service_charge_in, true);
        $criteria->compare('service_charge_out', $this->service_charge_out, true);
        $criteria->compare('service_charge_cleaning', $this->service_charge_cleaning, true);
        $criteria->compare('allowances_driver', $this->allowances_driver, true);
        $criteria->compare('allowances_employees', $this->allowances_employees, true);
        $criteria->compare('service_room', $this->service_room, true);
        $criteria->compare('service_room_multi', $this->service_room_multi, true);
        $criteria->compare('create_at', $this->create_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getByMember() {
        $criteria = new CDbCriteria;
        $criteria->condition = 'member_id = :member_id';
        $criteria->params = array(
            ':member_id' => Yii::app()->user->id,
        );
        $criteria->scopes = array(
            'get_desc',
        );

        $criteria->compare('paper_approval_bus_id', $this->paper_approval_bus_id);
        $criteria->compare('member_id', $this->member_id);
        $criteria->compare('paper_no', $this->paper_no, true);
        $criteria->compare('from_place', $this->from_place, true);
        $criteria->compare('to_place', $this->to_place, true);
        $criteria->compare('manager', $this->manager, true);
        $criteria->compare('place_id', $this->place_id);
        $criteria->compare('days', $this->days);
        $criteria->compare('date_start', $this->date_start, true);
        $criteria->compare('date_end', $this->date_end, true);
        $criteria->compare('time_start', $this->time_start, true);
        $criteria->compare('service_charge_in', $this->service_charge_in, true);
        $criteria->compare('service_charge_out', $this->service_charge_out, true);
        $criteria->compare('service_charge_cleaning', $this->service_charge_cleaning, true);
        $criteria->compare('allowances_driver', $this->allowances_driver, true);
        $criteria->compare('allowances_employees', $this->allowances_employees, true);
        $criteria->compare('service_room', $this->service_room, true);
        $criteria->compare('service_room_multi', $this->service_room_multi, true);
        $criteria->compare('create_at', $this->create_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getList() {
        $criteria = new CDbCriteria;
        $criteria->scopes = array(
            'get_desc',
            'get_wait',
        );
        $criteria->with = array(
            'member',
            'place',
        );

        $criteria->compare('paper_approval_bus_id', $this->paper_approval_bus_id);
        $criteria->compare('member_id', $this->member_id);
        $criteria->compare('paper_no', $this->paper_no, true);
        $criteria->compare('from_place', $this->from_place, true);
        $criteria->compare('to_place', $this->to_place, true);
        $criteria->compare('manager', $this->manager, true);
        $criteria->compare('place_id', $this->place_id);
        $criteria->compare('days', $this->days);
        $criteria->compare('date_start', $this->date_start, true);
        $criteria->compare('date_end', $this->date_end, true);
        $criteria->compare('time_start', $this->time_start, true);
        $criteria->compare('service_charge_in', $this->service_charge_in, true);
        $criteria->compare('service_charge_out', $this->service_charge_out, true);
        $criteria->compare('service_charge_cleaning', $this->service_charge_cleaning, true);
        $criteria->compare('allowances_driver', $this->allowances_driver, true);
        $criteria->compare('allowances_employees', $this->allowances_employees, true);
        $criteria->compare('service_room', $this->service_room, true);
        $criteria->compare('service_room_multi', $this->service_room_multi, true);
        $criteria->compare('create_at', $this->create_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getListConsider() {
        $criteria = new CDbCriteria;
        $criteria->scopes = array(
            'get_desc',
            'get_consider',
        );
        $criteria->with = array(
            'member',
            'place',
            'accept',
        );

        $criteria->compare('paper_approval_bus_id', $this->paper_approval_bus_id);
        $criteria->compare('member_id', $this->member_id);
        $criteria->compare('paper_no', $this->paper_no, true);
        $criteria->compare('from_place', $this->from_place, true);
        $criteria->compare('to_place', $this->to_place, true);
        $criteria->compare('manager', $this->manager, true);
        $criteria->compare('place_id', $this->place_id);
        $criteria->compare('days', $this->days);
        $criteria->compare('date_start', $this->date_start, true);
        $criteria->compare('date_end', $this->date_end, true);
        $criteria->compare('time_start', $this->time_start, true);
        $criteria->compare('service_charge_in', $this->service_charge_in, true);
        $criteria->compare('service_charge_out', $this->service_charge_out, true);
        $criteria->compare('service_charge_cleaning', $this->service_charge_cleaning, true);
        $criteria->compare('allowances_driver', $this->allowances_driver, true);
        $criteria->compare('allowances_employees', $this->allowances_employees, true);
        $criteria->compare('service_room', $this->service_room, true);
        $criteria->compare('service_room_multi', $this->service_room_multi, true);
        $criteria->compare('create_at', $this->create_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getDoing1() {
        $criteria = new CDbCriteria;
        if (Yii::app()->user->isRector()) {
            $criteria->scopes = array(
                'get_desc',
                'doing1',
            );
        } else {
            $criteria->scopes = array(
                'get_desc',
                'doing',
            );
        }
        $criteria->with = array(
            'member',
            'place',
            'accept',
        );

        $criteria->compare('paper_approval_bus_id', $this->paper_approval_bus_id);
        $criteria->compare('member.name', $this->member_id, true);
        $criteria->compare('paper_no', $this->paper_no, true);
        $criteria->compare('from_place', $this->from_place, true);
        $criteria->compare('to_place', $this->to_place, true);
        $criteria->compare('manager', $this->manager, true);
        $criteria->compare('place_id', $this->place_id);
        $criteria->compare('days', $this->days);
        $criteria->compare('date_start', $this->date_start, true);
        $criteria->compare('date_end', $this->date_end, true);
        $criteria->compare('time_start', $this->time_start, true);
        $criteria->compare('service_charge_in', $this->service_charge_in, true);
        $criteria->compare('service_charge_out', $this->service_charge_out, true);
        $criteria->compare('service_charge_cleaning', $this->service_charge_cleaning, true);
        $criteria->compare('allowances_driver', $this->allowances_driver, true);
        $criteria->compare('allowances_employees', $this->allowances_employees, true);
        $criteria->compare('service_room', $this->service_room, true);
        $criteria->compare('service_room_multi', $this->service_room_multi, true);
        $criteria->compare('create_at', $this->create_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getPaperDoneBus() {
        $now = date('Y-m-d');
        $criteria = new CDbCriteria;
        $criteria->scopes = array(
            'get_desc',
        );
        $criteria->condition = 't.date_end < :now and t.status = 4';
        $criteria->params = array(
            ':now' => $now,
        );

        $criteria->compare('paper_approval_bus_id', $this->paper_approval_bus_id);
        $criteria->compare('member_id', $this->member_id);
        $criteria->compare('paper_no', $this->paper_no, true);
        $criteria->compare('from_place', $this->from_place, true);
        $criteria->compare('to_place', $this->to_place, true);
        $criteria->compare('manager', $this->manager, true);
        $criteria->compare('place_id', $this->place_id);
        $criteria->compare('days', $this->days);
        $criteria->compare('date_start', $this->date_start, true);
        $criteria->compare('date_end', $this->date_end, true);
        $criteria->compare('time_start', $this->time_start, true);
        $criteria->compare('service_charge_in', $this->service_charge_in, true);
        $criteria->compare('service_charge_out', $this->service_charge_out, true);
        $criteria->compare('service_charge_cleaning', $this->service_charge_cleaning, true);
        $criteria->compare('allowances_driver', $this->allowances_driver, true);
        $criteria->compare('allowances_employees', $this->allowances_employees, true);
        $criteria->compare('service_room', $this->service_room, true);
        $criteria->compare('service_room_multi', $this->service_room_multi, true);
        $criteria->compare('create_at', $this->create_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
