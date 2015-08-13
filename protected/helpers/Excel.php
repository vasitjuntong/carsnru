<?php

class Excel {

    public static function sendAsXLS($data, $header, $filename) {
        $export = Excel::xls($data, $header);
        $export .= Excel::sendHeader($filename, strlen($export));
        echo $export;
    }

    public static function sendHeader($filename, $length) {
//        header("Content-type: application/vnd.ms-excel");
//        header("Content-Type: application/octet-stream");
        header("Content-type: application/x-msexcel");
        header("Content-Disposition: attachment; filename=$filename.xls");
        header("Content-length: " . $length);
        header("Pragma: no-cache");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
//        header("Cache-Control: private", false);
        header("Content-Transfer-Encoding: BINARY");
    }

    /**
     * Private method to create xls string from active record data set
     *
     * @param  $data - active record data set
     * @param  $header - boolean to show/hide header
     */
    public static function xls($data, $header) {
        $str = '
            <html xmlns:o="urn:schemas-microsoft-com:office:office"
            xmlns:x="urn:schemas-microsoft-com:office:excel"
            xmlns="http://www.w3.org/TR/REC-html40">
            <HTML>
            <HEAD>
            <meta http-equiv="Content-type" content="text/html;charset=utf-8" />
            </HEAD>
            <BODY>
            ';
        $str .= $data;
        $str .= '
            </BODY>
            ';
        return $str;
    }

}
