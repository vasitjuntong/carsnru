
<?php
$this->breadcrumbs = array(
    $this->nameController => array('admin'),
    $model->paper_no,
);

$this->menu = array(
    array(
        'label' => 'ส่งคำขอใช้รถยนต์ปรับอากาศ',
        'url' => array('create', 'type_car_id' => 1),
        'icon' => 'fa-plus',
    ),
    array(
        'label' => $this->labelController['Update'] . $this->nameController,
        'url' => array('update', 'id' => $model->paper_approval_bus_id),
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
    <h2><?php echo $this->labelController['View'] . $this->nameController; ?> #  <?php echo $model->paper_no; ?></h2>

    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(
//            'paper_approval_bus_id',
            'member.name',
            'paper_no',
            'from_place',
            'to_place',
            'manager',
            'place.name',
            'days',
            array(
                'name' => 'date_start',
                'value' => Tools::DateTimeToShow($model->date_start, '/', false),
            ),
            array(
                'name' => 'date_end',
                'value' => Tools::DateTimeToShow($model->date_end, '/', false),
            ),
            array(
                'name' => 'time_start',
                'value' => date('h : i a', strtotime($model->time_start)),
            ),
            array(
                'name' => 'service_charge_in',
                'value' => number_format($model->service_charge_in * $model->days),
            ),
            array(
                'name' => 'service_charge_out',
                'value' => number_format($model->service_charge_out * $model->days),
            ),
            array(
                'name' => 'service_charge_cleaning',
                'value' => number_format($model->service_charge_cleaning * $model->days),
            ),
            array(
                'name' => 'allowances_driver',
                'value' => number_format($model->allowances_driver * $model->days),
            ),
            array(
                'name' => 'allowances_employees',
                'value' => number_format($model->allowances_employees * $model->days),
            ),
            array(
                'name' => 'service_room',
                'value' => number_format($model->service_room * $model->days),
            ),
            array(
                'name' => 'service_room_multi',
                'value' => number_format($model->service_room_multi * $model->days),
            ),
            array(
                'name' => 'status',
                'value' => Status::$paper[$model->status] . ($model->accept3 != null ? ' (' . $model->accept3->personnel->name . ')' : ''),
            ),
            array(
                'name' => 'create_at',
                'value' => Tools::DateTimeToShow($model->create_at, '/', true),
            )
        ),
    ));
    $acceptDetail = array();
    $acceptModel = $model->paperDetailBusAccept;
    if ($acceptModel != null) {
        ?>
        <h3>รายละเอียดรถบัสปรับอากาศ</h3>
        <?php
        $acceptDetail = array(
            array(
                'name' => 'car.personnel_id',
                'value' => $acceptModel->car->personnel->name,
            ),
            'car.license_no',
            array(
                'name' => 'create_at',
                'value' => Tools::DateTimeToShow($acceptModel->create_at, '/', true),
            ),
        );
        $this->widget('zii.widgets.CDetailView', array(
            'data' => $acceptModel,
            'attributes' => $acceptDetail,
        ));
    }
    ?>
</div>