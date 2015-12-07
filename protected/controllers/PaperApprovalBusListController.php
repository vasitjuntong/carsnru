<?php

class PaperApprovalBusListController extends Controller {

    public $layout = '//layouts/main';
    public $nameController = 'คำร้องขอใช้รถยนต์ปรับอากาศ';

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

        $this->renderPartial('view_list', array(
            'model' => $this->loadModel($_POST['paper_approval_bus_id']),
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
//            . 'alert("รับเรื่องเรียบร้อย");'
            . 'window.location="' . CHtml::normalizeUrl(array('/paperApprovalList/index')) . '"'
            . '</script>';
        } else {
            echo '<meta charset="utf-8" />'
            . '<script>'
            . 'alert("รับเรื่องไม่สำเร็จ กรุณาลองใหม่อีกครั้ง");'
            . 'window.location="' . CHtml::normalizeUrl(array('/paperApprovalList/index')) . '"'
            . '</script>';
        }
    }

    protected function loadModel($id) {
        $model = PaperApprovalBus::model()->findByPk($id);
        if (empty($model))
            throw new CHttpException(404, 'ผิดพลาดในการดึงข้อมูล ออกมาแสดงผล ลองใหม่อีกครั้ง');

        return $model;
    }
}
