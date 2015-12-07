<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'type-car-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'class' => 'form-horizontal form-border',
    ),
        ));
?>


<?php
//echo $form->errorSummary(array($model), Yii::app()->params['errorSummaryHeader'], '', array(
//    'class' => 'alert alert-danger',
//));
?>

<div class="form-group">
    <?php
    echo $form->labelEx($model, 'name', array(
        'class' => 'col-lg-2 control-label',
    ));
    ?>
    <div class="col-lg-3">
        <?php
        echo $form->textField($model, 'name', array(
            'maxlength' => 50,
            'class' => 'form-control'
        ));
        ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-10 col-lg-offset-2">
        <?php
        echo CHtml::submitButton($model->isNewRecord ? 'สร้าง' : 'บันทึก', array(
            'class' => 'btn btn-success btn-lg',
        ));
        ?>
    </div>
</div>
<?php $this->endWidget(); ?>