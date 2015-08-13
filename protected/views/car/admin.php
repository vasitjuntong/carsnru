<?php
$this->breadcrumbs = array(
    $this->nameController => array('admin'),
    $this->labelController['Manage'],
);

$this->widget('ext.Endless.ShortcutLink', array(
    'items' => array(
        array(
            'label' => 'สร้าง',
            'icon' => 'fa-plus',
            'url' => array('create'),
        ),
    ),
));
?>

<div class="panel panel-default table-responsive">
    <div class="panel-heading">
        <h3><?php echo $this->nameController; ?></h3>
    </div>
    <div class="padding-md clearfix">

        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'car-grid',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'summaryText' => false,
//            'summaryText' => Yii::app()->params['summaryTextGrid'],
            'itemsCssClass' => 'table table-bordered table-condensed table-hover table-striped',
            'summaryCssClass' => 'dataTables_info',
            'columns' => array(
                array(
                    'header' => Yii::t('menu', 'ลำดับ'),
                    'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                    'htmlOptions' => array(
                        'style' => 'width: 5%; text-align: center;'
                    ),
                    'headerHtmlOptions' => array(
                        'style' => 'width: 5%; text-align: center;'
                    ),
                ),
                'license_no',
                array(
                    'name' => 'brand_id',
                    'value' => '$data->brand->name',
                    'htmlOptions' => array(
                        'style' => 'width: 10%; text-align: center;'
                    ),
                ),
                array(
                    'name' => 'type_car_id',
                    'value' => '$data->typeCar->name',
                    'htmlOptions' => array(
                        'style' => 'width: 10%; text-align: center;'
                    ),
                ),
                array(
                    'name' => 'personnel_id',
                    'value' => '$data->personnel->name',
                    'htmlOptions' => array(
                        'style' => 'width: 10%;'
                    ),
                ),
                array(
                    'name' => 'date_registration',
                    'value' => 'Tools::DateTimeToShow($data->date_registration, "/", false)',
                    'htmlOptions' => array(
                        'style' => 'width: 10%; text-align: center;'
                    ),
                    'filter' => false,
                ), 
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
</div>