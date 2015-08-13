<?php

class Doing1Controller extends Controller {

    public $layout = '//layouts/main';
    public $nameController = 'ตรวจสอบและพิจารณารถยนต์ส่วงกลาง';
    
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

    public function actionIndex() {
        $model = new PaperApproval('search');
        $model->unsetAttributes();
        if (isset($_GET['PaperApproval'])) {
            $model->attributes = $_GET['PaperApproval'];
        }
        $modelBus = new PaperApprovalBus('search');
        $modelBus->unsetAttributes();
        if (isset($_GET['PaperApprovalBus'])) {
            $modelBus->attributes = $_GET['PaperApprovalBus'];
        }

        $this->render('index', array(
            'model' => $model,
            'dataProvider' => $model->getDoing1(), 
            'modelBus' => $modelBus,
            'dataProviderBus' => $modelBus->getDoing1(), 
        ));
    }

    public function actionView() {
        $this->renderPartial('view', array(
            'model' => $this->loadModel($_POST['paper_approval_id']),
        ));
    }

    public function actionAccept($id) {
        $model = $this->loadModel($id);
        $model->status = 4;
        if ($model->save()) {

            $paperAccept = Accept::model()->find(array(
                'condition' => 'paper_id = :paper_id',
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

                $this->redirect(array('/doing1'));
            }
        }
    }

    public function actionNotAccept($id) {
        $model = $this->loadModel($id);
        $model->status = 5;
        if ($model->save()) {

            $paperAccept = Accept::model()->find(array(
                'condition' => 'paper_id = :paper_id',
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

                $this->redirect(array('/doing1'));
            }
        }
    }

    protected function loadModel($id) {
        $model = PaperApproval::model()->findByPk($id);
        if (empty($model))
            throw new CHttpException(404, 'ผิดพลาดในการดึงข้อมูล ออกมาแสดงผล ลองใหม่อีกครั้ง');

        return $model;
    }

}
