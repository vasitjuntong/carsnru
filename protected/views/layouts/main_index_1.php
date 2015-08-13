<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>หน่วยยานพาหนะ มหาวิทยาลัยราชภัฏสกลนคร</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet">

        <!-- Pace -->
        <link href="css/pace.css" rel="stylesheet">

        <!-- Endless -->
        <link href="css/endless.min.css" rel="stylesheet">
        <link href="css/endless-landing.min.css" rel="stylesheet">

    </head>

    <body class="overflow-hidden">
        <!-- Overlay Div -->
        <div id="overlay" class="transparent"></div>

        <div id="wrapper" class="preload">
            <header class="navbar navbar-fixed-top bg-white">
                <div class="container">
                    <div class="navbar-header">
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="#" class="navbar-brand"><span class="text-danger"> หน่วยยานพาหนะ</span> มหาวิทยาลัยราชภัฏสกลนคร</a>
                    </div>
                    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#landing-content" class="top-link">หน้าแรก</a>
                            </li>
                            <li>
                                <a href="#feature" class="top-link">เกี่ยวกับเรา</a>
                            </li>
                            <li>
                                <a href="#portfolio" class="top-link">ข่าวประชาสัมพันธ์</a>
                            </li>
                            <li>
                                <a href="#pricing" class="top-link">ตารางการเดินรถ</a>
                            </li>
                            <li>
                                <a href="#contact" class="top-link">ติดต่อเรา</a>
                            </li>
                            <?php if (Yii::app()->user->isGuest) { ?>
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('site/login'); ?>" class="top-link">เข้าสู่ระบบ</a>
                                </li>
                                <?php
                            } else {
                                ?>
                                <li>
                                    <a class="dropdown-toggle top-link" data-toggle="dropdown" href="#">
                                        <strong><?php echo Yii::app()->user->name; ?></strong>
                                        <span><i class="fa fa-chevron-down"></i></span>
                                    </a>

                                    <?php if (!Yii::app()->user->isAdmin()) { ?>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="clearfix" href="#">
                                                    <img src="img/user2.jpg" alt="User Avatar">
                                                    <div class="detail">
                                                        <strong><?php echo Yii::app()->user->getMemberProfile()->name; ?></strong>
                                                        <p class="grey"><?php echo Yii::app()->user->getMemberProfile()->email; ?></p> 
                                                    </div>
                                                </a>
                                            </li>
                                            <li><a tabindex="-1" href="#" class="main-link"><i class="fa fa-edit fa-lg"></i> Edit profile</a></li>
                                            <li><a tabindex="-1" href="#" class="main-link"><i class="fa fa-picture-o fa-lg"></i> Photo Gallery</a></li>
                                            <li><a tabindex="-1" href="#" class="theme-setting"><i class="fa fa-cog fa-lg"></i> ตั้งค่า</a></li>
                                            <li class="divider"></li>
                                            <li><a tabindex="-1" class="main-link logoutConfirm_open" href="<?php echo Yii::app()->createUrl('site/logout'); ?>"><i class="fa fa-lock fa-lg"></i> ลงชื่อออก</a></li>
                                        </ul>
                                    <?php } else {
                                        ?>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="clearfix" href="#">
                                                    <img src="img/user2.jpg" alt="User Avatar">
                                                    <div class="detail">
                                                        <strong><?php echo Yii::app()->user->getMemberProfile()->name; ?></strong>
                                                    </div>
                                                </a>
                                            </li>
                                            <li><a tabindex="-1" href="#" class="main-link"><i class="fa fa-edit fa-lg"></i> Edit profile</a></li>
                                            <li><a tabindex="-1" href="#" class="main-link"><i class="fa fa-picture-o fa-lg"></i> Photo Gallery</a></li>
                                            <li><a tabindex="-1" href="#" class="theme-setting"><i class="fa fa-cog fa-lg"></i> ตั้งค่า</a></li>
                                            <li class="divider"></li>
                                            <li><a tabindex="-1" class="main-link logoutConfirm_open" href="<?php echo Yii::app()->createUrl('site/logout'); ?>"><i class="fa fa-lock fa-lg"></i> ลงชื่อออก</a></li>
                                        </ul>
                                    <?php }
                                    ?>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </header>

            <div id="landing-content">
                <div id="main-slider" class="carousel slide bg-dark" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                        <li data-target="#main-slider" data-slide-to="1"></li>
                        <li data-target="#main-slider" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="img/gallery1.jpg" alt="" class="img-background">
                            <div class="row">
                                <div class="col-md-6 text-right">
                                    <h2 class="m-top-lg m-right-md text-white fadeInDownLarge animation-delay3">หน่วยยานพาหนะ มหาวิทยาลัยราชภัฏสกลนคร</h2>
                                    <p class="text-white fadeInUpLarge animation-delay6 m-right-md hidden-xs">หน่วยยานพาหนะ งานอาคารสถานที่และยานพาหนะกองกลาง </p>
                                    <p class="text-white fadeInUpLarge animation-delay6 m-right-md hidden-xs">สำนักงานอธิการบดี มหาวิทยาลัยราชภัฏสกลนคร</p>
                                    <a href="index.html" class="btn btn-default btn-lg fadeInLeftLarge animation-delay8 m-bottom-lg m-right-md">Find Out More</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="img/gallery10.jpg" alt="" class="img-background">
                            <div class="row">
                                <div class="col-xs-6 text-right">
                                    <img src="img/responsive.png" alt="responsive" class="fadeInLeftLarge animation-delay6 m-top-lg m-bottom-lg">
                                </div>
                                <div class="col-xs-6">
                                    <h2 class="m-top-lg text-white fadeInDownLarge animation-delay3">วิสัยทัศน์</h2>
                                    <p class="text-white fadeInUpLarge animation-delay6 hidden-xs">
                                        หน่วยยานพาหนะเป็นหน่วยงานที่ให้บริการทางรถยนต์ 
                                        ด้วยความพร้อมด้านยานพาหนะและพนักงานขับรถ<br/>
                                        รวมไปถึงความสะดวกสบาย และความพึงพอใจในการให้บริการ 
                                    </p>
                                    <a href="index.html" class="btn btn-danger btn-lg fadeInRightLarge animation-delay8">Live Preview <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="img/gallery14.jpg" alt="" class="img-background">
                            <div class="row text-center">
                                <h2 class="m-top-lg text-warning fadeInDownLarge animation-delay3">บริการรวดเร็ว  ฉับไว  ปลอดภัย  ทันต่อเวลา</h2>
                                <p class="text-white fadeInUpLarge animation-delay6 hidden-xs">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br/>
                                    Vestibulum auctor suscipit lobortis.
                                </p>
                                <a href="#" class="btn btn-default btn-lg fadeInLeftLarge animation-delay8">ขอใช้รถยนต์ส่วนกลาง</a>
                                <a href="index.html" class="btn btn-danger btn-lg fadeInRightLarge animation-delay8">Find Out More</a>	
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#main-slider" data-slide="prev">
                        <span class="fa fa-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#main-slider" data-slide="next">
                        <span class="fa fa-chevron-right"></span>
                    </a>
                </div>

                <div class="bg-white content-padding text-center font-lg">
                    <div class="container">
                        <span class="m-right-sm">ENDLESS ADMIN IS A BEAUTIFUL, POWERFUL TEMPLATE WITH CLEAN DESIGN</span>
                        <div class="inline-block m-top-sm">
                            <a href="#" class="btn btn-success btn-lg m-bottom-sm"><i class="fa fa-tag"></i> PURCHASE NOW</a>
                            <a href="index.html" class="btn btn-danger btn-lg m-bottom-sm fadeInRightLarge animation-delay2">LIVE PREVIEW <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="bg-light padding-md" id="feature">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4 content-padding">
                                <div class="feature-icon text-center ">
                                    <i class="fa fa-bold fa-4x"></i>
                                </div>
                                <div class="text-center font-lg">
                                    <h3>Bootstrap 3</h3>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor suscipit lobortis. Sed quis ipsum risus. Mauris vitae justo non felis pulvinar rhoncus. In quis massa ut risus sagittis luctus.</p>
                            </div><!-- /.col -->
                            <div class="col-sm-4 content-padding">
                                <div class="feature-icon text-center">
                                    <i class="fa fa-html5 fa-4x"></i>
                                </div>
                                <div class="text-center font-lg">
                                    <h3>HTML5 & CSS3</h3>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor suscipit lobortis. Sed quis ipsum risus. Mauris vitae justo non felis pulvinar rhoncus. In quis massa ut risus sagittis luctus.</p>
                            </div><!-- /.col -->
                            <div class="col-sm-4 content-padding">
                                <div class="feature-icon text-center">
                                    <i class="fa fa-tag fa-4x"></i>
                                </div>
                                <div class="text-center font-lg">
                                    <h3>Flat Design</h3>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor suscipit lobortis. Sed quis ipsum risus. Mauris vitae justo non felis pulvinar rhoncus. In quis massa ut risus sagittis luctus.</p>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div>
                </div>

                <div class="padding-md">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4 content-padding">
                                <div class="feature-icon text-center">
                                    <i class="fa fa-tablet fa-4x"></i>
                                </div>
                                <div class="text-center font-lg">
                                    <h3>Responsive Design</h3>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor suscipit lobortis. Sed quis ipsum risus. Mauris vitae justo non felis pulvinar rhoncus. In quis massa ut risus sagittis luctus.</p>
                            </div><!-- /.col -->
                            <div class="col-sm-4 content-padding">
                                <div class="feature-icon text-center">
                                    <i class="fa fa-magic fa-4x"></i>
                                </div>
                                <div class="text-center font-lg">
                                    <h3>Lightweight</h3>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor suscipit lobortis. Sed quis ipsum risus. Mauris vitae justo non felis pulvinar rhoncus. In quis massa ut risus sagittis luctus.</p>
                            </div><!-- /.col -->
                            <div class="col-sm-4 content-padding">
                                <div class="feature-icon text-center">
                                    <i class="fa fa-check fa-4x"></i>
                                </div>
                                <div class="text-center font-lg">
                                    <h3>Browser Compatibility</h3>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor suscipit lobortis. Sed quis ipsum risus. Mauris vitae justo non felis pulvinar rhoncus. In quis massa ut risus sagittis luctus.</p>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div>
                </div>
                <div class="bg-white text-center content-padding">
                    <div class="container">
                        <h3>The Perfect Canvas For Your Design</h3>
                        <h5 class="text-muted">Super Powerful & Easy to Use Theme</h5>
                        <div class="seperator"></div>
                        <div class="seperator"></div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales at. Nulla tellus elit, varius non commodo eget, mattis vel eros. In sed ornare nulla. Donec consectetur, velit a pharetra ultricies, diam lorem lacinia risus, ac commodo orci erat eu massa. Sed sit amet nulla ipsum. Donec felis mauris, vulputate sed tempor at, aliquam a ligula. Pellentesque non pulvinar nisi...
                        </p>
                        <a href="#" class="btn btn-lg btn-success animated-element fadeInUp no-animation">PURCHASE NOW</a>
                        <hr/>

                        <img src="img/screenshot.jpg" alt="" class="fadeInRightLarge no-animation animated-element m-top-md animation-delay1">

                    </div>
                </div>

                <div id="portfolio">
                    <div class="section-header">
                        <hr class="left visible-lg">
                        <span>
                            PORTFOLIO PROJECTS
                        </span>
                        <hr class="right visible-lg">
                    </div>

                    <div class="container">
                        <div class="row recent-work">
                            <div class="col-sm-3">		
                                <div class="detail fadeInUp animated-element no-animation">
                                    <a href="#" class="hoverBorder">
                                        <span class="hoverBorderWrapper">
                                            <img src="img/gallery2.jpg" alt="portfolio">
                                            <span class="hoverBorderInner"></span>
                                            <span class="readMore">+ Read more</span>
                                        </span>	
                                    </a>
                                    <div class="seperator"></div>
                                    <p>
                                    <h4>Responsive Design</h4>
                                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales at.</small> 
                                    <p>
                                </div><!--detail-->
                            </div><!--col-->
                            <div class="col-sm-3">
                                <div class="detail fadeInUp animated-element no-animation animation-delay2">
                                    <a href="#" class="hoverBorder">
                                        <span class="hoverBorderWrapper">
                                            <img src="img/gallery8.jpg" alt="portfolio">
                                            <span class="hoverBorderInner"></span>
                                            <span class="readMore">+ Read more</span>
                                        </span>	
                                    </a>
                                    <div class="seperator"></div>
                                    <p>
                                    <h4>HTML5 &amp; CSS3</h4>
                                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales at.</small> 
                                    <p>
                                </div><!--detail-->
                            </div><!--col-->
                            <div class="col-sm-3">
                                <div class="detail fadeInUp animated-element no-animation animation-delay4">
                                    <a href="#" class="hoverBorder">
                                        <span class="hoverBorderWrapper">
                                            <img src="img/gallery12.jpg" alt="portfolio">
                                            <span class="hoverBorderInner"></span>
                                            <span class="readMore">+ Read more</span>
                                        </span>	
                                    </a>
                                    <div class="seperator"></div>
                                    <p>
                                    <h4>Unlimited Theme color</h4>
                                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales at.</small> 
                                    <p>
                                </div><!--detail-->
                            </div><!--col-->
                            <div class="col-sm-3">
                                <div class="detail fadeInUp animated-element no-animation animation-delay6">
                                    <a href="#" class="hoverBorder">
                                        <span class="hoverBorderWrapper">
                                            <img src="img/gallery14.jpg" alt="portfolio">
                                            <span class="hoverBorderInner"></span>
                                            <span class="readMore">+ Read more</span>
                                        </span>	
                                    </a>
                                    <div class="seperator"></div>
                                    <p>
                                    <h4>Browser Compatibility</h4>
                                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales at.</small> 
                                    <p>
                                </div><!--detail-->
                            </div><!--col-->
                            <div class="col-sm-3">
                                <div class="detail fadeInUp animated-element no-animation "> <a href="#" class="hoverBorder"> <span class="hoverBorderWrapper"> <img src="img/gallery8.jpg" alt="portfolio"> <span class="hoverBorderInner"></span> <span class="readMore">+ Read more</span> </span> </a>
                                    <div class="seperator"></div>
                                    <p>                            
                                    <h4>HTML5 &amp; CSS3</h4>
                                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales at.</small>
                                    <p>                            
                                </div>
                                <!--detail-->
                            </div>
                            <div class="col-sm-3">
                                <div class="detail fadeInUp animated-element no-animation animation-delay2"> <a href="#" class="hoverBorder"> <span class="hoverBorderWrapper"> <img src="img/gallery8.jpg" alt="portfolio"> <span class="hoverBorderInner"></span> <span class="readMore">+ Read more</span> </span> </a>
                                    <div class="seperator"></div>
                                    <p>                          
                                    <h4>HTML5 &amp; CSS3</h4>
                                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales at.</small>
                                    <p>                          
                                </div>
                                <!--detail-->
                            </div>
                            <div class="col-sm-3">
                                <div class="detail fadeInUp animated-element no-animation animation-delay4"> <a href="#" class="hoverBorder"> <span class="hoverBorderWrapper"> <img src="img/gallery8.jpg" alt="portfolio"> <span class="hoverBorderInner"></span> <span class="readMore">+ Read more</span> </span> </a>
                                    <div class="seperator"></div>
                                    <p>                          
                                    <h4>HTML5 &amp; CSS3</h4>
                                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales at.</small>
                                    <p>                          
                                </div>
                                <!--detail-->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-light" id="pricing">
                    <div class="container">
                        <div class="padding-md">
                            <div class="section-header">
                                <hr class="left visible-lg">
                                <span>
                                    PRICING PLAN
                                </span>
                                <hr class="right visible-lg">
                            </div>
                        </div><!-- /.padding -->

                        <div class="row row-merge">
                            <div class="col-md-3 col-sm-6">
                                <div class="pricing-widget fadeInUp animated-element no-animation">
                                    <div class="pricing-head">
                                        Basic
                                    </div>
                                    <div class="pricing-body">
                                        <div class="pricing-cost">
                                            <strong class="block">$19</strong>
                                            <small>per month</small>
                                        </div>
                                        <ul class="pricing-list text-center">
                                            <li><a class="btn btn-sm btn-default">Start your free trial!</a></li>
                                            <li>Amount of space <strong>10 GB</strong></li>
                                            <li>Bandwidth per month <strong>100 GB</strong></li>
                                            <li>No. of email accounts <strong>1</strong></li>
                                            <li>No. of MySql database <strong>1</strong></li>
                                            <li>24/7 Unlimited Support <strong>YES</strong></li>
                                            <li>Support Tickets per month <strong>1</strong></li>
                                            <li class="text-center"><a href="#" class="btn btn-default btn-success">Buy Now</a></li>
                                        </ul>
                                    </div>
                                </div><!-- /pricing-widget -->
                            </div><!-- /.col -->
                            <div class="col-md-3 col-sm-6">
                                <div class="pricing-widget active fadeInUp animated-element no-animation animation-delay2">
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon-inner shadow-pulse bg-danger">
                                            Hot
                                        </div>
                                    </div>
                                    <div class="pricing-head">
                                        Professional
                                    </div>
                                    <div class="pricing-body">
                                        <div class="pricing-cost">
                                            <strong class="block"><span class="font-12">$</span>39</strong>
                                            <small>per month</small>
                                        </div>
                                        <ul class="pricing-list text-center">
                                            <li><a class="btn btn-sm btn-default">Start your free trial!</a></li>
                                            <li>Amount of space <strong>30 GB</strong></li>
                                            <li>Bandwidth per month <strong>200 GB</strong></li>
                                            <li>No. of email accounts <strong>10</strong></li>
                                            <li>No. of MySql database <strong>10</strong></li>
                                            <li>24/7 Unlimited Support <strong>YES</strong></li>
                                            <li>Support Tickets per month <strong>3</strong></li>
                                            <li class="text-center"><a href="#" class="btn btn-default btn-success">Buy Now</a></li>
                                        </ul>
                                    </div>
                                </div><!-- /pricing-widget -->
                            </div><!-- /.col -->
                            <div class="col-md-3 col-sm-6">
                                <div class="pricing-widget fadeInUp animated-element no-animation animation-delay4">
                                    <div class="pricing-head">
                                        Business
                                    </div>
                                    <div class="pricing-body">
                                        <div class="pricing-cost">
                                            <strong class="block">$59</strong>
                                            <small>per month</small>
                                        </div>
                                        <ul class="pricing-list text-center">
                                            <li><a class="btn btn-sm btn-default">Start your free trial!</a></li>
                                            <li>Amount of space <strong>100 GB</strong></li>
                                            <li>Bandwidth per month <strong>500 GB</strong></li>
                                            <li>No. of email accounts <strong>50</strong></li>
                                            <li>No. of MySql database <strong>50</strong></li>
                                            <li>24/7 Unlimited Support <strong>YES</strong></li>
                                            <li>Support Tickets per month <strong>5</strong></li>
                                            <li class="text-center"><a href="#" class="btn btn-default btn-success">Buy Now</a></li>
                                        </ul>
                                    </div>
                                </div><!-- /pricing-widget -->
                            </div><!-- /.col -->
                            <div class="col-md-3 col-sm-6">
                                <div class="pricing-widget fadeInUp animated-element no-animation animation-delay6">
                                    <div class="pricing-head">
                                        Unlimited
                                    </div>
                                    <div class="pricing-body">
                                        <div class="pricing-cost">
                                            <strong class="block">$79</strong>
                                            <small>per month</small>
                                        </div>
                                        <ul class="pricing-list text-center">
                                            <li><a class="btn btn-sm btn-default">Start your free trial!</a></li>
                                            <li>Amount of space <strong>200 GB</strong></li>
                                            <li>Bandwidth per month <strong>800 GB</strong></li>
                                            <li>No. of email accounts <strong>100</strong></li>
                                            <li>No. of MySql database <strong>80</strong></li>
                                            <li>24/7 Unlimited Support <strong>YES</strong></li>
                                            <li>Support Tickets per month <strong>8</strong></li>
                                            <li class="text-center"><a href="#" class="btn btn-default btn-success">Buy Now</a></li>
                                        </ul>
                                    </div>
                                </div><!-- /pricing-widget -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container -->
                </div><!-- /pricing -->

                <div class="bg-white">
                    <div class="text-center content-padding" id="contact">

                        <div class="container">
                            <h3>NEWSLETTER SIGNUP</h3>
                            <p class="m-bottom-md">Subscribing to our newsletter you will always be update with the latest news from us.</p>

                            <form class="form-inline content-padding">
                                <div class="form-group">
                                    <label class="sr-only">Email address</label>
                                    <input type="text" class="form-control input-lg" placeholder="Email Address" id="newsletter">
                                </div>
                                <a href="#" class="btn btn-lg btn-info">Subscribe</a>
                            </form>
                        </div>
                    </div>
                </div>



                <div class="content-padding bg-light">
                    <div class="container">
                        <div class="panel">
                            <div class="panel-body content-padding">
                                <div class="pull-left">
                                    <p class="font-lg">Endless Admin is a fully responsive admin template</p>
                                    <p class="text-muted">built with Bootstrap 3.0 Framework, modern web technology HTML5 and CSS3.</p>
                                </div>
                                <a href="#" class="btn btn-lg btn-danger pull-right m-top-xs fadeInLeftLarge no-animation animated-element animation-delay1">PURCHASE NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /landing-content -->

            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3 padding-md">
                            <p class="font-lg">About Our Company</p>
                            <p><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor suscipit lobortis.</small></p>
                        </div><!-- /.col -->
                        <div class="col-sm-3 padding-md">
                            <p class="font-lg">Useful Links</p>
                            <ul class="list-unstyled useful-link">
                                <li>
                                    <a href="#">
                                        <small><i class="fa fa-chevron-right"></i> Our Profile</small>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <small><i class="fa fa-chevron-right"></i> New Products</small>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <small><i class="fa fa-chevron-right"></i> Support Portal</small>
                                    </a>
                                </li>
                            </ul>
                        </div><!-- /.col -->


                        <div class="col-sm-3 padding-md">
                            <p class="font-lg">Stay Connect</p>
                            <a href="#" class="social-connect tooltip-test facebook-hover" data-toggle="tooltip" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="social-connect tooltip-test twitter-hover" data-toggle="tooltip" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="social-connect tooltip-test google-plus-hover" data-toggle="tooltip" data-original-title="Google Plus"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="social-connect tooltip-test rss-hover" data-toggle="tooltip" data-original-title="Rss feed"><i class="fa fa-rss"></i></a>
                            <a href="#" class="social-connect tooltip-test tumblr-hover" data-toggle="tooltip" data-original-title="Tumblr"><i class="fa fa-tumblr"></i></a>
                            <a href="#" class="social-connect tooltip-test dribbble-hover" data-toggle="tooltip" data-original-title="Dribbble"><i class="fa fa-dribbble"></i></a>
                            <a href="#" class="social-connect tooltip-test linkedin-hover" data-toggle="tooltip" data-original-title="Linkedin"><i class="fa fa-linkedin"></i></a>
                            <a href="#" class="social-connect tooltip-test pinterest-hover" data-toggle="tooltip" data-original-title="Pinterest"><i class="fa fa-pinterest"></i></a>
                        </div><!-- /.col -->



                        <div class="col-sm-3 padding-md">
                            <p class="font-lg">Contact Us</p>
                            Email : endless.themes@gmail.com
                            <div class="seperator"></div>
                            <a class="btn btn-info"><i class="fa fa-envelope"></i> Contact support</a>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
            </footer>
        </div><!-- /wrapper -->

        <a href="" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->

        <!-- Jquery -->
        <script src="js/jquery-1.10.2.min.js"></script>

        <!-- Bootstrap -->
        <script src="bootstrap/js/bootstrap.min.js"></script>

        <!-- Waypoint -->
        <script src='js/waypoints.min.js'></script>

        <!-- LocalScroll -->
        <script src='js/jquery.localscroll.min.js'></script>

        <!-- ScrollTo -->
        <script src='js/jquery.scrollTo.min.js'></script>

        <!-- Modernizr -->
        <script src='js/modernizr.min.js'></script>

        <!-- Pace -->
        <script src='js/pace.min.js'></script>

        <!-- Popup Overlay -->
        <script src='js/jquery.popupoverlay.min.js'></script>

        <!-- Slimscroll -->
        <script src='js/jquery.slimscroll.min.js'></script>

        <!-- Cookie -->
        <script src='js/jquery.cookie.min.js'></script>

        <!-- Endless -->
        <script src="js/endless/endless.js"></script>

        <script>
            $(function() {
                $('.animated-element').waypoint(function() {

                    $(this).removeClass('no-animation');

                }, {offset: '70%'});

                $('.nav').localScroll({duration: 800});
            });
        </script>

    </body>
</html>
