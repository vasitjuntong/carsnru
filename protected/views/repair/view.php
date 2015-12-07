
<?php
$this->breadcrumbs = array(
    $this->nameController => array('admin'),
    $model->repair_id,
);

$this->menu = array(
    array(
        'label' => $this->labelController['Create'] . $this->nameController,
        'url' => array('create'),
        'icon' => 'fa-plus',
    ),
    array(
        'label' => $this->labelController['Update'] . $this->nameController,
        'url' => array('update', 'id' => $model->repair_id),
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
<div class="col-lg-8 col-lg-offset-2">
    <h2><?php echo $this->labelController['View'] . $this->nameController; ?> # <?php echo $model->repair_id; ?></h2>

    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(
//        'repair_id',
            'car.license_no',
            'personnel.name',
            array(
                'name' => 'amount',
                'value' => number_format($model->amount),
            ),
            array(
                'type' => 'raw',
                'name' => 'file',
                'value' => CHtml::link($model->file, Yii::app()->params['pathUpload'] . $model->file, array(
                    'target' => '_bank'
                )),
            ),
            array(
                'name' => 'create_at',
                'value' => Tools::DateTimeToShow($model->create_at, '/', true),
            ),
            array(
                'name' => 'update_at',
                'value' => Tools::DateTimeToShow($model->update_at, '/', true),
            ),
        ),
    ));
    ?>
</div>