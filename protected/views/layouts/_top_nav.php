<div id="top-nav" class="skin-6 fixed">
    <div class="brand">
        <a href="<?php echo Yii::app()->createUrl('/'); ?>" class="text-white">
            <span><?php echo Yii::app()->name; ?></span>
            <span class="text-toggle">SNRU</span>
        </a>
    </div><!-- /brand -->
    <button type="button" class="navbar-toggle pull-left" id="sidebarToggle">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <ul class="nav-notification clearfix">
        <?php
        if (Yii::app()->user->getState('backEnd') && !Yii::app()->user->isAdmin()):
            if (Yii::app()->user->getMemberProfile()->position_id == 1) {
                $this->renderPartial('//layouts/topNav/_boss_car', array());
            }
            if (Yii::app()->user->getMemberProfile()->position_id == 4 || Yii::app()->user->getMemberProfile()->position_id == 5) {
                $this->renderPartial('//layouts/topNav/_ractor_or_vicerector', array());
            }
            ?>
        <?php endif; ?>
        <li class="profile dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <?php if (Yii::app()->user->getState('backEnd')) { ?>
                    <strong><?php echo Yii::app()->user->getMemberProfile()->position->name; ?></strong>
                <?php } else { ?>
                    <strong><?php echo Yii::app()->user->getMemberProfile()->position . ' ' . Yii::app()->user->getMemberProfile()->faculty; ?></strong>
                <?php } ?>
                <span><i class="fa fa-chevron-down"></i></span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a class="clearfix" href="<?php echo Yii::app()->createUrl('/admin'); ?>">
                        <?php if (Yii::app()->user->getState('backEnd')) { ?>
                            <img src="/upload/<?php echo Yii::app()->user->getMemberProfile()->pic; ?>" alt="User Avatar">
                        <?php } else { ?>
                            <img src="/img/user2.jpg" alt="User Avatar">
                        <?php } ?>
                        <div class="detail">
                            <strong><?php echo Yii::app()->user->getMemberProfile()->name; ?></strong>
                            <?php if (!Yii::app()->user->isAdmin() && !Yii::app()->user->getState('backEnd')) { ?>
                                    <!--<p class="grey"><?php // echo Yii::app()->user->getMemberProfile()->email;  ?></p>--> 
                            <?php } ?>
                        </div>
                    </a>
                </li>
<!--                <li><a tabindex="-1" href="profile.html" class="main-link"><i class="fa fa-edit fa-lg"></i> Edit profile</a></li>
                <li><a tabindex="-1" href="gallery.html" class="main-link"><i class="fa fa-picture-o fa-lg"></i> Photo Gallery</a></li>
                <li><a tabindex="-1" href="#" class="theme-setting"><i class="fa fa-cog fa-lg"></i> Setting</a></li>-->
                <li class="divider"></li>
                <li><a tabindex="-1" class="main-link logoutConfirm_open" href="#logoutConfirm"><i class="fa fa-lock fa-lg"></i> ออกจากระบบ</a></li>
            </ul>
        </li>
    </ul>
</div><!-- /top-nav-->

