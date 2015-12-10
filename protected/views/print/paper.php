<div class="col-sm-12 text-center">
    <h2>บันทึกข้อความ</h2>
</div>
<label>ส่วนราชการ</label><abbr class="left-padding">คณะวิทยาศาสตร์และเทคโนโลยี</abbr>
<br />
<div style="width: 70%; float:left;">
    <label>เลขที่</label><abbr class="left-padding"><?php echo $model->paper_no; ?></abbr>
</div>
<div style="width: 30%; float:left;">
    <label>วัน</label><abbr class="left-padding-1"><?php echo date('d', strtotime($model->create_at)); ?></abbr>

    <label>เดือน</label><abbr class="left-padding-1"><?php echo date('m', strtotime($model->create_at)); ?></abbr>

    <label>ปี</label><abbr class="left-padding-1"><?php echo date('Y', strtotime($model->create_at)) + 543; ?></abbr>
</div>
<label>เรื่อง</label><abbr class="left-padding">ขออนุญาตใช้รถยนต์ส่วนกลาง</abbr>
<br />
<label>เรียน</label><abbr class="left-padding">อธิการบดีมหาวิทยาลัยราชภัฏสกลนคร</abbr>
<br />
<div class="padding-sub" style="width: 70%; float:left;">
    <label>ข้าพเจ้า</label><abbr class="left-padding"><?php echo $model->member->name; ?></abbr>
</div>
<div style="width: 30%; float:left;">
    <label>ตำแหน่ง</label><abbr class="left-padding"><?php echo $model->member->position; ?></abbr>
</div>
<div style="width: 70%; float:left;">
    <label>สังกัด</label><abbr class="left-padding"><?php echo 'คณะวิทยาศาตรและเทคโนโลยี'; ?></abbr>
</div>
<div style="width: 30%; float:left;">
    <label>หมายเลขโทรศัพท์</label><abbr class="left-padding"><?php echo $model->tel; ?></abbr>
</div>
<br />
<label>ของมหาวิทยาลัยราชภัฏสกลนคร ดังมีรายละเอียดต่อไปนี้</label>
<br />
<div style="width: 100%; float:left;">
    <abbr class="padding-sub">๑. ไปราชกาลที่</abbr><abbr class="left-padding"><?php echo $model->go; ?></abbr>
</div>
<br />
<div style="width: 100%; float:left;">
    <abbr class="padding-sub">๒. ความจำเป็นเพื่อ</abbr><abbr class="left-padding"><?php echo $model->request; ?></abbr>
</div>
<br />
<div style="width: 100%; float:left;">
    <abbr class="padding-sub">๓.​ระยะทางไป - กลับ ประมาณ</abbr>
    <abbr class="left-padding"><?php echo $model->length_go; ?></abbr>
    <abbr class="left-padding">กิโลเมตร</abbr>
</div>
<br />
<div style="width: 100%; float:left;">
    <abbr class="padding-sub">๔.​ จำนวนผู้ร่วมเดินทาง</abbr>
    <abbr class="left-padding"><?php echo $model->num_person; ?></abbr>
    <abbr class="left-padding">คน</abbr>
</div>
<br />
<div style="width: 100%; float:left;">
    <abbr class="padding-sub">๕.​ ผู้ควบคุมการใช้รถ/ผู้รับผิดชอบ</abbr>
    <abbr class="left-padding"><?php echo $model->responsible; ?></abbr>
</div>
<br />
<div style="width: 100%; float:left;">
    <abbr class="padding-sub">๖.​ จุดที่ให้ไปรับ</abbr>
    <abbr class="left-padding"><?php echo $model->place->name; ?></abbr>
</div>
<br />
<div style="width: 65%; float:left;">
    <abbr class="padding-sub">๗.​ กำนหดออกเดินทาง เวลา</abbr>
    <abbr class="left-padding"><?php echo date('H:i', strtotime($model->time_start)); ?> น.</abbr>
</div>
<div style="width: 35%; float:left;">
    <abbr class="padding-sub">วันที่</abbr>
    <abbr class="left-padding">
        <?php echo date('d/m', strtotime($model->departure_time)) . '/'. (date('Y', strtotime($model->departure_time)) + 543); ?>
    </abbr>
</div>
<br />
<div style="width: 100%; float:left;">
    <abbr class="padding-sub">๘. กำหนดกลับวันที่</abbr>
    <abbr class="left-padding">
        <?php echo date('d/m', strtotime($model->departure_time)) . '/'. (date('Y', strtotime($model->back_time)) + 543); ?>
    </abbr>
</div>
<br />
<div style="width: 100%; float:left;">
    <abbr class="padding-sub">๙. ใช้งบประมาณ คณะ/สำนัก/ศูนย์</abbr>
    <abbr class="left-padding">

    </abbr>
</div>
<br />
<div style="width: 65%; float:left; margin-top: 50px;">
    <label>๑​. บันทึกหัวหน้าหน่วยยานพาหนะ</label>
    <br />
    <abbr class="padding-sub">ใช้รถยนต์</abbr>
    <abbr class="left-padding">
        <?php
            if (!empty($model->paperDetailAccept)) {
                echo $model->paperDetailAccept->car->license_no;
            }
        ?>
    </abbr>
    <br />
    <abbr class="padding-sub">พนักงานขับรถ</abbr>
    <abbr class="left-padding">
        <?php
        if (!empty($model->paperDetailAccept)) {
            echo $model->paperDetailAccept->car->personnel->name;
        }
        ?>
    </abbr>
    <div class="padding-sub" style="margin-top: 50px;">
        <span>ลงชื่อ</span>
        <label class="left_right left-padding">
            <?php echo $model->acceptBosscar->personnel->name; ?>
        </label>
    </div>
    <div class="padding-sub">
        <span class="left-padding">(<?php echo $model->acceptBosscar->personnel->name; ?>)</span>
    </div>
</div>

<?php if($model->acceptDone != null){ ?>
    <div style="width: 35%; float:left; margin-top: 50px;">
        <?php if($model->status == 4){ ?>
            <label>๒. อนุญาติ</label>
        <?php }else{ ?>
            <label>๒. ไม่อนุญาติ</label>
        <?php } ?>
            <br />
            <div class="padding-sub">
                <span class=""><?php echo $model->acceptDone->personnel->position->name; ?></span>
            </div>
            <br>
            <div class="padding-sub" style="margin-top: 50px;">
                <span>ลงชื่อ</span>
                <label class="left_right left-padding">
                    <?php echo $model->acceptDone->personnel->name; ?>
                </label>
            </div>
            <div class="padding-sub">
                <span class="left-padding">(<?php echo $model->acceptDone->personnel->name; ?>)</span>
            </div>
    </div>
<?php } ?>
<br>

<div style="width: 100%; float:left; margin-top: 50px;">
    <label>บันทึกเจ้าหน้าที่รักษาความปลอดภัย</label>
    <br />
    <div class="padding-sub" style="margin-top: 20px;">
        <span>ลงชื่อ</span>
        <label class="left-padding">
            ........................................
        </label>
        <label class="left-padding">
            เจ้าหน้าที่รักษาความปลอดภัย
        </label>
        <br/>
        <label class="left-padding">
            (........................................)
        </label>
    </div>
</div>
