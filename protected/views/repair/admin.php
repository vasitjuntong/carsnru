<?php
$this->breadcrumbs = array(
    $this->nameController => array('admin'),
    $this->labelController['Manage'],
);

$this->menu = array(
    array(
        'label' => 'สร้าง',
        'icon' => 'fa-plus',
        'url' => array('create'),
    )
);
?>
<div class="panel panel-default table-responsive">
    <div class="panel-heading">
        <h3><?php echo $this->nameController; ?></h3>
    </div>
    <div class="padding-md clearfix">
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'repair-grid',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'summaryText' => false,
            'itemsCssClass' => 'table table-bordered table-condensed table-hover table-striped',
            'summaryCssClass' => 'dataTables_info',
            'columns' => array(
                array(
                    'header' => Yii::t('menu', 'ลำดับ'),
                    'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                    'htmlOptions' => array(
                        'style' => 'width: 50px; text-align: center;'
                    )
                ),
                array(
                    'name' => 'car_id',
                    'value' => '$data->car->license_no',
                ),
                array(
                    'name' => 'personnel_id',
                    'value' => '$data->personnel->name',
                ),
                array(
                    'name' => 'amount',
                    'value' => 'number_format($data->amount)',
                    'htmlOptions' => array(
                        'style' => 'width: 5%; text-align: center;'
                    ),
                    'headerHtmlOptions' => array(
                        'style' => 'width: 5%; text-align: center;'
                    ),
                ),
                array(
                    'name' => 'create_at',
                    'value' => 'Tools::DateTimeToShow($data->create_at, "/", true)',
                    'htmlOptions' => array(
                        'style' => 'width: 10%; text-align: center;'
                    ),
                    'headerHtmlOptions' => array(
                        'style' => 'width: 10%; text-align: center;'
                    ),
                    'filter' => false,
                ),
                array(
                    'name' => 'update_at',
                    'value' => 'Tools::DateTimeToShow($data->update_at, "/", true)',
                    'htmlOptions' => array(
                        'style' => 'width: 10%; text-align: center;'
                    ),
                    'headerHtmlOptions' => array(
                        'style' => 'width: 10%; text-align: center;'
                    ),
                    'filter' => false,
                ),
                /*
                  'update_at',
                 */
                array(
                    'class' => 'CButtonColumn',
                    'deleteConfirmation' => Yii::app()->params['confirmationMessageStart'] . $this->nameController . Yii::app()->params['confirmationMessageEnd'],
                    'template' => '{view}  {update}  {delete}',
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
        ?>
    </div>