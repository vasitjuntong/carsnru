<li class="openable">
    <a href="#">
        <span class="menu-icon">
            <i class="fa fa-file-text fa-lg"></i> 
        </span>
        <span class="text">
            ข้อมูลพื้นฐาน
        </span>
        <span class="menu-hover"></span>
    </a>
    <ul class="submenu">
        <li><a href="<?php echo Yii::app()->createUrl('/car'); ?>"><span class="submenu-label">ข้อมูลรถยนต์ส่วนกลาง</span></a></li>
        <li><a href="<?php echo Yii::app()->createUrl('/personnel'); ?>">
                <span class="submenu-label">
                    ข้อมูลบุคคลากร
                </span>
            </a>
        </li>
        <li><a href="<?php echo Yii::app()->createUrl('/position'); ?>"><span class="submenu-label">ข้อมูลตำแหน่ง</span></a></li>
        <li><a href="<?php echo Yii::app()->createUrl('/typeCar'); ?>"><span class="submenu-label">ข้อมูลประเภทรถยนต์</span></a></li>
        <li><a href="<?php echo Yii::app()->createUrl('/brand'); ?>"><span class="submenu-label">ข้อมูลยี่ห้อ</span></a></li>
        <li><a href="<?php echo Yii::app()->createUrl('/place'); ?>"><span class="submenu-label">ข้อมูลจุดนัดขึ้นรถ</span></a></li>
        <li><a href="<?php echo Yii::app()->createUrl('/news'); ?>"><span class="submenu-label">ข่าวประชาสัมพันธ์</span></a></li>
    </ul>
</li>