<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo Yii::app()->name . ' - ' . Yii::app()->controller->nameController; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Bootstrap core CSS -->
        <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Font Awesome -->
        <link href="/css/font-awesome.min.css" rel="stylesheet">

        <!-- WYSIHTML5 -->
        <link href="/css/bootstrap-wysihtml5.css" rel="stylesheet"/>

        <!-- Pace -->
        <link href="/css/pace.css" rel="stylesheet">

        <!-- Gritter -->
        <link href="/css/gritter/jquery.gritter.css" rel="stylesheet">

        <!-- Google Code Prettify -->
        <link href="/css/prettify.css" rel="stylesheet">

        <!-- Chosen -->
        <link href="/css/chosen/chosen.min.css" rel="stylesheet"/>

        <!-- Datepicker -->
        <link href="/css/datepicker.css" rel="stylesheet"/>

        <!-- Timepicker -->
        <link href="/css/bootstrap-timepicker.css" rel="stylesheet"/>

        <!-- Full Calendar -->	
        <link href='/css/fullcalendar.css' rel='stylesheet' />	

        <!-- Endless -->
        <link href="/css/endless.min.css" rel="stylesheet">
        <link href="/css/endless-skin.css" rel="stylesheet">
        <style>
            label span.required{
                color: red;
            }
            div.errorMessage{
                color:red;
                font-weight: bold;
            }
            .alert ul{
                padding: 5px 25px;
            }
            .modal-dialog {
                width: 800px;
            }
            table.detail-view tr.odd {
                background: none repeat scroll 0 0 #EEEEEE;
            }
        </style>

    </head>

    <body class="overflow-hidden">
        <!-- Overlay Div -->
        <div id="overlay" class="transparent"></div>

        <a href="" id="theme-setting-icon"><i class="fa fa-cog fa-lg"></i></a>
        <div id="theme-setting">
            <div class="title">
                <strong class="no-margin">Skin Color</strong>
            </div>
            <div class="theme-box">
                <a class="theme-color" style="background:#323447" id="default"></a>
                <a class="theme-color" style="background:#efefef" id="skin-1"></a>
                <a class="theme-color" style="background:#a93922" id="skin-2"></a>
                <a class="theme-color" style="background:#3e6b96" id="skin-3"></a>
                <a class="theme-color" style="background:#635247" id="skin-4"></a>
                <a class="theme-color" style="background:#3a3a3a" id="skin-5"></a>
                <a class="theme-color" style="background:#495B6C" id="skin-6"></a>
            </div>
            <div class="title">
                <strong class="no-margin">Sidebar Menu</strong>
            </div>
            <div class="theme-box">
                <label class="label-checkbox">
                    <input type="checkbox" checked id="fixedSidebar">
                    <span class="custom-checkbox"></span>
                    Fixed Sidebar
                </label>
            </div>
        </div><!-- /theme-setting -->

        <div id="wrapper" class="preload">
            <?php $this->renderPartial('//layouts/_top_nav'); ?>
            <?php $this->renderPartial('//layouts/_menu'); ?>
            <div id="main-container">
                <div id="breadcrumb">
                    <?php if (isset($this->breadcrumbs)): ?>
                        <?php
                        $this->widget('zii.widgets.CBreadcrumbs', array(
                            'homeLink' => CHtml::link('<i class="fa fa-home"></i>' . ' หน้าแรก', array('/admin')),
                            'links' => $this->breadcrumbs,
                            'htmlOptions' => array(
                                'class' => 'breadcrumb',
                            ),
                        ));
                        ?><!-- breadcrumbs -->
                    <?php endif ?>
                </div><!-- /breadcrumb-->

                <div class="padding-md">
<!--                    <div class="alert-animated">
                        <div class="alert-inner">
                            <div class="alert-message">
                                <strong>ระบบบริหารจัดการสารสนเทศหน่วยยานพาหนะ</strong> มหาวิทยาลัยราชภัฏสกลนคร			
                            </div>
                        </div>
                    </div>-->
                    <div class="row">
                        <?php if ($this->menu != null): ?>
                            <?php
                            $this->widget('ext.Endless.ShortcutLink', array(
                                'items' => $this->menu,
                            ));
                            ?>
                        <?php endif; ?>
                        <?php echo $content; ?>
                    </div>
                </div><!-- /.padding-md -->
            </div><!-- /main-container -->

            <!--Modal-->
            <div class="modal fade" id="simpleModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4>Modal header</h4>
                        </div>
                        <div class="modal-body">
                            <p>One fine body...</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
                            <a href="#" class="btn btn-danger btn-sm">Save changes</a>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div class="modal fade" id="formModal">
                <div class="modal-dialog">
                    <div class="modal-content" id="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4>Register Form</h4> 
                        </div>
                        <div class="modal-body" id="modal-body">
                            <p>One fine body...</p>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div><!-- /wrapper -->

        <a href="" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>

        <!-- jquery popup overlay -->
        <div class="custom-popup width-100" id="darkCustomModal">
            <div class="padding-md">
                <h4 class="m-top-none"> This is alert message.</h4>
            </div>

            <div class="text-center">
                <a href="#" class="btn btn-success m-right-sm darkCustomModal_close">Confirm</a>
                <a href="#" class="btn btn-danger darkCustomModal_close">Cancel</a>
            </div>
        </div>

        <div class="custom-popup light width-100" id="lightCustomModal">
            <div class="padding-md">
                <h4 class="m-top-none"> This is alert message.</h4>
            </div>

            <div class="text-center">
                <a href="#" class="btn btn-success m-right-sm lightCustomModal_close">Confirm</a>
                <a href="#" class="btn btn-danger lightCustomModal_close">Cancel</a>
            </div>
        </div>

        <!-- Logout confirmation -->
        <div class="custom-popup width-100" id="logoutConfirm">
            <div class="padding-md">
                <h4 class="m-top-none">คุณต้องการออกจากระบบหรือไม่?</h4>
            </div>

            <div class="text-center">
                <a class="btn btn-success m-right-sm" href="<?php echo CHtml::normalizeUrl(array('/site/logout')); ?>">ออกจากระบบ</a>
                <a class="btn btn-danger logoutConfirm_close">ยกเลิก</a>
            </div>
        </div>
        <footer>
            <div class="row">
                <div class="col-sm-6">
                    <p class="no-margin">
                        © 2014 <strong>ระบบบริหารจัดการสารสนเทศ </strong>หน่วยยานพาหนะ มหาวิทยาลัยราชภัฏสกลนคร 
                    </p>
                </div><!-- /.col -->
            </div><!-- /.row-->
        </footer>

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->

        <!-- Jquery -->
        <!--<script src="js/jquery-1.10.2.min.js"></script>-->
        <?php
        Yii::app()->clientScript->registerCoreScript('jquery');
        Yii::app()->clientScript->registerCoreScript('jquery.ui');
        ?>

        <!--JQuery-->
        <!--<script src='//code.jquery.com/jquery-1.11.0.js'></script>-->	


        <!--Chosen--> 
        <script src='/js/chosen.jquery.min.js'></script>	

        <!-- Mask-input -->
        <script src='/js/jquery.maskedinput.min.js'></script>	

        <!-- Datepicker -->
        <script src='/js/bootstrap-datepicker.min.js'></script>	

        <!-- Timepicker -->
        <script src='/js/bootstrap-timepicker.min.js'></script>	

        <!-- Slider -->
        <script src='/js/bootstrap-slider.min.js'></script>	

        <!-- Tag input -->
        <script src='/js/jquery.tagsinput.min.js'></script>	

        <!-- WYSIHTML5 -->
        <script src='/js/wysihtml5-0.3.0.min.js'></script>	
        <script src='/js/uncompressed/bootstrap-wysihtml5.js'></script>	

        <!-- Dropzone -->
        <script src='/js/dropzone.min.js'></script>	

        <!-- Modernizr -->
        <script src='/js/modernizr.min.js'></script>

        <!-- Popup Overlay -->
        <script src='/js/jquery.popupoverlay.min.js'></script>

        <!-- Bootstrap -->
        <script src="/bootstrap/js/bootstrap.min.js"></script>

        <!-- holder -->
        <script src='/js/uncompressed/holder.js'></script>

        <!-- Gritter -->
        <script src="/js/jquery.gritter.min.js"></script>

        <!-- Google Code Prettify -->
        <script src='/js/uncompressed/run_prettify.js'></script>

        <!-- Modernizr -->
        <script src='/js/modernizr.min.js'></script>

        <!-- Pace -->
        <script src='/js/pace.min.js'></script>

        <!-- Popup Overlay -->
        <script src='/js/jquery.popupoverlay.min.js'></script>

        <!-- Slimscroll -->
        <script src='/js/jquery.slimscroll.min.js'></script>

        <!-- Cookie -->
        <script src='/js/jquery.cookie.min.js'></script>

        <!-- Full Calender -->
        <script src='/js/fullcalendar.min.js'></script>

        <!-- Endless -->
        <script src="/js/endless/endless_form.js"></script>
        <script src="/js/endless/endless.js"></script>

        <script>
            $(function() {
                //Gritter notification
                $('#regular-notification').click(function() {
                    $.gritter.add({
                        title: 'This is a regular notice!',
                        text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" style="color:#ccc">magnis dis parturient</a> montes, nascetur ridiculus mus.',
                        image: 'img/user.jpg',
                        sticky: false,
                        time: ''
                    });
                    return false;
                });
                $('#sticky-notification').click(function() {

                    var unique_id = $.gritter.add({
                        title: 'This is a sticky notice!',
                        text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#">magnis dis parturient</a> montes, nascetur ridiculus mus.',
                        image: 'img/user.jpg',
                        sticky: true,
                        time: '',
                        class_name: 'my-sticky-class'
                    });
                    // You can have it return a unique id, this can be used to manually remove it later using
                    /*
                     setTimeout(function(){
                     
                     $.gritter.remove(unique_id, {
                     fade: true,
                     speed: 'slow'
                     });
                     
                     }, 6000)
                     */

                    return false;
                });
                $('#info-notification').click(function() {

                    $.gritter.add({
                        title: '<i class="fa fa-info-circle"></i> This is a info notification',
                        text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" style="color:#ccc">magnis dis parturient</a> montes, nascetur ridiculus mus.',
                        sticky: false,
                        time: '',
                        class_name: 'gritter-info'
                    });
                    return false;
                });
                $('#success-notification').click(function() {

                    $.gritter.add({
                        title: '<i class="fa fa-check-circle"></i> This is a success notification',
                        text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#">magnis dis parturient</a> montes, nascetur ridiculus mus.',
                        sticky: false,
                        time: '',
                        class_name: 'gritter-success'
                    });
                    return false;
                });
                $('#warning-notification').click(function() {

                    $.gritter.add({
                        title: '<i class="fa fa-warning"></i> This is a warning notification!',
                        text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" style="color:#ccc">magnis dis parturient</a> montes, nascetur ridiculus mus.',
                        sticky: false,
                        time: '',
                        class_name: 'gritter-warning'
                    });
                    return false;
                });
                $('#danger-notification').click(function() {

                    $.gritter.add({
                        title: '<i class="fa fa-times-circle"></i> This is a error notification!',
                        text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" style="color:#ccc">magnis dis parturient</a> montes, nascetur ridiculus mus.',
                        sticky: false,
                        time: '',
                        class_name: 'gritter-danger'
                    });
                    return false;
                });
                $("#remove-all").click(function() {
                    $.gritter.removeAll();
                    return false;
                });
                //jQuery popup overlay
                $('#darkCustomModal').popup({
                    pagecontainer: '.container',
                    transition: 'all 0.3s'
                });
                $('#lightCustomModal').popup({
                    pagecontainer: '.container',
                    transition: 'all 0.3s'
                });

//                $('#ytConditionAccept_condition').click(function() {
////            if ($('#ConditionAccept_condition_0').is(':checked')) {
////                $('#no_accept').hide();
////                $('#accept').show();
////            }
////            if ($('#ConditionAccept_condition_1').is(':checked')) {
////                $('#no_accept').show();
////                $('#accept').hide();
////            }
//                    alert('test');
//                });
//                $('#PaperDetailAccept_car_id').change(function() {
//                    alert('test');
//                });

                $('table.table thead tr td input').addClass('form-control input-sm');
                $('table.table thead tr td select').addClass('form-control input-sm');
            });
        </script>

    </body>
</html>
