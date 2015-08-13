<?php
$this->breadcrumbs = array(
    $this->nameController
);
?>
<div class="panel-tab clearfix">
    <ul class="tab-bar">
        <li class="active"><a href="#car" data-toggle="tab"><i class="fa fa-truck"></i> รถยนต์ส่วนกลาง</a></li>
        <li><a href="#bus" data-toggle="tab"><i class="fa fa-truck"></i> รถบัสปรับอากาศ</a></li>
    </ul>
</div>
<div class="tab-content">
    <div class="tab-pane fade in active" id="car">
        <div class="panel panel-default table-responsive">
            <div class="panel-heading">
                <h3>รถยนต์ส่วนกลาง</h3>
            </div>
            <div class="padding-md clearfix">
                <?php
                $this->renderPartial('_list', array(
                    'model' => $model,
                    'dataProvider' => $dataProvider,
                ));
                ?>
            </div>
        </div>
    </div>

    <div class="tab-pane fade in" id="bus">
        <div class="panel panel-default table-responsive">
            <div class="panel-heading">
                <h3>รถบัสปรับอากาศ</h3>
            </div>
            <div class="padding-md clearfix"> 
                <?php
                $this->renderPartial('_list_bus', array(
                    'model' => $modelBus,
                    'dataProvider' => $dataProviderBus,
                ));
                ?>
            </div>
        </div>
    </div>
</div>