<?php
$this->breadcrumbs = array(
    $this->nameController => array('admin'),
    $model->paper_no,
);

$this->menu = array(
    array(
        'label' => 'ส่งคำขอใช้รถยนต์ส่วนกลาง',
        'url'   => array('create'),
        'icon'  => 'fa-plus',
    ),
    array(
        'label' => $this->labelController['Update'] . $this->nameController,
        'url'   => array('update', 'id' => $model->paper_approval_id),
        'icon'  => 'fa-pencil',
    ),
    array(
        'label' => $this->labelController['Manage'] . $this->nameController,
        'url'   => array('admin'),
        'icon'  => 'fa-cog',
    ),
);
?>


<div class="col-lg-offset-2 col-lg-8">
    <h2><?php echo $this->labelController['View'] . $this->nameController; ?> # <?php echo $model->paper_no; ?></h2>

    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data'       => $model,
        'attributes' => array(
//        'paper_approval_id',
            'paper_no',
            array(
                'name'  => 'member_id',
                'value' => $model->member->name,
            ),
            'member.tel',
            'go',
            'request',
            array(
                'name'  => 'length_go',
                'value' => $model->length_go . ' กม.',
            ),
            array(
                'name'  => 'num_person',
                'value' => $model->num_person . ' คน',
            ),
            'responsible',
            'tel',
            array(
                'name'  => 'place_id',
                'value' => $model->place->name,
            ),
            array(
                'name'  => 'departure_time',
                'value' => Tools::DateTimeToShow($model->departure_time, '/', false),
//            'value' => $model->departure_time,
            ),
            array(
                'name'  => 'back_time',
                'value' => Tools::DateTimeToShow($model->back_time, '/', false),
            ),
            array(
                'name'  => 'status',
                'value' => Status::$paper[$model->status] . ($model->acceptDone != null ? ' (' . $model->acceptDone->personnel->name . ')' : ''),
            ),
            array(
                'type'  => 'raw',
                'name'  => 'file',
                'value' => CHtml::link($model->file, Yii::app()->params['pathUploadToShow'] . $model->file, array(
                    'target' => '_blank',
                )),
            ),
            'create_at',
        ),
    ));
    $acceptDetail = array();
    $acceptModel = $model->paperDetailAccept;
    if ($acceptModel != null) {
        ?>
        <h3>รายละเอียดรถยนต์ส่วนกลาง</h3>
        <?php
        $acceptDetail = array(
            array(
                'name'  => 'car.personnel_id',
                'value' => $acceptModel->car->personnel->name,
            ),
            'car.license_no',
            array(
                'name'  => 'create_at',
                'value' => Tools::DateTimeToShow($acceptModel->create_at, '/', true),
            ),
        );
        $this->widget('zii.widgets.CDetailView', array(
            'data'       => $acceptModel,
            'attributes' => $acceptDetail,
        ));
    }
    ?>
    <?php
    if ($model->status == 0) {
        ?>
        <hr/>
        <div class="col-lg-12 text-center">
            <?php
            echo CHtml::button('แก้ไขเอกสาร', array(
                'onClick' => 'window.location="' .
                    Yii::app()->createUrl('paperApproval/update', array(
                        'id' => $model->paper_approval_id,
                    )) . '"',
                'class'   => 'btn btn-info btn-lg',
            ));
            ?>
        </div>
        <?php
    }
    ?>
</div>