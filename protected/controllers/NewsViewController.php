<?php
class NewsViewController extends Controller{

	public function actionView($id){
		$model = News::model()->find($id);

		$this->render('view', array(
			'model' => $model,
		));
	}
}
?>