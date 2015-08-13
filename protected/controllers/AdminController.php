<?php

class AdminController extends Controller {
    public $layout = '//layouts/main';
    public $nameController = 'หนัาแรกระบบบุคคลากร';
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }
    
    public function actionIndex(){
        if(Yii::app()->user->isGuest){
            $this->redirect(array('login'));
        }
        
        $this->render('index');
    }

    public function actionLogin() {
        $this->layout = '//layouts/login';
        $model = new LoginFormBack;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginFormBack'])) {
            $model->attributes = $_POST['LoginFormBack'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate()) {
                if ($model->login())
                    $this->redirect(array('index'));
            }
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

}
