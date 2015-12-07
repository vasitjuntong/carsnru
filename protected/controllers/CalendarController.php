<?php

class CalendarController extends Controller {

    public $layout = '//layouts/calendar';
    public $calendar_evens = null;
    
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $evens = array();
        $model = PaperApproval::model()->acceptPaper()->findAll();
        foreach ($model as $m) {
            if($m->paperDetailAccept->car != null){
                array_push($evens, array(
                    'title' => 'ทะเบียนรถ : ' . $m->paperDetailAccept->car->license_no,
                    'start' => $m->departure_time,
                    'end' => $m->back_time,
                ));
            }
        }
        $modelBus = PaperApprovalBus::model()->acceptPaper()->findAll();
        foreach ($modelBus as $ms) {
            if ($ms->paperDetailBusAccept->car != null){
                array_push($evens, array(
                    'title' => 'ทะเบียนรถ : ' . $ms->paperDetailBusAccept->car->license_no,
                    'start' => $ms->date_start,
                    'end'   => $ms->date_end,
                ));
            }
        }
//        echo '<pre>';
//        print_r($evens);die;
        $this->calendar_evens = json_encode($evens);
        $this->render('index', array(
        ));
    }

}
