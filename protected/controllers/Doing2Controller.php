<?php

class Doing2Controller extends Controller {

    public $layout = '//layouts/main';
    public $nameController = 'ตรวจสอบและพิจารณา (รถยนต์ส่วนกลาง)';
    
    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'users' => Yii::app()->user->getRectors(),
            ),
            array('allow',
                'users' => Yii::app()->user->getViceRectors(),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionView() {
        $this->renderPartial('view_list', array(
            'model' => $this->loadModel($_POST['paper_approval_id']),
        ));
    }

    public function actionAccept($id) {
        $model = $this->loadModel($id);
        $model->status = 2;
        if ($model->save()) {

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
                $paperAccept->status = 3;
                $paperAccept->type_paper_id = 2;
                $paperAccept->use = 1;
                $paperAccept->create_at = date('Y-m-d H:i:s');
                $paperAccept->save();

                $this->redirect(array('/doing1'));
            }
        }
    }

    public function actionNotAccept($id) {
        $model = $this->loadModel($id);
        $model->status = 5;
        if ($model->save()) {

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

                $this->redirect(array('/doing1'));
            }
        }
    }

    protected function loadModel($id) {
        $model = PaperApprovalBus::model()->findByPk($id);
        if (empty($model))
            throw new CHttpException(404, 'ผิดพลาดในการดึงข้อมูล ออกมาแสดงผล ลองใหม่อีกครั้ง');

        return $model;
    }

}
