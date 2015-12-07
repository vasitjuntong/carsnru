<?php
$this->breadcrumbs = array(
    $this->nameController,
);
?>

<div class="panel panel-default table-responsive">
    <div class="panel-heading">
        <h3><?php echo $this->nameController; ?></h3>
    </div>
    <div class="padding-md clearfix">

        <?php
        $this->renderPartial('_gridview', array(
            'model' => $model,
            'dataProvider' => $dataProvider,
        ));
        ?>
    </div>
</div>