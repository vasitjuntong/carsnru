<?php

class SearchMonth extends CFormModel {

    public $month;
    public $year;
    public $status;

    public function rules() {
        return array(
            array('year', 'required', 'message' => 'กรุณาเลือก {attribute}'),
            array('year, month, status', 'safe')
        );
    }

    public function attributeLabels() {
        return array(
            'month' => 'เดือน',
            'year' => 'ปี',
            'status' => 'สถานะ',
        );
    }

}