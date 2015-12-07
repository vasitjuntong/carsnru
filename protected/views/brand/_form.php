<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'brand-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'class' => 'form-horizontal form-border',
    ),
        ));
?>
<?php
//echo $form->errorSummary($model, Yii::app()->params['errorSummaryHeader'], '', array(
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
            'size' => 100,
            'maxlength' => 255,
            'class' => 'form-control',
        ));
        ?>
        <?php
        echo $form->error($model, 'name', array(
        ));
        ?>
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