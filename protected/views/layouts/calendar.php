<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $this->pageTitle; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Bootstrap core CSS -->
        <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Font Awesome -->
        <link href="/css/font-awesome.min.css" rel="stylesheet">

        <!-- Pace -->
        <link href="/css/pace.css" rel="stylesheet">

        <!-- Full Calendar -->
        <link href='/css/fullcalendar.css' rel='stylesheet' />	

        <!-- Endless -->
        <link href="/css/endless.min.css" rel="stylesheet">
        <link href="/css/endless-skin.css" rel="stylesheet">

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
                <div class="padding-md">
                    <?php echo $content; ?>
                </div>
            </div><!-- /main-container -->

            
            <div class="modal fade" id="formModal">
                <div class="modal-dialog modal-lg">
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

        <!-- Logout confirmation -->
        <div class="custom-popup width-100" id="logoutConfirm">
            <div class="padding-md">
                <h4 class="m-top-none"> คุณต้องการออกจากระบบหรือไม่?</h4>
            </div>

            <div class="text-center">
                <a class="btn btn-success m-right-sm" href="<?php echo Yii::app()->createUrl('/site/logout'); ?>">ออกจากระบบ</a>
                <a class="btn btn-danger logoutConfirm_close">ยกเลิก</a>
            </div>
        </div>

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->

        <!-- Jquery -->
        <script src="/js/jquery-1.10.2.min.js"></script>

        <!-- Jquery UI -->
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script>

        <!-- Bootstrap -->
        <script src="/bootstrap/js/bootstrap.min.js"></script>

        <!-- Full Calender -->
        <script src='/js/fullcalendar.min.js'></script>

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

        <!-- Endless -->
        <script src="/js/endless/endless.js"></script>


        <script>
            $(function() {

                // Full calendar
                var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();

                var calendar = $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek'
                    },
                    monthNames: [
                        "มกราคม", "กุมภาพันธ์", "มีนาคม",
                        "เมษายน", "พฤษภาคม", "มิถุนายน",
                        "กรกฎาคม", "สิงหาคม", "กันยายน",
                        "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
                    ],
                    monthNamesShort: [
                        "ม.ค.", "ก.พ.", "มี.ค.",
                        "เม.ย.", "พ.ค.", "มิ.ย.",
                        "ก.ค.", "ส.ค.", "ก.ย",
                        "ต.ค.", "พ.ย.", "ธ.ค"
                    ],
                    dayNames: [
                        "จันทร์", "อังคาร", "พุธ",
                        "พฤหัสบดี", "ศุกร์", "เสาร์",
                        "อาทิตย์"
                    ],
                    dayNamesShort: [
                        "จ.", "อัง.", "พ.",
                        "พฤ.", "ศ.", "ส.",
                        "อา."
                    ],
                    buttonText: {
                        today: 'วันนี้',
                        month: 'เดือน',
                        week: 'สัปดาห์',
                        day: 'วัน'
                    },
                    selectable: true,
                    selectHelper: true,
//                    select: function(start, end, allDay) {
//                        var title = prompt('Event Title:');
//                        if (title) {
//                            calendar.fullCalendar('renderEvent',
//                                    {
//                                        title: title,
//                                        start: start,
//                                        end: end,
//                                        allDay: allDay
//                                    },
//                            true // make the event "stick"
//                                    );
//                        }
//                        calendar.fullCalendar('unselect');
//                    },
                    editable: true,
                    events: <?php echo (isset($this->calendar_evens)) ? $this->calendar_evens : ''; ?>
//                    events: [
//                        {
//                            title: 'All Day Event',
//                            start: '2014-03-03'
//                        },
//                        {
//                            title: 'Long Event',
//                            start: new Date(y, m, d - 5),
//                            end: new Date(y, m, d - 2)
//                        },
//                        {
//                            id: 999,
//                            title: 'Repeating Event',
//                            start: new Date(y, m, d - 3, 16, 0),
//                            allDay: false
//                        },
//                        {
//                            id: 999,
//                            title: 'Repeating Event',
//                            start: new Date(y, m, d + 4, 16, 0),
//                            allDay: false
//                        },
//                        {
//                            title: 'Meeting',
//                            start: new Date(y, m, d, 10, 30),
//                            allDay: false
//                        },
//                        {
//                            title: 'Lunch',
//                            start: new Date(y, m, d, 12, 0),
//                            end: new Date(y, m, d, 14, 0),
//                            allDay: false
//                        },
//                        {
//                            title: 'Birthday Party',
//                            start: new Date(y, m, d + 1, 19, 0),
//                            end: new Date(y, m, d + 1, 22, 30),
//                            allDay: false
//                        },
//                        {
//                            title: 'Click for Google',
//                            start: new Date(y, m, 28),
//                            end: new Date(y, m, 29),
//                            url: 'http://google.com/'
//                        }
//                    ]
                });
            });
        </script>

    </body>
</html>
