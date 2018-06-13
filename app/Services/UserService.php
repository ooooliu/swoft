<?php
/**
 * Created by PhpStorm.
 * User: Lyn
 * Date: 2018/6/7
 * Time: 下午5:14
 */

namespace App\Services;


use App\Common\Common;
use App\Common\Session;
use App\Models\Entity\User;
use Swoft\Db\Db;
use Swoft\Redis\Redis;

class UserService
{
    /**
     * get token
     *
     * @return string
     */
    public static function token():string
    {
        return sha1(time().rand(1000, 9999));
    }

    public static function getUserInfo($user_id):?array
    {

    }

    /**
     * 用户登录
     *
     * @param $param
     * @return array
     * @throws \Exception
     */
    public static function loginUser($param):array
    {
        if(empty($param['email']) || empty($param['password'])){
            throw new \Exception("账号或密码错误", 300);
        }

        //获取用户信息
        $user = User::findOne(['email' => $param['email']], ['fields' => ['id', 'password', 'user_name']])->getResult()->getAttrs();

        if(empty($user) || md5($param['password']) !== $user['password']){
            throw new \Exception('用户名或密码错误', 300);
        }

        //获取session
        $session_id = Session::getSession($param['session']);
        if(!empty($session_id)){
            //创建登录key,添加用户信息到redis
            $redis = new Redis();
            $redis->set($session_id, $user['userName'], @config('cache.life_time'));
        }

        return [
            'status' => 200,
            'msg' => '登录成功'
        ];
    }

    /**
     * 用户退出
     *
     * @param $token
     */
    public static function loginOutUser($token):void
    {
        if(!empty($token)){
            $redis = new Redis();
            $redis->delete($token);
        }
    }

    /**
     * 添加注册用户信息
     *
     * @param $param
     * @return mixed
     * @throws \Exception
     */
    public static function addUser($param):int
    {
        if(empty($param['email']) || !Common::checkMail($param['email'])){
            throw new \Exception('请填写正确的邮件', 300);
        }

        if(empty($param['user_name']) || strlen($param['user_name']) < 1){
            throw new \Exception('请填写正确的用户名', 300);
        }

        if(empty($param['user_password'])
            || strlen($param['user_password']) < 3
            || empty($param['confirm_password'])
            || strlen($param['confirm_password']) < 3){
            throw new \Exception('请填写正确的用户密码', 300);
        }

        if($param['user_password'] != $param['confirm_password']){
            throw new \Exception('两次输入的密码不一致', 300);
        }

        //插入用户数据
        $user = new User();
        $user->setEmail($param['email']);
        $user->setUserName($param['user_name']);
        $user->setPassword($param['user_password']);

        return $user->save()->getResult();
    }
}