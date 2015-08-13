<?php
$model = new LoginFormBack();
$model->status = 1;
if (isset($_POST['LoginFormBack'])) {
    $model->attributes = $_POST['LoginFormBack'];
    if ($model->validate()) {
        if ($model->login())
            if (!Yii::app()->user->isAdmin())
                $this->redirect(array('index'));
            else {
                $this->redirect(array('/admin'));
            }
    }
}
?>
<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
//                    'enableAjaxValidation' => false,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    ?>


    <div class="row">
        <?php echo $form->labelEx($model, 'username'); ?>
        <?php echo $form->textField($model, 'username'); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password'); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>

    <div class="row rememberMe">
        <?php echo $form->checkBox($model, 'rememberMe'); ?>
        <?php echo $form->label($model, 'rememberMe'); ?>
        <?php echo $form->error($model, 'rememberMe'); ?>
    </div>

    <div class="row buttons">
        <?php // echo CHtml::submitButton('Login');  ?>

        <?php
        echo CHtml::submitButton('Login');
        ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->
