<?php
$this->breadcrumbs = array(
    $this->nameController
);
?>
<div class="panel panel-default table-responsive">
    <div class="panel-heading">
        <h3><?php echo $this->nameController; ?></h3>
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
<div class="panel panel-default table-responsive">
    <div class="panel-heading">
        <h3>คำร้องขอใช้รถยนต์ปรับอากาศ</h3>
    </div>
    <div class="padding-md clearfix">
        <?php
        $this->renderPartial('/paperApprovalBusList/_list', array(
            'model' => $modelBus,
            'dataProvider' => $dataProviderBus,
        ));
        ?>
    </div>
</div>