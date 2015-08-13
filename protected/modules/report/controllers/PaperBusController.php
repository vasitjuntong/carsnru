<?php

class PaperBusController extends Controller {

    public $layout = '//layouts/main';
    public $nameController = 'รายงานข้อมูลขอใช้รถยนต์ปรับอากาศ';

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'users' => Yii::app()->user->getAdmins(),
            ),
            array('allow',
                'users' => Yii::app()->user->getMemberBackend(),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $paper = new PaperApprovalBus('search');
        $model = new SearchMonth('search');

        $model->month = date('n');
        $model->year = date('Y');

        $criteria = new CDbCriteria;
        $criteria->with = array('member', 'place');
        $criteria->scopes = array('get_desc');

        if (isset($_GET['PaperApprovalBus'])) {
            $paper->attributes = $_GET['PaperApprovalBus'];

            $criteria->compare('paper_no', $paper->paper_no, true);
            $criteria->compare('member.name', $paper->member_id, true);
            $criteria->compare('to_place', $paper->to_place, true);
            $criteria->compare('from_place', $paper->from_place, true);
            $criteria->compare('manager', $paper->manager, true);
            $criteria->compare('place.name', $paper->place_id, true);
        }

        $dateStart = 1;
        $dateEnd = cal_days_in_month(CAL_GREGORIAN, $model->month, $model->year); // จำนวนวันของเดือน นั้นของปี
        $timeStart = '00:00:00';
        $timeEnd = '23:59:59';

        $start = "{$model->year}-{$model->month}-{$dateStart} {$timeStart}";
        $end = "{$model->year}-{$model->month}-{$dateEnd} {$timeEnd}";

        $criteria->addBetweenCondition('t.create_at', $start, $end);
        $criteria->addCondition('t.status = 4 or t.status = 5');

        $dataProvider = new CActiveDataProvider($paper, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
        ));

        $this->render('index', array(
            'model' => $model,
            'dataProvider' => $dataProvider,
            'paper' => $paper,
        ));
    }

    public function actionSearch() {
        Yii::app()->user->setState('start', null);
        Yii::app()->user->setState('end', null);

        $model = new SearchMonth('search');
        $paper = new PaperApprovalBus('search');

        $criteria = new CDbCriteria;
        $criteria->with = array('member', 'place');
        $criteria->scopes = array('get_desc');

        if (isset($_POST['SearchMonth']))
            $model->attributes = $_POST['SearchMonth'];

        if (isset($_GET['PaperApprovalBus'])) {
            $paper->attributes = $_GET['PaperApprovalBus'];

            $criteria->compare('paper_no', $paper->paper_no, true);
            $criteria->compare('member.name', $paper->member_id, true);
            $criteria->compare('to_place', $paper->go, true);
            $criteria->compare('from_place', $paper->request, true);
            $criteria->compare('manager', $paper->manager, true);
            $criteria->compare('place.name', $paper->place_id, true);
//            $criteria->compare('t.status', $paper->status);
        }
        if ($model->validate()) {

            if ($model->month != null) {
                $dateStart = 1;
                $dateEnd = cal_days_in_month(CAL_GREGORIAN, $model->month, $model->year); // จำนวนวันของเดือน นั้นของปี
                $timeStart = '00:00:00';
                $timeEnd = '23:59:59';

                $start = "{$model->year}-{$model->month}-{$dateStart} {$timeStart}";
                $end = "{$model->year}-{$model->month}-{$dateEnd} {$timeEnd}";

                $criteria->addBetweenCondition('t.create_at', $start, $end);
            } else {
                $timeStart = '00:00:00';
                $timeEnd = '23:59:59';
                $start = "{$model->year}-1-1 {$timeStart}";
                $end = "{$model->year}-12-31} {$timeEnd}";

                $criteria->addBetweenCondition('t.create_at', $start, $end);
            }
            if ($model->status == null) {
                $criteria->addCondition('t.status = 4 or t.status = 5');
            } else {
                $criteria->addCondition("t.status = {$model->status}");
            }
        } else {
            $this->renderPartial('/error/_error', array(
                'models' => array($model),
            ));
            Yii::app()->end();
        }

        $dataProvider = new CActiveDataProvider($paper, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
        ));

        $this->renderPartial('_list', array(
            'model' => $paper,
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionExcel() {

        $model = new SearchMonth('search');
        $statusPaperList = '';

        if (isset($_POST['SearchMonth'])) {
            $criteria = new CDbCriteria;
            $criteria->with = array('member', 'place');
            $criteria->scopes = array('get_desc');

            $model->attributes = $_POST['SearchMonth'];

            if ($model->month != null) {
                $dateStart = 1;
                $dateEnd = cal_days_in_month(CAL_GREGORIAN, $model->month, $model->year); // จำนวนวันของเดือน นั้นของปี
                $timeStart = '00:00:00';
                $timeEnd = '23:59:59';

                $start = "{$model->year}-{$model->month}-{$dateStart} {$timeStart}";
                $end = "{$model->year}-{$model->month}-{$dateEnd} {$timeEnd}";

                $criteria->addBetweenCondition('t.create_at', $start, $end);
            } else {
                $timeStart = '00:00:00';
                $timeEnd = '23:59:59';
                $start = "{$model->year}-1-1 {$timeStart}";
                $end = "{$model->year}-12-31} {$timeEnd}";

                $criteria->addBetweenCondition('t.create_at', $start, $end);
            }
            if ($model->status == null) {
                $criteria->addCondition('t.status = 4 or t.status = 5');
            } else {
                $criteria->addCondition("t.status = {$model->status}");
            }

            $paper = PaperApprovalBus::model()->findAll($criteria);

            $this->renderPartial('excel', array(
                'model' => $paper,
                'modelSearch' => $model,
                'statusPaperList' => $statusPaperList,
            ));
        }
    }

}
