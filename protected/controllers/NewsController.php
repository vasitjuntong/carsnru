<?php

class NewsController extends Controller {

    public $layout = '//layouts/main';
    public $nameController = 'ข่าวประชาสัมพันธ์';
    public $defaultAction = 'admin';

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
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

    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionCreates() {
        $model = new News;
        $file = new File;

        $model->member_id = Yii::app()->user->id;
        $model->create_at = date('Y-m-d H:i:s');
        $model->update_at = date('Y-m-d H:i:s');

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['News']) && isset($_POST['File'])) {
            $model->attributes = $_POST['News'];
            $file->attributes = $_POST['File'];
            $model->pic = 'noimage.jpg';

            $model->validate();
            $file->validate();

            if ($model->getErrors() == null && $file->getErrors() == null) {

                $file->file = CUploadedFile::getInstance($file, 'file');
                if ($file->file != null) {
                    $filename = time() . '.' . $file->file->getExtensionName();
                    $file->file->saveAs(Yii::app()->params['pathUpload'] . $filename);
                    $model->pic = $filename;
                } else {
                    $model->pic = 'noimage.jpg';
                }

                if ($model->save())
                    $this->redirect(array('view', 'id' => $model->news_id));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'file' => $file,
        ));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $file = new File;

        $model->update_at = date('Y-m-d H:i:s');

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['News']) && isset($_POST['File'])) {
            $model->attributes = $_POST['News'];
            $file->attributes = $_POST['File'];

            $file->file = CUploadedFile::getInstance($file, 'file');
            if ($file->file != null) {
                if (file_exists(Yii::app()->params['pathUpload'] . $model->pic) && $model->pic != 'noimage.jpg')
                    unlink(Yii::app()->params['pathUpload'] . $model->pic);

                if ($file->file != null) {
                    $filename = time() . '.' . $file->file->getExtensionName();
                    $file->file->saveAs(Yii::app()->params['pathUpload'] . $filename);
                    $model->pic = $filename;
                }
            }

            if ($model->save())
                $this->redirect(array('view', 'id' => $model->news_id));
        }

        $this->render('update', array(
            'model' => $model,
            'file' => $file,
        ));
    }

    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    public function actionAdmin() {
        $model = new News('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['News']))
            $model->attributes = $_GET['News'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = News::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'news-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
