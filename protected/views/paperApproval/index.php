<?php
$this->breadcrumbs = array(
    $this->nameController => array('admin'),
    'เลือกแบบฟอร์ม',
);
$typeCar = array();
foreach($model as $value){
    $typeCar[$value->type_car] = $value->name;
}
?>

<div class="row">
    <div class="col-md-4 col-md-offset-2">
        <div class="panel panel-default panel-stat1 bg-success">
            <div class="panel-body">
                <div class="value"><?php echo CHtml::link($typeCar[1], array('create', 'type_car_id' => 1)); ?></div>
            </div>
        </div><!-- /panel -->
    </div>
    <div class="col-md-4">
        <div class="panel panel-default panel-stat1 bg-warning">
            <div class="panel-body">
                <div class="value"><?php echo CHtml::link($typeCar[2], array('/paperApprovalBus/create', 'type_car_id' => 2)); ?></div>
            </div>
        </div><!-- /panel -->
    </div>
</div>

