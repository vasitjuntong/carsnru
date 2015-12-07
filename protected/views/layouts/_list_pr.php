<div class="span6">
    <h3 class="spec"><?php echo $data->subject; ?></h3>

    <blockquote>
        <p>
            <?php echo iconv_substr($data->description, 0, 600); ?> 
            <a id="pr" href="#data_<?php echo $data->news_id; ?>">
                เพิ่มเติม
            </a>.
        </p>
        <small>
            <cite title="<?php echo $data->personnel->name; ?>">
                <span style="font-weight: bold;"><i>ผู้เขียน</i> : </span> 
                <?php echo $data->personnel->name; ?> 
                <span style="font-size: 80%;"><i style="color: #ed9c28;"><?php echo Tools::DateTimeToShow($data->update_at, '/', true); ?></i></span>
            </cite>
        </small>
    </blockquote>
</div>
<div style="display: none; ">
    <div id="data_<?php echo $data->news_id; ?>" style=" width: 720px;">
        <div style="text-align: center;">
            <?php echo CHtml::image(Yii::app()->params['pathUpload'] . $data->pic, ''); ?>
        </div>
        <h3>
            <?php echo $data->subject; ?>
        </h3>
        <p>
            <?php echo $data->description; ?>
        </p>
    </div>
</div>
