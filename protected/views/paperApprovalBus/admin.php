<?php
$this->breadcrumbs = array(
    $this->nameController => array('admin'),
    $this->labelController['Manage'],
);

$this->menu = array(
    array(
        'label' => 'ส่งคำขอใช้รถยนต์ปรับอากาศ',
        'icon' => 'fa-plus',
        'url' => array('create', 'type_car_id' => 1),
    ),
);
?>
<div class="panel panel-default table-responsive">
    <div class="panel-heading">
        <h3><?php echo $this->nameController; ?></h3>
    </div>
    <div class="padding-md clearfix">

        <?php
        $this->renderPartial('_gridview', array(
            'model' => $model,
            'dataProvider' => $model->getByMember(),
        ));
        ?>
    </div>
</div>
