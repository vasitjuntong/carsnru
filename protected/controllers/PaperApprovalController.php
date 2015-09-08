<?php

class PaperApprovalController extends Controller {

    public $layout = '//layouts/main';
    public $nameController = 'คำร้องขอใช้รถยนต์ส่วนกลาง';
    public $defaultAction = 'admin';

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'checkMember + view, update, delete'
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'users' => Yii::app()->user->getMembers(),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $model = TypeCar::model()->findAll();
        $this->render('index', array(
            'model' => $model,
        ));
    }

    public function filtercheckMember($filterChain) {

        if ($id = Yii::app()->getRequest()->getParam('id')) {
            $model = $this->loadModel($id);
            if ($model->member_id == Yii::app()->user->id)
                $filterChain->run();
            else
                throw new CHttpException(404, "คุณไม่สามารถทำรายการได้ กรุณาลองใหม่อีกครั้ง");
        }
    }

    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionCreate() {
        $model = new PaperApproval;
        $file = new FileOther();

        $model->member_id = Yii::app()->user->id;
        $model->paper_no = $this->getPaperNo();
        $model->status = 1;
        $model->create_at = date('Y-m-d H:i:s');

        // Uncomment the following line if AJAX validation is needed
         $this->performAjaxValidation($model);

        if (isset($_POST['PaperApproval']) && isset($_POST['FileOther'])) {
            $model->attributes = $_POST['PaperApproval'];
            $file->attributes = $_POST['FileOther'];

            $file->file = CUploadedFile::getInstance($file, 'file');
            if ($file->file != null) {
                $filename = time() . '.' . $file->file->getExtensionName();
                $file->file->saveAs(Yii::app()->params['pathUpload'] . $filename);
                $model->file = $filename;
            }
            $model->validate();
            if ($model->getErrors() == null) {
                $model->departure_time = Tools::dateToSave($model->departure_time);
                $model->back_time = Tools::dateToSave($model->back_time);
                if ($model->save()) {
                    $paperAccept = new Accept;
                    $paperAccept->paper_id = $model->paper_approval_id;
                    $paperAccept->personnel_id = 0;
                    $paperAccept->status = 1;
                    $paperAccept->use = 1;
                    $paperAccept->type_paper_id = 1;
                    $paperAccept->create_at = date('Y-m-d H:i:s');
                    $paperAccept->save();

                    $this->redirect(array('view', 'id' => $model->paper_approval_id));
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
            'file' => $file,
        ));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        if ($model->status != 1) {
            throw new CHttpException(404, 'ไม่สามารถแก้ไขคำรองได้ เนื่องจากคำร้องได้ผ่านการรับเรื่องแล้ว กรุณาตรวจสอบ');
        }

        $model->departure_time = Tools::DateTimeToShow($model->departure_time, '/', false);
        $model->back_time = Tools::DateTimeToShow($model->back_time, '/', false);
        $file = new FileOther();
//        $startOld = $model->departure_time;
//        $endOld = $model->back_time;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['PaperApproval']) && isset($_POST['FileOther'])) {
            $model->attributes = $_POST['PaperApproval'];
            $file->attributes = $_POST['FileOther'];

            $file->file = CUploadedFile::getInstance($file, 'file');

            $model->validate();
            $file->validate();
            if ($model->getErrors() == null && $file->getErrors() == null) {
                $model->departure_time = Tools::dateToSave($model->departure_time);
                $model->back_time = Tools::dateToSave($model->back_time);
                if ($file->file != null) {
                    if ($model->file != null)
                        if (file_exists(Yii::app()->params['pathUpload'] . $model->file))
                            unlink(Yii::app()->params['pathUpload'] . $model->file);

                    if ($file->file != null) {
                        $filename = time() . '.' . $file->file->getExtensionName();
                        $file->file->saveAs(Yii::app()->params['pathUpload'] . $filename);
                        $model->file = $filename;
                    }
                }

                if ($model->save())
                    $this->redirect(array('view', 'id' => $model->paper_approval_id));
            }
        }

        $this->render('update', array(
            'model' => $model,
            'file' => $file,
        ));
    }

    public function actionDelete($id) {
        $model = $this->loadModel($id);
        if ($model->status != 0)
            throw new CHttpException(404, 'ไม่สามารถลบคำรองได้ เนื่องจากคำร้องได้ผ่านการรับเรื่องแล้ว กรุณาตรวจสอบ');

        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    public function actionAdmin() {
        $model = new PaperApproval('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['PaperApproval']))
            $model->attributes = $_GET['PaperApproval'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = PaperApproval::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'paper-approval-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    protected function getPaperNo() {
        $sString = 'C' . date('Ymd');
        $sql = 'select paper_no  from tbl_paper_approval order by paper_approval_id desc limit 1';
        $model = PaperApproval::model()->findBySql($sql);

        if (!empty($model)) {
            $_data = substr($model->paper_no, 10, 3);
            return $sString . '-' . $this->get0($_data);
        } else
            return $sString . '-001';
    }

    protected function get0($no) {
        $num = $no + 1;
        $d = null;
        for ($i = 1; $i <= (strlen($no) - strlen($num)); $i++) {
            $d .= '0';
        }
        return $d . $num;
    }

}
