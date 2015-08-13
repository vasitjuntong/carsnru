
<?php
$this->breadcrumbs = array(
    $this->nameController => array('admin'),
    $model->name => array('view', 'id' => $model->personnel_id),
    $this->labelController['Update'] . ' ' . $model->name,
);

$this->menu = array(
    array(
        'label' => $this->labelController['Create'] . $this->nameController,
        'url' => array('create'),
        'icon' => 'fa-plus',
    ),
    array(
        'label' => $this->labelController['View'] . $model->name,
        'url' => array('view', 'id' => $model->personnel_id),
        'icon' => 'fa-search',
    ),
    array(
        'label' => $this->labelController['Manage'] . $this->nameController,
        'url' => array('admin'),
        'icon' => 'fa-cog',
    ),
);
?>
<div class="panel panel-default table-responsive">
    <div class="panel-heading">
        <h3><?php echo $this->labelController['Update']; ?> # <?php echo $model->name; ?></h3>
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