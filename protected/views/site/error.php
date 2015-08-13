<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle = Yii::app()->name . ' - Error';
$this->breadcrumbs = array(
    'Error',
);
?>
<div class="error">
    
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 text-center">
        <div class="h5">ผิดพลาด</div>
        <h1 class="m-top-none error-heading"><?php echo $code; ?></h1>
        <div><?php echo CHtml::encode($message); ?></div>
    </div><!-- /.col -->
</div>