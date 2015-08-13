<div class="text-center">
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
<label>เรื่อง</label><abbr class="left-padding">ขออนุญาตใช้รถบัสปรับอากาศ</abbr>
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
<label>ขออนุญาติใช้รถบัสปรับอากาศ ตามรายละเอียดดังนี้</label>
<br />
<div style="width: 70%; float:left;">
    <abbr class="padding-sub">1. ขอใช้บริการเดินทางไป - กลับ จาก</abbr><abbr class="left-padding"><?php echo $model->from_place; ?></abbr>
</div>
<div style="width: 30%; float:left;">
    <abbr>ถึง</abbr><abbr class="left-padding"><?php echo $model->to_place; ?></abbr>
</div>
<abbr class="padding-sub">2. ผู้ควบคุมการใช้รถ</abbr><abbr class="left-padding"><?php echo $model->manager; ?></abbr>
<br/>
<abbr class="padding-sub">3. จุดที่ให้ไปรับ - ส่ง</abbr><abbr class="left-padding"><?php echo $model->place->name; ?></abbr>
<br/>
<div style="width: 70%; float:left;">
    <abbr class="padding-sub">4. จำนวนวันที่ขอใช้บริการ</abbr><abbr class="left-padding"><?php echo $model->days; ?></abbr><span class="left-padding-1">วัน</span>
</div>
<div style="width: 30%; float:left;">
    <abbr>ตั้งแต่วันที่</abbr><abbr class="left-padding"><?php echo Tools::DateTimeToShow($model->date_start, '/'); ?></abbr>
</div>
<div style="width: 70%; float:left;">
    <abbr class="padding-sub">เวลาออกเดินทาง</abbr><abbr class="left-padding"><?php echo date('H : i', strtotime($model->time_start)); ?></abbr><span class="left-padding-1">น.</span>
</div>
<div style="width: 30%; float:left;">
    <abbr>กลับถึงวันที่</abbr><abbr class="left-padding"><?php echo Tools::DateTimeToShow($model->date_end, '/'); ?></abbr>
</div>
<br />
<abbr class="padding-sub">5. ข้าพเจ้ายินดีรับผิดชอบใช้จ่าย เพื่อเป็นการสนับสนุนกิจการของมหาวิทยาลัย  ภายใน 7 วัน  หลังจากเดินทางกลับ  ตามรายละเอียด  ดังนี้</abbr>
<br />
<div style="width: 70%; float:left;">
    <abbr class="padding-sub-1">5.1 ค่าบริการ</abbr>
</div>
<div style="width: 30%; float:left;">
    <abbr>จำนวนเงิน</abbr><abbr class="left-padding">
        <?php
        $total = 0;
        echo number_format($total += ($model->days * $model->service_charge_in) + ($model->days * $model->service_charge_out));
        ?>
    </abbr>
    <span class="left-padding-1">บาท</span>
</div>
<div style="width: 70%; float:left;">
    <abbr class="padding-sub-2">5.1.1 สำหรับบุคคลและหน่วยงานราชการภายในมหาวิทยาลัย</abbr>
</div>
<div style="width: 30%; float:left;">
    <abbr class="left-padding">
        <?php
        echo number_format($model->service_charge_in) . '/วัน';
        ?>
    </abbr>
    <span class="left-padding-1">บาท</span>
</div>
<div style="width: 70%; float:left;">
    <abbr class="padding-sub-2">5.1.2 สำหรับบุคคลและหน่วยงานราชการภายนอกมหาวิทยาลัย</abbr>
</div>
<div style="width: 30%; float:left;">
    <abbr class="left-padding">
        <?php
        echo number_format($model->service_charge_out) . '/วัน';
        ?>
    </abbr>
    <span class="left-padding-1">บาท</span>
</div>
<div style="width: 70%; float:left;">
    <abbr  class="padding-sub-1">5.2 ค่าทำความสะอาดรถยนต์ (ครั้งละ ไม่เกิน 500 บาท)</abbr>
</div>
<div style="width: 30%; float:left;">
    <abbr>จำนวนเงิน</abbr>
    <abbr class="left-padding">
        <?php
        $total += $model->service_charge_cleaning;
        echo $model->service_charge_cleaning;
        ?>
    </abbr>
    <span class="left-padding-1">บาท</span>
</div>
<div style="width: 70%; float:left;">
    <abbr  class="padding-sub-1">5.3 ค่าเบี้ยเลี้ยงพนักงานขับรถ</abbr>
</div>
<div style="width: 30%; float:left;">
    <abbr>จำนวนเงิน</abbr><abbr class="left-padding">
        <?php
        $allowances = ($model->days * $model->allowances_driver) + ($model->days * $model->allowances_employees);
        $total += $allowances;
        echo number_format($allowances);
        ?>
    </abbr>
    <span class="left-padding-1">บาท</span>
</div>
<div style="width: 70%; float:left;">
    <abbr class="padding-sub-2">5.3.1 พนักงานขับรถ</abbr>
</div>
<div style="width: 30%; float:left;">
    <abbr class="left-padding">
        <?php echo number_format($model->allowances_driver); ?>

    </abbr>
    <span class="left-padding-1"> บาท/วัน/คน</span>
</div>
<div style="width: 70%; float:left;">
    <abbr class="padding-sub-2">5.3.2 ผู้ช่วยพนักงานขับรถ</abbr>
</div>
<div style="width: 30%; float:left;">
    <abbr class="left-padding">
        <?php echo number_format($model->allowances_employees); ?>
    </abbr> 
    <span class="left-padding-1"> บาท/วัน/คน</span>
</div>
<div style="width: 70%; float:left;">
    <abbr  class="padding-sub-1">5.4 ค่าที่พัก พนักงานขับรถ</abbr>
</div>
<div style="width: 30%; float:left;">
    <abbr>จำนวนเงิน</abbr><abbr class="left-padding">
        <?php
        $service = ($model->days * $model->service_room) + ($model->days * $model->service_room_multi);
        $total += $service;
        echo number_format($service);
        ?>
    </abbr>
    <span class="left-padding-1">บาท</span>
</div>
<div style="width: 70%; float:left;">
    <abbr class="padding-sub-2">5.4.1 ห้องพักเดี่ยว ไม่เกิน</abbr>
</div>
<div style="width: 30%; float:left;">
    <abbr class="left-padding">
        <?php echo number_format($model->service_room); ?>
    </abbr>
    <span class="left-padding-1"> บาท/คืน/คน</span>
</div>
<div style="width: 70%; float:left;">
    <abbr class="padding-sub-2">5.4.2 ห้องพักคู่ ไม่เกิน</abbr>
</div>
<div style="width: 30%; float:left; padding-bottom: 20px;">
    <abbr class="left-padding">
        <?php echo number_format($model->service_room_multi); ?>
    </abbr> 
    <span class="left-padding-1"> บาท/คืน/คน</span>
</div>
<div class="col-sm-offset-8 col-sm-4">
    <abbr>รวมทั้งสิ้น</abbr>
    <abbr class="left-padding-1">
        <?php echo number_format($total); ?>
    </abbr>
    <span class="left-padding-1">บาท</span>
</div>
<div class="col-sm-offset-6 col-sm-6 text-center" style="margin-top: 30px;">
    <span>(ลงชื่อ)</span>
    <abbr>
        ........................................
    </abbr>
    <span>ผู้ขออนุญาติใช้รถ</span>
</div>
<div class="padding-sub">
    <abbr>6. บันทึกหัวหน้าหน่วยยานพาหนะ</abbr>
</div>
<div class="padding-sub-1">
    <span class="">
        เลขทะเบียน
    </span>
    <abbr class="">
        <?php
        if (!empty($model->paperDetailBusAccept)) {
            echo $model->paperDetailBusAccept->car->license_no;
        } else {
            echo 'test';
        }
        ?>
    </abbr>
</div>
<div class="padding-sub-1">
    <span class="">
        พนักงานขับรถ
    </span>
    <label class="">
        <?php
        if (!empty($model->paperDetailBusAccept)) {
            echo $model->paperDetailBusAccept->car->personnel->name;
        } else {
            echo 'test';
        }
        ?>
    </label>
</div>
<div class="col-sm-offset-6 col-sm-6 text-center" style="margin-top: 20px;">
    <span>ลงชื่อ</span>
    <label class="left_right">
        ........................................
    </label>
</div>
<div class="col-sm-offset-6 col-sm-6 text-center">
    <span>(นายสงวน พรมหมพิภักดิ์)</span>
</div>
<div class="col-sm-offset-6 col-sm-6 text-center">
    <span>หัวหน้าหน่วยยานพาหนะ</span>
</div>
<div class="padding-sub">
    <abbr  class="">7. ความเห็นผูอำนวนการสำนักงานอธิการบดี</abbr>
</div>
<div class="col-sm-offset-6 col-sm-6 text-center" style="margin-top: 20px;">
    <span>ลงชื่อ</span>
    <label class="left_right">
        ........................................
    </label>
</div>
<div class="col-sm-offset-6 col-sm-6 text-center">
    <span>(<?php echo $model->accept2->personnel->name; ?>)</span>
</div>
<div class="col-sm-offset-6 col-sm-6 text-center">
    <span>ผู้อำนวยการกอนโยบายและแผนรักษาการในตำแหน่งผู้อำนวยการสำนักงานอธิการบดี</span>
</div>
<div class="padding-sub">
    <abbr  class="left_padding">8. คำสั่งของอธิการบดี / ผู้ที่ได้รับมอบหมาย</abbr>
</div>
<div class="col-sm-offset-6 col-sm-6 text-center" style="margin-top: 20px;">
    <span>ลงชื่อ</span>
    <label class="left_right">
        ........................................
    </label>
</div>
<div class="col-sm-offset-6 col-sm-6 text-center">
    <span>(<?php echo $model->accept3->personnel->name; ?>)</span>
</div>
<div class="col-sm-offset-6 col-sm-6 text-center">
    <span>อธิการบดีมหาวิทยาลัยราชภัฏสกลนคร</span>
</div>



