<?php
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
?>

<?php
    if (Yii::$app->session->hasFlash('info')) {
        $alert = Yii::$app->session->getFlash('info');
        echo "<div class='alert alert-success alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
            <p>{$alert}</p>
        </div>";
    }
?>
<!-- Page Content -->
<div class="container-fluid p-y-md">
    <div class="card-header">
        <h4>编辑商品</h4>
    </div>
    <div class="row">
        <div class="col-lg-11">
            <div class="card js-wizard-simple">
                <!-- Step Tabs -->
                <ul class="nav nav-tabs nav-tabs-icons nav-justified">
                    <li class="active">
                        <a href="#simple-classic-step1" data-toggle="tab"><i class="fa fa-th-list"></i>基本信息</a>
                    </li>
                    <li>
                        <a href="#simple-classic-step2" data-toggle="tab"><i class="fa fa-envira"></i>商品详情</a>
                    </li>
                    <li>
                        <a href="#simple-classic-step3" data-toggle="tab"><i class="ion-ios-gear"></i>附加设置</a>
                    </li>
                </ul>
                <!-- End Step Tabs -->

                <!-- Form -->
                <?php $form = ActiveForm::begin([
                    'enableClientScript' => false, // 阻止引入js
                    'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
                    'fieldConfig' => [
                        'template' => '
                        <div class="form-group">                  
                            <label class="col-md-4 control-label" for="val-username">{label}</label>
                            <div class="col-md-6">
                               {input}{error}
                            </div>
                        </div>'
                    ]
                ]); ?>
                <!-- Steps Content -->
                <div class="card-block tab-content">
                    <!-- Step 1 -->
                    <div class="tab-pane m-t-md m-b-lg active" id="simple-classic-step1">
                        <?php echo $form->field($model, 'title')->textInput(['class' => 'form-control']); ?>
                        <?php echo $form->field($model, 'cateid')->dropDownList($cateList); ?>
                        <?php echo $form->field($model, 'price')->textInput(['class' => 'form-control']); ?>
                        <?php echo $form->field($model, 'saleprice')->textInput(['class' => 'form-control']); ?>
                        <?php echo $form->field($model, 'num')->textInput(['class' => 'form-control']); ?>
                        <?php echo $form->field($model, 'cover')->fileInput(['class' => '', 'multiple' => '']);?>
                    </div>
                    <!-- End Step 1 -->

                    <!-- Step 2 -->
                    <div class="tab-pane m-t-md m-b-lg" id="simple-classic-step2">
                        <?php echo $form->field($model, 'descr')->textArea(['class' => 'form-control input-lg', 'id' => 'descr', 'rows' => 6]); ?>
                    </div>
                    <!-- End Step 2 -->

                    <!-- Step 3 -->
                    <div class="tab-pane m-t-md m-b-lg" id="simple-classic-step3">
                        <?php echo $form->field($model, 'ison')->radioList(
                            [0 => '下架', 1 => '上架'],
                            [
                                'class' => 'form-control',
                                'item' => function($index,$label, $name, $checked, $value) {
                                    $checked = $checked ? "checked" : "";
                                    $return = '<label class="css-input css-radio css-radio-primary m-r-sm">';
                                    $return .= '    <input type="radio" name="' . $name . '" value="' . $value . '" ' . $checked . '/><span></span>' . $label;
                                    $return .= "</label>";
                                    return $return;
                                }]);
                        ?>
                        <?php echo $form->field($model, 'ishot')->radioList(
                            [0 => '不热卖', 1 => '热卖'],
                            [
                                'class' => 'form-control',
                                'item' => function($index, $label, $name, $checked, $value) {
                                    $checked = $checked ? "checked" : "";
                                    $return = '<label class="css-input css-radio css-radio-danger m-r-sm">';
                                    $return .= '    <input type="radio" name="' . $name . '" value="' . $value . '" ' . $checked . '/><span></span>' . $label;
                                    $return .= "</label>";
                                    return $return;
                                }
                            ]
                        );
                        ?>
                        <?php echo $form->field($model, 'issale')->radioList(
                            [0 => '不促销', 1 => '促销'],
                            [
                                'class' => 'form-control',
                                'item' => function($index, $label, $name, $checked, $value) {
                                    $checked = $checked ? "checked" : "";
                                    $return = '<label class="css-input css-radio css-radio-warning m-r-sm">';
                                    $return .= '    <input type="radio" name="' . $name . '" value="' . $value . '" ' . $checked . '/><span></span>' . $label;
                                    $return .= "</label>";
                                    return $return;
                                }
                            ]
                        );
                        ?>
                        <?php echo $form->field($model, 'istui')->radioList(
                            [0 => '不推荐', 1 => '推荐'],
                            [
                                'class' => 'form-control',
                                'item' => function($index, $label, $name, $checked, $value ) { // 注意顺序，否则科能获取不到值
                                    $checked = $checked ? "checked" : "";
                                    $return = '<label class="css-input css-radio css-radio-info m-r-sm">';
                                    $return .= '    <input type="radio" name="' . $name . '" value="' . $value . '" ' . $checked . '/><span></span>' . $label;
                                    $return .= "</label>";
                                    return $return;
                                }]);
                        ?>
                    </div>
                    <!-- End Step 3 -->
                </div>

                <!-- Steps Navigation -->
                <div class="card-block b-t">
                    <div class="row">
                        <div class="col-xs-6 text-right">
                            <?php echo Html::submitButton('提交', ['class' => 'btn btn-app']);?>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<!-- End Page Content -->