<!-- Page Content -->
<div class="container-fluid p-y-md">
    <!-- Dynamic Table Full -->
    <div class="card">
        <div class="card-header">
            <h4>管理员列表</h4>
        </div>
        <div class="card-block">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th class="text-center">ID</th>
                        <th class="text-center">账号</th>
                        <th class="text-center">邮箱</th>
                        <th class="text-center">最后登录时间</th>
                        <th class="text-center">最后登录IP</th>
                        <th class="text-center">添加时间</th
                        <th>操作</th>
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
                            <td class="text-center"><?php echo $admin->adminemail; ?></td>
                            <td class="text-center"><?php echo date('y-m-d H:i:s', $admin->logintime); ?></td>
                            <td class="text-center"><?php echo long2ip($admin->loginip); ?></td>
                            <td class="text-center"><?php echo date('y-m-d H:i:s', $admin->createtime); ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="编辑"><i class="ion-edit"></i></button>
                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="删除"><i class="ion-close"></i></button>
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
<!--                        <li class="disabled">-->
<!--                            <a href="javascript:void(0)"><i class="ion-chevron-left"></i></a>-->
<!--                        </li>-->
<!--                        <li class="active">-->
<!--                            <a href="javascript:void(0)">1</a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="javascript:void(0)">2</a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="javascript:void(0)">3</a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="javascript:void(0)">4</a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="javascript:void(0)">5</a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="javascript:void(0)"><i class="ion-chevron-right"></i></a>-->
<!--                        </li>-->
                    </ul>
                </nav>
            </div>
        </div>
        <!-- .card-block -->
    </div>
    <!-- .card -->
</div>