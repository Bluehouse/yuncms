<?php

namespace backend\models;

use yii\db\ActiveRecord;
use Yii;

class RbacModel extends ActiveRecord{
   public static function getOptions($data, $parent) {
       // value => text
       $return = [];
       foreach($data as $obj){
           if(!empty($parent && $parent->name != $obj->name) && Yii::$app->authManager->canAddChild($parent, $obj)){
                $return[$obj->name] = $obj->description;
           }
           // 兼容数据格式，待优化
           if (is_null($parent)) {
               $return[$obj->name] = $obj->description;
           }
       }
       return $return;
   }

   public static function addChild($name, $children) {
        $auth = Yii::$app->authManager;
        $itemObj = $auth->getRole($name); // 获取当前角色的所有角色
        if (empty($itemObj)) {
            return false;
        }

        // 因为要插入很多对应关系，循环添加，所以要采用事务，防止数据不一致
        $trans = Yii::$app->db->beginTransaction();

        try {
            $auth->removeChildren($itemObj) ;
            foreach ($children as $item) {
                $obj = empty($auth->getRole($item)) ? $auth->getPermission($item) : $auth->getRole($item);
                $auth->addChild($itemObj, $obj);
            }
            $trans->commit();
        } catch(\Exception $e) {
            $trans->rollback();
            return false;
        }

        return true;
    }

    public static function getChildrenByName($name) {
        $auth = Yii::$app->authManager;

//        $reutrn = [
//            'roles' => [],
//            'permissions' => []
//        ];
        $return = [];
        $return['roles'] = [];
        $return['permissions'] = [];

        $children = $auth->getChildren($name);

        if (empty($children)) {
            return $return;
        }

        foreach($children as $obj) {
            if ($obj->type == 1) {
                $return['roles'][] = $obj->name;
            } else {
                $return['permissions'][] = $obj->name;
            }
        }

        return $return;
    }

    // 用户授权
    public static function grant($adminid, $children) {
        $trans = Yii::$app->db->beginTransaction();

        try {
            $auth = Yii::$app->authManager;
            $auth->revokeAll($adminid);
            foreach($children as $item) {
                $obj = empty($auth->getRole($item)) ? $auth->getPermission($item) : $auth->getRole($item);
                $auth->assign($obj, $adminid);
            }
            $trans->commit();
        } catch(\Exception $e) {
            $trans->rollback();
            return false;
        }

        return true;
    }

    // 通用方法
    private static function _getItemByUser($adminid, $type) {
       $func = "getPermissionsByUser";
       if ($type == 1) {
           $func = "getRolesByUser";
       }
       $data = [];
       $auth = Yii::$app->authManager;
       $items = $auth->$func($adminid);
       foreach ($items as $item) {
            $data[] = $item->name;
       }
       return $data;
    }

    public static function getChildrenByUser($adminid) {
       $return = [];
       $return['roles'] = self::_getItemByUser($adminid, 1);
       $return['permissions'] = self::_getItemByUser($adminid, 2);
       return $return;
     }
}