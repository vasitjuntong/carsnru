<?php

$html = '<meta charset="UTF-8" />';
$html .= '<h3>รายงานข้อมูลขอใช้รถยนต์ส่วนกลาง <small>' . Thai::$thaimonth_full[$modelSearch->month] . ' ' . $modelSearch->year . '</small></h3>';
$html .= '<div>สถานะ ' . Yii::app()->getModule('report')->statusPaperList[$statusPaperList] . '</div>';
$html .= '<table border="1">';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<th>ลำดับ</th>';
$html .= '<th>วันที่ยื่นคำร้อง</th>';
$html .= '<th>เลขที่เอกสาร</th>';
$html .= '<th>ไปราชการที่</th>';
$html .= '<th>ผู้รับผิดชอบ</th>';
$html .= '<th>ทะเบียนรถ</th>';
$html .= '<th>ผลการพิจารณา</th>';
$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';
$n = 1;
foreach ($model as $m) {
    $html .= '<tr>';
    $html .= '<td>' . $n . '</td>';
    $html .= '<td>' . Tools::DateTimeToShow($m->create_at, "/", true) . '</td>';
    $html .= '<td>' . $m->paper_no . '</td>';
    $html .= '<td>' . $m->go . '</td>';
    $html .= '<td>' . $m->member->name . '</td>';
    $html .= '<td>' . $m->paperDetailAccept->car->license_no . '</td>';
    $html .= '<td>' . Status::$paper[$m->status] . '</td>';
    $html .= '</tr>';
    $n++;
}
$html .= '</tbody>';
$html .= '</table>';
//echo $html;
Excel::sendAsXLS($html, '', 'รายงานข้อมูลขอใช้รถยนต์ส่วนกลาง');
