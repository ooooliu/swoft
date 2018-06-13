<?php
/**
 * Created by PhpStorm.
 * User: Lyn
 * Date: 2018/6/7
 * Time: 下午5:14
 */

namespace App\Services;


use App\Common\Common;
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
    public static function token()
    {
        return sha1(time().rand(1000, 9999));
    }

    /**
     * 用户登录
     *
     * @param $param
     * @return array
     * @throws \Exception
     */
    public static function loginUser($param)
    {
        if(empty($param['user_name']) || empty($param['user_password'])){
            throw new \Exception("账号或密码错误", 300);
        }

        //获取token
        $token = UserService::token();

        //创建登录key,添加用户信息到redis
        $redis = new Redis();
        $redis->set($token, $param['user_name'], @config('cache.life_time'));

        return [
            'status' => 200,
            'msg' => '登录成功',
            'token' => $token
        ];
    }

    /**
     * 用户退出
     *
     * @param $token
     */
    public static function loginOutUser($token)
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
    public static function addUser($param)
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