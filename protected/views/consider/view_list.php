<div class="modal-body">
    <div class="row form-horizontal form-border">
        <div class="form-group">
            <div style="text-align: center;">
                <img src="/img/snru.jpg" width="79" height="93" />
                <br />
                <span class="txtBlackBold">รายละเอียดการขออนุญาตใช้รถยนต์ส่วนกลาง</span><br />
                <span class="txtGraySmall">หน่วยยานภาหนะ มหาวิทยาลัยราชภัฏสกลนคร</span>
            </div>
        </div>
        <hr/>
        <div class="form-group">
            <div class="col-lg-2 text-muted">
                <?php echo $model->getAttributeLabel('paper_no'); ?>
            </div>
            <div class="col-lg-4">
                <?php echo $model->paper_no; ?>
            </div>
            <div class="col-lg-2 text-muted">
                <?php echo $model->getAttributeLabel('create_at'); ?>
            </div>
            <div class="col-lg-4">
                <?php echo Tools::DateTimeToShow($model->create_at, '/', true); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-2 text-muted">
                <?php echo $model->getAttributeLabel('member_id'); ?>
            </div>
            <div class="col-lg-10">
                <?php echo $model->member->name; ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-2 text-muted">
                <?php echo $model->getAttributeLabel('tel'); ?>
            </div>
            <div class="col-lg-10">
                <?php echo $model->tel; ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-2 text-muted">
                <?php echo $model->getAttributeLabel('go'); ?>
            </div>
            <div class="col-lg-4">
                <?php echo $model->go; ?>
            </div>

            <div class="col-lg-2 text-muted">
                <?php echo $model->getAttributeLabel('request'); ?>
            </div>
            <div class="col-lg-4">
                <?php echo $model->request; ?>
            </div>
        </div> 
        <div class="form-group">
            <div class="col-lg-2 text-muted">
                <?php echo $model->getAttributeLabel('length_go'); ?>
            </div>
            <div class="col-lg-10">
                <?php echo $model->length_go; ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-2 text-muted">
                <?php echo $model->getAttributeLabel('num_person'); ?>
            </div>
            <div class="col-lg-10">
                <?php echo $model->num_person; ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-2 text-muted">
                <?php echo $model->getAttributeLabel('responsible'); ?>
            </div>
            <div class="col-lg-10">
                <?php echo $model->responsible; ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-2 text-muted">
                <?php echo $model->getAttributeLabel('place_id'); ?>
            </div>
            <div class="col-lg-10">
                <?php echo $model->place->name; ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-2 text-muted">
                <?php echo $model->getAttributeLabel('departure_time'); ?>
            </div>
            <div class="col-lg-10">
                <?php echo Tools::DateTimeToShow($model->departure_time, '/', true); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-2 text-muted">
                <?php echo $model->getAttributeLabel('back_time'); ?>
            </div>
            <div class="col-lg-10">
                <?php echo Tools::DateTimeToShow($model->back_time, '/', true); ?>
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
                    <div class="form-group">
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
                    <div class="form-group" id="no_accept" style="display: none;">
                        <?php
                        echo $form->labelEx($noAccept, 'remark', array(
                            'class' => 'col-lg-3 control-label',
                        ));
                        ?>
                        <div class='col-lg-7'>
                            <?php
                            echo $form->textField($noAccept, 'remark', array(
                                'class' => 'form-control',
                            ));
                            echo $form->error($noAccept, 'remark');
                            ?>
                        </div>
                    </div>
                    <div class="form-group" id="accept" >
                        <?php
                        echo $form->labelEx($accept, 'car_id', array(
                            'class' => 'col-lg-3 control-label',
                        ));
                        ?>
                        <div class="col-lg-7">
                            <?php
                            echo $form->dropDownList($accept, 'car_id', Lists::car(array(
                                        'condition' => 'type_car_id = :type_car_id',
                                        'params' => array(
                                            ':type_car_id' => 1,
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
                        <input type="hidden" name="paper_approval_id" value="<?php echo $model->paper_approval_id; ?>" />
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
            <!--</div>-->
        </div>
    </div>
    <div class="modal-footer">
        <?php
        echo CHtml::button('ยืนยัน', array(
            'onClick' => CHtml::ajax(array(
                'dataType' => 'json',
                'type' => 'post',
                'url' => CHtml::normalizeUrl(array('view', 'id' => $model->paper_approval_id)),
                'data' => 'js:$("#accept-form").serialize()',
                'beforeSend' => 'function(){if(confirm("คุณต้องการดำเนินการต่อหรือไม่?"))return true; else return false;}',
                'success' => 'function(data) {
                        if(data.status=="success"){
                            alert(data.message);
                            window.location="' . CHtml::normalizeUrl(array('index')) . '";
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
<?php } ?>



