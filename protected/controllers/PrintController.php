<?php

class PrintController extends Controller {

    public $layout = '//layouts/print';
    public $nameController = 'พิมพ์เอกสาร';

    public function actionPaper($id) {
        $model = PaperApproval::model()->find(array(
            'condition' => 'paper_approval_id = :paper_id',
            'params' => array(
                ':paper_id' => $id
            ),
        ));

        if (empty($model))
            throw new CHttpException(403, 'ไม่มีข้อมูข กรุณาลองใหม่อีกครั้ง');

        $this->render('paper', array(
            'model' => $model,
        ));
    }

    public function actionPaperBus($id) {
        $model = PaperApprovalBus::model()->find(array(
            'condition' => 'paper_approval_bus_id = :paper_id',
            'params' => array(
                ':paper_id' => $id
            ),
        ));

        if (empty($model))
            throw new CHttpException(403, 'ไม่มีข้อมูข กรุณาลองใหม่อีกครั้ง');

        $this->render('paper_bus', array(
            'model' => $model,
        ));
    }

}
