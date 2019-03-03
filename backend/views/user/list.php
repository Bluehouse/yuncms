
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
            <h4>用户列表</h4>
        </div>
        <div class="card-block">
            <a href="<?php echo yii\helpers\Url::to(['member/add']); ?>"><i class="fa fa-plus btn btn-app-green-outline">添加用户</i></a>
            <a href="<?php echo yii\helpers\Url::to(['member/delAll']); ?>"><i class="ion-android-delete btn btn-app-blue-outline">批量删除</i></a>
            <table class="table table-bordered table-striped table-vcenter table-header-bg table-condensed table-hover js-dataTable-full">
                <thead>
                <tr>
                    <th class="text-center"><label class="css-input css-checkbox css-checkbox-primary">
                            <input type="checkbox"><span></span>
                        </label></th>
                    <th class="text-center">ID</th>
                    <th class="text-center">用户名</th>
                    <th class="text-center">邮箱</th>
                    <th class="text-center">昵称</th>
                    <th class="text-center">性别</th>
                    <th class="text-center">添加时间</th
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($userList as $user): ?>
                    <tr>
                        <td class="text-center">
                            <label class="css-input css-checkbox css-checkbox-primary">
                                <input type="checkbox"><span></span>
                            </label>
                        </td>
                        <td class="text-center"><?php echo $user->userid; ?></td>
                        <td class="text-center"><?php echo $user->username; ?></td>
                        <td class="text-center"><?php echo $user->useremail; ?></td>
                        <td class="text-center"><?php echo isset($user->profile->nickname) ? $user->profile->nickname : '未填写'; ?></td>
                        <td class="text-center"><?php echo isset($user->profile->sex) ? $user->profile->sex : '未填写'; ?></td>
                        <td class="text-center"><?php echo date('Y-m-d H:i:s', $user->createtime); ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="<?php echo yii\helpers\Url::to(['member/edit', 'id' => $user->userid]); ?>"><button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="编辑"><i class="ion-edit"></i></button>
                                    <a href="<?php echo yii\helpers\Url::to(['member/del', 'id' => $user->userid]); ?>"><button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="删除"><i class="ion-close"></i></button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="card-block col-md-offset-8">
                <nav>
                    <ul class="pagination pagination-sm">
                        <?php echo yii\widgets\LinkPager::widget(['pagination' => $pager, 'prevPageLabel' => '<i class="ion-chevron-left"></i>', 'nextPageLabel' => '<i class="ion-chevron-right"></i>']);?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>