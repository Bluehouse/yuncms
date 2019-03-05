<?php
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
                    <h4>添加角色</h4>
                </div>
                <div class="card-block">
                    <a href="<?php echo yii\helpers\Url::to(['rbac/list']); ?>"><i class="fa fa-share btn btn-app-green-outline">返回列表</i></a>
                    <?php $form = ActiveForm::begin([
                        'enableClientScript' => false, // 阻止引入js
                        'options' => ['class' => 'js-validation-bootstrap form-horizontal'],
                        'fieldConfig' => [
                            'template' => '
<label class="col-md-4 control-label" for="val-username">{label} <span class="text-orange">*</span></label>
<div class="col-md-7">{input}{error}</div>'
                        ]
                    ]); ?>
                    <div class="form-group">
                        <?php echo Html::label('名称', null) . Html::textInput('description','默认值', ['class' => 'col-md-7']); ?>
                    </div>
                    <div class="form-group">
                        <?php echo Html::label('标识', null) . Html::textInput('name', '', ['class' => 'col-md-7']); ?>
                    </div>
                    <div class="form-group">
                        <?php echo Html::label('规则名称', null) . Html::textInput('rule_name', '', ['class' => 'col-md-7']); ?>
                    </div>
                    <div class="form-group">
                        <?php echo Html::label('数据', null) . Html::textArea('data', '', ['class' => 'col-md-7']); ?>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-md-8 col-md-offset-4">
                            <?php echo Html::submitButton('保存', ['class' => 'btn btn-app']); ?>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- End Page Content -->