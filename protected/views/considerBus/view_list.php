<div class="row">
    <div style="text-align: center;">
        <img src="/img/snru.jpg" width="79" height="93" />
        <br />
        <span class="txtBlackBold">รายละเอียดการขออนุญาตใช้รถยนต์ปรับอากาศ</span><br />
        <span class="txtGraySmall">หน่วยยานภาหนะ มหาวิทยาลัยราชภัฏสกลนคร</span>
    </div>
</div>
<hr/>
<div class="row">
    <label class="col-lg-2 col-lg-offset-7 text-right">
        <?php echo $model->getAttributeLabel('create_at'); ?>
    </label>
    <div class="col-lg-3">
        <?php echo Tools::DateTimeToShow($model->create_at, '/', true); ?>
    </div>
</div>
<div class="row">
    <label class="col-lg-2 col-lg-offset-1 text-right">
        <?php echo $model->getAttributeLabel('member.name'); ?>
    </label>
    <div class="col-lg-2">
        <?php echo $model->member->name; ?>
    </div> 
    <label class="col-lg-1 text-right">
        <?php echo $model->getAttributeLabel('tel'); ?>
    </label>
    <div class="col-lg-2">
        <?php echo $model->tel; ?>
    </div> 
</div>
<hr/>
<div class="row">
    <label class="col-lg-12 text-center">
        ขอใช้บริการเดินทางไป
    </label>
</div>
<div class="row">
    <label class="col-lg-2 col-lg-offset-1 text-right">
        <?php echo $model->getAttributeLabel('from_place'); ?>
    </label>
    <div class="col-lg-4">
        <?php echo $model->from_place; ?>
    </div>
    <label class="col-lg-1 text-right">
        <?php echo $model->getAttributeLabel('to_place'); ?>
    </label>
    <div class="col-lg-4">
        <?php echo $model->to_place; ?>
    </div>
</div>
<div class="row">
    <label class="col-lg-2 col-lg-offset-1 text-right">
        <?php echo $model->getAttributeLabel('manager'); ?>
    </label>
    <div class="col-lg-9">
        <?php echo $model->manager; ?>
    </div> 
</div>
<div class="row">
    <label class="col-lg-2 col-lg-offset-1 text-right">
        <?php echo $model->getAttributeLabel('place.name'); ?>
    </label>
    <div class="col-lg-9">
        <?php echo $model->place->name; ?>
    </div> 
</div>
<div class="row">
    <label class="col-lg-2 col-lg-offset-1 text-right">
        <?php echo $model->getAttributeLabel('days'); ?>
    </label>
    <div class="col-lg-2">
        <?php echo $model->days; ?>
        <span class="text-right"> วัน </span>
    </div>
    <label class="col-lg-1 text-right">
        <?php echo $model->getAttributeLabel('date_start'); ?>
    </label>
    <div class="col-lg-2">
        <?php echo Tools::DateTimeToShow($model->date_start, '/', false); ?>
    </div>
    <label class="col-lg-1 text-right">
        <?php echo $model->getAttributeLabel('date_end'); ?>
    </label>
    <div class="col-lg-2">
        <?php echo Tools::DateTimeToShow($model->date_end, '/', false); ?>
    </div>
</div> 
<div class="row">
    <label class="col-lg-2 col-lg-offset-1 text-right">
        <?php echo $model->getAttributeLabel('time_start'); ?>
    </label>
    <div class="col-lg-9">
        <?php echo $model->time_start; ?>
    </div> 
</div>
<hr/>
<div class="row">
    <label class="col-lg-9 col-lg-offset-1">
        ค่าบริการ
    </label>
    <div class="col-lg-2">
        <?php
        $total = 0;
        echo number_format($total += ($model->days * $model->service_charge_in) + ($model->days * $model->service_charge_out));
        ?>
    </div>
</div>
<div class="row">
    <label class="col-lg-6 col-lg-offset-2">
        สำรหับบุคคลและหน่วยงานราชการภายในมหาวิทยาลัย
    </label>
    <div class="col-lg-2">
        <?php echo number_format($model->service_charge_in); ?>
        <span class="pull-right"> บาท/วัน</span>
    </div>
</div>
<div class="row">
    <label class="col-lg-6 col-lg-offset-2">
        สำรหับบุคคลและหน่วยงานราชการภายนอกมหาวิทยาลัย
    </label>
    <div class="col-lg-2">
        <?php echo number_format($model->service_charge_out); ?>
        <span class="pull-right"> บาท/วัน</span>
    </div>
</div>
<hr/>
<div class="row">
    <label class="col-lg-9 col-lg-offset-1">
        ค่าทำความสะอาดรถยนต์ (ครั้งละ ไม่เกิน 500 บาท)
    </label>
    <div class="col-lg-2">
        <?php
        $total += $model->service_charge_cleaning;
        echo $model->service_charge_cleaning;
        ?>
    </div>
</div>
<hr/>
<div class="row">
    <label class="col-lg-9 col-lg-offset-1">
        ค่าเบี้ยเลี้ยงพนักงานขับรถ
    </label>
    <div class="col-lg-2">
        <?php
        $allowances = ($model->days * $model->allowances_driver) + ($model->days * $model->allowances_employees);
        $total += $allowances;
        echo number_format($allowances);
        ?>
    </div>
</div>
<div class="row">
    <label class="col-lg-6 col-lg-offset-2">
        พนักงานขับรถ
    </label>
    <div class="col-lg-2">
        <?php echo number_format($model->allowances_driver); ?>
        <span class="pull-right"> บาท/วัน/คน</span>
    </div>
</div>
<div class="row">
    <label class="col-lg-6 col-lg-offset-2">
        ผู้ช่วยพนักงานขับรถ
    </label>
    <div class="col-lg-2">
        <?php echo number_format($model->allowances_employees); ?>
        <span class="pull-right"> บาท/วัน/คน</span>
    </div>
</div>
<hr/>
<div class="row">
    <label class="col-lg-9 col-lg-offset-1">
        ค่าที่พัก พนักงานขับรถ
    </label>
    <div class="col-lg-2">
        <?php
        $service = ($model->days * $model->service_room) + ($model->days * $model->service_room_multi);
        $total += $service;
        echo number_format($service);
        ?>
    </div>
</div>
<div class="row">
    <label class="col-lg-6 col-lg-offset-2">
        ห้องพักเดี่ยว ไม่เกิน
    </label>
    <div class="col-lg-2">
        <?php echo number_format($model->service_room); ?>
        <span class="pull-right"> บาท/คืน/คน</span>
    </div>
</div>
<div class="row">
    <label class="col-lg-6 col-lg-offset-2">
        ห้องพักคู่ ไม่เกิน
    </label>
    <div class="col-lg-2">
        <?php echo number_format($model->service_room_multi); ?>
        <span class="pull-right"> บาท/คืน/คน</span>
    </div>
</div>
<hr/>
<div class="row">
    <label class="col-lg-2 col-lg-offset-7 text-right">
        รวมทั้งสิ้น
    </label>
    <div class="col-lg-3">
        <?php echo number_format($total); ?>
        <span class="">&nbsp;&nbsp;บาท</span>
    </div>
</div>
<?php if ($model->accept->status == 1) { ?>
    <div class="panel-default">
        <div class="panel-heading">
            จัดการ
        </div>
        <div class="panel-body">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'accept-form',
                'enableAjaxValidation' => false,
                'htmlOptions' => array(
                    'class' => '',
                ),
            ));
            ?>
            <div class="row">
                <?php echo $form->labelEx($condition, 'condition', array('class' => 'col-lg-3 control-label')); ?>
                <div class="col-lg-7">
                    <label class="label-radio inline">
                        <?php
                        echo $form->radioButton($condition, 'condition', array(
                            'value' => '0',
                            'onClick' => 'JS:$("#no_accept").hide(500);$("#accept").show(500);',
                        ));
                        ?>
                        <span class="custom-radio"></span>
                        อนุมัติ
                    </label>
                    <label class="label-radio inline">
                        <?php
                        echo $form->radioButton($condition, 'condition', array(
                            'value' => '1',
                            'onClick' => 'JS:$("#no_accept").show(500);$("#accept").hide(500);',
                        ));
                        ?>
                        <span class="custom-radio"></span>
                        ไม่อนุมัติ
                    </label>
                </div>
            </div>
            <br/>
            <div class="row" id="no_accept" style="display: none;">
                <?php
                echo $form->labelEx($noAccept, 'remark', array(
                    'class' => 'col-lg-3',
                ));
                ?>
                <div class='col-lg-9'>
                    <?php
                    echo $form->textField($noAccept, 'remark', array(
                        'class' => 'form-control',
                    ));
                    echo $form->error($noAccept, 'remark');
                    ?>
                </div>
            </div>
            <div class="row" id="accept" >
                <?php
                echo $form->labelEx($accept, 'car_id', array(
                    'class' => 'col-lg-3',
                ));
                ?>
                <div class="col-lg-5">
                    <?php
                    echo $form->dropDownList($accept, 'car_id', Lists::car(array(
                                'condition' => 'type_car_id = :type_car_id',
                                'params' => array(
                                    ':type_car_id' => 2,
                                )
                            )), array(
                        'empty' => $this->labelController['messageSelect'],
//                'multiple'
//                    'multiple' => 'multiple',
                        'class' => 'chzn-select form-control',
                    ));
                    echo $form->error($accept, 'car_id');
                    ?>
                </div>
                <input type="hidden" name="paper_approval_id" value="<?php echo $model->paper_approval_bus_id; ?>" />
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
    <div class="modal-footer">
        <?php
        echo CHtml::button('ยืนยัน', array(
            'onClick' => CHtml::ajax(array(
                'dataType' => 'json',
                'type' => 'post',
                'url' => CHtml::normalizeUrl(array('view', 'id' => $model->paper_approval_bus_id)),
                'data' => 'js:$("#accept-form").serialize()',
                'beforeSend' => 'function(){if(confirm("คุณต้องการดำเนินการต่อหรือไม่?"))return true; else return false;}',
                'success' => 'function(data) {
                        if(data.status=="success"){
                            alert(data.message);
                            window.location="' . CHtml::normalizeUrl(array('/consider/index')) . '";
                        }
                         else{
                        $.each(data, function(key, val) {
                            alert(val);
                        });
                        }       
                    }'
            ))
            , 'class' => 'btn btn-success btn-sm'
        ));
        ?>
        <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">ยกเลิก</button>
    </div>
    <?php
}
?>

