<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'paper-approval-grid',
    'dataProvider' => $dataProvider,
    'filter' => $model,
    'summaryText' => Yii::app()->params['summaryTextGrid'],
    'htmlOptions' => array(
        'class' => '',
    ),
    'itemsCssClass' => 'table table-bordered table-condensed table-hover table-striped',
    'summaryCssClass' => 'dataTables_info',
    'columns' => array(
        array(
            'header' => Yii::t('menu', 'ลำดับ'),
            'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            'headerHtmlOptions' => array('style' => 'width: 5%; text-align: center;'),
            'htmlOptions' => array('style' => 'width: 5%; text-align: center;'),
        ),
        array(
            'type' => 'raw',
            'name' => 'paper_no',
            'value' => 'LinkGridview::showPaperDone($data->paper_approval_bus_id, 2, $data->paper_no)',
            'headerHtmlOptions' => array('style' => 'width: 15%; text-align: center;'),
            'htmlOptions' => array('style' => 'width: 15%; text-align: center;'),
        ),
        array(
            'name' => 'from_place',
            'value' => '$data->from_place',
            'headerHtmlOptions' => array('style' => 'text-align: center;'),
            'htmlOptions' => array('style' => 'text-align: center;'),
        ),
        array(
            'name' => 'to_place',
            'value' => '$data->to_place',
            'headerHtmlOptions' => array('style' => 'text-align: center;'),
            'htmlOptions' => array('style' => 'text-align: center;'),
        ),
//        array(
//            'name' => 'status',
//            'value' => 'Status::$paper[$data->status]',
//            'headerHtmlOptions' => array('style' => 'width: 10%; text-align: center;'),
//            'htmlOptions' => array('style' => 'width: 10%; text-align: center;'),
//        ),
//        array(
//            'name' => 'accept.status',
//            'value' => '($data->accept->status != null) ? Status::$doing[$data->accept->status] : "<span class=\"bg-info\">รอดำเนินการ</span>"',
//            'headerHtmlOptions' => array('style' => 'width: 10%; text-align: center;'),
//            'htmlOptions' => array('style' => 'width: 10%; text-align: center;'),
//        ),
        array(
            'name' => 'create_at',
            'value' => 'Tools::DateTimeToShow($data->create_at,"/",true)',
            'headerHtmlOptions' => array('style' => 'width: 10%; text-align: center;'),
            'htmlOptions' => array('style' => 'width: 10%; text-align: center;'),
            'filter' => false,
        ),
        array(
            'header' => '',
            'type' => 'raw',
            'value' => 'LinkGridview::showPaperDone($data->paper_approval_bus_id, 2)',
            'htmlOptions' => array(
                'style' => 'text-align: center; width: 10%'
            ),
        ),
    ),
));
?>
<script type="text/javascript">

    function showPaperDone(paper) {
        var paper_id = paper.getAttribute('data-paper-id');
        var type_paper_id = paper.getAttribute('data-type-paper-id');

        $.ajax({
            type: 'post',
            url: '<?php echo CHtml::normalizeUrl(array('view'));  ?>',
            data: {
                paper_id: paper_id,
                type_paper_id: type_paper_id,
            },
            success: function(results) {
                $(".modal-header h4").text("คืนรถยนต์ปรับอากาศ");
                document.getElementById("modal-body").innerHTML = results;
                $('#formModal').modal();
            },
        });
    }
</script>


