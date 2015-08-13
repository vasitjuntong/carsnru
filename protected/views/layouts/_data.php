<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<div class="row">
    <?php
    $this->widget('ext.Endless.ShortcutLink', array(
        'items' => $this->menu,
    ));
    ?>
</div>
<?php echo $content; ?>
<?php $this->endContent(); ?>

