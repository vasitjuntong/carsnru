<?php

class PaperDoneController extends Controller {

    public $layout = '//layouts/main';
    public $nameController = 'รับเรื่องคืนรถยนต์ส่วนกลาง';

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
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $model = new PaperApproval;
        $model->unsetAttributes();
        if (isset($_GET['PaperApproval'])) {
            $model->attributes = $_GET['PaperApproval'];
        }

        $this->render('index', array(
            'model' => $model,
            'dataProvider' => $model->getPaperDone(),
        ));
    }

    public function actionView() {
        if (!isset($_POST['paper_id']))
            throw new CHttpException('403', 'ไม่มีข้อมูลที่คุณต้องการ กรุณาลองใหม่อีกครั้ง');

        $model = $this->loadModel($_POST['paper_id']);

        $this->renderPartial('view', array(
            'model' => $model,
        ));
    }

    public function actionAccept($id = null) {
        $model = $this->loadModel($id);
        $model->status = 6;
        if ($model->save())
            $this->redirect(array('index'));
    }

    protected function loadModel($id) {
        $model = PaperApproval::model()->findByPk($id);
        if (empty($model))
            throw new CHttpException('403', 'ไม่มีข้อมูลที่คุณต้องการ กรุณาลองใหม่อีกครั้ง');

        return $model;
    }

}
