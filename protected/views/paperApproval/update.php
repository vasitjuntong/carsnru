
<?php
$this->breadcrumbs = array(
    $this->nameController => array('admin'),
    $model->paper_no => array('view', 'id' => $model->paper_approval_id),
    $this->labelController['Update'],
);

$this->menu = array(
    array(
        'label' => 'ส่งคำขอใช้รถยนต์ส่วนกลาง',
        'url' => array('create', 'type_car_id' => 1),
        'icon' => 'fa-plus',
    ),
    array(
        'label' => $this->labelController['View'],
        'url' => array('view', 'id' => $model->paper_approval_id),
        'icon' => 'fa-search',
    ),
    array(
        'label' => $this->labelController['Manage'] . $this->nameController,
        'url' => array('admin'),
        'icon' => 'fa-cog',
    ),
);
?>

<h2><?php echo $this->labelController['Update']; ?> # <?php echo $model->paper_no; ?></h2>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'file' => $file,
));
?>