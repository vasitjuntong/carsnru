<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'personnel-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
        'autocomplete' => 'off',
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
    echo $form->labelEx($model, 'username', array(
        'class' => 'col-lg-2 control-label',
    ));
    ?>
    <div class="col-lg-2">
        <?php
        echo $form->textField($model, 'username', array(
            'maxlength' => 12,
            'class' => 'form-control',
        ));
        ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>
</div>

<div class="form-group">
    <?php
    echo $form->labelEx($model, 'password', array(
        'class' => 'col-lg-2 control-label',
    ));
    ?>
    <div class="col-lg-2">
        <?php
        echo $form->passwordField($model, 'password', array(
            'maxlength' => 12,
            'class' => 'form-control',
        ));
        ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>
</div>

<div class="form-group">
    <?php
    echo $form->labelEx($model, 'name', array(
        'class' => 'col-lg-2 control-label',
    ));
    ?>
    <div class="col-lg-3">
        <?php
        echo $form->textField($model, 'name', array(
            'maxlength' => 255,
            'class' => 'form-control',
        ));
        ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>
</div>

<div class="form-group">
    <?php
    echo $form->labelEx($model, 'position_id', array(
        'class' => 'col-lg-2 control-label',
    ));
    ?>
    <div class="col-lg-2">
        <?php
        echo $form->dropDownList($model, 'position_id', Lists::position(), array(
            'empty' => $this->labelController['messageSelect'],
            'class' => 'form-control',
        ));
        ?>
        <?php echo $form->error($model, 'position_id'); ?>
    </div>
</div>

<div class="form-group">
    <?php
    echo $form->labelEx($model, 'tel', array(
        'class' => 'col-lg-2 control-label',
    ));
    ?>
    <div class="col-lg-1">
        <?php
        echo $form->textField($model, 'tel', array(
            'maxlength' => 10,
            'class' => 'form-control',
        ));
        ?>
        <?php echo $form->error($model, 'tel'); ?>
    </div>
</div>

<?php if (!$model->isNewRecord): ?>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <?php
            echo CHtml::image(Yii::app()->params['pathUpload'] . $model->pic, '', array(
//                'style' => 'width: 200px;',
//                    'class' => 'form_image',
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
        <?php echo $form->fileField($file, 'file'); ?>
        <?php
        echo $form->error($file, 'file', array(
            'class' => 'form-control',
        ));
        ?>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-offset-2 col-10-lg">
        <?php
        echo CHtml::submitButton($model->isNewRecord ? 'สร้าง' : 'บันทึก', array(
            'class' => 'btn btn-success btn-lg',
        ));
        ?>
    </div>
</div>

<?php $this->endWidget(); ?>