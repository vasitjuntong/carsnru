
<?php
$this->breadcrumbs = array(
    $this->nameController => array('admin'),
    $model->name,
);

$this->menu = array(
    array(
        'label' => $this->labelController['Create'] . $this->nameController,
        'url' => array('create'),
        'icon' => 'fa-plus',
    ),
    array(
        'label' => $this->labelController['Update'] . $this->nameController,
        'url' => array('update', 'id' => $model->brand_id),
        'icon' => 'fa-pencil',
    ),
//    array(
//        'label' => $this->labelController['Delete'],
//        'url' => '#',
//        'linkOptions' => array(
//            'submit' => array(
//                'delete',
//                'id' => $model->brand_id
//            ),
//            'confirm' => 'Are you sure you want to delete this item?')
//    ),
    array(
        'label' => $this->labelController['Manage'] . $this->nameController,
        'url' => array('admin'),
        'icon' => 'fa-cog',
    ),
);

//$this->widget('ext.Endless.ShortcutLink', array(
//    'items' => array(
//        array('label' => $this->labelController['Create'] . $this->nameController, 'url' => array('create')),
//    ),
//));
?>

<div class="col-lg-offset-2 col-lg-8">
    <h2><?php echo $this->labelController['View'] . $this->nameController; ?> # <?php echo $model->name; ?></h2>

    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(
            'brand_id',
            'name',
        ),
    ));
    ?>
</div>
