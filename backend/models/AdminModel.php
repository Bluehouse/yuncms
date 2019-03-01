<?php

namespace backend\models;

use yii\db\ActiveRecord;
use Yii;

// 继承ActiveRecord高级类
class AdminModel extends ActiveRecord
{
    public $rememberMe = false; // 创建一个属性供activeForm创建使用
    public $adminrepass;

    public static function tableName(){
        return "{{%admin}}";
    }

    // 供activeForm使用的label
    public function attributeLabels() {
        return [
            'adminuser' => '管理员账号',
            'adminemail' => '管理员邮箱',
            'adminpass' => '管理员密码',
            'adminrepass' => '确认密码'
        ];
    }
    // 定义字段规则
    public function rules(){
        return [
            // on是绑定的应用场景
            ['adminuser', 'required', 'message' => '账号不能为空','on' => ['login', 'seekpass', 'changepass', 'adminadd']], // 不绑定场景的话，也获取不到字段
            ['adminpass', 'required', 'message' => '密码不能为空', 'on' => ['login', 'changepass', 'adminadd', 'adminedit']],
            ['rememberMe', 'boolean', 'on' => 'login'],
            ['adminpass', 'validatePass', 'on' => 'login'],
            ['adminemail', 'required', 'message' => '邮箱不能为空', 'on' => ['seekpass','adminadd', 'adminedit']],
            ['adminemail', 'email', 'message' => '邮箱格式不正确', 'on' => ['seekpass', 'adminadd', 'adminedit']],
            ['adminemail', 'validateEmail', 'on' => 'seekpass'],
            ['adminrepass', 'required', 'message' => '确认密码不能为空', 'on' => ['changepass', 'adminadd', 'adminedit']],
            ['adminrepass', 'compare', 'compareAttribute' => 'adminpass', 'message' => '两次输入密码不一致', 'on' => ['changepass','adminadd', 'adminedit']]
        ];
    }

    // 校验密码
    public function validatePass(){
        if(!$this->hasErrors()){
           $data = self::find()->where("adminuser = :user and adminpass = :pass", [':user' => $this->adminuser, ':pass' => md5($this->adminpass)] )->one();
           if (is_null($data)) {
               $this->addError('adminpass', "用户名或者密码错误");
           }
        }
    }

    // 校验邮箱
    public function validateEmail() {
        if (!$this->hasErrors()) {
            $data = self::find()->where('adminuser = :user and adminemail = :email', [':user' => $this->adminuser, ':email' => $this->adminemail])->one();
            if (is_null($data)) {
                $this->addError('adminemail', '账号邮箱不匹配');
            }
        }
    }

    // 登录
    public function login($data){
        $this->scenario = "login";
       if ($this->load($data) && $this->validate()) {
           $lifetime = $this->rememberMe ? 24 * 3600 : 0;
           $session = Yii::$app->session;
           session_set_cookie_params($lifetime);
           $session['admin'] = [
               'adminuser' => $this->adminuser,
               'isLogin' => 1,
           ];
           $this->updateAll(['logintime' => time(), 'loginip' => ip2long(Yii::$app->request->userIP)], "adminuser = :user", [':user' => $this->adminuser]);
           return (bool)$session['admin']['isLogin'];

       }
       return false;
    }

    // 找回密码
    public function seekpass($data) {
        $this->scenario = "seekpass"; // 定义场景，减少冗余字段规则校验
        if ($this->load($data) && $this->validate()) {
            $time = time();
            // 默认数据会组装到adminModel下
            $token = $this->createToken($data['AdminModel']['adminuser'], $time);

            $mailer = Yii::$app->mailer->compose("seekpass", ['adminuser' => $data['AdminModel']['adminuser'], 'token' => $token, 'time' => $time] ); // 指定mail下模板和传参
            $mailer->setFrom(Yii::$app->params['mail']);
            $mailer->setTo($data['AdminModel']['adminemail']);
            $mailer->setSubject("YunCMS - 找回密码");

            if ($mailer->send()) {
                return true;
            }
        }
        return false;
    }

    // 创建token
    public function createToken($adminuser, $time){
        return md5(md5($adminuser) . base64_encode(Yii::$app->request->userIP) . md5($time));
    }

    // 修改密码
    public function changePass($data) {
        $this->scenario = "changepass";
        if ($this->load($data) && $this->validate()) {
            return (bool)$this->updateAll(['adminpass' => md5($this->adminpass)], 'adminuser = :user', [':user' => $this->adminuser]);
        }
        return false;
    }

    // 添加管理员
    public function add($data){
        $this->scenario = "adminadd";
        if ($this->load($data) && $this->validate()) {
            $this->adminpass = md5($this->adminpass);
            if ($this->save(false)) { // 内部false表示不用再做验证，因为外层已经验证过
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    // 保存管理更新数据
    public function edit($data) {
        $this->scenario = "adminedit";
        if ($this->load($data) && $this->validate()) {
            return (bool) $this->updateAll(['adminemail' => $this->adminemail, 'adminpass' => md5($this->adminpass)], 'adminid = :adminid', [':adminid' => $this->adminid]);
        }
    }

    // 删除管理员
    public function del($id) {
        $result = $this->deleteAll("adminid = :id", [':id' => $id]);
        if ($result) {
            return true;
        }
        return false;
    }
}