<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'paper-approval-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => true,
    'focus'=>'.error:first',
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
    echo $form->labelEx($model, 'paper_no', array(
        'class' => 'col-lg-2 control-label',
    ));
    ?>
    <div class="col-lg-2">
        <?php
        echo $form->textField($model, 'paper_no', array(
            'maxlength' => 20,
            'class' => 'form-control',
            'readonly' => 'true',
        ));
        ?>
        <?php echo $form->error($model, 'paper_no'); ?>
    </div>
    <?php
    echo $form->labelEx($model, 'code_no', array(
        'class' => 'col-lg-1 control-label',
    ));
    ?>
    <div class="col-lg-2">
        <?php
        echo $form->textField($model, 'code_no', array(
            'maxlength' => 20,
            'class' => 'form-control',
        ));
        ?>
        <?php echo $form->error($model, 'code_no'); ?>
    </div>
</div>

<div class="form-group">
    <?php
    echo $form->labelEx($model, 'responsible', array(
        'class' => 'col-lg-2 control-label'
    ));
    ?>
    <div class="col-lg-2">
        <?php echo $form->textField($model, 'responsible', array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'responsible'); ?>
    </div>
    <?php
    echo $form->labelEx($model, 'tel', array(
        'class' => 'col-lg-1 control-label'
    ));
    ?>
    <div class="col-lg-2">
        <div class="input-group">
            <?php
            echo $form->textField($model, 'tel', array(
                'maxlength' => 255, 'class' => 'form-control',
                'placeholder' => 'เบอร์โทรศัพท์หรือเบอร์โทรภายใน',
            ));
            ?>
            <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
        </div>
        <?php echo $form->error($model, 'tel'); ?>
    </div>
</div>

<div class="form-group">
    <?php
    echo $form->labelEx($model, 'go', array(
        'class' => 'col-lg-2 control-label'
    ));
    ?>
    <div class="col-lg-4">
        <?php echo $form->textArea($model, 'go', array('maxlength' => 255, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'go'); ?>
    </div>

    <?php
    echo $form->labelEx($model, 'request', array(
        'class' => 'col-lg-1 control-label'
    ));
    ?>
    <div class="col-lg-5">
        <?php echo $form->textArea($model, 'request', array('maxlength' => 255, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'request'); ?>
    </div>
</div>

<div class="form-group">
    <?php
    echo $form->labelEx($model, 'length_go', array(
        'class' => 'col-lg-2 control-label'
    ));
    ?>
    <div class="col-lg-2">
        <div class="input-group">
            <?php echo $form->textField($model, 'length_go', array('maxlength' => 255, 'class' => 'form-control')); ?>
            <span class="input-group-addon">กม.</span>
        </div>
        <?php echo $form->error($model, 'length_go'); ?>
    </div>
    <?php
    echo $form->labelEx($model, 'num_person', array(
        'class' => 'col-lg-1 control-label'
    ));
    ?>
    <div class="col-lg-2">
        <div class="input-group">
            <?php echo $form->textField($model, 'num_person', array('maxlength' => 10, 'class' => 'form-control')); ?>
            <span class="input-group-addon">คน</span>
        </div>
        <?php echo $form->error($model, 'num_person'); ?>
    </div>
</div>
<?php
//    Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
?>
<div class="form-group">
    <?php
    echo $form->labelEx($model, 'place_id', array(
        'class' => 'col-lg-2 control-label'
    ));
    ?>
    <div class="col-lg-2">
        <?php
        echo $form->dropDownList($model, 'place_id', Lists::place(), array(
            'empty' => $this->labelController['messageSelect'],
            'class' => 'form-control',
        ));
        ?>
        <?php echo $form->error($model, 'place_id'); ?>
    </div>
</div>
<div class="form-group">
    <?php
    echo $form->labelEx($model, 'departure_time', array(
        'class' => 'col-lg-2 control-label'
    ));
    ?>
    <div class="col-lg-2">
        <div class="input-group">
            <?php
            echo $form->textField($model, 'departure_time', array(
                'class' => 'form-control',
                'id' => 'dpd1',
            ));
            ?>
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        </div>
        <?php echo $form->error($model, 'departure_time'); ?>
    </div>
    <?php
    echo $form->labelEx($model, 'back_time', array(
        'class' => 'col-lg-1 control-label'
    ));
    ?>
    <div class="col-lg-2">
        <div class="input-group">
            <?php
            echo $form->textField($model, 'back_time', array(
                'class' => 'form-control',
                'id' => 'dpd2',
            ));
            ?>
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        </div>
        <?php echo $form->error($model, 'back_time'); ?>
    </div>

    <?php
    echo $form->labelEx($model, 'time_start', array(
        'class' => 'col-lg-1 control-label'
    ));
    ?>
    <div class="col-lg-2">
        <div class="input-group bootstrap-timepicker">
            <?php
            echo $form->textField($model, 'time_start', array(
                'class' => 'form-control timepicker',
            ));
            ?>
            <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
        </div>
        <?php echo $form->error($model, 'time_start'); ?>
    </div>
</div>

<div class="form-group">
    <?php
    echo $form->labelEx($file, 'file', array(
        'class' => 'col-lg-2 control-label'
    ));
    ?>
    <div class="col-lg-10">
        <?php echo $form->fileField($file, 'file'); ?>
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