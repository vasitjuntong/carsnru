<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'paper-approval_bus-grid',
    'dataProvider' => $dataProvider,
    'filter' => $model,
//    'summaryText' => Yii::app()->params['summaryTextGrid'],
    'summaryText' => false,
    'itemsCssClass' => 'table table-bordered table-condensed table-hover table-striped',
    'summaryCssClass' => 'dataTables_info',
    'columns' => array(
        array(
            'header' => Yii::t('menu', 'ลำดับ'),
            'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            'htmlOptions' => array(
                'style' => 'width: 5%; text-align: center;'
            )
        ),
        array(
            'name' => 'member_id',
            'value' => '$data->member->name',
            'htmlOptions' => array(
                'style' => 'width: 10%;',
            ),
        ),
        array(
            'name' => 'paper_no',
            'value' => '$data->paper_no',
            'htmlOptions' => array(
                'style' => 'width: 10%;',
            ),
        ),
        'from_place',
        'to_place',
        array(
            'name' => 'status',
            'type' => 'raw',
            'value' => '($data->status == 3)? "<div style=\"color: red; font-style: italic;\">".Status::$paper[$data->status]."</div>" : Status::$paper[$data->status]',
            'htmlOptions' => array(
                'style' => 'width: 5%;',
            ),
            'filter' => false,
        ),
        array(
            'name' => 'create_at',
            'value' => 'Tools::DateTimeToShow($data->create_at, "/", true)',
            'htmlOptions' => array(
                'style' => 'width: 10%; text-align: center;',
            ),
            'filter' => false,
        ),
        array(
            'type' => 'raw',
            'header' => '',
            'value' => '$data->accept->status == 3 ? LinkGridview::showDetailDoing3($data->paper_approval_bus_id) :LinkGridview::showDetailDoing($data->paper_approval_bus_id)',
            'htmlOptions' => array(
                'style' => 'width: 5%; text-align: center;',
            ),
        ),
    ),
));
?>