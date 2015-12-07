
<?php
$this->breadcrumbs = array(
    $this->nameController => array('admin'),
    $model->car_no,
);

$this->menu = array(
    array(
        'label' => $this->labelController['Create'] . $this->nameController,
        'url' => array('create'),
        'icon' => 'fa-plus',
    ),
    array(
        'label' => $this->labelController['Update'] . $this->nameController,
        'url' => array('update', 'id' => $model->car_id),
        'icon' => 'fa-pencil',
    ),
//    array(
//        'label' => $this->labelController['Delete'],
//        'url' => '#',
//        'linkOptions' => array(
//            'submit' => array(
//                'delete',
//                'id' => $model->brand_id
//            ),
//            'confirm' => 'Are you sure you want to delete this item?')
//    ),
    array(
        'label' => $this->labelController['Manage'] . $this->nameController,
        'url' => array('admin'),
        'icon' => 'fa-cog',
    ),
);
?>
<div class="col-lg-offset-2 col-lg-8">
    <h2><?php echo $this->labelController['View'] . $this->nameController; ?> # <?php echo $model->car_no; ?></h2>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(
            array(
                'type' => 'raw',
                'name' => 'pic',
                'value' => CHtml::image(Yii::app()->params['pathUpload'] . $model->pic, '', array(
//                'class' => 'form_image',
                    'style' => 'width: 430px; text-align: center;'
                )),
            ),
            'license_no',
            array(
                'name' => 'date_registration',
                'value' => Tools::DateTimeToShow($model->date_registration, '/', false),
            ),
            'typeCar.name',
            'brand.name',
            'engine_no',
            'personnel.name',
            array(
                'name' => 'create_at',
                'value' => Tools::DateTimeToShow($model->create_at, '/', false),
            ),
        ),
    ));
    ?>
</div>
