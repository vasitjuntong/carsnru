<style>
    .fancybox-title{
        color: #ffffff;
    }
</style>
<div class="row">
    <div class="span3">
        <!-- Filter -->
        <nav id="options" class="work-nav">
            <ul id="filters" class="option-set" data-option-key="filter">
                <li class="type-work">การบริการ</li>
                <li><a href="#filter" data-option-value="*" class="selected">ข้อมูลทั้งหมด</a></li>
                <li><a href="#filter" data-option-value=".car">รถยนต์ส่วนกลาง</a></li>
                <li><a href="#filter" data-option-value=".car_bus">รถบัสบรับอากาศ</a></li>
                <li><a href="#filter" data-option-value=".driver">พนักงานขับรถ</a></li>
            </ul>
        </nav>
        <!-- End Filter -->
    </div>

    <div class="span9">
        <div class="row">
            <section id="projects">
                <ul id="thumbs">

                    <?php
                    $cars = Car::model()->car()->findAll();
                    foreach ($cars as $car) {
                        ?>
                        <li class="item-thumbs span3 car">
                            <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                            <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="<?php echo $car->typeCar->name; ?>" href="<?php echo Yii::app()->params['pathUpload'] . $car->pic; ?>">
                                <span class="overlay-img"></span>
                                <span class="overlay-img-thumb font-icon-plus"></span>
                            </a>
                            <!-- Thumb Image and Description -->
                            <img src="<?php echo Yii::app()->params['pathUpload'] . $car->pic; ?>" alt="ทะเบียน : <?php echo $car->license_no; ?>">
                        </li>
                        <?php
                    }
                    ?>

                    <?php
                    $drivers = Personnel::model()->driver()->findAll();
                    foreach ($drivers as $driver) {
                        ?>
                        <li class="item-thumbs span3 driver">
                            <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                            <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="พนักงานขับรถ" href="<?php echo Yii::app()->params['pathUpload'] . $driver->pic; ?>">
                                <span class="overlay-img"></span>
                                <span class="overlay-img-thumb font-icon-plus"></span>
                            </a>
                            <!-- Thumb Image and Description -->
                            <img src="<?php echo Yii::app()->params['pathUpload'] . $driver->pic; ?>" 
                                 alt="ชื่อ : <?php echo $driver->name; ?> <br/>โทรศัพท์ : <?php echo $driver->tel; ?><br/>ตำแหน่ง : <?php echo $driver->position->name; ?>" 
                                 width="270px"
                                 >
                        </li>
                        <?php
                    }
                    ?>

                    <?php
                    $carBuss = Car::model()->car_bus()->findAll();
                    foreach ($carBuss as $carBus) {
                        ?>
                        <li class="item-thumbs span3 car_bus">
                            <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                            <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="<?php echo $carBus->typeCar->name; ?>" href="<?php echo Yii::app()->params['pathUpload'] . $carBus->pic; ?>">
                                <span class="overlay-img"></span>
                                <span class="overlay-img-thumb font-icon-plus"></span>
                            </a>
                            <!-- Thumb Image and Description -->
                            <img src="<?php echo Yii::app()->params['pathUpload'] . $carBus->pic; ?>" alt="ทะเบียน : <?php echo $carBus->license_no; ?>">
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </section>

        </div>
    </div>
</div>