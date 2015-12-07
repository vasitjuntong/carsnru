<div class="panel panel-default table-responsive">
    <div class="panel-heading">
        <h3><?php echo $this->nameController; ?></h3>
    </div>
    <div class="padding-md clearfix">
        <?php
        $this->renderPartial('/search/search_month', array(
            'model' => $model,
        ));
        ?>
    </div>
    <div id='show_detail'>
        <?php
        $this->renderPartial('_list', array(
            'model' => $paper,
            'dataProvider' => $dataProvider,
        ));
        ?>
    </div>
</div>

