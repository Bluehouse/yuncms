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
                    <h4>授权</h4>
                </div>
                <div class="card-block">
                    <a href="<?php echo Url::to(['rbac/list']); ?>"><i class="fa fa-share btn btn-app-green-outline">返回列表</i></a>
                    <?php $form = ActiveForm::begin([
                        'options' => ['class' => 'js-validation-bootstrap form-horizontal'],
                        'fieldConfig' => [
                            'template' => '
<label class="col-md-4 control-label" for="val-username">{label} <span class="text-orange">*</span></label>
<div class="col-md-7">{input}{error}</div>'
                        ]
                    ]); ?>
                        <div class="form-group">
                            <?php echo Html::label('管理员名称', null) . Html::encode($admin); ?>
                        </div>
                        <div class="form-group">
                            <?php echo Html::label('分配角色', null) . Html::checkboxList('children', $children['roles'], $roles); ?>
                        </div>
                        <div class="form-group">
                            <?php echo Html::label('分配权限', null) . Html::checkboxList('children', $children['permissions'], $permissions); ?>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-md-8 col-md-offset-4">
                                <?php echo Html::submitButton('授权', ['class' => 'btn btn-app']); ?>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Content -->