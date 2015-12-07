<?php

class ConsiderBusController extends Controller {

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'users' => Yii::app()->user->getBossCars(),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionView() {
        if (!isset($_GET['paper_approval_id']))
            $model = $this->loadModel($_POST['paper_approval_id']);
        else
            $model = $this->loadModel($_GET['paper_approval_id']);

        $condition = new ConditionAccept();
        $noAccept = new PaperDetailBus();
        $accept = new PaperDetailBusAccept();

        $accept->paper_id = $model->paper_approval_bus_id;
        $accept->member_id = Yii::app()->user->id;
        $accept->create_at = date('Y-m-d H:i:s');

        $noAccept->paper_id = $model->paper_approval_bus_id;
        $noAccept->member_id = Yii::app()->user->id;
        $noAccept->create_at = date('Y-m-d H:i:s');

        $condition->condition = 0;

        if (isset($_POST['ConditionAccept'])) {
            $condition->attributes = $_POST['ConditionAccept'];

            if ($condition->condition == 0) { // อนุมัติ
                if (isset($_POST['PaperDetailBusAccept'])) {
                    $accept->attributes = $_POST['PaperDetailBusAccept'];

                    if ($accept->validate()) {

                        $model->status = 2;
                        if ($model->save()) {
                            if ($accept->save()) {

                                $paperAccept = Accept::model()->find(array(
                                    'condition' => 'paper_id = :paper_id and type_paper_id = 2',
                                    'params' => array(
                                        ':paper_id' => $model->paper_approval_bus_id,
                                    ),
                                    'order' => 'accept_id desc',
                                ));
                                $paperAccept->personnel_id = Yii::app()->user->id;
                                $paperAccept->use = 0;
                                if ($paperAccept->save()) {

                                    $paperAccept = new Accept;
                                    $paperAccept->paper_id = $model->paper_approval_bus_id;
                                    $paperAccept->personnel_id = Yii::app()->user->id;
                                    $paperAccept->status = 2;
                                    $paperAccept->type_paper_id = 2;
                                    $paperAccept->use = 1;
                                    $paperAccept->create_at = date('Y-m-d H:i:s');
                                    $paperAccept->save();

                                    echo CJSON::encode(array(
                                        'status' => 'success',
                                        'message' => 'อนุมัติ',
                                    ));
                                }
                            } else {
                                echo "<pre>";
                                print_r($accept->attributes);
                            }
                        }
                    } else {
                        $error = CActiveForm::validate($accept);
                        if ($error != '[]')
                            echo $error;
                        Yii::app()->end();
                    }
//                    echo '<pre>';
//                    print_r($accept->attributes);
                    Yii::app()->end();
                }
            } else if ($condition->condition == 1) { // ไม่อนุมัติ
                if (isset($_POST['PaperDetailBus'])) {
                    $noAccept->attributes = $_POST['PaperDetailBus'];

                    if ($noAccept->validate()) {
                        $model->status = 5;
                        if ($model->save()) {
                            if ($noAccept->save()) {

                                $paperAccept = Accept::model()->find(array(
                                    'condition' => 'paper_id = :paper_id and type_paper_id = 2',
                                    'params' => array(
                                        ':paper_id' => $model->paper_approval_bus_id,
                                    ),
                                    'order' => 'accept_id desc',
                                ));
                                $paperAccept->personnel_id = Yii::app()->user->id;
                                $paperAccept->use = 0;
                                if ($paperAccept->save()) {

                                    $paperAccept = new Accept;
                                    $paperAccept->paper_id = $model->paper_approval_bus_id;
                                    $paperAccept->personnel_id = Yii::app()->user->id;
                                    $paperAccept->status = 4;
                                    $paperAccept->type_paper_id = 2;
                                    $paperAccept->use = 1;
                                    $paperAccept->create_at = date('Y-m-d H:i:s');
                                    $paperAccept->save();

                                    echo CJSON::encode(array(
                                        'status' => 'success',
                                        'message' => 'ไม่อนุมัติ',
                                    ));
                                }
                            }
                        }
                    } else {
                        $error = CActiveForm::validate($noAccept);
                        if ($error != '[]')
                            echo $error;
                        Yii::app()->end();
                    }
//                    echo '<pre>';
//                    print_r($noAccept->attributes);
                    Yii::app()->end();
                }
            }
        }

        $this->renderPartial('view_list', array(
            'model' => $model,
            'condition' => $condition,
            'noAccept' => $noAccept,
            'accept' => $accept,
                ), false, true);
    }


    protected function loadModel($id) {
        $model = PaperApprovalBus::model()->findByPk($id);
        if (empty($model))
            throw new CHttpException(404, 'ผิดพลาดในการดึงข้อมูล ออกมาแสดงผล ลองใหม่อีกครั้ง');

        return $model;
    }

}
