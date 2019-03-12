<?php
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
    <div class="card">
        <div class="card-header">
            <h4>订单列表</h4>
        </div>
        <div class="card-block">
            <div class="">
                <a href="<?php echo yii\helpers\Url::to(['manage/delAll']); ?>"><i class="ion-android-delete btn btn-app-blue-outline">删除</i></a>
            </div>
            <table class="table table-bordered table-striped table-vcenter table-header-bg table-condensed table-hover js-dataTable-full">
                <thead>
                <tr>
                    <th class="text-center">
                        <label class="css-input css-checkbox css-checkbox-primary">
                            <input type="checkbox" id="row_1" name="row_1"><span></span>
                        </label>
                    </th>
                    <th class="text-center">ID</th>
                    <th class="text-center">下单人</th>
                    <th class="text-center">收货地址</th>
                    <th class="text-center">快递方式</th>
                    <th class="text-center">订单总价</th>
                    <th class="text-center">商品列表</th
                    <th class="text-center" style="width: 10%;">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($data as $order): ?>
                    <tr>
                        <td class="text-center">
                            <label class="css-input css-checkbox css-checkbox-primary">
                                <input type="checkbox"><span></span>
                            </label>
                        </td>
                        <td class="text-center"><?php echo $order->orderid; ?></td>
                        <td class="text-center"><?php echo $order->username; ?></td>
                        <td class="hidden-xs"><?php echo $order->address; ?></td>
                        <td class="text-center"></td>
                        <td class="text-center"><?php echo $order->amount; ?></td>
                        <td class="text-center"></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="<?php echo Url::to(['manage/assign', 'aid' => $order->orderid]); ?>"><button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="授权"><i class="fa fa-key"></i></button>
                                <a href="<?php echo Url::to(['manage/edit', 'id' => $order->orderid]); ?>"><button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="编辑"><i class="ion-edit"></i></button>
                                <a href="<?php echo Url::to(['manage/del', 'id' => $order->orderid]); ?>"><button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="删除"><i class="ion-close"></i></button>
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