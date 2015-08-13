<div class="modal-body">
    <div class="row form-horizontal form-border">
        <div class="form-group ">
            <div style="text-align: center;">
                <img src="img/snru.jpg" width="79" height="93" />
                <br />
                <span class="txtBlackBold">รายละเอียดการขออนุญาตใช้รถยนต์ส่วนกลาง</span><br />
                <span class="txtGraySmall">หน่วยยานภาหนะ มหาวิทยาลัยราชภัฏสกลนคร</span>
            </div>
        </div>
        <hr/>
        <div class="form-group">
            <label class="col-lg-2 text-muted">
                <?php echo $model->getAttributeLabel('paper_no'); ?>
            </label>
            <div class="col-lg-4">
                <?php echo $model->paper_no; ?>
            </div>
            <label class="col-lg-2 text-muted">
                <?php echo $model->getAttributeLabel('create_at'); ?>
            </label>
            <div class="col-lg-4">
                <?php echo Tools::DateTimeToShow($model->create_at, '/', true); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 text-muted">
                <?php echo $model->getAttributeLabel('member_id'); ?>
            </label>
            <div class="col-lg-10">
                <?php echo $model->member->name; ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 text-muted">
                <?php echo $model->getAttributeLabel('tel'); ?>
            </label>
            <div class="col-lg-10">
                <?php echo $model->tel; ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 text-muted">
                <?php echo $model->getAttributeLabel('go'); ?>
            </label>
            <div class="col-lg-4">
                <?php echo $model->go; ?>
            </div>

            <label class="col-lg-2 text-muted">
                <?php echo $model->getAttributeLabel('request'); ?>
            </label>
            <div class="col-lg-4">
                <?php echo $model->request; ?>
            </div>
        </div> 
        <div class="form-group">
            <label class="col-lg-2 text-muted">
                <?php echo $model->getAttributeLabel('length_go'); ?>
            </label>
            <div class="col-lg-10">
                <?php echo $model->length_go; ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 text-muted">
                <?php echo $model->getAttributeLabel('num_person'); ?>
            </label>
            <div class="col-lg-10">
                <?php echo $model->num_person; ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 text-muted">
                <?php echo $model->getAttributeLabel('responsible'); ?>
            </label>
            <div class="col-lg-10">
                <?php echo $model->responsible; ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 text-muted">
                <?php echo $model->getAttributeLabel('place_id'); ?>
            </label>
            <div class="col-lg-10">
                <?php echo $model->place->name; ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 text-muted">
                <?php echo $model->getAttributeLabel('departure_time'); ?>
            </label>
            <div class="col-lg-4">
                <?php echo Tools::DateTimeToShow($model->departure_time, '/', true); ?>
            </div>
            <label class="col-lg-2 text-muted">
                <?php echo $model->getAttributeLabel('back_time'); ?>
            </label>
            <div class="col-lg-4">
                <?php echo Tools::DateTimeToShow($model->back_time, '/', true); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 text-muted">
                <?php echo $model->getAttributeLabel('time_start'); ?>
            </label>
            <div class="col-lg-10">
                <?php echo date('h : i a', strtotime($model->time_start)); ?>
            </div>
        </div>
        <?php if ($model - status != 0) { ?>
            <hr/>
            <?php if ($model->status == 2 && $model->paperDetailAccept != null) { ?>
                <div class = "form-group">
                    <label class = "col-lg-2 text-muted">
                        <?php echo $model->getAttributeLabel('status');
                        ?>
                    </label>
                    <div class="col-lg-4">
                        <?php echo Status::$paper[$model->status]; ?>
                    </div>
                    <label class="col-lg-2 text-muted">
                        <?php echo $model->getAttributeLabel('paperDetailAccept.car.name'); ?>
                    </label>
                    <div class="col-lg-4">
                        <?php echo $model->paperDetailAccept->car->name; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 text-muted">
                        <?php echo $model->getAttributeLabel('paperDetailAccept.create_at'); ?>
                    </label>
                    <div  class="col-lg-4">
                        <?php echo $model->paperDetailAccept->create_at; ?>
                    </div>
                    <label class="col-lg-2 text-muted">
                        <?php echo $model->getAttributeLabel('paperDetailAccept.member.name'); ?>
                    </label>
                    <div  class="col-lg-4">
                        <?php echo $model->paperDetailAccept->member->name; ?>
                    </div>
                </div>
            <?php } ?>
            <?php if ($model->status == 3 && $model->paperDetail != null) { ?>
                <div class = "form-group">
                    <label class = "col-lg-2 text-muted">
                        <?php echo $model->getAttributeLabel('status');
                        ?>
                    </label>
                    <div class="col-lg-4">
                        <?php echo Status::$paper[$model->status]; ?>
                    </div>
                    <label class="col-lg-2 text-muted">
                        <?php echo $model->getAttributeLabel('paperDetail.remark'); ?>
                    </label>
                    <div class="col-lg-4">
                        <?php echo $model->paperDetail->remark; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 text-muted">
                        <?php echo $model->getAttributeLabel('paperDetail.create_at'); ?>
                    </label>
                    <div  class="col-lg-4">
                        <?php echo Tools::DateTimeToShow($model->paperDetail->create_at, '/', true); ?>
                    </div>
                    <label class="col-lg-2 text-muted">
                        <?php echo $model->getAttributeLabel('paperDetail.member.name'); ?>
                    </label>
                    <div  class="col-lg-4">
                        <?php echo $model->paperDetail->member->name; ?>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>
<?php if ($model->status == 0) { ?>
    <div class="modal-footer">
        <?php
        echo CHtml::button('รับเรื่อง', array(
            'onClick' => 'if(confirm("คุณต้องการรับเรื่องหรือไม่?")){window.location="' . CHtml::normalizeUrl(array('accept', 'id' => $model->paper_approval_id)) . '"}',
            'class' => 'btn btn-success btn-sm',
        ));
        ?>
        <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">ยกเลิก</button>
    </div>
    <?php
}
?>
