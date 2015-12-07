<?php
if (Yii::app()->user->isRector()) {
    $paperAccept = Accept::model()->doing1()->desc()->findAll();
} else if (Yii::app()->user->isViceRector()) {
    $paperAccept = Accept::model()->rector_vicerector()->desc()->findAll();
}
?>
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-bell fa-lg"></i>
        <?php if (count($paperAccept) > 0) { ?>
            <span class="notification-label bounceIn animation-delay6"><?php echo count($paperAccept); ?></span>
        <?php } ?>
    </a>
    <ul class="dropdown-menu notification dropdown-3">
        <li><a href="#">คำร้องทั้งหมด <?php echo count($paperAccept); ?> เรื่อง</a></li>					  
        <?php foreach ($paperAccept as $value):
            ?>
            <li>
                <?php
                if ($value->status == 2) {
                    ?>
                    <a href="#" data-paper-id="<?php echo $value->paper_id; ?>" data-type-paper-id="<?php echo $value->type_paper_id; ?>" onClick="showDetailDoing(this)" >
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
                } else if ($value->status == 3) {
                    ?>
                    <a href="#" data-paper-id="<?php echo $value->paper_id; ?>" data-type-paper-id="<?php echo $value->type_paper_id; ?>" onClick="showDetailDoing3(this)" >
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
        <li><a href="<?php echo Yii::app()->createUrl('/doing1'); ?>">ดูคำร้องทั้งหมด</a></li>			  
    </ul>
</li>
<script>

    function showDetailDoing(paper)
    {
        var paper_id = paper.getAttribute('data-paper-id');
        var type_paper_id = paper.getAttribute('data-type-paper-id');

        if (type_paper_id == 1) {
            $.ajax({
                type: 'post',
                url: "<?php echo CHtml::normalizeUrl(array('/doing1/view')); ?>",
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
                url: "<?php echo CHtml::normalizeUrl(array('/doing2/view')); ?>",
                data: {paper_approval_id: paper_id},
                success: function(results) {
                    $(".modal-header h4").text("รับเรื่องคำร้องใช้รถยนต์ปรับอากาศ");
                    document.getElementById("modal-body").innerHTML = results;
                    $('#formModal').modal();
                },
            });
        }
    }
    function showDetailDoing3(paper)
    {
        var paper_id = paper.getAttribute('data-paper-id');
        var type_paper_id = paper.getAttribute('data-type-paper-id');

        if (type_paper_id == 2) {
            $.ajax({
                type: 'post',
                url: "<?php echo CHtml::normalizeUrl(array('/doing3/view')); ?>",
                data: {paper_approval_id: paper_id},
                success: function(results) {
                    $(".modal-header h4").text("รับเรื่องคำร้องใช้รถยนต์ปรับอากาศ");
                    document.getElementById("modal-body").innerHTML = results;
                    $('#formModal').modal();
                },
            });
        }
    }


</script>