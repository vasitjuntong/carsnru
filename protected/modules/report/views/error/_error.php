<?php
echo CHtml::errorSummary($models, Yii::app()->params['errorSummaryHeader'], '', array(
    'class' => 'alert alert-danger',
));
?>