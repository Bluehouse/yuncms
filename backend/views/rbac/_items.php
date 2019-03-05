<?php
    use yii\grid\GridView;
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
    <div class="card">
        <div class="card-header">
            <h4>角色列表</h4>
        </div>
        <div class="card-block">
            <?php echo GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    [
                        'class' => 'yii\grid\SerialColumn',
                    ],
                    'description:text:名称',
                    'name:text:标识',
                    'rule_name:text:规则名称',
                    'created_at:datetime:创建时间',
                    'updated_at:datetime:更新时间',
                    [
                        'class' =>  'yii\grid\ActionColumn',
                        'header' => '操作',
                        'template' => '{assign} {update} {delete}',
                        'buttons' => [
                            'assign' => function($url, $model, $key) {
                                return Html::a('分配权限', ['assign-item', 'name' => $model['name']]);
                            },
                            'update' => function($url ,$model, $key) {
                                return Html::a('更新', ['updateitem', 'name' => $model['name']]);
                            },
                            'delete' => function($url, $model, $key) {
                                return Html::a('删除', ['deleteitem', 'name' => $model['name']]);
                            }
                        ]
                    ]
                ],
                'layout' => '{items}{summary} <div class="card-block col-md-offset-8"><nav>{pager}</nav>
            </div>',
            ]); ?>
<!--            <div class="card-block col-md-offset-8">-->
<!--                <nav>-->
<!--                    <ul class="pagination pagination-sm">-->
<!--                        --><?php //echo yii\widgets\LinkPager::widget(['pagination' => $pager, 'prevPageLabel' => '<i class="ion-chevron-left"></i>', 'nextPageLabel' => '<i class="ion-chevron-right"></i>']);?>
<!--                    </ul>-->
<!--                </nav>-->
<!--            </div>-->
        </div>
    </div>
</div>