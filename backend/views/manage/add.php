<?php
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
    use yii\helpers\Url;
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
                    <h4>添加管理员</h4>
                </div>
                <div class="card-block">
                    <a href="<?php echo Url::to(['manage/list']); ?>"><i class="fa fa-share btn btn-app-green-outline">返回列表</i></a>
                    <?php $form = ActiveForm::begin([
                        'enableClientScript' => false, // 阻止引入js
                        'options' => ['class' => 'js-validation-bootstrap form-horizontal'],
                        'fieldConfig' => [
                            'template' => '<div class="form-group">
<label class="col-md-4 control-label" for="val-username">{label} <span class="text-orange">*</span></label>
<div class="col-md-7">{input}{error}</div>'
                        ]
                    ]); ?>
                        <?php echo $form->field($model, 'adminuser')->textInput(['class' => 'form-control']); ?>
                        <?php echo $form->field($model, 'adminemail')->textInput(['class' => 'form-control']); ?>
                        <?php echo $form->field($model, 'adminpass')->passwordInput(['class' => 'form-control']); ?>
                        <?php echo $form->field($model, 'adminrepass')->passwordInput(['class' => 'form-control']); ?>
                        <div class="form-group m-b-0">
                            <div class="col-md-8 col-md-offset-4">
                                <?php echo Html::submitButton('保存', ['class' => 'btn btn-app']);?>
                            </div>
                        </div>
                   <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Content -->