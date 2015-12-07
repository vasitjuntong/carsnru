<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'news-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
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
    echo $form->labelEx($model, 'subject', array(
        'class' => 'col-lg-2 control-label',
    ));
    ?>
    <div class="col-lg-6">
        <?php
        echo $form->textField($model, 'subject', array(
            'maxlength' => 255,
            'class' => 'form-control',
        ));
        ?>
        <?php echo $form->error($model, 'subject'); ?>
    </div>
</div>

<div class="form-group">
    <?php
    echo $form->labelEx($model, 'description', array(
        'class' => 'col-lg-2 control-label',
    ));
    ?>
    <div class="col-lg-6">
        <?php
        echo $form->textArea($model, 'description', array(
            'rows' => 10,
            'class' => 'form-control',
            'id' => 'wysihtml5-textarea',
        ));
        ?>
        <?php echo $form->error($model, 'description'); ?>
    </div>
</div>

<?php if (!$model->isNewRecord): ?>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <?php
            echo CHtml::image(Yii::app()->params['pathUpload'] . $model->pic, '', array(
                'style' => 'width: 400px;',
//                'class' => 'form_image',
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