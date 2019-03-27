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
            <h4>分类列表</h4>
        </div>
        <div class="card-block">
            <a href="<?php echo yii\helpers\Url::to(['category/add']); ?>"><i class="fa fa-plus btn btn-app-green-outline">添加分类</i></a>
            <a href="<?php echo yii\helpers\Url::to(['category/delAll']); ?>"><i class="ion-android-delete btn btn-app-blue-outline">删除</i></a>
            <a href="<?php echo yii\helpers\Url::to(['category/list']); ?>"><i class="fa fa-refresh btn btn-app-green-outline"></i></a>
            <table class="table table-bordered table-striped table-vcenter table-header-bg table-condensed table-hover js-dataTable-full js-table-checkable">
                <thead>
                    <tr>
                        <th class="text-center">
                            <label class="css-input css-checkbox css-checkbox-primary">
                                <input type="checkbox"><span></span>
                            </label>
                        </th>
                        <th class="text-center">ID</th>
                        <th class="text-center">PID</th>
                        <th class="text-center">分类名称</th>
                        <th class="text-center">添加时间</th
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <div class="card-block col-md-offset-8">
                <nav>
<!--                    <ul class="pagination pagination-sm">-->
<!--                        --><?php //echo yii\widgets\LinkPager::widget(['pagination' => $pager, 'prevPageLabel' => '<i class="ion-chevron-left"></i>', 'nextPageLabel' => '<i class="ion-chevron-right"></i>']);?>
<!--                    </ul>-->
                </nav>
            </div>
        </div>
    </div>
</div>