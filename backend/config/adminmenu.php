<?php

return [
    ['label' => '后台首页', 'url' => 'index/index', 'module' => 'default', 'icon' => '', 'submenu' => []],
    ['label' => '用户管理', 'url' => '#', 'module' => 'member', 'icon' => 'fa fa-users', 'submenu' => [
        ['label' => '用户列表', 'url' => 'list'],
        ['label' => '添加用户', 'url' => 'add']
    ]],
    ['label' => '管理员管理', 'url' => '#', 'module' => 'manage', 'icon' => 'fa fa-user', 'submenu' => [
        ['label' => '管理员列表', 'url' => 'list'],
        ['label' => '添加管理员', 'url' => 'add']
    ]],
    ['label' => '权限管理', 'url' => '#', 'module' => 'rbac', 'icon' => 'fa fa-lock', 'submenu' => [
        ['label' => '角色列表', 'url' => 'roles'],
        ['label' => '添加角色', 'url' => 'create-rle'],
        ['label' => '规则列表', 'url' => 'rules'],
        ['label' => '添加规则', 'url' => 'craete-rule']
    ]],
    ['label' => '分类管理', 'url' => '#', 'module' => 'category', 'icon' => 'ion-ios-pricetags', 'submenu' => [
        ['label' => '分类列表', 'url' => 'list'],
        ['label' => '添加分类', 'url' => 'add']
    ]],
    ['label' => '商品管理', 'url' => '#', 'module' => 'product', 'icon' => 'fa fa-shopping-cart', 'submenu' => [
        ['label' => '商品列表', 'url' => 'list'],
        ['label' => '添加商品', 'url' => 'add']
    ]],
    ['label' => '订单管理', 'url' => '#', 'module' => 'order', 'icon' => '', 'submenu' => [
        ['label' => '订单列表', 'url' => 'list']
    ]],
    ['label' => '评论管理', 'url' => 'index', 'module' => 'comment', 'icon' => '', 'submenu' => []],
    ['label' => '系统配置', 'url' => 'index', 'module' => 'system', 'icon' => '', 'submenu' => [
       ['label' => '系统配置', 'url' => 'list']
    ]]
];