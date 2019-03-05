<?php
    // 使用yii\bootstrap\ActiveForm时会自动引用yii自带的js，跟系统模板冲突
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
?>
<!-- Page Content -->
<div class="container-fluid p-y-md">
    <?php
    if (Yii::$app->session->hasFlash('info')) {
        $alert = Yii::$app->session->getFlash('info');
        echo "<div class='alert alert-success alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
            <p>{$alert}</p>
        </div>";
    }
    ?>
    <div class="row">
        <div class="col-lg-11">
            <div class="card">
                <div class="card-header">
                    <h4>编辑用户</h4>
                </div>
                <div class="card-block">
                    <a href="<?php echo yii\helpers\Url::to(['member/list']); ?>"><i class="fa fa-share btn btn-app-green-outline">返回列表</i></a>
                    <?php $form = ActiveForm::begin([
                        'enableClientScript' => false, // 阻止引入js
                        'enableClientValidation' => false, // 不引入js，这个其实也就不用设置了
                        'options' => ['class' => 'js-validation-bootstrap form-horizontal'],
                        'fieldConfig' => [
                            'template' => '<label class="col-md-4 control-label">{label} <span class="text-orange">*</span></label>
<div class="col-md-7">{input}{error}</div>'
                        ]
                    ]); ?>
                    <?php echo $form->field($model, 'username')->textInput(['class' => 'form-control', 'disabled' => true]); ?>
                    <?php echo $form->field($model, 'useremail')->textInput(['class' => 'form-control']); ?>
                    <?php echo $form->field($model, 'userpass')->passwordInput(['class' => 'form-control']); ?>
                    <?php echo $form->field($model, 'userrepass')->passwordInput(['class' => 'form-control']); ?>
                    <div class="form-group m-b-0">
                        <div class="col-md-8 col-md-offset-4">
                            <?php echo Html::submitButton('更新', ['class' => 'btn btn-app']); ?>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Content -->