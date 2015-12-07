<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'accept-form',
    'htmlOptions' => array(
        'class' => 'form-horizontal form-border',
    )
        ));
?>
<div class="form-group">
    <?php
    echo $form->labelEx($model, 'month', array(
        'class' => 'col-lg-3 control-label'
    ));
    ?>
    <div class="col-lg-2">
        <?php
        echo $form->dropDownList($model, 'month', Thai::$thaimonth_full, array(
            'empty' => 'ทั้งหมดของปี',
            'class' => 'form-control',
        ));
        ?>
    </div>
    <?php
    echo $form->labelEx($model, 'year', array(
        'class' => 'col-lg-1 control-label'
    ));
    ?>
    <div class="col-lg-1">
        <?php
        echo $form->textField($model, 'year', array(
            'class' => 'form-control',
        ));
        ?>
    </div> 
    <?php
    echo $form->labelEx($model, 'status', array(
        'class' => 'col-lg-1 control-label'
    ));
    ?>
    <div class="col-lg-2">
        <?php
        echo $form->dropDownList($model, 'status', Yii::app()->getModule('report')->statusPaperList, array(
            'class' => 'form-control',
            'empty' => $this->labelController['messageSelect'],
        ));
        ?>
    </div> 
</div>
<div class='form-group text-center'>
    <div class="col-lg-12">
        <div class="btn-group">
            <?php
            echo CHtml::htmlButton('<i class="fa fa-search"></i> Search', array(
                'onClick' => CHtml::ajax(array(
                    'url' => CHtml::normalizeUrl(array('search')),
                    'type' => 'post',
                    'data' => 'js:$("#accept-form").serialize()',
                    'update' => '#show_detail',
                )),
                'class' => 'btn btn-success btn-small',
            ));
            ?>
        </div>
        <div class="btn-group">
            <?php
            echo CHtml::htmlButton('<i class="fa fa-bars"></i> Excel', array(
                'submit' => array('excel'),
                'class' => 'btn btn-success btn-small',
                'onClick' => 'target="_blank"',
            ));
            ?>
        </div>
    </div>
</div>

<?php
$this->endWidget();
?>
