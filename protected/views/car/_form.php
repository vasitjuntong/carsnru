<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'car-form',
    'enableAjaxValidation' => true,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
        'class' => 'form-horizontal form-border',
    ),
        ));
?>
<?php
//echo $form->errorSummary(array($model, $file), Yii::app()->params['errorSummaryHeader'], '', array(
//    'class' => 'alert alert-danger',
//));
?>
<div class="form-group">
    <?php
    echo $form->labelEx($model, 'license_no', array(
        'class' => 'col-lg-2 control-label',
    ));
    ?>
    <div class="col-lg-2">
        <?php
        echo $form->textField($model, 'license_no', array(
            'maxlength' => 100,
            'class' => 'form-control input-sm',
        ));
        ?>
        <?php
        echo $form->error($model, 'license_no', array(
        ));
        ?>
    </div><!-- /.col -->
    <!--    </div>
        <div class="form-group">-->
    <?php
    echo $form->labelEx($model, 'date_registration', array(
        'class' => 'col-lg-1 control-label',
    ));
    ?>
    <div class="col-lg-2">
        <div class="input-group">
            <?php
            echo $form->textField($model, 'date_registration', array(
                'maxlength' => 100,
                'class' => 'form-control datepicker',
            ));
            ?>
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        </div>
        <?php
        echo $form->error($model, 'date_registration', array(
        ));
        ?>
    </div>
</div> 
<div class="form-group">
    <?php
    echo $form->labelEx($model, 'type_car_id', array(
        'class' => 'col-lg-2 control-label',
    ));
    ?>
    <div class="col-lg-2">
        <?php
        echo $form->dropDownList($model, 'type_car_id', Lists::typeCars(), array(
            'class' => 'form-control  chzn-select',
            'empty' => $this->labelController['messageSelect'],
        ));
        ?>
        <?php echo $form->error($model, 'type_car_id'); ?>
    </div>
    <?php
    echo $form->labelEx($model, 'brand_id', array(
        'class' => 'col-lg-1 control-label',
    ));
    ?>
    <div class="col-lg-2">
        <?php
        echo $form->dropDownList($model, 'brand_id', Lists::brand(), array(
//                'empty' => $this->labelController['messageSelect'],
            'empty' => $this->labelController['messageSelect'],
//                'multiple' => 'multiple',
            'class' => 'form-control chzn-select'
        ));
        ?>
        <?php echo $form->error($model, 'brand_id'); ?>
    </div>
    <?php
    echo $form->labelEx($model, 'car_no', array(
        'class' => 'col-lg-1 control-label',
    ));
    ?>
    <div class="col-lg-2">
        <?php
        echo $form->textField($model, 'car_no', array(
            'maxlength' => 20,
            'class' => 'form-control'
        ));
        ?>
        <?php echo $form->error($model, 'car_no'); ?>
    </div>
</div>

<div class="form-group">
    <?php
    echo $form->labelEx($model, 'engine_no', array(
        'class' => 'col-lg-2 control-label',
    ));
    ?>
    <div class="col-lg-2">
        <?php
        echo $form->textField($model, 'engine_no', array(
            'maxlength' => 100,
            'class' => 'form-control',
        ));
        ?>
        <?php echo $form->error($model, 'engine_no'); ?>
    </div>

    <?php
    echo $form->labelEx($model, 'personnel_id', array(
        'class' => 'col-lg-1 control-label',
    ));
    ?>
    <div class="col-lg-2">
        <?php
        echo $form->dropDownList($model, 'personnel_id', Lists::personnel(array(
            'condition' => 'position_id in(1, 2, 3, 7)',
        )), array(
            'empty' => $this->labelController['messageSelect'],
            'class' => 'form-control chzn-select',
        ));
        ?>
        <?php echo $form->error($model, 'personnel_id'); ?>
    </div>
</div>
<?php if (!$model->isNewRecord): ?>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-4">
            <?php
            echo CHtml::image(Yii::app()->params['pathUpload'] . $model->pic, '', array(
//                'style' => 'width: 200px;',
                'class' => 'form_image',
            ));
            ?>
        </div>
    </div>
<?php endif; ?>
<div class="form-group">
    <?php
    echo $form->labelEx($file, 'file', array(
        'class' => 'col-lg-2 control-label',
    ));
    ?>
    <div class="col-lg-10">
        <?php
        echo $form->fileField($file, 'file', array(
        ));
        ?>
        <?php echo $form->error($file, 'file'); ?>
    </div>
</div>
<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
        <?php
        echo CHtml::submitButton($model->isNewRecord ? 'สร้าง' : 'บันทึก', array(
            'class' => 'btn btn-success btn-lg',
        ));
        ?>
    </div>
</div>
<?php $this->endWidget(); ?>