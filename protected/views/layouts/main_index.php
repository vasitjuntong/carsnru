<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if (IE 9)]><html class="no-js ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--> 
<html lang="en-US"> <!--<![endif]-->
    <head>

        <!-- Meta Tags -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <title>ระบบบริหารจัดการสารสนเทศหน่วยยานพาพหนะมหาวิทยาลัยราชภัฏสกลนคร</title>   

        <meta name="description" content="Insert Your Site Description" /> 

        <!-- Mobile Specifics -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="HandheldFriendly" content="true"/>
        <meta name="MobileOptimized" content="320"/>   

        <!-- Mobile Internet Explorer ClearType Technology -->
        <!--[if IEMobile]>  <meta http-equiv="cleartype" content="on">  <![endif]-->

        <!-- Bootstrap -->
        <link href="/_include/css/bootstrap.min.css" rel="stylesheet">

        <!-- Main Style -->
        <link href="/_include/css/main.css" rel="stylesheet">

        <!-- Supersized -->
        <link href="/_include/css/supersized.css" rel="stylesheet">
        <link href="/_include/css/supersized.shutter.css" rel="stylesheet">

        <!-- FancyBox -->
        <link href="/_include/css/fancybox/jquery.fancybox.css" rel="stylesheet">

        <!-- Font Icons -->
        <link href="/_include/css/fonts.css" rel="stylesheet">

        <!-- Shortcodes -->
        <link href="/_include/css/shortcodes.css" rel="stylesheet">

        <!-- Responsive -->
        <link href="/_include/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="/_include/css/responsive.css" rel="stylesheet">

        <!-- Supersized -->
        <link href="/_include/css/supersized.css" rel="stylesheet">
        <link href="/_include/css/supersized.shutter.css" rel="stylesheet">

        <!-- Google Font -->
        <!--<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900' rel='stylesheet' type='text/css'>-->

        <!-- Fav Icon -->
        <link rel="shortcut icon" href="#">

        <link rel="apple-touch-icon" href="#">
        <link rel="apple-touch-icon" sizes="114x114" href="#">
        <link rel="apple-touch-icon" sizes="72x72" href="#">
        <link rel="apple-touch-icon" sizes="144x144" href="#">

        <!-- Modernizr -->
        <script src="_include/js/modernizr.js"></script>

        <!-- Analytics -->
        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'Insert Your Code']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);

            })();

        </script>
        <!-- End Analytics -->

    </head>


    <body>

        <!-- This section is for Splash Screen -->
        <div class="ole">
            <section id="jSplash">
                <div id="circle"></div>
            </section>
        </div>
        <!-- End of Splash Screen -->

        <!-- Homepage Slider -->
        <div id="home-slider">	
            <div class="overlay"></div>

            <div class="slider-text">
                <div id="slidecaption"></div>
            </div>   

            <div class="control-nav">
                <a id="prevslide" class="load-item"><i class="font-icon-arrow-simple-left"></i></a>
                <a id="nextslide" class="load-item"><i class="font-icon-arrow-simple-right"></i></a>
                <ul id="slide-list"></ul>

                <a id="nextsection" href="#work"><i class="font-icon-arrow-simple-down"></i></a>
            </div>
        </div>
        <!-- End Homepage Slider -->

        <!-- Header -->
        <header>
            <div class="sticky-nav">
                <a id="mobile-nav" class="menu-nav" href="#menu-nav"></a>

                <div id="logo">
                    ระบบบริหารจัดการสารสนเทศ หน่วยยานพาพหนะ มหาวิทยาลัยราชภัฏสกลนคร </div>

                <nav id="menu">
                    <ul id="menu-nav">
                        <li class="current"><a href="#home-slider">หน้าแรก</a></li>
                        <li><a href="#work">ข้อมูลส่วนกลาง</a></li>
                        <li><a href="#about">เกี่ยวกับเรา</a></li>
                        <li><a href="#PR">ข่าวประชาสัมพันธ์</a></li>
                        <li><a href="#contact">ติดต่อเรา</a></li>
                        <?php if (Yii::app()->user->isGuest) { ?>
                            <li><a href="<?php echo Yii::app()->createUrl('/site/login'); ?>" class="external">ลงชื่อเข้าใช้งาน</a></li>
                        <?php } else { ?>
                            <li><a href="<?php echo Yii::app()->createUrl('/admin'); ?>" class="external"><?php echo Yii::app()->user->name; ?></a></li>
                        <?php } ?>
                    </ul>
                </nav>

            </div>
        </header>
        <!-- End Header -->

        <!-- Our Work Section -->
        <div id="work" class="page">
            <div class="container">
                <!-- Title Page -->
                <div class="row">
                    <div class="span12">
                        <div class="title-page">
                            <h2 class="title">&nbsp;</h2>
                            <h2 class="title"><img src="img/Logo.png" width="52" height="63">หน่วยยานพาหนะ</h2>
                            <h3 class="title-description">บริการรวดเร็ว  ฉับไว  ปลอดภัย  ทันต่อเวลา</h3>
                        </div>
                    </div>
                </div>
                <!-- End Title Page -->

                <!-- Portfolio Projects -->
                <?php
                $this->renderPartial('//layouts/_profolio_project_1');
                ?>
                <!-- End Portfolio Projects -->
            </div>
        </div>
        <!-- End Our Work Section -->

        <!-- About Section -->
        <div id="about" class="page-alternate">
            <div class="container">
                <!-- Title Page -->
                <div class="row">
                    <div class="span12">
                        <div class="title-page">
                            <h2 class="title">เกี่ยวกับหน่วยยานพาหนะ</h2>
                            <h3 class="title-description">สำนักงานอธิการบดี มหาวิทยาลัยราชภัฏสกลนคร </h3>
                        </div>
                    </div>
                </div>
                <!-- End Title Page -->
                <!-- Start Tooltip -->
                <div class="span6">
                    <h3 class="spec">ปรัชญา </h3>

                    <p>บริการรวดเร็ว  ฉับไว  ปลอดภัย  ทันต่อเวลา</p>

                </div>
                <!-- End Tootlip -->
                <!-- Start Tooltip -->
                <div class="span6">
                    <h3 class="spec">วิสัยทัศน์ </h3>

                    <p>หน่วยยานพาหนะเป็นหน่วยงานที่ให้บริการทางรถยนต์ ด้วยความพร้อมด้านยานพาหนะและพนักงานขับรถ รวมไปถึงความสะดวกสบาย และความพึงพอใจในการให้บริการ</p>

                </div>
                <!-- End Tootlip -->
                <!-- Start Tooltip -->
                <div class="span12">
                    <h3 class="spec">พันธกิจ </h3>

                    <p>1.  บริหารจัดการระบบให้บริการรถยนต์แก่บุคลากรของมหาวิทยาลัย <br>
                        2.  นำเทคโนโลยีในด้านการใช้รถยนต์มาปรับใช้ในการบริการ <br>
                        3.  พัฒนาทักษะความรู้ ในการใช้รถยนต์แก่พนักงานขับรถอยู่เสมอ <br>
                        4.  ตรวจสอบและดูแลสภาพรถยนต์เพื่อให้เกิดความปลอดภัยแก่ผู้ใช้บริการ <br>
                        5.  คำนึงถึงการใช้พลังงานและทรัพยากรร่วมอย่างมีประสิทธิภาพ </p>

                </div>
                <!-- End Tootlip -->
                <!-- People -->
                <div class="row">


                    <!-- Start Profile -->
                    <div class="span4 profile">
                        <div class="image-wrap">
                            <div class="hover-wrap">
                                <span class="overlay-img"></span>
                                <span class="overlay-text-thumb">อธิการบดี</span>
                            </div>
                            <img src="/_include/img/profile/profile-01.jpg" alt="John Doe">
                        </div>
                        <h3 class="profile-name">รศ.ดร.ชนินทร์ วะสีนนท์ </h3>
                        <p class="profile-description">หน่วยยานพาหนะเป็นหน่วยงานที่ให้บริการทางรถยนต์ ด้วยความพร้อมด้านยานพาหนะและพนักงานขับรถ รวมไปถึงความสะดวกสบาย และความพึงพอใจในการให้บริการ</p>

                        <div class="social">
                            <ul class="social-icons">
                                <li><a href="#"><i class="font-icon-social-twitter"></i></a></li>
                                <li><a href="#"><i class="font-icon-social-dribbble"></i></a></li>
                                <li><a href="#"><i class="font-icon-social-facebook"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Profile -->

                    <!-- Start Profile -->
                    <div class="span4 profile">
                        <div class="image-wrap">
                            <div class="hover-wrap">
                                <span class="overlay-img"></span>
                                <span class="overlay-text-thumb">หัวหน้าหน่วยยานพาหนะ</span>
                            </div>
                            <img src="/_include/img/profile/profile-02.jpg" alt="Jane Helf">
                        </div>
                        <h3 class="profile-name">นายสงวน พรหมพิภักดิ์</h3>
                        <p class="profile-description">
                            หน่วยยานพาหนะ เป็นหน่วยงานที่ให้การสนับสนุนมหาวิทยาลัยในด้านการจัดการเรียนการสอน การบริหารและการจัดการ เพื่อให้สอดคล้องกับแผนพัฒนามหาวิทยาลัยควบคู่กับการพัฒนาคุณภาพและสร้างเสริมประสบการณ์ของบุคลากรในการให้บริการ โดยการปลูกฝังและตระหนักต่อภาระหน้าที่เน้นความสามัคคีรับผิดชอบต่องานบริการและความปรองดองของสมาชิกในหน่วยงาน
                        </p>

                        <div class="social">
                            <ul class="social-icons">
                                <li><a href="#"><i class="font-icon-social-twitter"></i></a></li>
                                <li><a href="#"><i class="font-icon-social-email"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Profile -->

                    <!-- Start Profile -->
                    <div class="span4 profile">
                        <div class="image-wrap">
                            <div class="hover-wrap">
                                <span class="overlay-img"></span>
                                <span class="overlay-text-thumb">ผู้ปฏิบัติงานบริหาร</span>
                            </div>
                            <img src="/_include/img/member3.jpg" alt="Joshua Insanus">
                        </div>
                        <h3 class="profile-name">นางสาวนันท์นภัส โถบำรุง</h3>
                        <p class="profile-description">
                            หน่วยยานพาหนะ เน้นการให้บริการที่สร้างความประทับใจแก่ผู้มาติดต่อขอรับบริการและมีการบริการจัดการทรัพยากรอย่างมีประสิทธิภาพและมีการพัฒนาระบบการปฏิบัติงานของบุคลากรอย่างต่อเนื่องเพื่อให้ได้มาตรฐาน
                        </p>

                        <div class="social">
                            <ul class="social-icons">
                                <li><a href="#"><i class="font-icon-social-twitter"></i></a></li>
                                <li><a href="#"><i class="font-icon-social-linkedin"></i></a></li>
                                <li><a href="#"><i class="font-icon-social-google-plus"></i></a></li>
                                <li><a href="#"><i class="font-icon-social-vimeo"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Profile -->


                </div>
                <!-- End People -->
            </div>
        </div>
        <!-- End About Section -->


        <!-- PR Section -->
        <?php $this->renderPartial('//layouts/_pr'); ?>
        <!-- End PR Section -->


        <!-- Twitter Feed -->
        <div id="twitter-feed" class="page-alternate">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="follow">
                            <a href="https://twitter.com/bEnz_LoVable" title="Follow Me on Twitter" target="_blank"><i class="font-icon-social-twitter"></i></a>
                        </div>

                        <div id="ticker" class="query"> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Twitter Feed -->



        <!-- Contact Section -->
        <div id="contact" class="page">
            <div class="container">
                <!-- Title Page -->
                <div class="row">
                    <div class="span12">
                        <div class="title-page">
                            <h2 class="title">ติดต่อหน่วยยานพาหนะ</h2>
                            <h3 class="title-description">งานอาคารสถานที่และยานพาหนะ กองกลาง สำนักงานอธิการบดี มหาวิทยาลัยราชภัฏ</h3>
                        </div>
                    </div>
                </div>
                <!-- End Title Page -->

                <!-- Contact Form -->
                <div class="row">
                    <div class="span9">

                        <form id="contact-form" class="contact-form" action="#">
                            <p class="contact-name">
                                <input id="contact_name" type="text" placeholder="Full Name" value="" name="name" />
                            </p>
                            <p class="contact-email">
                                <input id="contact_email" type="text" placeholder="Email Address" value="" name="email" />
                            </p>
                            <p class="contact-message">
                                <textarea id="contact_message" placeholder="Your Message" name="message" rows="15" cols="40"></textarea>
                            </p>
                            <p class="contact-submit">
                                <a id="contact-submit" class="submit" href="#">Send Your Email</a>
                            </p>

                            <div id="response">

                            </div>
                        </form>

                    </div>

                    <div class="span3">
                        <div class="contact-details">
                            <h3>ข้อมูลการติดต่อ</h3>
                            <ul>
                                <li><a href="">carsnru@hotmail.com</a></li>
                                <li>โทรศัพท์ 0 4297 0249 </li>
                                <li>โทร.(ภายใน)318</li>

                                <li>
                                    หน่วยยานพาหนะ ตั้งอยู่ที่มหาวิทยาลัยราชภัฏสกลนคร <br>
                                    เลขที่ 680  ถนนนิตโย
                                    <br>
                                    ตำบลธาตุเชิงชุม  อำเภอเมือง
                                    <br>
                                    จังหวัดสกลนคร  47000 
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Contact Form -->
            </div>
        </div>
        <!-- End Contact Section -->






        <!-- Footer -->
        <footer>
            <p class="credits">&copy; 2014  <a href="#/" title="mixed system co.,ltd."></a> <a  >ระบบบริหารจัดการสารสนเทศ หน่วยยานพาหนะ มหาวิทยาลัยราชภัฏสกลนคร</a></p>
        </footer>
        <!-- End Footer -->

        <!-- Back To Top -->
        <a id="back-to-top" href="#">
            <i class="font-icon-arrow-simple-up"></i>
        </a>
        <!-- End Back to Top -->


        <!-- Js -->
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>  jQuery Core -->
        <script src="/_include/js/bootstrap.min.js"></script> <!-- Bootstrap -->
        <script src="/_include/js/supersized.3.2.7.min.js"></script> <!-- Slider -->
        <script src="/_include/js/waypoints.js"></script> <!-- WayPoints -->
        <script src="/_include/js/waypoints-sticky.js"></script> <!-- Waypoints for Header -->
        <script src="/_include/js/jquery.isotope.js"></script> <!-- Isotope Filter -->
        <script src="/_include/js/jquery.fancybox.pack.js"></script> <!-- Fancybox -->
        <script src="/_include/js/jquery.fancybox-media.js"></script> <!-- Fancybox for Media -->
        <script src="/_include/js/jquery.tweet.js"></script> <!-- Tweet -->
        <script src="/_include/js/plugins.js"></script> <!-- Contains: jPreloader, jQuery Easing, jQuery ScrollTo, jQuery One Page Navi -->
        <script src="/_include/js/main.js"></script> <!-- Default JS -->
        <script>
            $(document).ready(function() {
                $("a#pr").fancybox({
//                    'hideOnContentClick': true,
//                    'width': 560,
                });
            });
        </script>
        <!-- End Js -->

    </body>
</html>