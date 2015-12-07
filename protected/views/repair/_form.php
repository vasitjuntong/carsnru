<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'repair-form',
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


    <?php // echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php
        echo $form->labelEx($model, 'car_id', array(
            'class' => 'col-lg-2 control-label',
        ));
        ?>
        <div class="col-lg-2">
            <?php
            echo $form->dropDownList($model, 'car_id', Lists::car(), array(
                'empty' => $this->labelController['messageSelect'],
                'class' => 'form-control',
            ));
            ?>
            <?php echo $form->error($model, 'car_id'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php
        echo $form->labelEx($model, 'amount', array(
            'class' => 'col-lg-2 control-label',
        ));
        ?>
        <div class="col-lg-1">
            <?php
            echo $form->textField($model, 'amount', array(
                'maxlength' => 11,
                'class' => 'form-control',
            ));
            ?>
            <?php echo $form->error($model, 'amount'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php
        echo $form->labelEx($file, 'file', array(
            'class' => 'col-lg-2 control-label',
        ));
        ?>
        <div class="col-lg-2">
            <?php echo $form->fileField($file, 'file', array()); ?>
            <?php echo $form->error($file, 'file'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'สร้าง' : 'บันทึก', array(
                'class' => 'btn btn-success btn-lg',
            )); ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->