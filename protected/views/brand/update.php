
<?php
$this->breadcrumbs = array(
    $this->nameController => array('admin'),
    $model->name => array('view', 'id' => $model->brand_id),
    $this->labelController['Update'] . $model->name,
);

$this->menu = array(
    array(
        'label' => $this->labelController['Create'] . $this->nameController,
        'url' => array('create'),
        'icon' => 'fa-plus',
    ),
    array(
        'label' => $this->labelController['View'] . $model->name,
        'url' => array('view', 'id' => $model->brand_id),
        'icon' => 'fa-search',
    ),
    array(
        'label' => $this->labelController['Manage'] . $this->nameController,
        'url' => array('admin'),
        'icon' => 'fa-cog',
    ),
);
?>
<div class="form-group">
    <div class="col-lg-10 col-lg-offset-2">
        <h2><?php echo $this->labelController['Update']; ?> # <?php echo $model->name; ?></h2>
    </div>
</div>

<?php $this->renderPartial('_form', array('model' => $model)); ?>