<?php

namespace common\models;

use yii\db\ActiveRecord;
use backend\models\ProfileModel;
use Yii;

/**
 * 会员中心类
 * @package backend\models
 */
class UserModel extends ActiveRecord {
    public $userrepass;

    public static function tableName() {
        return "{{%user}}";
    }

    public function attributeLabels(){
        return [
            'username' => '用户名',
            'useremail' => '用户邮箱',
            'userpass' => '用户密码',
            'userrepass' => '确认密码'
        ];
    }

    public function rules(){
        return [
            ['username', 'required', 'message' => '用户名不能为空', 'on' => ['useradd','useredit']],
            ['useremail', 'required', 'message' => '邮箱不能为空', 'on' => ['useradd','useredit']],
            ['userpass', 'required', 'message' => '密码不能为空' , 'on' => ['useradd','useredit']],
            ['userrepass', 'required', 'message' => '确认密码不能为空', 'on' => ['useradd','useredit']]
        ];
    }

    // 添加用户
    public function add($data){
        $this->scenario = "useradd";
        if ($this->load($data) && $this->validate()) {
           $this->userpass = md5($this->userpass);
           $this->createtime = time();
           if ($this->save(false)) {
               return true;
           } else {
               return false;
           }
        }
        return false;
    }

    // 编辑用户
    public function edit($data) {
        $this->scenario = "useredit";
        if ($this->load($data) && $this->validate()) {
            if ($this->save(false)) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    // 删除用户
    public function del($userid){
            // profile有内容的先删除profile内容，防止数据不一致
        try{
            $trans = Yii::$app->db->beginTransaction(); // 创建一个事务
            if ($obj = ProfileModel::find()->where('userid = :userid', [':userid' => $userid])->one()) {
                $res = ProfileModel::deleteAll('userid = :userid', [':userid' => $userid]);
                if (empty($res)) {
                    throw new \Exception();
                }
            }
            if (!$this->deleteAll('userid = :userid', ['userid' => $userid])){
                throw new \Exception();
            }
            $trans->commit();
            return true;
        } catch (\Exception $e) {
            if (Yii::$app->db->getTransaction()) {
                $trans->rollback();
                return false;
            }
        }
    }

    // 关联profile用户详情表
    public function getProfile() {
        return $this->hasOne(ProfileModel::className(), ['userid' => 'userid']); // user.userid = profile.userid
    }
}