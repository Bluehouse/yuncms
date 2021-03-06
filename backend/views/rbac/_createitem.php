<?php
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
    use yii\helpers\Url;
?>

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
                    <a href="<?php echo Url::to(['rbac/list']); ?>"><i class="fa fa-share btn btn-app-green-outline">返回列表</i></a>
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
                            <label class="col-md-4 control-label" for="val-description"><?php echo Html::label('名称', null); ?><span class="text-orange">*</span></label>
                            <div class="col-md-7"><?php echo Html::textInput('description', '', ['class' => 'form-control']); ?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val-name"><?php echo Html::label('标识', null); ?><span class="text-orange">*</span></label>
                            <div class="col-md-7"><?php echo Html::textInput('name', '', ['class' => 'form-control']); ?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val-rule_name"><?php echo Html::label('规则名称', null); ?><span class="text-orange">*</span></label>
                            <div class="col-md-7"><?php echo Html::textInput('rule_name', '', ['class' => 'form-control']); ?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val-data"><?php echo Html::label('数据', null); ?><span class="text-orange">*</span></label>
                            <div class="col-md-7"><?php echo Html::textArea('data', '', ['class' => 'form-control']); ?></div>
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