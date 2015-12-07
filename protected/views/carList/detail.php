<?php

echo CHtml::image(Yii::app()->params['pathUpload'] . $data->pic, '', array(
    'style' => 'width: 600px;'
));

$model = Car::model()->findByPk($data->car_id);
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'license_no',
        array(
            'name' => 'date_registration',
            'value' => Tools::DateTimeToShow($model->create_at, '/', false),
        ),
        'brand.name',
        'engine_no',
        'personnel.name',
        array(
            'name' => 'create_at',
            'value' => Tools::DateTimeToShow($model->create_at, '/', false),
        ),
    ),
));
