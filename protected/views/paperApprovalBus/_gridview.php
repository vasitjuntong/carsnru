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
            'name' => 'paper_no',
            'value' => '$data->paper_no',
            'headerHtmlOptions' => array('style' => 'width: 20%; text-align: center;'),
            'htmlOptions' => array('style' => 'width: 20%; text-align: center;'),
        ),
        array(
            'name' => 'to_place',
            'value' => '$data->to_place',
            'headerHtmlOptions' => array('style' => 'text-align: center;'),
            'htmlOptions' => array('style' => 'text-align: center;'),
        ),
        array(
            'name' => 'status',
            'value' => 'Status::$paper[$data->status]',
            'headerHtmlOptions' => array('style' => 'width: 10%; text-align: center;'),
            'htmlOptions' => array('style' => 'width: 10%; text-align: center;'),
        ),
        array(
            'name' => 'accept.status',
            'value' => '($data->accept->status != null) ? Status::$doing[$data->accept->status] : "<span class=\"bg-info\">รอดำเนินการ</span>"',
            'headerHtmlOptions' => array('style' => 'width: 10%; text-align: center;'),
            'htmlOptions' => array('style' => 'width: 10%; text-align: center;'),
        ),
        array(
            'name' => 'create_at',
            'value' => 'Tools::DateTimeToShow($data->create_at,"/",true)',
            'headerHtmlOptions' => array('style' => 'width: 10%; text-align: center;'),
            'htmlOptions' => array('style' => 'width: 10%; text-align: center;'),
        ),
        array(
            'class' => 'CButtonColumn',
            'deleteConfirmation' => Yii::app()->params['confirmationMessageStart'] . $this->nameController . Yii::app()->params['confirmationMessageEnd'],
            'template' => '{view}  {update}  {delete}',
            'buttons' => array(
                'update' => array(
                    'visible' => '$data->status == 0',
                ),
                'delete' => array(
                    'visible' => '$data->status == 0',
                ),
            ),
            'viewButtonOptions' => array(
                'class' => 'fa fa-search',
            ),
            'viewButtonImageUrl' => false,
            'viewButtonLabel' => ' ',
            'updateButtonOptions' => array(
                'class' => 'fa fa-pencil',
            ),
            'updateButtonImageUrl' => false,
            'updateButtonLabel' => ' ',
            'deleteButtonOptions' => array(
                'class' => 'fa fa-times',
            ),
            'deleteButtonImageUrl' => false,
            'deleteButtonLabel' => ' ',
            'htmlOptions' => array(
                'style' => 'text-align: center; width: 10%'
            ),
        ),
    ),
));

