<aside class="fixed skin-6">				
    <div class="sidebar-inner scrollable-sidebar">
        <div class="size-toggle">
            <a class="btn btn-sm" id="sizeToggle">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="btn btn-sm pull-right logoutConfirm_open"  href="#logoutConfirm">
                <i class="fa fa-power-off"></i>
            </a>
        </div><!-- /size-toggle -->	
        <div class="user-block clearfix">
            <?php if (Yii::app()->user->getState('backEnd')) { ?>
                <img src="/upload/<?php echo Yii::app()->user->getMemberProfile()->pic; ?>" alt="User Avatar">
            <?php } else { ?>
                <img src="/img/user2.jpg" alt="User Avatar">
            <?php } ?>
            <div class="detail">
                <strong><?php echo Yii::app()->user->getMemberProfile()->name; ?></strong>
                <ul class="list-inline">
                    <!--<li><a href="profile.html">Profile</a></li>-->
                    <!--<li><a href="inbox.html" class="no-margin">Inbox</a></li>-->
                </ul>
            </div>
        </div><!-- /user-block -->
        <!--        <div class="search-block">
                    <div class="input-group">
                        <input type="text" class="form-control input-sm" placeholder="search here...">
                        <span class="input-group-btn">
                            <button class="btn btn-default btn-sm" type="button"><i class="fa fa-search"></i></button>
                        </span>
                    </div> /input-group 
                </div> /search-block -->
        <div class="main-menu">
            <ul>
                <?php
                if (Yii::app()->user->isAdmin()):
                    $this->renderPartial('//layouts/menu/_data_center');
                    $this->renderPartial('//layouts/menu/_paper_done');
                    ?>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('/repair'); ?>">
                            <span class="menu-icon">
                                <i class="fa fa-wrench fa-lg"></i> 
                            </span>
                            <span class="text">
                                ส่งซ่อม
                            </span>
                            <span class="menu-hover"></span>
                        </a>
                    </li>
                    <?php
                endif;
                if (Yii::app()->user->getState('backEnd') && Yii::app()->user->isBossCar()):
                    $this->renderPartial('//layouts/menu/_boss_car');
                endif;
                if (Yii::app()->user->getState('backEnd') && Yii::app()->user->isRector()):
                    $this->renderPartial('//layouts/menu/_rector');
                endif;
                if (Yii::app()->user->getState('backEnd') && Yii::app()->user->isViceRector()):
                    $this->renderPartial('//layouts/menu/_vice_rector');
                endif;
                if (Yii::app()->user->getState('backEnd')):
                    $this->renderPartial('//layouts/menu/_report');
                endif;
                ?>

                <?php if (!Yii::app()->user->isAdmin() && !Yii::app()->user->getState('backEnd')): ?>
                    <li class="openable">
                        <a href="#">
                            <span class="menu-icon">
                                <i class="fa fa-file-text fa-lg"></i> 
                            </span>
                            <span class="text">
                                ร้องขอ
                            </span>
                            <span class="menu-hover"></span>
                        </a>
                        <ul class="submenu">
                            <li><a href="<?php echo Yii::app()->createUrl('/paperApproval/index'); ?>">ขออนุญาตใช้รถยนต์ส่วนกลาง</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('/paperApproval'); ?>">รายการขออนุญาตใช้รถยนต์ส่วนกลาง</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('/paperApprovalBus/admin'); ?>">รายการขออนุญาตใช้รถบัสปรับอากาศ</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                <li>
                    <a href="<?php echo Yii::app()->createUrl('/calendar'); ?>">
                        <span class="menu-icon">
                            <i class="fa fa-calendar fa-lg"></i> 
                        </span>
                        <span class="text">
                            ตารางเดินรถ
                        </span>
                        <span class="menu-hover"></span>
                    </a>
                </li>
            </ul>
            <div class="alert alert-info">
                ยินดีต้อนรับ
            </div>
        </div><!-- /main-menu -->
    </div><!-- /sidebar-inner scrollable-sidebar -->
</aside>