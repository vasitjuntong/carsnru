<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - เข้าสู่ระบบ';
$this->breadcrumbs = array(
    'เข้าสู่ระบบ',
);
?>
<div class="text-center">
    <h2 class="fadeInUp animation-delay8" style="font-weight:bold"><span style="color:#ccc; text-shadow:0 1px #fff"><img src="/img/Logo.png"  alt=""/></span>
    </h2>
</div>
<div class="text-center">
    <h2 class="fadeInUp animation-delay8" style="font-weight:bold"><span class="text-success">หน่วยยานพาหนะ</span> <span style="color:#ccc; text-shadow:0 1px #fff">มหาวิทยาลัยราชภัฏสกลนคร</span>
    </h2>
</div>

<div class="login-widget animation-delay1">	
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <div class="pull-left">
                <i class="fa fa-lock fa-lg"></i> เข้าสู่ระบบ
            </div>

            <div class="pull-right">
                <a class="btn btn-default btn-xs login-link" href="<?php echo Yii::app()->createUrl('admin/'); ?>" style="margin-top:-2px;"><i class="fa fa-lock"></i> บุคลลากร</a>
            </div>
        </div>
        <div class="panel-body">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'login-form',
//                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'htmlOptions' => array(
                    'class' => 'form-login'
                ),
            ));
            ?>
            <div class="form-group">
                <?php echo $form->label($model, 'username'); ?>
                <?php
                echo $form->textField($model, 'username', array(
                    'class' => 'form-control input-sm bounceIn animation-delay2',
                    'placeholder' => $model->getAttributeLabel('username'),
                ));
                ?>
                <?php echo $form->error($model, 'username'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->label($model, 'password'); ?>
                <?php
                echo $form->passwordField($model, 'password', array(
                    'class' => 'form-control input-sm bounceIn animation-delay4',
                    'placeholder' => $model->getAttributeLabel('password'),
                ));
                ?>
                <?php echo $form->error($model, 'password'); ?>
            </div>
            <div class="form-group">
                <label class="label-checkbox inline">
                    <?php echo $form->checkBox($model, 'rememberMe'); ?>
                    <span class="custom-checkbox info bounceIn animation-delay4"></span>
                </label>
                <?php echo $model->getAttributeLabel('rememberMe'); ?>	
            </div>

            <!--    <div class="seperator"></div>
                <div class="form-group">
                    ลืมรหัสผ่าน ?<br/>
                    กด <a href="#">ตรงนี้</a> เพื่อรีเซ็ต รหัสผ่าน
                </div>-->

            <hr/>
            <button type="submit" class="btn btn-success btn-sm bounceIn animation-delay5 pull-right"><i class="fa fa-sign-in"></i> ลงชื่อเข้าใช้</button>
        </div>
    </div><!-- /panel -->
</div><!-- /login-widget -->
<?php $this->endWidget(); ?>