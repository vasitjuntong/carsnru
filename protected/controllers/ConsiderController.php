<?php

class ConsiderController extends Controller {

    public $layout = '//layouts/main';
    public $nameController = 'ตรวจสอบและพิจารณา';

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

    public function actionIndex() {

        $model = new PaperApproval('search');
        $model->unsetAttributes();
        if (isset($_GET['PaperApproval'])) {
            $model->getAttributes = $_GET['PaperApproval'];
        }
        
        $modelBus = new PaperApprovalBus('search');
        $modelBus->unsetAttributes();
        if (isset($_GET['PaperApprovalBus'])) {
            $modelBus->attributes = $_GET['PaperApprovalBus'];
        }

        $this->render('index', array(
            'model' => $model,
            'dataProvider' => $model->getConsiderList(),
            'modelBus' => $modelBus,
            'dataProviderBus' => $modelBus->getListConsider(),
        ));
    }

    public function actionView() {
        if (!isset($_GET['paper_approval_id']))
            $model = $this->loadModel($_POST['paper_approval_id']);
        else
            $model = $this->loadModel($_GET['paper_approval_id']);

        $condition = new ConditionAccept();
        $noAccept = new PaperDetail();
        $accept = new PaperDetailAccept();

        $accept->paper_id = $model->paper_approval_id;
        $accept->member_id = Yii::app()->user->id;
        $accept->create_at = date('Y-m-d H:i:s');

        $noAccept->paper_id = $model->paper_approval_id;
        $noAccept->member_id = Yii::app()->user->id;
        $noAccept->create_at = date('Y-m-d H:i:s');

        $condition->condition = 0;

        if (isset($_POST['ConditionAccept'])) {
            $condition->attributes = $_POST['ConditionAccept'];

            if ($condition->condition == 0) { // อนุมัติ
                if (isset($_POST['PaperDetailAccept'])) {
                    $accept->attributes = $_POST['PaperDetailAccept'];

                    if ($accept->validate()) {

                        $model->status = 2;
                        if ($model->save()) {
                            if ($accept->save()) {

                                $paperAccept = Accept::model()->find(array(
                                    'condition' => 'paper_id = :paper_id and type_paper_id = 1',
                                    'params' => array(
                                        ':paper_id' => $model->paper_approval_id,
                                    ),
                                    'order' => 'accept_id desc',
                                ));
                                $paperAccept->personnel_id = Yii::app()->user->id;
                                $paperAccept->use = 0;
                                if ($paperAccept->save()) {

                                    $paperAccept = new Accept;
                                    $paperAccept->paper_id = $model->paper_approval_id;
                                    $paperAccept->personnel_id = Yii::app()->user->id;
                                    $paperAccept->status = 2;
                                    $paperAccept->type_paper_id = 1;
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
                if (isset($_POST['PaperDetail'])) {
                    $noAccept->attributes = $_POST['PaperDetail'];

                    if ($noAccept->validate()) {
                        $model->status = 5;
                        if ($model->save()) {
                            if ($noAccept->save()) {

                                $paperAccept = Accept::model()->find(array(
                                    'condition' => 'paper_id = :paper_id and type_paper_id = 1',
                                    'params' => array(
                                        ':paper_id' => $model->paper_approval_id,
                                    ),
                                    'order' => 'accept_id desc',
                                ));
                                $paperAccept->personnel_id = Yii::app()->user->id;
                                $paperAccept->use = 0;
                                if ($paperAccept->save()) {

                                    $paperAccept = new Accept;
                                    $paperAccept->paper_id = $model->paper_approval_id;
                                    $paperAccept->personnel_id = Yii::app()->user->id;
                                    $paperAccept->status = 4;
                                    $paperAccept->type_paper_id = 1;
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

    public function actionAccept($id) {
        $model = $this->loadModel($id);
        $model->status = 2;
        if ($model->save()) {
            echo '<meta charset="utf-8" />'
            . '<script>'
//            . 'alert("แจ้งการอนุมัติ เรียบร้อย");'
            . 'window.location="' . CHtml::normalizeUrl(array('index')) . '"'
            . '</script>';
        } else {
            echo '<meta charset="utf-8" />'
            . '<script>'
//            . 'alert("แจ้งการอนุมัติไม่สำเร็จ กรุณาลองใหม่อีกครั้ง");'
            . 'window.location="' . CHtml::normalizeUrl(array('index')) . '"'
            . '</script>';
        }
    }

    public function actionNotAccept($id) {
        $model = $this->loadModel($id);
        $model->status = 3;
        if ($model->save()) {
            echo '<meta charset="utf-8" />'
            . '<script>'
//            . 'alert("แจ้งการไม่อนุมันติเรียบร้อย");'
            . 'window.location="' . CHtml::normalizeUrl(array('index')) . '"'
            . '</script>';
        } else {
            echo '<meta charset="utf-8" />'
            . '<script>'
//            . 'alert("แจ้งการไม่อนุมันติไม่สำเร็จ กรุณาลองใหม่อีกครั้ง");'
            . 'window.location="' . CHtml::normalizeUrl(array('index')) . '"'
            . '</script>';
        }
    }

    protected function loadModel($id) {
        $model = PaperApproval::model()->findByPk($id);
        if (empty($model))
            throw new CHttpException(404, 'ผิดพลาดในการดึงข้อมูล ออกมาแสดงผล ลองใหม่อีกครั้ง');

        return $model;
    }

}
