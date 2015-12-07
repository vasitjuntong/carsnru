
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'paper-approval-bus-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => true,
    'focus' => '.error:first',
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
        'class' => 'form-horizontal form-border',
    ),
        ));
?>


<?php // echo $form->errorSummary($model); ?>

<div class="form-group">
    <?php
    echo $form->labelEx($model, 'paper_no', array(
        'class' => 'col-lg-2 control-label',
    ));
    ?>
    <div class="col-lg-2">
        <?php
        echo $form->textField($model, 'paper_no', array(
            'maxlength' => 100,
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
    echo $form->labelEx($model, 'manager', array(
        'class' => 'col-lg-2 control-label'
    ));
    ?>
    <div class="col-lg-2">
        <?php
        echo $form->textField($model, 'manager', array(
            'class' => 'form-control',
            'maxlength' => 50
        ));
        ?>
        <?php echo $form->error($model, 'manager'); ?>
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
                'placeholder' => 'เบอร์โทรศัพท์หรือเบอร์ภายใน',
            ));
            ?>
            <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
        </div>
        <?php echo $form->error($model, 'tel'); ?>
    </div>
</div>
<div class="form-group">
    <?php
    echo $form->labelEx($model, 'from_place', array(
        'class' => 'col-lg-2 control-label'
    ));
    ?>
    <div class="col-lg-4">
        <?php echo $form->textArea($model, 'from_place', array('maxlength' => 255, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'from_place'); ?>
    </div>

    <?php
    echo $form->labelEx($model, 'to_place', array(
        'class' => 'col-lg-1 control-label'
    ));
    ?>
    <div class="col-lg-5">
        <?php echo $form->textArea($model, 'to_place', array('maxlength' => 255, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'to_place'); ?>
    </div>
</div>

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
    echo $form->labelEx($model, 'days', array(
        'class' => 'col-lg-2 control-label'
    ));
    ?>
    <div class="col-lg-1">
        <div class="input-group">
            <?php
            echo $form->textField($model, 'days', array(
                'class' => 'form-control',
            ));
            ?>
            <span class="input-group-addon">วัน</span>
        </div>
        <?php echo $form->error($model, 'days'); ?>
    </div>

    <?php
    echo $form->labelEx($model, 'date_start', array(
        'class' => 'col-lg-1 control-label'
    ));
    ?>
    <div class="col-lg-2">
        <div class="input-group">
            <?php
            echo $form->textField($model, 'date_start', array(
                'class' => 'form-control',
                'id' => 'dpd1',
            ));
            ?>
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        </div>
        <?php echo $form->error($model, 'date_start'); ?>
    </div>
    <?php
    echo $form->labelEx($model, 'date_end', array(
        'class' => 'col-lg-1 control-label'
    ));
    ?>
    <div class="col-lg-2">
        <div class="input-group">
            <?php
            echo $form->textField($model, 'date_end', array(
                'class' => 'form-control',
                'id' => 'dpd2',
            ));
            ?>
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        </div>
        <?php echo $form->error($model, 'date_end'); ?>
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
    <label class="col-lg-2 control-label">ประเภทบริการ</label>
    <div class="col-lg-10">
        <label class="label-radio inline">
            <input type="radio" name="service-radio" id="service_in_radio" value="0" <?php echo $service_radio == 0 ? 'checked' : null; ?>>
            <span class="custom-radio"></span>
            <?php
            echo $model->getAttributeLabel('service_charge_in');
            ?>
        </label>
        <label class="label-radio inline">
            <input type="radio" name="service-radio" id="service_out_radio" value="1"  <?php echo $service_radio == 1 ? 'checked' : null; ?>>
            <span class="custom-radio"></span>
            <?php
            echo $model->getAttributeLabel('service_charge_out');
            ?>
        </label>
    </div><!-- /.col -->
</div>
<div class="form-group">
    <div id="service_in">
        <?php
        echo $form->labelEx($model, 'service_charge_in', array(
            'class' => 'col-lg-2 control-label'
        ));
        ?>
        <div class="col-lg-2">
            <div class="input-group">
                <?php
                echo $form->textField($model, 'service_charge_in', array(
                    'class' => 'form-control',
                    'maxlength' => 11,
                    'placeholder' => 'ไม่เกิน 3,000 บาท',
                ));
                ?>
                <span class="input-group-addon">บาท</span>
            </div>
            <?php echo $form->error($model, 'service_charge_in'); ?>
        </div>
    </div>
    <div id="service_out" style="display: none">
        <?php
        echo $form->labelEx($model, 'service_charge_out', array(
            'class' => 'col-lg-2 control-label'
        ));
        ?>
        <div class="col-lg-2">
            <div class="input-group">
                <?php
                echo $form->textField($model, 'service_charge_out', array(
                    'class' => 'form-control',
                    'maxlength' => 11,
                    'placeholder' => 'ไม่เกิน 4,000 บาท',
                ));
                ?>
                <span class="input-group-addon">บาท</span>
            </div>
            <?php echo $form->error($model, 'service_charge_out'); ?>
        </div>
    </div>
    <?php
    echo $form->labelEx($model, 'service_charge_cleaning', array(
        'class' => 'col-lg-2 control-label'
    ));
    ?>
    <div class="col-lg-2">
        <div class="input-group">
            <?php
            echo $form->textField($model, 'service_charge_cleaning', array(
                'class' => 'form-control',
                'maxlength' => 11,
                'placeholder' => 'ครั้งละไม่เกิน 500 บาท',
            ));
            ?>
            <span class="input-group-addon">บาท</span>
        </div>
        <?php echo $form->error($model, 'service_charge_cleaning'); ?>
    </div>
</div>

<div class="form-group">
    <?php
    echo $form->labelEx($model, 'allowances_driver', array(
        'class' => 'col-lg-2 control-label'
    ));
    ?>
    <div class="col-lg-2">
        <div class="input-group">
            <?php echo $form->textField($model, 'allowances_driver', array('class' => 'form-control', 'maxlength' => 11)); ?>
            <span class="input-group-addon">บาท</span>
        </div>
        <?php echo $form->error($model, 'allowances_driver'); ?>
    </div>

    <?php
    echo $form->labelEx($model, 'allowances_employees', array(
        'class' => 'col-lg-2 control-label'
    ));
    ?>
    <div class="col-lg-2">
        <div class="input-group">
            <?php echo $form->textField($model, 'allowances_employees', array('class' => 'form-control', 'maxlength' => 11)); ?>
            <span class="input-group-addon">บาท</span>
        </div>
        <?php echo $form->error($model, 'allowances_employees'); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg-2 control-label">ประเภทโรงแรม</label>
    <div class="col-lg-10">
        <label class="label-radio inline">
            <input type="radio" name="service_room-radio" id="service_room-radio"  value="0"  <?php echo $service_room == 0 ? 'checked' : null; ?>>
            <span class="custom-radio"></span>
            <?php
            echo $model->getAttributeLabel('service_room');
            ?>
        </label>
        <label class="label-radio inline">
            <input type="radio" name="service_room-radio" id="service_room_multi-radio"  value="1"  <?php echo $service_room == 1 ? 'checked' : null; ?>>
            <span class="custom-radio"></span>
            <?php
            echo $model->getAttributeLabel('service_room_multi');
            ?>
        </label>
    </div><!-- /.col -->
</div>

<div class="form-group">
    <div id="service_room">
        <?php
        echo $form->labelEx($model, 'service_room', array(
            'class' => 'col-lg-2 control-label'
        ));
        ?>
        <div class="col-lg-2">
            <div class="input-group">
                <?php
                echo $form->textField($model, 'service_room', array(
                    'class' => 'form-control',
                    'maxlength' => 11,
                    'placeholder' => 'ไม่เกิน 800 บาท / คน / คืน',
                ));
                ?>
                <span class="input-group-addon">บาท</span>
            </div>
            <?php echo $form->error($model, 'service_room'); ?>
        </div>
    </div>
    <div id="service_room_multi" style="display: none;">
        <?php
        echo $form->labelEx($model, 'service_room_multi', array(
            'class' => 'col-lg-2 control-label'
        ));
        ?>
        <div class="col-lg-2">
            <div class="input-group">
                <?php
                echo $form->textField($model, 'service_room_multi', array(
                    'class' => 'form-control',
                    'maxlength' => 11,
                    'placeholder' => 'ไม่เกิน 1,200 บาท / คืน',
                ));
                ?>
                <span class="input-group-addon">บาท</span>
            </div>
            <?php echo $form->error($model, 'service_room_multi'); ?>
        </div>
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
    <div class="col-lg-10 col-lg-offset-2">
        <?php
        echo CHtml::submitButton($model->isNewRecord ? 'สร้าง' : 'บันทึก', array(
            'class' => 'btn btn-success btn-lg'
        ));
        ?>
    </div>
</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">
    $(document).ready(function() {
        if ($('#service_in_radio').is(':checked')) {
            $("div#service_in").show();
            $("div#service_out").hide();
            $("#PaperApprovalBus_service_charge_out").val('');
        }
        if ($('#service_out_radio').is(':checked')) {
            $("div#service_in").hide();
            $("div#service_out").show();
            $("#PaperApprovalBus_service_charge_in").val('');
        }
        if ($('#service_room-radio').is(':checked')) {
            $("div#service_room").show();
            $("div#service_room_multi").hide();
            $("#PaperApprovalBus_service_room_multi").val('');
        }
        if ($('#service_room_multi-radio').is(':checked')) {
            $("div#service_room").hide();
            $("div#service_room_multi").show();
            $("#PaperApprovalBus_service_room").val('');
        }


        $("#service_in_radio").click(function() {
            $("div#service_in").show();
            $("div#service_out").hide();
        });
        $("#service_out_radio").click(function() {
            $("div#service_in").hide();
            $("div#service_out").show();
        });
        $("#service_room-radio").click(function() {
            $("div#service_room").show();
            $("div#service_room_multi").hide();
        });
        $("#service_room_multi-radio").click(function() {
            $("div#service_room").hide();
            $("div#service_room_multi").show();
        });


    });
</script>