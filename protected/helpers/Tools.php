<?php

class Tools {

    public static function DateTimeToShow($date, $sparator = '-', $time = true) {
        if ($date != '0000-00-00' || $date != '0000-00-00 00:00:00') {

            if ($time) // ถ้าเป็น 
                list($date, $_time) = explode(' ', $date);

            $_d = explode('-', $date);

            if ($time)
//                return $_d[2] . $sparator . $_d[1] . $sparator . ($_d[0] + 543) . ' ' . $_time;
                return $_d[2] . $sparator . $_d[1] . $sparator . ($_d[0]) . ' ' . $_time;
            else
                return $_d[2] . $sparator . $_d[1] . $sparator . ($_d[0]);
//                return $_d[2] . $sparator . $_d[1] . $sparator . ($_d[0] + 543);
        }else {
            return '-';
        }
    }

    public static function subText($text, $legth = 200, $textEnd = '...') {
        if (strlen($text) > $legth) {
            return iconv_substr($text, 0, $legth, "UTF-8") . $textEnd;
        } else {
            return $text;
        }
    }

    public static function dateToSave($date, $spec = '/') {
        $_date = explode($spec, $date);
        return $_date[2] . '-' . $_date[1] . '-' . $_date[0];
    }
    
    public static function dateToShow($date, $spec = '/') {
        $_date = explode('-', $date);
        return $_date[2] . $spec . $_date[1] . $spec . $_date[2];
    }
}
