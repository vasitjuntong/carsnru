<?php

class Bans {

    public static function paper() {
        $now = strtotime(date('Y-m-d H:i:s'));
        $model = PaperApproval::model()->findAll(array(
            'condition' => 'status < 4',
        ));
        if (!empty($model))
            foreach ($model as $paper) {
                if ($now >= strtotime($paper->departure_time . ' ' . $paper->time_start)) {
                    $paper->status = 7;

                    $accept = $paper->accept;
                    $accept->status = 5;

                    if ($accept->save())
                        $paper->save();
                }
            }
    }

    public static function paperBus() {
        $now = strtotime(date('Y-m-d H:i:s'));
        $model = PaperApprovalBus::model()->findAll(array(
            'condition' => 'status < 4',
        ));
        if (!empty($model))
            foreach ($model as $paper) {
                if ($now >= strtotime($paper->date_start . ' ' . $paper->date_end)) {
                    $paper->status = 7;

                    $accept = $paper->accept;
                    $accept->status = 5;

                    if ($accept->save())
                        $paper->save();
                }
            }
    }

}
