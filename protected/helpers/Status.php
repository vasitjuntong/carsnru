<?php

class Status {

    public static $member = array(
        0 => 'ผู้ดูแลระบบ',
        1 => 'ผู้บริหาร',
        2 => 'คนขับรถ',
        3 => 'สมาชิกทั่วไป',
    );
    public static $paper = array(
        0 => 'รอรับเรื่อง',
        1 => 'รอพิจารณา',
        2 => 'กำลังดำเนินการ',
//        3 => 'ดำเนินการแล้วเสร็จ',
        4 => 'อนุมัติ',
        5 => 'ไม่อนุมัติ',
        6 => 'ดำเนินการแล้วเสร็จ',
        7 => 'ยกเลิก',
    );
    public static $doing = array(
        0 => 'รอการรับเรื่อง',
        1 => 'จัดสรรรถยนต์',
        2 => 'พิจารณา',
        3 => 'พิจารณา 2',
        4 => 'พิจารณาแล้วเสร็จ',
        5 => 'ยกเลิก',
    );

}
