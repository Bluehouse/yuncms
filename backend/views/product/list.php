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
            <h4>商品列表</h4>
        </div>
        <div class="card-block">
            <div class="">
                <a href="<?php echo yii\helpers\Url::to(['product/add']); ?>"><i class="fa fa-plus btn btn-app-green-outline">发布商品</i></a>
                <a href="<?php echo yii\helpers\Url::to(['product/delAll']); ?>"><i class="ion-android-delete btn btn-app-blue-outline">删除</i></a>
            </div>
            <table class="table table-bordered table-striped table-vcenter table-header-bg table-condensed table-hover"><!--js-dataTable-full开启自动分页-->
                <thead>
                    <tr>
                        <th class="text-center">
                            <label class="css-input css-checkbox css-checkbox-primary">
                                <input type="checkbox" id="row_1" name="row_1"><span></span>
                            </label>
                        </th>
                        <th class="text-center">ID</th>
                        <th class="text-center">封面</th>
                        <th class="text-center">商品名称</th>
                        <th class="text-center">商品分类</th>
                        <th class="text-center">商品单价</th>
                        <th class="text-center">商品库存</th>
                        <th class="text-center">是否上架</th>
                        <th class="text-center">是否促销</th>
                        <th class="text-center">是否推荐</th>
                        <th class="text-center">是否热卖</th>
                        <th class="text-center" style="width: 10%;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $product): ?>
                        <tr>
                            <td class="text-center">
                                <label class="css-input css-checkbox css-checkbox-primary">
                                    <input type="checkbox"><span></span>
                                </label>
                            </td>
                            <td class="text-center"><?php echo $product->productid; ?></td>
                            <td class="text-center"><img src="<?php echo $product->cover; ?>" /></td>
                            <td class="text-center"><?php echo $product->title; ?></td>
                            <td class="text-center"><?php echo $product->cateid; ?></td>
                            <td class="text-center"><?php echo $product->price; ?></td>
                            <td class="text-center"><?php echo $product->num; ?></td>
                            <td class="text-center"><?php echo $product->ison == 1 ? "✔" : "✘"; ?></td>
                            <td class="text-center"><?php echo $product->issale == 1 ? "✔" : "✘"; ?></td>
                            <td class="text-center"><?php echo $product->istui == 1 ? "✔" : "✘"; ?></td>
                            <td class="text-center"><?php echo $product->ishot == 1 ? "✔" : "✘"; ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="<?php echo yii\helpers\Url::to(['product/edit', 'pid' => $product->productid]); ?>"><button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="编辑"><i class="ion-edit"></i></button>
                                    <a href="<?php echo yii\helpers\Url::to(['product/del', 'pid' => $product->productid]); ?>"><button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="删除"><i class="ion-close"></i></button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-6">
                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
                        <strong>总共40条</strong>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="dataTables_paginate paging_simple_numbers">
                        <ul class="pagination pagination-sm">
                            <?php echo yii\widgets\LinkPager::widget(['pagination' => $pager, 'prevPageLabel' => '<i class="ion-chevron-left"></i>', 'nextPageLabel' => '<i class="ion-chevron-right"></i>']);?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>