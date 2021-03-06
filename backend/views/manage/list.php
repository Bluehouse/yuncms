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
            <h4>管理员列表</h4>
        </div>
        <div class="card-block">
            <div class="">
                <a href="<?php echo yii\helpers\Url::to(['manage/add']); ?>"><i class="fa fa-plus btn btn-app-green-outline">添加管理员</i></a>
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
                        <th class="text-center">账号</th>
                        <th class="text-center">邮箱</th>
                        <th class="text-center">最后登录时间</th>
                        <th class="text-center">最后登录IP</th>
                        <th class="text-center">添加时间</th
                        <th class="text-center" style="width: 10%;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($adminList as $admin): ?>
                        <tr>
                            <td class="text-center">
                                <label class="css-input css-checkbox css-checkbox-primary">
                                    <input type="checkbox"><span></span>
                                </label>
                            </td>
                            <td class="text-center"><?php echo $admin->adminid; ?></td>
                            <td class="text-center"><?php echo $admin->adminuser; ?></td>
                            <td class="hidden-xs"><?php echo $admin->adminemail; ?></td>
                            <td class="text-center"><?php echo date('y-m-d H:i:s', $admin->logintime); ?></td>
                            <td class="text-center"><?php echo long2ip($admin->loginip); ?></td>
                            <td class="text-center"><?php echo date('y-m-d H:i:s', $admin->createtime); ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="<?php echo Url::to(['manage/assign', 'aid' => $admin->adminid]); ?>"><button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="授权"><i class="fa fa-key"></i></button>
                                    <a href="<?php echo Url::to(['manage/edit', 'id' => $admin->adminid]); ?>"><button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="编辑"><i class="ion-edit"></i></button>
                                    <a href="<?php echo Url::to(['manage/del', 'id' => $admin->adminid]); ?>"><button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="删除"><i class="ion-close"></i></button>
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