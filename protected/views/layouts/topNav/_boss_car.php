<?php
//$paperAccept = Accept::model()->BossCar()->desc()->findAll(array(
//        ));
?>
<!--<li clasfdass="dropdown-toggle" data-toggle="dropdown" href="#">-->
        <!--<i class="fa fa-bell fa-lg"></i>-->
        <?php // if (count($paperAccept) > 0) { ?>
            <!--<span class="notification-label bounceIn animation-delay6"><?php // echo count($paperAccept); ?></span>-->
        <?php // } ?>
    <!--</a>-->
<!--    <ul class="dropdown-menu notification dropdown-3">
        <li><a href="#">รับเรื่องคำร้องที่ต้องตรวจรับทั้งหมด <?php // echo count($paperAccept); ?> คำร้อง</a></li>					  
        <?php // foreach ($paperAccept as $value):
            ?>
            <li>
                <?php
//                if ($value->status == 0) {
                    ?>
                    <a href="#" data-paper-id="<?php // echo $value->paper_id; ?>" data-type-paper-id="<?php // echo $value->type_paper_id; ?>" onClick="showDetailBossCar(this)">
                        <span class="notification-icon bg-warning">
                            <i class="fa fa-warning"></i>
                        </span>
                        <span class="m-left-xs">

                            <?php
//                            if ($value->type_paper_id == 1) {
//                                echo $value->carAccep->paper_no;
//                            } else {
//                                echo $value->busAccep->paper_no;
//                            }
                            ?>
                        </span>
                        <span class="time text-muted"><?php // echo TimeAlert::nicetime($value->create_at); ?></span>
                    </a>
                    <?php
//                }
//                else if ($value->status == 0) {
//                    echo ($value->carAccep != null) ? $value->carAccep->paper_no : $value->busAccep->paper_no;
//                }
                ?>
            </li>	
            <?php
//        endforeach;
        ?>	
        <li><a href="<?php // echo Yii::app()->createUrl('/paperApprovalList'); ?>">ที่ต้องรับเรื่องทั้งหมด</a></li>			  
    </ul>-->
<!--</li>-->
<?php
$paperAccept = Accept::model()->BossCarAccept()->findAll();
?>
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-bell fa-lg"></i>
        <?php if (count($paperAccept) > 0) { ?>
            <span class="notification-label bounceIn animation-delay6"><?php echo count($paperAccept); ?></span>
        <?php } ?>
    </a>
    <ul class="dropdown-menu notification dropdown-3">
        <li><a href="#">คำร้องที่ต้องตรวจรับทั้งหมด <?php echo count($paperAccept); ?> คำร้อง</a></li>					  
        <?php foreach ($paperAccept as $value):
            ?>
            <li>
                <?php
                if ($value->status == 1) {
                    ?>
                    <a href="#" data-paper-id="<?php echo $value->paper_id; ?>" data-type-paper-id="<?php echo $value->type_paper_id; ?>" onClick="showDetailBossCar2(this)">
                        <span class="notification-icon bg-warning">
                            <i class="fa fa-warning"></i>
                        </span>
                        <span class="m-left-xs">
                            <?php
                            if ($value->type_paper_id == 1) {
                                echo $value->carAccep->paper_no;
                            } else {
                                echo $value->busAccep->paper_no;
                            }
                            ?>
                        </span>
                        <span class="time text-muted"><?php echo TimeAlert::nicetime($value->create_at); ?></span>
                    </a>
                    <?php
                }
                ?>
            </li>	
            <?php
        endforeach;
        ?>		
        <li><a href="<?php echo Yii::app()->createUrl('/consider'); ?>">ตรวจสอบทั้งหมด</a></li>		  
    </ul>
</li>

<script>

//    $(document).ready(function() {
    function showDetailBossCar(paper)
    {
        var paper_id = paper.getAttribute('data-paper-id');
        var type_paper_id = paper.getAttribute('data-type-paper-id');
        if (type_paper_id == 1) {
            $.ajax({
                type: 'post',
                url: "<?php echo CHtml::normalizeUrl(array('/paperApprovalList/view')); ?>",
                data: {paper_approval_id: paper_id},
                success: function(results) {
                    $(".modal-header h4").text("รับเรื่องคำร้องใช้รถยนต์ส่วนกลาง");
                    document.getElementById("modal-body").innerHTML = results;
                    $('#formModal').modal();
                },
            });
        } else {
            $.ajax({
                type: 'post',
                url: "<?php echo CHtml::normalizeUrl(array('/paperApprovalBusList/view')); ?>",
                data: {paper_approval_bus_id: paper_id},
                success: function(results) {
                    $(".modal-header h4").text("รับเรื่องคำร้องใช้รถยนต์ปรับอากาศ");
                    document.getElementById("modal-body").innerHTML = results;
                    $('#formModal').modal();
                },
            });
        }
    }
    function showDetailBossCar2(paper)
    {
        var paper_id = paper.getAttribute('data-paper-id');
        var type_paper_id = paper.getAttribute('data-type-paper-id');
        if (type_paper_id == 1) {
            $.ajax({
                type: 'post',
                url: "<?php echo CHtml::normalizeUrl(array('/consider/view')); ?>",
                data: {paper_approval_id: paper_id},
                success: function(results) {
                    $(".modal-header h4").text("ข้อมูลคำรองขอใช้รถส่วนกลาง");
                    document.getElementById("modal-body").innerHTML = results;
                    $('#formModal').modal();
                },
            });
        } else {
            $.ajax({
                type: 'post',
                url: "<?php echo CHtml::normalizeUrl(array('/considerBus/view')); ?>",
                data: {paper_approval_id: paper_id},
                success: function(results) {
                    $(".modal-header h4").text("ข้อมูลคำรองขอใช้รถยนต์ปรับอากาศ");
                    document.getElementById("modal-body").innerHTML = results;
                    $('#formModal').modal();
                },
            });
        }
    }
//    });

</script>