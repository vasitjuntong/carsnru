<?php

class TimeAlert {

    public static function nicetime($date) {
        if (empty($date)) {
            return "No date provided";
        }

//        $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
        $periods = array("วินาที", "นาที", "ชั่วโมง", "วัน", "สัปดาห์", "เดือน", "ปี", "decade");
//        $periods = array("ว.", "น.", "ชม.", "ว.", "ส.", "ด.", "ป.", "ทศ.");
        $lengths = array("60", "60", "24", "7", "4.35", "12", "10");

        $now = time();
        $unix_date = strtotime($date);

        // check validity of date
        if (empty($unix_date)) {
            return "Bad date";
        }

        // is it future date or past date
        if ($now > $unix_date) {
            $difference = $now - $unix_date;
            $tense = "ที่แล้ว";
        } else {
            $difference = $unix_date - $now;
            $tense = "เดี๋ยวนี้";
        }

        for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
            $difference /= $lengths[$j];
        }

        $difference = round($difference);

        if ($difference != 1) {
//            $periods[$j].= "s";
        }

        return "$difference $periods[$j] {$tense}";
    }

}
