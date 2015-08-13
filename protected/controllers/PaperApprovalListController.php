<?php

class PaperApprovalListController extends Controller {

    public $layout = '//layouts/main';
    public $nameController = 'คำร้องขอใช้รถยนต์ส่วนกลาง';

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
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
            $model->attributes = $_GET['PaperApproval'];
        }
        
        $modelBus = new PaperApprovalBus('search');
        $modelBus->unsetAttributes();
        if (isset($_GET['PaperApprovalBus'])) {
            $model->attributes = $_GET['PaperApprovalBus'];
        }

        $this->render('index', array(
            'model' => $model,
            'dataProvider' => $model->getPaperList(),
            'modelBus' => $modelBus,
            'dataProviderBus' => $modelBus->getList(),
        ));
    }

    public function actionView() {

        $this->renderPartial('view_list', array(
            'model' => $this->loadModel($_POST['paper_approval_id']),
        ));
    }

    public function actionAccept($id) {
        $model = $this->loadModel($id);
        $accept = $model->accept;
        $model->status = 1;
        $accept->status = 1;
        if ($model->save()) {
            $accept->save();
            echo '<meta charset="utf-8" />'
            . '<script>'
            . 'alert("รับเรื่องเรียบร้อย");'
            . 'window.location="' . CHtml::normalizeUrl(array('index')) . '"'
            . '</script>';
        } else {
            echo '<meta charset="utf-8" />'
            . '<script>'
            . 'alert("รับเรื่องไม่สำเร็จ กรุณาลองใหม่อีกครั้ง");'
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
