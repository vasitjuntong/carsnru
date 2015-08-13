<?php

class PaperApprovalBusController extends Controller {

    public $layout = '//layouts/main';
    public $nameController = 'คำร้องขอใช้รถบัสปรับอากาศ';
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
        $model = new PaperApprovalBus;
        $file = new FileOther();

        $model->member_id = Yii::app()->user->id;
        $model->paper_no = $this->getPaperNo();
        $model->status = 0;
        $model->create_at = date('Y-m-d H:i:s');
        $service_radio = 0;
        if (isset($_POST['service-radio']))
            $service_radio = $_POST['service-radio'];

        $service_room = 0;
        if (isset($_POST['service_room-radio']))
            $service_room = $_POST['service_room-radio'];


        // Uncomment the following line if AJAX validation is needed
         $this->performAjaxValidation($model);


        if (isset($_POST['PaperApprovalBus']) && isset($_POST['FileOther'])) {
            $model->attributes = $_POST['PaperApprovalBus'];
            $file->attributes = $_POST['FileOther'];

            if ($model->service_charge_cleaning > 500) {
                $model->addError('service_charge_cleaning', 'ครั้งละไม่เกิน 500 บาท');
            }

            if ($service_radio == 0)
                $model->service_charge_out = 0;
            if ($service_radio == 1)
                $model->service_charge_in = 0;

            if ($service_room == 0)
                $model->service_room_multi = 0;
            if ($service_room == 1)
                $model->service_room = 0;

            $file->file = CUploadedFile::getInstance($file, 'file');
            if ($file->file != null) {
                $filename = time() . '.' . $file->file->getExtensionName();
                $file->file->saveAs(Yii::app()->params['pathUpload'] . $filename);
                $model->file = $filename;
            }
            $model->validate();
            $file->validate();
            if ($model->getErrors() == null && $file->getErrors() == null) {
                $model->date_start = Tools::dateToSave($model->date_start);
                $model->date_end = Tools::dateToSave($model->date_end);

                if ($model->save()) {
                    $paperAccept = new Accept;
                    $paperAccept->paper_id = $model->paper_approval_bus_id;
                    $paperAccept->personnel_id = 0;
                    $paperAccept->status = 1;
                    $paperAccept->use = 1;
                    $paperAccept->type_paper_id = 2;
                    $paperAccept->create_at = date('Y-m-d H:i:s');
                    $paperAccept->save();

                    $this->redirect(array('view', 'id' => $model->paper_approval_bus_id));
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
            'file' => $file,
            'service_radio' => $service_radio,
            'service_room' => $service_room,
        ));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        if ($model->status != 0) {
            throw new CHttpException(404, 'ไม่สามารถแก้ไขคำรองได้ เนื่องจากคำร้องได้ผ่านการรับเรื่องแล้ว กรุณาตรวจสอบ');
        }

        $model->date_start = Tools::DateTimeToShow($model->date_start, '/', false);
        $model->date_end = Tools::DateTimeToShow($model->date_end, '/', false);


        $service_radio = 0;
        if ($model->service_charge_out > 0)
            $service_radio = 1;

        $service_room = 0;
        if ($model->service_room_multi > 0)
            $service_room = 1;

        $file = new FileOther();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['PaperApprovalBus']) && isset($_POST['FileOther'])) {
            $model->attributes = $_POST['PaperApprovalBus'];
            $file->attributes = $_POST['FileOther'];

            $service_radio = 0;
            if (isset($_POST['service-radio']))
                $service_radio = $_POST['service-radio'];

            $service_room = 0;
            if (isset($_POST['service_room-radio']))
                $service_room = $_POST['service_room-radio'];

            $file->file = CUploadedFile::getInstance($file, 'file');

            if ($service_radio == 0)
                $model->service_charge_out = 0;
            if ($service_radio == 1)
                $model->service_charge_in = 0;

            if ($service_room == 0)
                $model->service_room_multi = 0;
            if ($service_room == 1)
                $model->service_room = 0;

            $model->validate();
            $file->validate();
            if ($model->getErrors() == null && $file->getErrors() == null) {
                $model->date_start = Tools::dateToSave($model->date_start);
                $model->date_end = Tools::dateToSave($model->date_end);

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
                    $this->redirect(array('view', 'id' => $model->paper_approval_bus_id));
            }
        }

        $this->render('update', array(
            'model' => $model,
            'file' => $file,
            'service_radio' => $service_radio,
            'service_room' => $service_room,
        ));
    }

    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    public function actionAdmin() {
        $model = new PaperApprovalBus('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['PaperApprovalBus']))
            $model->attributes = $_GET['PaperApprovalBus'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = PaperApprovalBus::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'paper-approval-bus-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    protected function getPaperNo() {
        $sString = 'B' . date('Ymd');
        $sql = 'select paper_no  from tbl_paper_approval_bus order by paper_approval_bus_id desc limit 1';
        $model = PaperApprovalBus::model()->findBySql($sql);

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
