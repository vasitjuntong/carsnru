<?php

$html = '<meta charset="UTF-8" />';
$html .= '<h3>รายงานข้อมูลขอใช้รถยนต์ปรับอากาศ <small>' . Thai::$thaimonth_full[$modelSearch->month] . ' ' . $modelSearch->year . '</small></h3>';
$html .= '<div>สถานะ ' . Yii::app()->getModule('report')->statusPaperList[$statusPaperList] . '</div>';
$html .= '<table border="1">';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<th>ลำดับ</th>';
$html .= '<th>ผู้ร้องเรียน</th>';
$html .= '<th>เลขที่</th>';
$html .= '<th>จาก</th>';
$html .= '<th>ถึง</th>';
$html .= '<th>ขั้นตอน</th>';
$html .= '<th>วันที่ยื่นคำร้อง</th>';
$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';
foreach ($model as $m) {
    $n = 1;
    $html .= '<tr>';
    $html .= '<td>' . $n . '</td>';
    $html .= '<td>' . $m->member->name . '</td>';
    $html .= '<td>' . $m->paper_no . '</td>';
    $html .= '<td>' . $m->from_place . '</td>';
    $html .= '<td>' . $m->to_place . '</td>';
    $html .= '<td>' . Status::$paper[$m->status] . '</td>';
    $html .= '<td>' . Tools::DateTimeToShow($m->create_at, "/", true) . '</td>';
    $html .= '</tr>';
    $n++;
}
$html .= '</tbody>';
$html .= '</table>';
//echo $html;
Excel::sendAsXLS($html, '', 'รายงานข้อมูลขอใช้รถยนต์ปรับอากาศ');
