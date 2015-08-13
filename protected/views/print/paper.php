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
<br />ของมหาวิทยาลัยราชภัฏสกลนคร ดังมีรายละเอียดต่อไปนี้</label>
<br />
