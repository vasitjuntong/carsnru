<?php
$this->breadcrumbs = array(
    $this->nameController => array('admin'),
    $this->labelController['Create'] . $this->nameController,
);

$this->menu = array(
    array(
        'label' => $this->labelController['Manage'] . $this->nameController,
        'url' => array('admin'),
        'icon' => 'fa-cog',
    ),
);
?>

<div class="panel panel-default table-responsive">
    <div class="panel-heading">
        <h3><?php echo $this->labelController['Create'] . $this->nameController; ?></h3>
    </div>
    <div class="padding-md clearfix">

        <?php
        $this->renderPartial('_form', array(
            'model' => $model,
            'file' => $file,
        ));
        ?>
    </div>
</div>